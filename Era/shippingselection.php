<?php
include 'modules.php';
if(!isset($_COOKIE['uid'])){
header('Location: index');
}
$uid = $_COOKIE['uid'];

if(isset($_POST['saveChanges'])){
shippingDetails($uid,$_POST['sFirstName'],$_POST['sLastName'],$_POST['sAddress'],$_POST['sCity'],$_POST['sPhone'],$_POST['sState'],$_POST['sZip'],$_POST['shipping']);
}
else if(isset($_POST['paymentButton'])){
header('Location: payment');
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="ISO-8859-1">
	<title>Shipping Selection</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet"
	href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script
	src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<script src="js/product.js"></script>
	<link rel="stylesheet" href="css/home.css" type="text/css">
	<link rel="stylesheet" href="css/shippingselection.css" type="text/css">
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
			<div class="table" id="shippingInfoTable">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Product</th>
							<th>Color</th>
							<th>Size</th>
							<th>Quantity</th>
							<th>Price</th>
						</tr>
					</thead>
					<tbody>
						<?php
						productsBeingBought($uid); ?>
					</tbody>
				</table>
			</div>
		</div>
		<hr
		style="width: 100%; color: black; height: 1px; background-color: black;" />
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
				<p id ="ordersSubTotal">Sub Total: $<?php echo priceOfItemsInCart($uid)?> </p>
				<p id ="ordersTax">Tax: $<?php echo taxforItemsInCart($uid)?>  </p>
				<form method="post" action="">
				<button type="button" class="btn btn-default btn-sm"
				data-toggle="modal" data-target="#myModal" id="shippingButton">Select Shipping
				Method</button>
			</div>
		</div>
		<hr
		style="width: 100%; color: black; height: 1px; background-color: black;" />
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
				<p id="ordersTotal">Total: $<?php echo orderTotal($uid)?>  </p>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
				<button type="submit" class="btn btn-default btn-lg"
				id="paymentButton" name="paymentButton">Go For Payment</button>
			</div>
		</div>
</form>

	</div>

	<div class="modal fade" id="myModal" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"
				aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<h4 class="modal-title" id="myModalLabel">Where should we ship
				your order?</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<form action="" method="post">
						<div class="input" id="shippingDetails">
							<div class="form-group">
								<label class="sr-only" for="firstname">FirstName</label> <input
								type="text" class="form-control" id="firstname" value= "<?php echo $_COOKIE["firstname"];?>"
								placeholder="First Name" name="sFirstName">
							</div>
							<div class="form-group">
								<label class="sr-only" for="lastname">LastName</label> <input
								type="text" class="form-control" id="lastname" value= "<?php echo $_COOKIE["lastname"]; ?>"
								placeholder="Last Name" name="sLastName">
							</div>
							<div class="form-group">
								<label class="sr-only" for="address">Address</label> <input
								type="text" class="form-control" id="address" value="<?php if(isset( $_COOKIE["address1"])){ echo $_COOKIE["address1"];} ?>"
								placeholder="Address" name="sAddress">
							</div>
							<div class="form-group">
								<label class="sr-only" for="city">City</label> <input
								type="text" class="form-control" id="city" name="sCity" placeholder="City"value= "<?php if(isset( $_COOKIE["city"])){ echo $_COOKIE["city"];} ?>">
							</div>
							<div class="form-group">
								<label class="sr-only" for="state">State</label> <input
								type="text" class="form-control" id="state" name ="sState" placeholder="State" value= "<?php if(isset( $_COOKIE["state"])){ echo $_COOKIE["state"]; }?>">
							</div>
							<div class="form-group">
								<label class="sr-only" for="zip">Zip</label> <input type="text"
								class="form-control" id="zip" name ="sZip" placeholder="Zip / Postal Code" value= "<?php if(isset( $_COOKIE["zip"])){ echo $_COOKIE["zip"];} ?>">
							</div>
							<div class="form-group">
								<label class="sr-only" for="phonenumber">PhoneNumber</label> <input
								type="text" class="form-control" name="sPhone" id="phonenumber" value= "<?php if(isset( $_COOKIE["phone"])){echo $_COOKIE["phone"];} ?>"
								placeholder="Phone Number">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="checkboxes" id="shippingCheckBoxes">
							<div class="col-sm-8">
								<div class="checkbox">
									<label> <input type="checkbox"  name="shipping" value="0">
										Fedex Ground (5 - 7 Business Days)
									</label> <label> <input type="checkbox" name="shipping" value="15">
										Fedex Next Day (1 - 2 Business Days)
									</label>
								</div>
							</div>
							<div class="col-sm-2">
								<div id="shippingValues">
									<label>$0</label><br> <label>$15</label>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary" name="saveChanges">Save changes</button>
				</div>
			</div>
		</form>
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
</body>
</html>
