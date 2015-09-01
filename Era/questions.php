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

    <div class="row">


      <div class="col-sm-6">
        <p align="center"><p align="center">Have a Question?</p>
        <p align="center">You may be able to find an answer to your question by consulting our list of <a>Frequently Asked Questions.</a></p>
        <p align="center"><p align="center">You can also contact us by filling the form below:</p>

        <form class="form-horizontal">
          <div class="form-group" id="profileInformationInput">
            <label for="inputfirstName" class="control-label col-xs-4">I'm a:</label>
            <div class="col-xs-8">
              <select class="form-control" id="myType">
                <option>Customer</option>
                <option>User</option>
              </select>
            </div>
          </div>
          <div class="form-group" id="profileInput">
            <label for="subject" class="control-label col-xs-4">Subject:</label>
            <div class="col-xs-8">
              <select class="form-control" id="myType">
                <option>Claims</option>
                <option>Shipping Problems</option>
              </select>
            </div>
          </div>
          <div class="form-group" id="profileInput">
            <label for="questionName" class="control-label col-xs-4">Name:</label>
            <div class="col-xs-8">
              <input type="text" class="form-control" id="questionName" name="questionName"
              placeholder="Name">
            </div>
          </div>
          <div class="form-group" id="profileInput">
            <label for="inputEmail" class="control-label col-xs-4">Email:</label>
            <div class="col-xs-8">
              <input type="email" class="form-control" id="inputEmail" name="inputEmail"
              placeholder="Email" value= "<?php echo $_COOKIE["email"]; ?>">
            </div>
          </div>
          <div class="form-group" id="profileInput">
            <label for="inputEmail" class="control-label col-xs-4">Confirm Email:</label>
            <div class="col-xs-8">
              <input type="email" class="form-control" id="inputEmail" name="inputEmail"
              placeholder="Email" value= "<?php echo $_COOKIE["email"]; ?>">
            </div>
          </div>
          <button type="button" class="btn btn-default" style="float: right;">Send</button>
        </form>


      </div>
      <div class="col-sm-6">
        <div class="row">
          <p align="center">FOLLOW US ON SOCIAL MEDIA</p>
          <div class="social" id="socialMedia">
            <a target="_blank" title="follow me on Twitter" href="https://twitter.com/Era81Official"><img alt="follow me on Twitter" src="https://c866088.ssl.cf3.rackcdn.com/assets/twiiter30x30.png" border=0></a>
            <a target="_blank" title="follow me on facebook" href="https://www.facebook.com/Era81Official?fref=ts"><img alt="follow me on facebook" src="https://c866088.ssl.cf3.rackcdn.com/assets/facebook30x30.png" border=0></a>
            <a target="_blank" title="follow me on instagram" href="https://instagram.com/era81official/"><img alt="follow me on instagram" src="https://c866088.ssl.cf3.rackcdn.com/assets/instagram30x30.png" border=0></a>
            <a target="_blank" title="follow me on google plus" href="https://plus.google.com/+Era81SanFrancisco/videos"><img alt="follow me on google plus" src="https://c866088.ssl.cf3.rackcdn.com/assets/googleplus30x30.png" border=0></a>
          </div>
          <br>
          <p align="center">See what people say on social media</p>
        </div>
        <a class="twitter-timeline" href="https://twitter.com/TwisterNTurner" data-widget-id="622555517626355712">Tweets by @TwisterNTurner</a>
        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
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
