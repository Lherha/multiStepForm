<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = sanitizeInput($_POST["name"]);
    $email = sanitizeInput($_POST["email"]);
    $phone = sanitizeInput($_POST["phone"]);
    $message = sanitizeInput($_POST["letter"]);

    if (empty($name) || empty($email) || empty($phone) || empty($message)) {
        echo "Please fill in all required fields.";
        exit;
    }

    if (!preg_match("/^[a-zA-Z\s]+$/", $name)) {
        echo "Invalid name. Please provide a valid name with only letters and whitespace.";
        exit;
    }

    if (!preg_match("/^\d{10}$/", $phone)) {
        echo "Invalid phone number. Please provide a 10-digit phone number.";
        exit;
    }
    
    $phone = preg_replace("/[^0-9]/", "", $phone);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email address. Please provide a valid email.";
        exit;
    }

    $to = "mueezlherha@gmail.com"; 
    $subject = "Contact Form Submission from $name";

    $headers = "From: $email" . "\r\n" .
        "Reply-To: $email" . "\r\n" .
        "X-Mailer: PHP/" . phpversion();

    mail($to, $subject, $message, $headers);
    echo "Email sent successfully!";
}

function sanitizeInput($input) {
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}
?>
