<?php
include "modules.php";
$uid = $_COOKIE['uid'];

?>

<!DOCTYPE html>
<html>
<head>
  <title>Try v1.2 Bootstrap Online</title>
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


    <div class="row" id="questionTabs">
      <div class="col-sm-3">
      </div>
      <div class="col-sm-3">
        <ul class="nav nav-pills nav-stacked">
          <li role="presentation" id="privacypolicy"><a href="#">Privacy Policy</a></li>
          <li role="presentation"><a href="#" id="returnpolicy">Return Policy</a></li>
          <li role="presentation"><a href="#" id="shipping">Shipping</a></li>
          <li role="presentation"><a href="#" id="termsofuse">Terms of Use</a></li>
        </ul>
      </div>
      <div class="col-sm-3">
        <div class="inner-tabs" id="inner-tabs">
        </div>
      </div>
      <div class="col-sm-3">
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

  <script src="js/questions.js"></script>
  <script src="js/product.js"></script>

</body>
</html>
