<?php
include "modules.php";
if(isset($_POST['loginButton']))
{
  if(login($_POST['Loginemaildata'],$_POST['Loginpassworddata'])){
    header('Location: home');
  }
}

if ( isset($_POST['sendmyPassword'])) {
  # code...
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="ISO-8859-1">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet"
  href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  <script
  src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script
  src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/home.css" type="text/css">
  <title>Welcome to ERA 81 !!!</title>
</head>
<body>
  <div class="container">
    <div class="row">
      <a href="#registration" data-toggle="modal"><span
        class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <a href="#login" data-toggle="modal"><span
          class="glyphicon glyphicon-log-in"></span> Login</a>
        </div>
        <div class="row">
          <a href="index">
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
            </div>
            <div class="col-sm-1">
              <a href="#" id="displayLarge"> <span class="glyphicon glyphicon-th-large"></span>
              </a> <a href="#" id="displaySmall"> <span class="glyphicon glyphicon-th"></span>
              </a>
            </div>
          </form>
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

<div class="modal fade" id="registration" tabindex="-1" role="dialog"
aria-labelledby="myModalRegistration">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal"
      aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title" id="myModalRegistration">Welcome to ERA 81!!!</h4>
  </div>
  <div class="modal-body">
    <div class="row">
      <div class="col-sm-3"></div>
      <div class="col-sm-6">

        <form method="post" action="welcome.php" onsubmit="return valid()">
          <p id="signUpNew">Sign up (new user)</p>

          <div class="form-group">
            <label class="sr-only" for="firstname">FirstName</label> <input
            type="text" class="form-control" id="firstname" name="rFirstName"
            placeholder="First Name">
          </div>
          <div class="form-group">
            <label class="sr-only" for="lastname">LastName</label> <input
            type="text" class="form-control" id="lastname" name="rLastName"
            placeholder="Last Name"><span class="error">
            </div>
            <div class="form-group">
              <label class="sr-only" for="email">Email</label> <input
              type="email" class="form-control" id="email" name="rEmail"
              placeholder="Enter E-mail Address">
            </div>
            <div class="form-group">
              <label class="sr-only" for="confirmemail">ConfirmEmail</label>
              <input type="email" class="form-control" id="confirmemail" name="rConfirmEmail"
              placeholder="Re-Enter E-mail Address">
            </div>
            <div class="form-group">
              <label class="sr-only" for="password">Password</label> <input
              type="password" class="form-control" id="password" name="rPassword"
              placeholder="Enter Password">
            </div>
            <div class="form-group">
              <label class="sr-only" for="confirmpassword">ConfirmPassword</label>
              <input type="password" class="form-control"
              id="confirmpassword"  name="rConfirmPassword" placeholder="Re-Enter Password">
            </div>
            <button type="submit" name="submit" class="btn btn-default btn-md"
            id="signMeButton" value="signup">Sign me up</button>
            <p/>
            <p id="formError">
            </p>
          </form>
        </div>
        <div class="col-sm-3"></div>
      </div>
    </div>
    <div class="modal-footer">
      <details id="passwordCriteria">
        <summary>Password Criteria</summary>
        <p> Should contain a minimum of  one UpperCase, LowerCase letter and a Numeric.</p>
        <p>Should be between 8 and 15 letter.</p>
      </details>
      <p id="registerPolicy">By Signing up, you agree to our <br> <a href="#">terms of use</a>
        and <a href="#">privacy policy </a>
      </p>
    </div>
  </div>
</div>
</div>


<div class="modal fade" id="login" tabindex="-1" role="dialog"
aria-labelledby="myModalLogin">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal"
      aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title" id="myModalLogin">Welcome to ERA 81!!!</h4>
  </div>
  <div class="modal-body">

    <div class="row">
      <div class="col-sm-3"></div>
      <div class="col-sm-6">
        <form method="post" action="index" onsubmit="return validateLogin()">
          <p id="loginHaveAnAccount">Log in (have an account)</p>
          <div class="facebookButton" id="facebookButton">
            <button class="btn btn-primary">
              <i class="fa fa-facebook"></i> | Connect with Facebook
            </button>
          </div>
          <div class="form-group">
            <label class="sr-only" for="email">Email</label> <input
            type="email" name="Loginemaildata" class="form-control" id="Loginemail"
            placeholder="Enter E-mail Address">
          </div>
          <div class="form-group">
            <label class="sr-only" for="password">Password</label> <input
            type="password" name="Loginpassworddata" class="form-control" id="Loginpassword"
            placeholder="Enter Password">
          </div>
          <button type="submit" class="btn btn-default btn-md"
          id="loginButton" name="loginButton" value="login">Login</button>
          <label id="remeberME"> <input type="checkbox"  name="remeberME" value="0">
            Remember me
          </label>
          <a href="#" id="forgotPassword" data-target="#pwdModal" data-toggle="modal">Forgot password</a>
          <p/>
          <p id="loginerror">
          </p>
        </form>
      </div>
      <div class="col-sm-3"></div>
    </div>
  </div>

  <div class="modal-footer"></div>
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
  </div>
  <div class="modal-body">

    <a class="btn btn-default" href="payment.html" id="checkOutButton"
    role="button">CheckOut</a>
  </div>
</div>
<div class="modal-footer"></div>
</div>
</div>

<div id="pwdModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h1 class="text-center">What's My Password?</h1>
      </div>
      <div class="modal-body">
          <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">

                          <p>If you have forgotten your password you can reset it here.</p>
                            <form action=" " method="post">
                            <div class="panel-body">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control input-lg" placeholder="E-mail Address" name="email" type="email">
                                    </div>
                                    <input class="btn btn-lg btn-primary btn-block" value="Send My Password" type="submit" id="sendmyPassword">
                                </fieldset>
                            </div>
                          </form>
                        </div>
                    </div>
                </div>
            </div>
      </div>
      <div class="modal-footer">
          <div class="col-md-12">
          <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
		  </div>
      </div>
  </div>
  </div>
</div>

<script src="js/validation.js"></script>
<script src="js/validateLogin.js"></script>
<script src="js/apparels.js"></script>
</body>
</html>
