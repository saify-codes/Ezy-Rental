<?php include "includes/header.inc.php" ?>

<div class="body flex-grow-1 px-3">
  <div class="container-lg">

    <?php
    // Check if the message is set in the session
    if (isset($_SESSION['message'])) {
      $message = $_SESSION['message'];
      // Display the success message
      echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong>Alert</strong>$message
                <button type='button' class='btn-close' data-coreui-dismiss='alert' aria-label='Close'></button>
          </div>";
      // Clear the message from the session
      unset($_SESSION['message']);
    }
    ?>


    <script>
      var alertList = document.querySelectorAll('.alert');
      alertList.forEach(function(alert) {
        new bootstrap.Alert(alert)
      })
    </script>

    <form action="add_car_data.php" method="post" id="myForm">
      <div class="mb-3">
        <label for="model" class="form-label">Car model</label>
        <input type="text" class="form-control" name="model" id="model" required>
      </div>
      <div class="mb-3">
        <label for="color" class="form-label">Car color</label>
        <input type="text" class="form-control" name="color" id="color" required>
      </div>
      <div class="mb-3">
        <label for="rent" class="form-label">Car rent price (per day)</label>
        <input type="number" class="form-control" name="rent" id="rent" required>
      </div>
      <div class="mb-3">
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
    </form>
  </div>
</div>
<script src="js/validation.js"></script>
<?php include "includes/footer.inc.php" ?>