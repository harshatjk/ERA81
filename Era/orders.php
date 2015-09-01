<?php
include 'modules.php';
if(!isset($_COOKIE['uid'])){
header('Location: index');
}
$uid=$_COOKIE['uid'];
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="ISO-8859-1">
	<title>Orders</title>
	<meta charset="ISO-8859-1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet"
	href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script
	src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/home.css" type="text/css">
</head>
<body>
	<div class="container">

		<div class="row">
			<div class="col-sm-9">
			</div>
			<div class="col-sm-2">
				<div class="dropdown" id="glyphicon-chevron-down">
					<a href="" data-toggle="dropdown"> <span
						class="glyphicon glyphicon-chevron-down"><?php echo $_COOKIE['lastname']?></span>
					</a>
					<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
						<li><a href="profileinformation">Profile Information</a></li>
						<li><a href="orders">Orders</a></li>
						<li><a href="wishlist">Wish List</a></li>
						<li><a href="#">Settings</a></li>
						<li><a href="index" id="cookieUnset">Log Out</a></li>
					</ul>
				</div>
			</div>
			<div class="col-sm-1">
				<a href="#checkout" data-toggle="modal"> <span
					class="glyphicon glyphicon-shopping-cart other"><span id="cSize"></span></span>
				</a>
			</div>

		</div>

		<div class="row">
			<a href="home">
				<img src="Images/logo.png" id="home-era-img">
			</a>
		</div>

		<div class="row">
			<ul class="nav nav-tabs nav-justified">
				<li role="presentation"><a href="profileinformation.php">Profile
					Information</a></li>
					<li role="presentation" class="active"><a href="orders.php">Orders</a></li>
					<li role="presentation"><a href="wishlist.php">Wish List</a></li>
					<li role="presentation"><a href="passwordsetting.php">Password
						Setting</a></li>
					</ul>
				</div>

				<div class="row">
					<div class="col-sm-9">
						<form action=" " method="post">
							<div class="form-group" id="orderMonthButton">
								<select class="form-control" name="ordermonthSelect">
									<option value="" disabled selected>Month</option>
									<option value="05">05</option>
									<option value="06">06</option>
									<option value="07">07</option>
									<option value="08">08</option>
								</select>
							</div>
							<div class="form-group" id="orderYearButton">
								<select  class="form-control" name="orderyearSelect">
									<option value="" disabled selected>Year</option>
									<option value="2012">2012</option>
									<option value="2013">2013</option>
									<option value="2014">2014</option>
									<option value="2015">2015</option>
								</select>
							</div>
							<button type="submit" class="btn btn-default btn-md"
							id="viewingOrdersButton" name="viewingOrdersButton">View Order</button>
						</div>
						<div class="col-sm-3">
							<div class="input-group" id="orderSearch">
								<input type="text" class="form-control" name="searchOrders"
								placeholder="Search for order details"> <span
								class="input-group-btn">
								<button type="submit" name="searchOrdersButton" class="btn btn-md">Go</button>
							</span>
						</div>
					</div>
				</form>
			</div>

			<div class="row">

				<div class="col-sm-12">
					<div class="table" id="orderTable">
						<table class="table table-striped table-hover">
							<thead>
								<tr>
									<th>#</th>
									<th>Placed</th>
									<th>Order #</th>
									<th>Order Value</th>
									<th>Delivery Status</th>
								</tr>
							</thead>
							<tbody>
								<?php
								if(isset($_POST['viewingOrdersButton'])){
									$month =$_POST['ordermonthSelect'];
									$year = $_POST['orderyearSelect'];
									previousOrdersByDate($uid,$month,$year);
								}
								else if(isset($_POST['searchOrdersButton'])){
									$orderId = $_POST['searchOrders'];
									previousOrdersBySearch($uid,$orderId);
								}
								else{
									previousOrders($uid);
								} ?>
							</tbody>
						</table>
					</div>
				</div>

			</div>
		</div>



		<div class="modal fade" id="checkout" tabindex="-1" role="dialog"
		aria-labelledby="myModalCheckout">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"
					aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalChekout">Your Cart</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<?php checkOutDetails($uid) ?>
				</div>
			</div>
			<div class="modal-footer">
					<p id="checkoutSubtotal">Sub Total: $<?php echo priceOfItemsInCart($uid)?></p>
				<a class="btn btn-default" href="shippingselection" id="checkOutButton"
				role="button">CheckOut</a></div>
			</div>
		</div>
	</div>
	<script src="js/product.js"></script>
</body>
</html>
