<?php

require "connection.php";
session_start();

// Check if the user is logged in
if (isset($_SESSION['user_loggedin'])) {
    // User is logged in, redirect to dashboard
    header('Location: index.php');
    exit;
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the form data
    $email = $_POST['email'];
    $password = $_POST['password'];


    // Query the database to retrieve user data based on the provided email and pass
    $query = "SELECT * FROM users WHERE email = ? AND password = ?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the user exists and verify the password
    if ($result->num_rows === 1) {
        $_SESSION['user_loggedin'] = $result->fetch_assoc();
        header("location:index.php");
        exit;
    } else {
        // Invalid login
        echo '<script>alert("login failed")</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">


    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-white border-0">
                        <h4 style="color: #01d28e; font-weight:500;">Customer Login</h4>
                    </div>
                    <?php
                    // Check if the message is set in the session
                    if (isset($_SESSION['message'])) {
                        $message = $_SESSION['message'];
                        // Display the success message
                        echo "<div class='alert alert-warning' role='alert'><strong>Alert</strong> $message</div>";
                        // Clear the message from the session
                        unset($_SESSION['message']);
                    }
                    ?>
                    <div class="card-body">
                        <form method="POST">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>
                        <br>
                        <a href="register.php">Doesn't have any account?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>