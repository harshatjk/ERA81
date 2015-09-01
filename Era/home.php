<?php
include 'modules.php';
if(!isset($_COOKIE['uid'])){
header('Location: index');
}
$uid = $_COOKIE['uid'];
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="ISO-8859-1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet"
	href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script
	src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/home.css" type="text/css">


	<title>HomePage</title>
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

			<div class="col-sm-3">
				<form action="" method="post">
					<div class="input-group" id="homeSearch">
						<input type="text" class="form-control"
						placeholder="Search&hellip;"  name="homeSearch"> <span
						class="input-group-btn">
						<button type="submit" class="btn btn-md" name="homeSearchButton">Go</button>
					</span>
				</div>
			</form>
		</div>


		<div class="col-sm-2"></div>
		<div class="col-sm-6">
			<form method="post" action=" ">
				<div class="form-group" id="dropdownFilter">
					<label class="col-sm-4 control-label" id="homeFont">Sort
						by:</label>
						<div class="col-sm-6 selectContainer">
							<select class="form-control" name="homeFilterOption">
								<option value=""></option>
								<option value="a2z" >Brand (A to Z)</option>
								<option  value="z2a">Brand (Z to A)</option>
								<option value="l2h">Price (Low to High)</option>
								<option value="h2l">Price (High to Low)</option>
							</select>
						</div>
						<button class="btn btn-default" type="submit" name="homeFilter">Filter</button>
					</div>
				</form>
			</div>

			<div class="col-sm-1">
				<a href="#" id="displayLarge"> <span class="glyphicon glyphicon-th-large"></span>
				</a> <a href="#" id="displaySmall"> <span class="glyphicon glyphicon-th"></span>
				</a>
			</div>
		</div>

		<!--Side Bar -->
		<div class="row">
			<div class="col-sm-3">
				<div class="panel-group" id="accordion" role="tablist"
				aria-multiselectable="true">
				<div class="panel panel-default">
					<div class="panel-heading" role="tab" id="headingOne">
						<h4 class="panel-title">
							<a role="button" data-toggle="collapse" data-parent="#accordion"
							href="#collapseOne" aria-expanded="true"
							aria-controls="collapseOne"> APPARELS </a>
						</h4>
					</div>
					<div id="collapseOne" class="panel-collapse collapse in"
					role="tabpanel" aria-labelledby="headingOne">
					<div class="panel-body">
						<ul>
							<li><a href="#" id="jeansShowcase">Jeans</a></li>
							<li><a href="#" id="tshirtsShowcase">T-Shirts</a></li>
							<li><a href="#" id="shortsShowcase">Shorts</a></li>
							<li><a href="#" id="topsShowcase">Tops</a></li>
							<li><a href="#" id="skirtsShowcase">Skirts</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading" role="tab" id="headingTwo">
					<h4 class="panel-title">
						<a class="collapsed" role="button" data-toggle="collapse"
						data-parent="#accordion" href="#collapseTwo"
						aria-expanded="false" aria-controls="collapseTwo">
						ACCESSORIES</a>
					</h4>
				</div>
				<div id="collapseTwo" class="panel-collapse collapse"
				role="tabpanel" aria-labelledby="headingTwo">
				<div class="panel-body">
					<ul>
						<li><a href="#" id="backpacksShowcase">BackPacks</a></li>
						<li><a href="#" id="briefcasesShowcase">BriefCases</a></li>
						<li><a href="#" id="clutchesShowcase">Clutches</a></li>
						<li><a href="#" id="laptopbagsShowcase">Laptop Bags</a></li>
						<li><a href="#" id="leatherpouchesShowcase">Leather Pouches</a></li>
						<li><a href="#" id="shoulderbagsShowcase">Shoulder Bags</a></li>
						<li><a href="#" id="travelbagsShowcase">Travel Bags</a></li>
						<li><a href="#" id="walletbagsShowcase">Wallets Bags</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading" role="tab" id="headingThree">
				<h4 class="panel-title">
					<a class="collapsed" role="button" data-toggle="collapse"
					data-parent="#accordion" href="#collapseThree"
					aria-expanded="false" aria-controls="collapseThree"> KIDS</a>
				</h4>
			</div>
			<div id="collapseThree" class="panel-collapse collapse"
			role="tabpanel" aria-labelledby="headingThree">
			<div class="panel-body">
				<ul>
					<li><a href="#">Shoes</a></li>
					<li><a href="#">Baby Gear</a></li>
					<li><a href="#">Dolls</a></li>
					<li><a href="#">Water Bottles</a></li>
					<li><a href="#">Tiffin Boxes</a></li>
					<li><a href="#">Disney</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading" role="tab" id="headingFour">
			<h4 class="panel-title">
				<a class="collapsed" role="button" data-toggle="collapse"
				data-parent="#accordion" href="#collapseFour"
				aria-expanded="false" aria-controls="collapseFour">CONTACT</a>
			</h4>
		</div>
		<div id="collapseFour" class="panel-collapse collapse"
		role="tabpanel" aria-labelledby="headingFour">
		<div class="panel-body">
			<ul>
				<li><a href="questions">Have a Question ?</a></li>
			</ul>
		</div>
	</div>
</div>
<div class="panel panel-default">
	<div class="panel-heading" role="tab" id="headingFive">
		<h4 class="panel-title">
			<a class="collapsed" role="button" data-toggle="collapse"
			data-parent="#accordion" href="#collapseFive"
			aria-expanded="false" aria-controls="collapseFive">RETURNS</a>
		</h4>
	</div>
	<div id="collapseFive" class="panel-collapse collapse"
	role="tabpanel" aria-labelledby="headingFive">
	<div class="panel-body">
		<ul>
			<li><a href="policies">Policies</a></li>
		</ul>
	</div>
</div>
</div>

</div>
</div>

<!-- Inner Images -->
<div class="col-sm-9" id="imageShowcase">
	<?php

	if(isset($_POST['homeSearchButton'])){
		$type = $_POST['homeSearch'];
		if($type != null){
			homeSearch($type);
		}
		else{
			nullSearch();
		}
	}else if(isset($_POST['homeFilter'])){
		$option = $_POST['homeFilterOption'];
		homeFilter($option);
	}
	else{
		showImages();
	}

	?>
</div>
</div>
<div class="row">
  <h4 id="termsandConditions"><a href="#">Terms and Conditions Apply *** </a></h4>
<div>
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

<script src="js/apparels.js"></script>
<script src="js/product.js"></script>
</body>
</html>
