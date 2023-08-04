<?php
// Define default current step
$current_step = isset($_POST["current_step"]) ? (int)$_POST["current_step"] : 1;

function validate_step1($first_name, $last_name)
{
    $errors = array();

    // Check for empty fields
    if (empty($first_name)) {
        $errors["first_name"] = "First Name is required.";
    } else {
        // Validate first name using regular expression
        if (!preg_match("/^[a-zA-Z-' ]*$/", $first_name)) {
            $errors["first_name"] = "Only letters and white space allowed for First Name.";
        }
    }

    if (empty($last_name)) {
        $errors["last_name"] = "Last Name is required.";
    } else {
        // Validate last name using regular expression
        if (!preg_match("/^[a-zA-Z-' ]*$/", $last_name)) {
            $errors["last_name"] = "Only letters and white space allowed for Last Name.";
        }
    }

    return $errors;
}

function validate_step2($gender, $email)
{
    $errors = array();

    // Check for empty fields
    if (empty($gender)) {
        $errors["gender"] = "Gender is required.";
    }

    if (empty($email)) {
        $errors["email"] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors["email"] = "Invalid email format.";
    }

    return $errors;
}

function validate_step3($password, $address, $mobile_no)
{
    $errors = array();

    // Check for empty fields
    if (empty($password)) {
        $errors["password"] = "Password is required.";
    } else {
        // Validate password strength
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);

        if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
            $errors["password"] = "Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one number, and one special character.";
        }
    }

    if (empty($address)) {
        $errors["address"] = "Address is required.";
    }

    if (empty($mobile_no)) {
        $errors["mobile_no"] = "Mobile Number is required.";
    } else {
        // Regular expression pattern for a 10-digit phone number
        $pattern = '/^[0-9]{10}$/';

        // Check if the phone number matches the pattern
        if (!preg_match($pattern, $mobile_no)) {
            $errors["mobile_no"] = "Mobile number is invalid, only ten numbers acceptable.";
        }
    }

    return $errors;
}
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "multiform";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables
$first_name = $last_name = $gender = $email = $password = $address = $mobile_no = "";
$errors = array();

// Check if the form is submitted (POST request)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $current_step = isset($_POST["current_step"]) ? (int)$_POST["current_step"] : 1;

    // Handle form submission for each step
    if ($current_step === 1) {
        $first_name = isset($_POST["first_name"]) ? $_POST["first_name"] : "";
        $last_name = isset($_POST["last_name"]) ? $_POST["last_name"] : "";

        $errors = validate_step1($first_name, $last_name);
    } elseif ($current_step === 2) {
        $gender = isset($_POST["gender"]) ? $_POST["gender"] : "";
        $email = isset($_POST["email"]) ? $_POST["email"] : "";

        $errors = validate_step2($gender, $email);
    } elseif ($current_step === 3) {
        $password = isset($_POST["password"]) ? $_POST["password"] : "";
        $address = isset($_POST["address"]) ? $_POST["address"] : "";
        $mobile_no = isset($_POST["mobile_no"]) ? $_POST["mobile_no"] : "";

        $errors = validate_step3($password, $address, $mobile_no);

        // If there are no errors, proceed to insert data into the database
        if (empty($errors)) {
            // Check if email and mobile_no already exist in the database (using prepared statements to prevent SQL injection)
            $email_query = "SELECT * FROM tbl_login WHERE email = ?";
            $mobile_query = "SELECT * FROM tbl_login WHERE mobile_no = ?";

            $stmt_email = $conn->prepare($email_query);
            $stmt_email->bind_param("s", $email);
            $stmt_email->execute();
            $email_result = $stmt_email->get_result();

            $stmt_mobile = $conn->prepare($mobile_query);
            $stmt_mobile->bind_param("s", $mobile_no);
            $stmt_mobile->execute();
            $mobile_result = $stmt_mobile->get_result();

            if ($email_result->num_rows > 0) {
                // Email already exists
                $errors["email"] = "Email already exists. Please use a different email.";
            } elseif ($mobile_result->num_rows > 0) {
                // Mobile number already exists
                $errors["mobile_no"] = "Mobile number already exists. Please use a different number.";
            } else {
                // Hash the password for security
                $hashed_password = password_hash($password, PASSWORD_BCRYPT);

                // Insert the data into the database
                $insert_query = "INSERT INTO tbl_login (first_name, last_name, gender, email, password, address, mobile_no)
                                 VALUES (?, ?, ?, ?, ?, ?, ?)";

                $stmt = $conn->prepare($insert_query);
                $stmt->bind_param("sssssss", $first_name, $last_name, $gender, $email, $hashed_password, $address, $mobile_no);

                if ($stmt->execute()) {
                    echo "Form submitted successfully!";
                    header('location:login.php');
                    exit;
                } else {
                    // Display a generic error message to the user
                    $errors["form"] = "Error: Form submission failed. Please try again later.";
                }
            }
        }
    }
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Signup to our website</title>
    <style>
      body {
    font-family: Arial, sans-serif;
}

.form-container {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.form-container h2 {
    text-align: center;
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
}

.form-group input[type="text"],
.form-group input[type="password"],
.form-group input[type="email"],
.form-group input[type="tel"],
.form-group input[type="radio"] {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.error {
    color: red;
    font-size: 12px;
    margin-top: 5px;
}

button {
    padding: 10px 15px;
    background-color: #4CAF50;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.step[data-step="2"],
.step[data-step="3"] {
    display: none;
}
    </style>
</head>

<body>
    <div class="form-container">
        <h2>Signup to our website</h2>
        <form action="rough.php" method="post">
            <input type="hidden" name="current_step" value="<?php echo $current_step; ?>">
            <?php
            if ($current_step === 1) {
                include 'step1.php';
            } elseif ($current_step === 2) {
                include 'step2.php';
            } elseif ($current_step === 3) {
                include 'step3.php';
            }
            ?>
        </form>
        <p>or already have an account? <a href="login.php">Login</a></p>
    </div>

    <script>
        function goToStep(step) {
            const currentStep = document.querySelector('.step[data-step="' + step + '"]');
            const previousStep = document.querySelector('.step[data-step="' + (step - 1) + '"]');
            currentStep.style.display = 'block';
            previousStep.style.display = 'none';
        }
    </script>
</body>

</html>
