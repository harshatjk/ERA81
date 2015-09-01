<?php
include 'modules.php';
if(!isset($_COOKIE['uid'])){
	header('Location: index');
}

$pid = $_GET["pid"];
$type = findType($pid);
$uid = $_COOKIE['uid'];
if(isset($_POST['addToWishButton'])){
	//echo $_COOKIE['uid'];
	addToWish($pid,$uid);
	//exit();
}
else if(isset($_POST['addToCartButton'])){
	addToCart($pid,$uid,$_POST['quantity'],$_POST['filter']);
	//exit();
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="ISO-8859-1">
	<title>Product Page</title>
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

		<div class="row" >
			<div class="col-sm-8" id="productImages">
				<?php
				productImages($pid);
				?>
			</div>

			<div class="col-sm-4">
				<div class="bs-example" id="productDetailsTabs">
					<ul class="nav nav-tabs nav-justified">
						<li class="active"><a data-toggle="tab" href="#sectionA">Description</a></li>
						<li><a data-toggle="tab" href="#sectionB">Sizing</a></li>
						<li><a data-toggle="tab" href="#sectionC">Shipping</a></li>
					</ul>
					<div class="tab-content">
						<div id="sectionA" class="tab-pane fade in active">
							<p/>
							<p>The book also includes training tips, how to get started in the show ring, field or agility, how to breed and so much more! With over 1,500 color images, including photos by William Wegmanand Harry Giglio, the book will be a treasured collector’s item for years to come for any Weimaranerenthusiast!</p>
							<p/>
						</div>
						<div id="sectionB" class="tab-pane fade">
							<p/>
							<ul>
								<li>Height: 13''</li>
								<p/>
								<li>Width: 5''</li>
								<p/>
								<li>Depth: 7''</li>
								<p/>
								<li>Weight: 3lbs</li>
							</ul>
						</div>
						<div id="sectionC" class="tab-pane fade">
							<p><ul>
								<li> Pick up in <a href="#">store</a> of choice for free with in 3-5  business days</li>
								<p/>
								<li> Standard <b>$4.95 (orders over $50 free)</b> in 2-4 business days*</li>
								<p/>
								<li>  Express <b>$9.95</b> in 24-48 hours (business days)*</li>
							</ul></p>
						</div>
					</div>

				</div>

				<div class="row">
					<form method="post" action=" ">
						<div class="form-group" id="dropdownFilter">
							<label class="col-sm-6 control-label" id="homeFont">Color</label>
							<div class="col-sm-4 selectContainer">
								<select name="filter" class="form-control">
									<option value=""></option>
									<?php color($pid)?>
								</select>
							</div>
						</div>


						<div class="form-group form-inline" id="productQuantity">
							<label for="exampleInputName2">QTY</label> <input type="text"
							class="form-control" id="quantity" name="quantity" placeholder="Quantity">
						</div>

						<button type="submit" class="btn btn-default btn-md"
						id="addToCartButton" name="addToCartButton" onclick="updateCartSize()">Add
						to Cart</button>

					</form>
				</div>

				<form action="" method="post">
					<div class="row">
						<button type="submit" class="btn btn-default btn-md"
						id="addToWishButton" name="addToWishButton">Add
						to Wish List</button>
					</div>
				</form>
			</div>
		</div>

		<div class="row">
			<p>THIS PRODUCT WILL LOOK AMAZING WITH:</p>
			<?php
			amazingWith($type);
			?>
			<hr
			style="width: 100%; color: black; height: 1px; background-color: black;" />
		</div>

		<div class="row">
			<div class="col-sm-3" id="detailsFooter">
				<p> Era81,Inc.</p>
				<p>325 Hayes Street<br>
					San Francisco, CA 94109<br>
					(415) 754 5911
				</p>
			</div>
			<div class="col-sm-3" id="detailsFooter">
				<p> FAQ <br>
					Legal<br>
					Free Shipping<br>
					Return Policy
				</p>
			</div>
			<div class="col-sm-3" id="detailsFooter">
				<p> About Era81 <br>
					Careers<br>
					Contact
				</p>
			</div>
			<div class="col-sm-3" id="detailsFooter">
				<p>Join our Community</p>
				<a target="_blank" title="follow me on Twitter" href="https://twitter.com/Era81Official"><img alt="follow me on Twitter" src="https://c866088.ssl.cf3.rackcdn.com/assets/twiiter30x30.png" border=0></a>
				<a target="_blank" title="follow me on facebook" href="https://www.facebook.com/Era81Official?fref=ts"><img alt="follow me on facebook" src="https://c866088.ssl.cf3.rackcdn.com/assets/facebook30x30.png" border=0></a>
				<a target="_blank" title="follow me on instagram" href="https://instagram.com/era81official/"><img alt="follow me on instagram" src="https://c866088.ssl.cf3.rackcdn.com/assets/instagram30x30.png" border=0></a>
				<a target="_blank" title="follow me on google plus" href="https://plus.google.com/+Era81SanFrancisco/videos"><img alt="follow me on google plus" src="https://c866088.ssl.cf3.rackcdn.com/assets/googleplus30x30.png" border=0></a>
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
