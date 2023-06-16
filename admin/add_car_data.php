<?php
require_once 'connection.php'; // Include the database connection file
require_once 'Car.php'; // Include the Car class file

session_start();

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if all the required values are present
    if (isset($_POST['model']) && isset($_POST['color']) && isset($_POST['rent'])) {
        $model = $_POST['model'];
        $color = $_POST['color'];
        $rent = $_POST['rent'];

        // Create an instance of the Car class, passing the database connection object
        $car = new Car($connection);

        // Add the car to the database
        $car->addCar($model, $color, $rent);

        // Set a success message in the session
        $_SESSION['message'] = 'Car added successfully';

        // Redirect to a success page or any other desired page
        header('Location:' . $_SERVER['HTTP_REFERER']);
        exit;
    } else {
        // Redirect to an error page or display an error message
        header('Location: error.php');
        exit;
    }
}
