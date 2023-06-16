<?php

class Car {
  private $connection;
  private $table = 'car';

  public function __construct($connection) {
    $this->connection = $connection;
  }

  public function addCar($model, $color, $rent) {
    $query = "INSERT INTO $this->table (model, color, rent) VALUES (?, ?, ?)";
    $stmt = $this->connection->prepare($query);
    $stmt->bind_param("sss", $model, $color, $rent);
    $stmt->execute();
    $stmt->close();
  }

  public function deleteCar($carId) {
    $query = "DELETE FROM $this->table WHERE car_id = ?";
    $stmt = $this->connection->prepare($query);
    $stmt->bind_param("i", $carId);
    $stmt->execute();
    $stmt->close();
  }

  public function getAllCars() {
    $query = "SELECT * FROM $this->table";
    $result = $this->connection->query($query);
    $cars = [];
    while ($row = $result->fetch_assoc()) {
      $cars[] = $row;
    }
    $result->free_result();
    return $cars;
  }
}
