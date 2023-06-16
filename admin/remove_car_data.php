<?php
require_once 'connection.php'; // Include the database connection file
require_once 'Car.php'; // Include the Car class file

// Check if the request method is GET and if the car_id parameter is set
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $carId = $_GET['id'];

    // Create an instance of the Car class, passing the database connection object
    $car = new Car($connection);

    // Delete the car from the database
    $car->deleteCar($carId);

    // Redirect to a success page or any other desired page
}
header('Location: view_car.php');
exit;
