<?php include "includes/header.inc.php" ?>
<?php require_once "connection.php" ?>
<?php require_once "car.php" ?>


<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_3.jpg');" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
			<div class="col-md-9 ftco-animate pb-5">
				<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Cars <i class="ion-ios-arrow-forward"></i></span></p>
				<h1 class="mb-3 bread">Choose Your Car</h1>
			</div>
		</div>
	</div>
</section>


<section class="ftco-section bg-light">
	<div class="container">
		<div class="row">
			<form method="post">
				<div class="card-body row align-items-center">
					<div class="col-auto">
						<input class="form-control form-control-sm" name="search" type="search" placeholder="Search car">
					</div>
					<!--end of col-->
					<div class="col">
						<button class="btn btn-lg" style="background: #01d28e;" type="submit">Search</button>
					</div>
					<!--end of col-->
				</div>
			</form>
		</div>
		<div class="row">
			<?php
			
			$cars =  new Car($connection);
			foreach ( (isset($_POST['search']) and !empty($_POST['search']))? $cars->searchCar($_POST['search']) : $cars->getAllCars() as $car): ?>
				<div class="col-md-4">
					<div class="car-wrap rounded ftco-animate">
						<div class="img rounded d-flex align-items-end" style="background-image: url(images/car.png);">
						</div>
						<div class="text">
							<h2 class="mb-0"><a href="car-single.html"><?php echo $car['model'] ?></a></h2>
							<div class="d-flex mb-3">
								<span class="cat"><?php echo $car['color'] ?></span>
								<p class="price ml-auto">AUD<?php echo $car['rent'] ?> <span>/day</span></p>
							</div>
							<a href="booking.php?id=<?php echo $car['car_id']?>" class="btn btn-block btn-primary py-2 mr-1">Rent now</a>
						</div>
					</div>
				</div>
			<?php endforeach ?>
		</div>
		<!-- <div class="row mt-5">
			<div class="col text-center">
				<div class="block-27">
					<ul>
						<li><a href="#">&lt;</a></li>
						<li class="active"><span>1</span></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">4</a></li>
						<li><a href="#">5</a></li>
						<li><a href="#">&gt;</a></li>
					</ul>
				</div>
			</div>
		</div> -->
	</div>
</section>

<?php include "includes/footer.inc.php" ?>