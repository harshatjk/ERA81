<?php
include "modules.php";
if(isset($_POST['loginButton']))
{
  if(login($_POST['Loginemaildata'],$_POST['Loginpassworddata'])){
    header('Location: home');
  }
}
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
      <a href="#registration" data-toggle="modal"><span
      class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <a href="#login" data-toggle="modal"><span
        class="glyphicon glyphicon-log-in"></span> Login</a>
      </div>
      <div class="row">
        <a href="home">
          <img src="Images/logo.png" id="home-era-img">
        </a>
      </div>





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
              <a href="#" id="forgotPassword">Forgot password</a>
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

    <script src="js/questions.js"></script>
    <script src="js/product.js"></script>

  </body>
  </html>
