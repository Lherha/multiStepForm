<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = sanitizeInput($_POST["name"]);
    $email = sanitizeInput($_POST["email"]);
    $phone = sanitizeInput($_POST["phone"]);
    $message = sanitizeInput($_POST["letter"]);

    $errorMessage = "";

    if (empty($name) || empty($email) || empty($phone) || empty($message)) {
        $errorMessage = "Please fill in all required fields.";
    } else if (!preg_match("/^[a-zA-Z\s]+$/", $name)) {
        $errorMessage = "Invalid name. Please provide a valid name with only letters and whitespace.";
    } else if (!preg_match("/^\d{10}$/", $phone)) {
        $errorMessage = "Invalid phone number. Please provide a 10-digit phone number.";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMessage = "Invalid email address. Please provide a valid email.";
    } else {
        $to = "mueezlherha@gmail.com"; 
        $subject = "Contact Form Submission from $name";

        $headers = "From: $email" . "\r\n" .
            "Reply-To: $email" . "\r\n" .
            "X-Mailer: PHP/" . phpversion();

        if (mail($to, $subject, $message, $headers)) {
            $successMessage = "Email sent successfully!";
            header("Refresh: 3;url=".$_SERVER['HTTP_REFERER']);
            exit;
        } else {
            $errorMessage = "Failed to send email. Please try again later.";
            header("Refresh: 3;url=".$_SERVER['HTTP_REFERER']);
            exit;
        }
    }
}

function sanitizeInput($input) {
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Contact Form Response</title>
    
    <?php
    if (isset($errorMessage) || isset($successMessage)) {
        echo '<meta http-equiv="refresh" content="3;url=home.php">';
    }
    ?>
</head>
<body>
    <?php
    if (isset($errorMessage)) {
        echo '<p style="color: red;">' . $errorMessage . '</p>';
    }
    
    if (isset($successMessage)) {
        echo '<p style="color: green;">' . $successMessage . '</p>';
    }
    ?>
</body>
</html>

