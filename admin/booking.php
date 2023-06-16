<?php

class Booking {
  private $connection;
  private $table = 'bookings';

  public function __construct($connection) {
    $this->connection = $connection;
  }

  public function addBooking($days, $price, $carId) {
    $query = "INSERT INTO $this->table (days, price, car_id) VALUES (?, ?, ?)";
    $stmt = $this->connection->prepare($query);
    $stmt->bind_param("sss", $days, $price, $carId);
    $stmt->execute();
    $stmt->close();
  }


  public function getAllBookings() {
    $query = "SELECT * FROM $this->table JOIN car USING (car_id) JOIN users USING (user_id)";
    $result = $this->connection->query($query);
    $cars = [];
    while ($row = $result->fetch_assoc()) {
      $cars[] = $row;
    }
    $result->free_result();
    return $cars;
  }
}
