<?php

include 'db.php';


// Check if the form is submitted (POST request)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form field values
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $gender = $_POST["gender"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $address = $_POST["address"];
    $mobile_no = $_POST["mobile_no"];

    $errors = array();

    // Check for empty fields
    if (empty($first_name)) {
        $errors[] = "First Name is required.";
    } else {
        // Validate first name using regular expression
        if (!preg_match("/^[a-zA-Z-' ]*$/", $first_name)) {
            $message = "Only letters and white space allowed for First Name.";
            echo "<div style='text-align: center; color: red;'><p>$message</p></div>";
            header("Refresh: 3;url=".$_SERVER['HTTP_REFERER']);
            exit;
        }
    }

    if (empty($last_name)) {
        $errors[] = "Last Name is required.";
    } else {
        // Validate last name using regular expression
        if (!preg_match("/^[a-zA-Z-' ]*$/", $last_name)) {
            $message = "Only letters and white space allowed for Last Name.";
            echo "<div style='text-align: center; color: red;'><p>$message</p></div>";
            header("Refresh: 3;url=".$_SERVER['HTTP_REFERER']);
            exit;
        }
    }

    if (empty($gender)) {
        $errors[] = "Gender is required.";
    }

    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "Invalid email format.";
        echo "<div style='text-align: center; color: red;'><p>$message</p></div>";
        header("Refresh: 3;url=".$_SERVER['HTTP_REFERER']);
         exit;
    }

    if (empty($password)) {
        $errors[] = "Password is required.";
    } else {
        // Validate password strength
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);

        if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
            $message = "Password must be at least 8 char=acters long and contain at least one uppercase letter, one lowercase letter, one number, and one special character.";
            echo "<div style='text-align: center; color: red;'><p>$message</p></div>";
            header("Refresh: 3;url=".$_SERVER['HTTP_REFERER']);
            exit;
        }
    }

    if (empty($address)) {
        $errors[] = "Address is required.";
    }

    if (empty($mobile_no)) {
        $errors[] = "Mobile Number is required.";
    } else {
        // Regular expression pattern for a 10-digit phone number
        $pattern = '/^[0-9]{10}$/';

        // Check if the phone number matches the pattern
        if (!preg_match($pattern, $mobile_no)) {
            // $errors[] = "Phone number is invalid, only ten numbers acceptable.";
            $message = "Mobile number is invalid, only ten numbers acceptable.";
            echo "<div style='text-align: center; color: red;'><p>$message</p></div>";
            header("Refresh: 3;url=".$_SERVER['HTTP_REFERER']);
            exit;
        }
    }

    // Check if there are any errors
    if (count($errors) > 0) {
        // Display errors to the user
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    } else {
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
            $message = "Email already exists. Please use a different email.";
            echo "<div style='text-align: center; color: red;'><p>$message</p></div>";
            header("Refresh: 3;url=" . $_SERVER['HTTP_REFERER']);
            exit;
        } elseif ($mobile_result->num_rows > 0) {
            // Mobile number already exists
            $message = "Mobile number already exists. Please use a different number.";
            echo "<div style='text-align: center; color: red;'><p>$message</p></div>";
            header("Refresh: 3;url=" . $_SERVER['HTTP_REFERER']);
            exit;
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
            } else {
                // Display a generic error message to the user
                echo "Error: Form submission failed. Please try again later.";
                header('location:process_form.php');
            }
        }
    }
}

// Close the database connection
$conn->close();
?>
