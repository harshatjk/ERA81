<?php
include 'modules.php';
if(!isset($_COOKIE['uid'])){
	header('Location: index');
}
$uid = $_COOKIE['uid'];

if(isset($_POST['saveProfileInformationButton'])){
	change_profileDetails($_COOKIE['uid'],$_POST['inputEmail'],$_POST['inputfirstName'],$_POST['inputlastName'],$_POST['inputPhone'],$_POST['inputAddress1'],$_POST['inputAddress2'],$_POST['inputCity'],$_POST['inputState'],$_POST['inputZip']);
	session_impl($_COOKIE['uid'],$_POST['inputEmail']);
	header('Location: home');

}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="ISO-8859-1">
	<title>Extra Info</title>
	<meta charset="ISO-8859-1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet"
	href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script
	src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script src="js/product.js"></script>
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
						<li><a href="passwordsetting">Settings</a></li>
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
				<li role="presentation" class="active"><a href="profileinformation.php">Profile
					Information</a></li>
					<li role="presentation"><a href="orders.php">Orders</a></li>
					<li role="presentation"><a href="wishlist.php">Wish List</a></li>
					<li role="presentation"><a href="passwordsetting.php">Password
						Setting's</a></li>
					</ul>
				</div>

				<div class="row">
					<form method="post" action="profileinformation.php" class="form-horizontal">
						<div class="col-sm-6">

							<div class="form-group" id="profileInformationInput">
								<label for="inputfirstName" class="control-label col-xs-4">FirstName:</label>
								<div class="col-xs-8">
									<input type="text" class="form-control" id="inputfirstName" name="inputfirstName"
									placeholder="FirstName" value= "<?php echo $_COOKIE["firstname"]; ?>">
								</div>
							</div>
							<div class="form-group" id="profileInput">
								<label for="inputlastName" class="control-label col-xs-4">LastName:</label>
								<div class="col-xs-8">
									<input type="text" class="form-control" id="inputlastName" name="inputlastName"
									placeholder="LastName" value= "<?php echo $_COOKIE["lastname"]; ?>">
								</div>
							</div>
							<div class="form-group" id="profileInput">
								<label for="inputPhone" class="control-label col-xs-4">Phone:</label>
								<div class="col-xs-8">
									<input type="text" class="form-control" id="inputPhone" name="inputPhone"
									placeholder="Phone" value= "<?php if(isset( $_COOKIE["phone"])){echo $_COOKIE["phone"];} ?>">
								</div>
							</div>
							<div class="form-group" id="profileInput">
								<label for="inputEmail" class="control-label col-xs-4">Email:</label>
								<div class="col-xs-8">
									<input type="email" class="form-control" id="inputEmail" name="inputEmail"
									placeholder="Email" value= "<?php echo $_COOKIE["email"]; ?>">
								</div>
							</div>
						</div>



						<div class="col-sm-6">
							<div class="form-group" id="profileInformationInput">
								<label for="inputAddress1" class="control-label col-xs-4">Address1:</label>
								<div class="col-xs-8">
									<input type="text" class="form-control" id="inputAddress1" name="inputAddress1"
									placeholder="Address1" value= "<?php if(isset( $_COOKIE["address1"])){ echo $_COOKIE["address1"];} ?>">
								</div>
							</div>
							<div class="form-group" id="profileInput">
								<label for="inputAddress2" class="control-label col-xs-4">Address2:</label>
								<div class="col-xs-8">
									<input type="text" class="form-control" id="inputAddress2" name="inputAddress2"
									placeholder="Address2" value= "<?php if(isset( $_COOKIE["address2"])){ echo $_COOKIE["address2"];} ?>">
								</div>
							</div>
							<div class="form-group" id="profileInput">
								<label for="inputCity" class="control-label col-xs-4">City:</label>
								<div class="col-xs-8">
									<input type="text" class="form-control" id="inputCity"  name="inputCity"
									placeholder="City" value= "<?php if(isset( $_COOKIE["city"])){ echo $_COOKIE["city"];} ?>">
								</div>
							</div>
							<div class="form-group" id="profileInput">
								<label for="inputState" class="control-label col-xs-4">State:</label>
								<div class="col-xs-8">
									<input type="text" class="form-control" id="inputState"  name="inputState"
									placeholder="State" value= "<?php if(isset( $_COOKIE["state"])){ echo $_COOKIE["state"]; }?>">
								</div>
							</div>
							<div class="form-group" id="profileInput">
								<label for="inputZipCode" class="control-label col-xs-4">ZipCode:</label>
								<div class="col-xs-8">
									<input type="text" class="form-control" id="inputZipCode"  name="inputZip"
									placeholder="ZipCode" value= "<?php if(isset( $_COOKIE["zip"])){ echo $_COOKIE["zip"];} ?>">
								</div>
							</div>
						</div>
						<button type="submit" class="btn btn-default btn-md"
						id="saveProfileInformationButton" name="saveProfileInformationButton">Save Details</button>
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
