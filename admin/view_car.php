<?php include "includes/header.inc.php" ?>
<?php require_once 'connection.php' ?>
<?php require_once 'Car.php' ?>

<div class="body flex-grow-1 px-3">
  <div class="container-lg">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Model</th>
          <th scope="col">Color</th>
          <th scope="col">Rent</th>
          <th></th>
        </tr>
      </thead>
      <tbody>

        <?php
        $count = 1;
        $cars = new Car($connection);
        foreach ($cars->getAllCars() as $car) : ?>
          <tr>
            <th><?php echo $count++ ?></th>
            <th><?php echo $car['model'] ?></th>
            <th><?php echo $car['color'] ?></th>
            <th><?php echo $car['rent'] ?></th>
            <th><a href="remove_car_data.php?id=<?php echo $car['car_id'] ?>"><i class="text-danger fa-solid fa-trash"></i></a></th>
          </tr>
        <?php endforeach ?>

      </tbody>
    </table>
  </div>
</div>

<?php include "includes/footer.inc.php" ?>