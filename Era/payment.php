<?php
include 'modules.php';
if(!isset($_COOKIE['uid'])){
  header('Location: index');
}

$uid = $_COOKIE['uid'];

if(isset($_POST['orderButton'])){
  orderPlaced($uid);
  emptyCart($uid);
  header('Location: home');
}

?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="ISO-8859-1">
  <title>Payment Page</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet"
  href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script
  src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script
  src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script>
  $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
  });
  </script>
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
    <div class="row" id="orderDetails">
      <div class="col-sm-6">
        <p id="shippingTo">SHIPPING TO:</p>
        <?php shippingAddress($uid)?>
      </div>
      <div class="col-sm-6">
        <p id="orderSummary">ORDER SUMMARY:</p>
        <?php subTotal($uid) ?>
      </div>
    </div>

    <div class="row" id="paymentMethod">
      <form method="post" action = " ">
        <p>SELECT PAYMENT METHOD:</p>
        <div class="checkbox">
          <label> <input type="checkbox"> <a
            href="http://www.credit-card-logos.com"><img alt="" title=""
            src="http://www.credit-card-logos.com/images/visa_credit-card-logos/visa_logo_3.gif"
            width="35" height="22" border="0" /></a>
          </label> <label> <input type="checkbox"> <a
            href="http://www.credit-card-logos.com"><img alt="" title=""
            src="http://www.credit-card-logos.com/images/mastercard_credit-card-logos/mastercard_logo_3.gif"
            width="37" height="22" border="0" /></a>
          </label> <label> <input type="checkbox"> <a
            href="http://www.credit-card-logos.com"><img alt="" title=""
            src="http://www.credit-card-logos.com/images/american_express_credit-card-logos/american_express_logo_3.gif"
            width="22" height="22" border="0" /></a>
          </label> <label> <input type="checkbox"> <a
            href="http://www.credit-card-logos.com"><img alt="" title=""
            src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/pp-acceptance-small.png"
            width="22" height="22" border="0" /></a>
          </label>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-4">
          <div class="form-group">
            <label class="sr-only" for="cardholdername">CardHolderName</label>
            <input type="text" class="form-control" id="cardholdername"
            placeholder="Card Holder Name">
          </div>
          <div class="form-group">
            <label class="sr-only" for="cardnumber">CardNumber</label> <input
            type="text" class="form-control" id="cardnumber"
            placeholder="Card Number">
          </div>
          <div class="row">
            <div class="form-group" id="inlineMonth">
              <select name="filter" class="form-control" id="monthSelect">
                <option value="" disabled selected>Month</option>
                <option value="07">07</option>
                <option value="08">08</option>
                <option value="09">09</option>
                <option value="10">10</option>
              </select>
            </div>
            <div class="form-group" id="inlineYear">
              <select name="filter" class="form-control" id="yearSelect">
                <option value="" disabled selected>Year</option>
                <option value="2017">2017</option>
                <option value="2018">2018</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label class="sr-only" for="cvv">Cvv</label> <input type="text"
                class="form-control" id="cvv" placeholder="CVV">
              </div>
            </div>
            <div class="col-sm-6">
              <a href="#" data-toggle="tooltip" title="Cvv is the number behind the card" id="hover">?</a>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label class="sr-only" for="firstname">FirstName</label> <input
            type="text" class="form-control" id="firstname"
            placeholder="First Name">
          </div>
          <div class="form-group">
            <label class="sr-only" for="address1">Address1</label> <input
            type="text" class="form-control" id="address1"
            placeholder="Address 1">
          </div>
          <div class="form-group">
            <label class="sr-only" for="city">City</label> <input type="text"
            class="form-control" id="city" placeholder="City">
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label class="sr-only" for="lastname">LastName</label> <input
            type="text" class="form-control" id="lastname"
            placeholder="Last Name">
          </div>
          <div class="form-group">
            <label class="sr-only" for="address2">Address2</label> <input
            type="text" class="form-control" id="address2"
            placeholder="Address2">
          </div>
          <div class="form-group">
            <label class="sr-only" for="state">State</label> <input type="text"
            class="form-control" id="state" placeholder="State">
          </div>
          <div class="form-group">
            <label class="sr-only" for="zip">Zip</label> <input type="text"
            class="form-control" id="zip" placeholder="Zip/PostalCode">
          </div>
        </div>
      </div>
      <div class="row" id="placeTheOrder">
        <button type="submit" class="btn btn-default btn-md" name="orderButton">PLACE
          THE ORDER</button>


          <?php
          $data=array(
            'merchant_email'=>'harshatjk@gmail.com',
            'product_name'=>'Order Price',
            'amount'=>orderTotal($uid),
            'currency_code'=>'USD',
            'thanks_page'=>"http://".$_SERVER['HTTP_HOST'].'paypal/thank.php',
            'notify_url'=>"http://".$_SERVER['HTTP_HOST'].'paypal/ipn.php',
              'cancel_url'=>"http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'],
              'paypal_mode'=>true,
            );

            ?>
            <br>
            <form id='paypal-info' method='post' action='#'>
              <input type='submit' name='pay_now' id='pay_now' value='Pay with PayPal' />
            </form>

            <?php
            if(isset($_POST['pay_now'])){
              echo infotutsPaypal($data);
            }
            function infotutsPaypal( $data) {
              define( 'SSL_URL', 'https://www.paypal.com/cgi-bin/webscr' );
              define( 'SSL_SAND_URL', 'https://www.sandbox.paypal.com/cgi-bin/webscr' );
              $action = '';

              //Is this a test transaction?

              $action = ($data['paypal_mode']) ? SSL_SAND_URL : SSL_URL;
              $form = '';
              $form .= '<form name="frm_payment_method" action="' . $action . '" method="post">';
              $form .= '<input type="hidden" name="business" value="' . $data['merchant_email'] . '" />';

              // Instant Payment Notification & Return Page Details /

              $form .= '<input type="hidden" name="notify_url" value="' . $data['notify_url'] . '" />';
              $form .= '<input type="hidden" name="cancel_return" value="' . $data['cancel_url'] . '" />';
              $form .= '<input type="hidden" name="return" value="' . $data['thanks_page'] . '" />';
              $form .= '<input type="hidden" name="rm" value="2" />';

              // Configures Basic Checkout Fields -->

              $form .= '<input type="hidden" name="lc" value="" />';
              $form .= '<input type="hidden" name="no_shipping" value="1" />';
              $form .= '<input type="hidden" name="no_note" value="1" />';

              // <input type="hidden" name="custom" value="localhost" />-->

              $form .= '<input type="hidden" name="currency_code" value="' . $data['currency_code'] . '" />';

              $form .= '<input type="hidden" name="page_style" value="paypal" />';

              $form .= '<input type="hidden" name="charset" value="utf-8" />';

              $form .= '<input type="hidden" name="item_name" value="' . $data['product_name'] . '" />';

              $form .= '<input type="hidden" value="_xclick" name="cmd"/>';

              $form .= '<input type="hidden" name="amount" value="' . $data['amount'] . '" />';

              $form .= '<script>';

              $form .= 'setTimeout("document.frm_payment_method.submit()", 2);';

              $form .= '</script>';

              $form .= '</form>';

              return $form;

            }

            ?>

          </div>
        </form>

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
