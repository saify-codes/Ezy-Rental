<?php include "includes/header.inc.php" ?>
<?php include "connection.php" ?>
<?php
// Check if the user is logged in
if (!isset($_SESSION['user_loggedin'])) {
  $_SESSION['message'] = "Please login to make booking";
  // User is not logged in, redirect to login
  header('Location: login.php');
  exit;
}
if (isset($_GET['id'])) {
  $query = "select * from car where car_id = {$_GET['id']}";
  $result = $connection->query($query)->fetch_assoc();
  $model = $result['model'];
  $color = $result['color'];
  $rent = $result['rent'];
}else{
  header("location: cars.php");
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve the form data
  $user = $_POST['user'];
  $car = $_POST['car'];
  $query = "select * from car where car_id = $car";
  $result = $connection->query($query)->fetch_assoc();
  $rent = $result['rent'];
  $days = date_diff(date_create(),date_create($_POST['date']))->days;
  $price = $rent*$days;

  $query = "INSERT INTO bookings (days,price,car_id,user_id) VALUES(?,?,?,?)";
  $stmt = $connection->prepare($query);
  $stmt->bind_param("ssii", $days, $price,$car,$user);
  $stmt->execute();

  echo "<script>alert('booked!')</script>";
  echo "<script>location='cars.php'</script>";

}
?>


<section class="ftco-section bg-light">
  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-6">
        <form method="post" onsubmit="return validateDate()">
          <input type="hidden" name="car" value="<?php echo $_GET['id'] ?>">
          <input type="hidden" name="user" value="<?php echo $_SESSION['user_loggedin']['user_id'] ?>">

          <div class="form-group">
            <label>Car Model</label>
            <input type="text" class="form-control" value="<?php echo $model?>" readonly>
          </div>
          <div class="form-group">
            <label>Car Color</label>
            <input type="text" class="form-control" value="<?php echo $color?>" readonly>
          </div>
          <div class="form-group">
            <label>Car Rent / Day</label>
            <input type="number" class="form-control" value="<?php echo $rent?>" readonly>
          </div>
          <div class="form-group">
            <label>Select booking days</label>
            <input class="form-control" id="date" type="date" name="date" min="<?php echo date("Y-m-d") ?>" onchange="validateDate()">
          </div>
          
          <button type="submit" class="btn btn-primary">Rent</button>

        </form>
      </div>
    </div>
</section>

<script src="js/validateDate.js"></script>




<?php include "includes/footer.inc.php" ?>