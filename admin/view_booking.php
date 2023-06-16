<?php include "includes/header.inc.php" ?>
<?php require_once 'connection.php'?>
<?php require_once 'booking.php'?>

<div class="body flex-grow-1 px-3">
  <div class="container-lg">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Model</th>
          <th scope="col">Price</th>
          <th scope="col">Booking time</th>
          <th scope="col">No of days</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        
        <?php 
        $count = 1; 
        $cars = new Booking($connection);
        foreach ($cars->getAllBookings() as $booking):?>
          <tr>
            <th><?php echo $count++ ?></th>
            <th><?php echo $booking['name'] ?></th>
            <th><?php echo $booking['email'] ?></th>
            <th><?php echo $booking['model'] ?></th>
            <th><?php echo $booking['price'] ?></th>
            <th><?php echo $booking['booking_time'] ?></th>
            <th><?php echo $booking['days'] ?></th>
          </tr>
        <?php endforeach?>
        
      </tbody>
    </table>
  </div>
</div>

<?php include "includes/footer.inc.php" ?>