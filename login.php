<?php

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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST["email"];
    $password_input = $_POST['password'];
    $sql = "SELECT password FROM `tbl_login` WHERE email='$email'";
    $result = $conn->query($sql);
    if ($result) {
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $password = $row["password"];

            // Verify the password using password_verify
            if (password_verify($password_input, $password)) {
                session_start();
                $_SESSION['email'] = $email;
                $_SESSION['success_message'] = 'You are successfully logged in.';
                header('location:home.php');
                exit;
            } else {
                $message = "Error, Invalid credentials.";
                echo "<p>$message</p>";
                header("Refresh: 3;url=".$_SERVER['HTTP_REFERER']);
                exit;
            }
        } else {
            $message = "Error, Invalid credentials.";
            echo "<p>$message</p>";
            header("Refresh: 3;url=".$_SERVER['HTTP_REFERER']);
            exit;
        }
    } else {
        die("Query failed: " . $conn->error);
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="style2.css">

    <title>Login page</title>
</head>
<body>
<div class="container">
<h1 class="text-center">Login to our website</h1>
<div class="form-wrapper">
<h2 class="sub-title">Enter Your Info</h2>
    <form action="login.php" method="post">
        <div class="form-group">
            <label>Email</label><br>
            <input type="email" name="email" placeholder="Enter your email" required>
        </div>
        <div class="form-group">
            <label>Password</label><br>
            <input type="password" name="password" placeholder="Enter your password" required>
        </div>
        <div>
        <button type="submit" name="submit">Login</button><br><br>
        or a new user?
        <button onclick="window.location.href = 'index.php';">Signup</button>
        </div>
    </form>
</div>
<p class="homelink">
Go back to <a href="home.php">Homepage</a>
</p>
</div>
</body>
</html>
