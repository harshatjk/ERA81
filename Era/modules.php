<?php
include 'DataBaseConnection.php';

if(isset($_POST["type"]) && ($_POST["type"]=="privacypolicy")){
  echo privacypolicy();
}

if(isset($_POST["type"]) && ($_POST["type"]=="returnpolicy")){
  echo returnpolicy();
}


if(isset($_POST["cartSize"]) && ($_POST["cartSize"]=="get")){
  echo numberOfItemsInCart();
}


if(isset($_POST["displaySL"]) && ($_POST["displaySL"]=="small")){
  echo displaySmall();
}

if(isset($_POST["displayLG"]) && ($_POST["displayLG"]=="large")){
  echo showImages();
}

if(isset($_POST["cookieSetting"]) && ($_POST["cookieSetting"]=="unset")){
  logout();
}

function login($email,$password){
  $conn = dbConnection();
  $sql = "select * from memberdetails where Email='$email' And password='$password'";
  $result = $conn->query($sql);
  //  echo $email;
  //  echo $password;
  //  echo "query executed";
  if ($result->num_rows > 0) {
    //  echo "> 0";
    session_impl($email,$password);
    return true;
  }
  return false;
}


//login("harshatjk@gmail.com","Project123");
function privacypolicy(){
  echo '    <div class="bs-example">
    <div class="panel-group" id="accordion">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Question 1</a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in">
                <div class="panel-body">
                    <p>HTML stands for HyperText Markup Language. HTML is the main markup language for describing the structure of Web pages. <a href="http://www.tutorialrepublic.com/html-tutorial/" target="_blank">Learn more.</a></p>
                </div>
            </div>
        </div>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Question 2</a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse">
                <div class="panel-body">
                    <p>Bootstrap is a powerful front-end framework for faster and easier web development. It is a collection of CSS and HTML conventions. <a href="http://www.tutorialrepublic.com/twitter-bootstrap-tutorial/" target="_blank">Learn more.</a></p>
                </div>
            </div>
        </div>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Question 3</a>
                </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse">
                <div class="panel-body">
                    <p>CSS stands for Cascading Style Sheet. CSS allows you to specify various style properties for a given HTML element such as colors, backgrounds, fonts etc. <a href="http://www.tutorialrepublic.com/css-tutorial/" target="_blank">Learn more.</a></p>
                </div>
            </div>
        </div>
    </div>
</div>';
}
function returnpolicy(){
  echo '    <div class="bs-example">
    <div class="panel-group" id="accordion">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Question </a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in">
                <div class="panel-body">
                    <p>HTML stands for HyperText Markup Language. HTML is the main markup language for describing the structure of Web pages. <a href="http://www.tutorialrepublic.com/html-tutorial/" target="_blank">Learn more.</a></p>
                </div>
            </div>
        </div>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Question </a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse">
                <div class="panel-body">
                    <p>Bootstrap is a powerful front-end framework for faster and easier web development. It is a collection of CSS and HTML conventions. <a href="http://www.tutorialrepublic.com/twitter-bootstrap-tutorial/" target="_blank">Learn more.</a></p>
                </div>
            </div>
        </div>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Question </a>
                </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse">
                <div class="panel-body">
                    <p>CSS stands for Cascading Style Sheet. CSS allows you to specify various style properties for a given HTML element such as colors, backgrounds, fonts etc. <a href="http://www.tutorialrepublic.com/css-tutorial/" target="_blank">Learn more.</a></p>
                </div>
            </div>
        </div>
    </div>
</div>';
}
function register($firstname,$lastname,$email,$password){
  $conn = dbConnection();
  $sql = "INSERT INTO memberdetails (FirstName, LastName, Email, password)
  VALUES ('$firstname', '$lastname', '$email', '$password')";

  if ($conn->query($sql) === TRUE) {
    // echo "New record created successfully";
    session_impl($email,$password);
  } else {
    //  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}


function session_impl($semail,$spassword){
  $conn = dbConnection();
  $sql = "select * from memberdetails where Email='$semail' And password='$spassword'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    //  echo "> 0";
    while($row = $result->fetch_assoc()) {
      setcookie("uid",$row["UID"],time()+36000);
      setcookie("firstname",$row["FirstName"],time()+36000);
      setcookie("lastname",$row["LastName"],time()+36000);
      setcookie("email",$row["Email"],time()+36000);
      setcookie("phone",$row["Phone"],time()+36000);
      setcookie("address1",$row["Address1"],time()+36000);
      setcookie("address2",$row["Address2"],time()+36000);
      setcookie("city",$row["City"],time()+36000);
      setcookie("zip",$row["Zip"],time()+36000);
      setcookie("state",$row["State"],time()+36000);
      //echo "sessionset";
    }
  }
}

function refresh($uid){
  $conn = dbConnection();
  $sql = "select * from memberdetails where UID='$uid'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    //  echo "> 0";
    while($row = $result->fetch_assoc()) {
      setcookie("uid",$row["UID"],time()+36000);
      setcookie("firstname",$row["FirstName"],time()+36000);
      setcookie("lastname",$row["LastName"],time()+36000);
      setcookie("email",$row["Email"],time()+36000);
      setcookie("phone",$row["Phone"],time()+36000);
      setcookie("address1",$row["Address1"],time()+36000);
      setcookie("address2",$row["Address2"],time()+36000);
      setcookie("city",$row["City"],time()+36000);
      setcookie("zip",$row["Zip"],time()+36000);
      setcookie("state",$row["State"],time()+36000);
      //echo "sessionset";
    }
  }
}

function change_password($uid,$oldpassword,$newPassword){
  $conn = dbConnection();
  $sql = "select * from memberdetails where UID='$uid' And password='$oldpassword'";
  //  echo $uid;
  //  echo $oldpassword;
  //  echo $newPassword;

  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    $sql = "update memberdetails set password='$newPassword' where UID='$uid'";
    if ($conn->query($sql) === TRUE) {
      //echo "New record created successfully";
      return true;
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      return false;
    }
  }
}

function showImages($sql = "select product.ProductName,images.PID,images.Image1,images.Image2,product.DesignerName,product.Price from images inner join product on images.PID = product.PID
"){
  $conn = dbConnection();
  $result = $conn->query($sql);
  $count = 0 ;
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      if($count==0){
        $img1 = $row['Image1'];
        $img11 =$row['Image2'];
        $pid1 = $row['PID'];
        $designername = $row['DesignerName'];
        $productname = $row['ProductName'];
        $price = $row['Price'];
        $count++;
      }
      else if($count==1){
        $img2 = $row['Image1'];
        $img22 =$row['Image2'];
        $pid2 = $row['PID'];
        $productname2 = $row['ProductName'];
        $designername2 = $row['DesignerName'];
        $price2 = $row['Price'];

        $count=0;

        echo'<div class="row" id="image-panels">
        <div class="col-sm-6">
        <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="4000">
        <!-- Indicators -->
        <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
        <div class="item active">
        <a href="product?pid='.$pid1.'">
        <img src="'.$img1.'" alt="...">
        </a>
        <div class="carousel-caption">
        <h4>'.$productname.' </h4>
        <p>Designed By : '.$designername.' </p>
        <p>Designer Price : $'.number_format($price, !($price == (int)$price) * 2).' </p>
        </div>
        </div>

        <div class="item">
        <a href="product?pid='.$pid1.'">
        <img src="'.$img11.'" alt="...">
        </a>
        <div class="carousel-caption">
        <h4>'.$productname.' </h4>
        <p>Designed By : '.$designername.' </p>
        <p>Designer Price : $'.number_format($price, !($price == (int)$price) * 2).' </p>
        </div>
        </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
        </a>
        </div>

        </div>

        <div class="col-sm-6">

        <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="4000">
        <!-- Indicators -->
        <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
        <div class="item active">
        <a href="product?pid='.$pid2.'">
        <img src="'.$img2.'" alt="...">
        </a>
        <div class="carousel-caption">
        <h4>'.$productname2.' </h4>
        <p>Designed By : '.$designername2.' </p>
        <p>Designer Price : $'.number_format($price2, !($price2 == (int)$price2) * 2).' </p>
        </div>
        </div>

        <div class="item">
        <a href="product?pid='.$pid2.'">
        <img src="'.$img22.'" alt="...">
        </a>
        <div class="carousel-caption">
        <h4>'.$productname2.' </h4>
        <p>Designed By : '.$designername2.' </p>
        <p>Designer Price : $'.number_format($price2, !($price2 == (int)$price2) * 2).' </p>
        </div>
        </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
        </a>
        </div>



        </div>
        </div>
        ';

      }
    }
  }
}

function productImages($pid){
  $conn = dbConnection();
  $sql = "select product.ProductName,images.Thumbnail1,images.Thumbnail2,images.Thumbnail3,images.Image1,images.Image2,product.DesignerName,product.Price from images inner join product on images.PID = product.PID and product.PID='$pid'";
  $result = $conn->query($sql);
  $count = 0 ;
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $img = $row['Image1'];
      $thb1 = $row['Thumbnail1'];
      $thb2 = $row['Thumbnail2'];
      $thb3 = $row['Thumbnail3'];
      $thb4 = $row['Image2'];
      $designername = $row['DesignerName'];
      $productname = $row['ProductName'];
      $price = $row['Price'];
      echo '
      <div class="row">
      <div class="col-sm-9">
      <div class="thumbnail">
      <img src="'.$img.'" alt="...">
      <div class="caption">
      <h4 align="center">'.$productname.'</h4>
      <p align="center">Designed By: '.$designername.'</p>
      <p align="center">Price: $'.number_format($price, !($price == (int)$price) * 2).'</p>
      </div>
      </div>
      </div>
      <div class="col-sm-3">
      <div class="thumbnail">
      <img src="'.$thb1.'" alt="...">
      </div>
      <div class="thumbnail">
      <img src="'.$thb2.'" alt="...">
      </div>
      <div class="thumbnail">
      <img src="'.$thb3.'" alt="...">
      </div>
      <div class="thumbnail">
      <img src="'.$thb4.'" alt="...">
      </div>
      </div>
      </div>';
    }
  }
}


function change_profileDetails($uid,$email,$firstname,$lastname,$phone,$address1,$address2,$city,$state,$zip){
  $conn = dbConnection();
  //echo $phone;
  $sql = "select * from memberdetails where UID='$uid' And Email='$email'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    $sql = "update memberdetails set FirstName='$firstname',LastName='$lastname',Phone='$phone',Address1='$address1',Address2='$address2'
    ,City='$city',State='$state',Zip='$zip' where UID='$uid'";
    if ($conn->query($sql) === TRUE) {
      //echo "New record created successfully";
      return true;
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      return false;
    }
  }
}

function color($pid){
  $conn = dbConnection();
  $sql = "select Color from product where PID='$pid'";
  $result = $conn->query($sql);
  if($result->num_rows > 0){
    while($row = $result->fetch_assoc()) {
      $value = $row['Color'];
      //echo $value;
      if(strpos($value,',') != false){
        $color = explode(",",$value);
      }
      for($j=0;$j<count($color);$j++){
        echo "<option value=$color[$j] style='background-color:$color[$j]'>$color[$j]</option>";
      }
    }
  }
}

//color(3);

function amazingWith($type){
  $conn = dbConnection();
  $sql = "select product.ProductName,product.PID,images.Image1,product.Price from images inner join product on images.PID = product.PID and product.type <> '$type' order by rand() limit 4";
  $result = $conn->query($sql);
  if($result->num_rows > 0){
    while($row = $result->fetch_assoc()) {
      $img = $row['Image1'];
      $price = $row['Price'];
      $pid= $row['PID'];
      $productname = $row['ProductName'];
      echo '
      <div class="col-sm-3">
      <div class="thumbnail">
      <a href="product?pid='.$pid.'">
      <img src="'.$img.'" alt="...">
      </a>
      <div class="caption">
      <h4 align="center">'.$productname.'</h4>
      <p align="center">Price: $'.number_format($price, !($price == (int)$price) * 2).'</p>
      </div>
      </div>
      </div>
      ';
    }
  }
}

function findType($pid){
  $conn = dbConnection();
  $sql = "select Type from product where PID='$pid'";
  $result = $conn->query($sql);
  if($result->num_rows > 0){
    while($row = $result->fetch_assoc()) {
      return $row['Type'];
    }
  }
  return null;
}

//echo findType(2);

function addToWish($uid,$pid){
  $conn = dbConnection();
  //  echo "Entered";
  $sql = "INSERT INTO wishlist (PID, UID)
  VALUES ('$uid', '$pid')";
  $result = $conn->query($sql);
  //  echo "Done";
}

function displayWishList($uid){
  $conn = dbConnection();
  $sql = "select images.PID,images.Image1 from images inner join wishlist on images.PID = wishlist.PID and wishlist.UID='$uid'";
  $result = $conn->query($sql);
  if($result->num_rows > 0){
    while($row = $result->fetch_assoc()) {
      $wimg = $row['Image1'];
      $wpid = $row['PID'];
      echo '
      <div class="images" >
      <div class="col-sm-3">
      <div class="thumbnail">
      <a href="product?pid='.$wpid.'">
      <img src="'.$wimg.'" alt="...">
      </a>
      <div class="caption">
      <p align="center">ProductName</p>
      </div>
      </div>
      </div>';
    }
  }
}

function addToCart($pid,$uid,$quantity,$color){
  $conn = dbConnection();
  $sql = "select Price from product where PID='$pid'";
  $result = $conn->query($sql);
  if($result->num_rows > 0){
    while($row = $result->fetch_assoc()) {
      $price = $row['Price'];
      //echo $price;
    }
  }
  $itemprice = $quantity * $price;
  //  echo $itemprice;
  $sql = "INSERT INTO checkout (PID, UID, Quantity, ItemsPrice)
  VALUES ('$pid', '$uid', '$quantity', '$itemprice')";
  $conn->query($sql);
  // echo "done";
}

function numberOfItemsInCart(){

  $uid = $_COOKIE['uid'];
  $conn = dbConnection();
  $sql = "select sum(Quantity) from checkout where UID='$uid'";
  $result = $conn->query($sql);
  if($result->num_rows > 0){
    while($row = $result->fetch_assoc()) {
      $quantity =$row['sum(Quantity)'];
      return $quantity ;

    }
  }
}


function checkOutDetails($uid){
  $conn = dbConnection();
  $sql = "select product.PID,product.Type,checkout.ItemsPrice,checkout.Quantity from product inner join checkout on checkout.PID = product.PID and checkout.UID='$uid'";
  $result = $conn->query($sql);
  if($result->num_rows > 0){
    while($row = $result->fetch_assoc()) {
      $type=$row['Type'];
      $price =$row['ItemsPrice'];
      $pid = $row['PID'];
      $quantity = $row['Quantity'];
      $sql1 = "select Image1 from images where PID='$pid'";
      $result1 = $conn->query($sql1);
      if($result1->num_rows > 0){
        while($row1 = $result1->fetch_assoc()) {
          $img1 = $row1['Image1'];
          echo '
          <div class="checkoutDetails" id="checkoutDetails">
          <div class="row">
          <div class="col-sm-2">
          <div class="thumbnail">
          <img src="'.$img1.'" alt="...">
          </div>
          </div>
          <div class="col-sm-3">
          '.$type.'
          </div>
          <div class="col-sm-3">
          '.$quantity.'
          </div>
          <div class="col-sm-4">
          $'.number_format($price, !($price == (int)$price) * 2).'
          </div>
          </div>
          </div>';
        }
      }
    }
  }
}

function productsBeingBought($uid){

  $conn = dbConnection();
  $sql = "select product.Size,product.Color,product.PID,product.Type,checkout.ItemsPrice,checkout.Quantity from product inner join checkout on checkout.PID = product.PID and checkout.UID='$uid'";
  $result = $conn->query($sql);
  if($result->num_rows > 0){
    $count = 0;
    $total=0;
    while($row = $result->fetch_assoc()) {
      $type=$row['Type'];
      $checkoutPrice =$row['ItemsPrice'];
      $quantity = $row['Quantity'];
      $pid = $row['PID'];
      $sizeGroup = $row['Size'];
      $size = (explode(';',$sizeGroup));;
      $colorGroup = $row['Color'];
      $color= (explode(',',$colorGroup));
      $count++;
      $sql1 = "select Image1 from images where PID='$pid'";
      $result1 = $conn->query($sql1);
      if($result1->num_rows > 0){
        while($row1 = $result1->fetch_assoc()) {
          $img1 = $row1['Image1'];
          echo '<tr>
          <td align="center">'.$count.'</td>
          <td align="center">
          <img src="'.$img1.'" alt="..." height="42" width="42"> <p>'.$type.'</p>
          </td>
          <td align="center"><img src="Images/'.$color[0].'.jpg" height="25" width="25"
          ></td>
          <td align="center">'.$size[0].'</td>
          <td align="center">'.$quantity.'</td>
          <td align="center">$'.number_format($checkoutPrice, !($checkoutPrice == (int)$checkoutPrice) * 2).'</td>
          </tr>';
        }
      }
    }
  }
}

function shippingDetails($uid,$firstname,$lastname,$address,$city,$state,$zip,$phone,$shipping){
  $conn = dbConnection();
  $sql = "INSERT INTO ShippingDetails (UID, FirstName, LastName, Address, City, Phone, State, Zip, Shipping)
  VALUES ('$uid','$firstname', '$lastname', '$address', '$city','$state','$zip','$phone','$shipping')";

  if ($conn->query($sql) === TRUE) {
    //  echo "Done";
  }
  else
  {
    //  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

}

function shippingAddress($uid){
  $conn = dbConnection();
  $sql = "select FirstName,LastName,Address,State,City,Zip,Phone from shippingdetails where UID='$uid' and ID = (select max(ID) from shippingdetails);";
  $result = $conn->query($sql);
  if($result->num_rows > 0){
    while($row = $result->fetch_assoc()) {
      $firstName = $row['FirstName'];
      $lastName = $row['LastName'];
      $phone= $row['Phone'];
      $state=$row['State'];
      $address=$row['Address'];
      $zip=$row['Zip'];
      $city=$row['City'];
      $name = "{$firstName} {$lastName}";
      $address= "{$address},{$city},{$state},{$zip}";
      //echo $name;
      //echo $address;
      echo '<textarea class="form-control" rows="3" disabled>
      '.$name.'
      '.$address.'
      '.$phone.'
      </textarea>';
    }
  }
}

//shippingAddress(41);

function subTotal($uid){

  $conn = dbConnection();
  $sql = "select sum(checkout.ItemsPrice),sum(checkout.Quantity),Shipping from checkout inner join shippingdetails where checkout.uid='$uid' and shippingdetails.ID = (select max(ID) from shippingdetails);";
  $result = $conn->query($sql);
  if($result->num_rows > 0){
    while($row = $result->fetch_assoc()) {
      $totalPrice = $row['sum(checkout.ItemsPrice)'];
      $shipping = $row['Shipping'];
      $tax=taxforItemsInCart($uid);
      $totalPrice = $totalPrice + $shipping+$tax;
      $items = $row['sum(checkout.Quantity)'];
      echo '<textarea class="form-control" rows="3" disabled>
      '.$items.' items bought                               Total Cost (Including Shipping): $'.$totalPrice.'
      </textarea>';
    }
  }
}

//


function orderPlaced($uid){

  $conn = dbConnection();
  $sql = "select sum(checkout.ItemsPrice),Shipping from checkout inner join shippingdetails where checkout.uid='$uid' and shippingdetails.ID = (select max(ID) from shippingdetails);";
  $result = $conn->query($sql);
  if($result->num_rows > 0){
    while($row = $result->fetch_assoc()) {
      $totalPrice = $row['sum(checkout.ItemsPrice)'];
      $shipping = $row['Shipping'];
      $totalPrice = $totalPrice + $shipping;
      $sql1 = "INSERT INTO orders (UID,PurchaseDate,OrderPrice,DeliveryStatus)
      VALUES ('$uid', CURDATE(),'$totalPrice','InTransit')";
      $conn->query($sql1);
      return true;
    }
  }
  return false;
}

//orderPlaced(41);


function emptyCart($uid){
  $conn = dbConnection();
  $sql = "delete from checkout where UID='$uid'";
  $conn->query($sql);
}


function previousOrders($uid){

  $conn = dbConnection();
  $sql = "select * from orders where UID='$uid'";
  $result = $conn->query($sql);
  if($result->num_rows > 0){
    $count = 0;
    while($row = $result->fetch_assoc()) {
      $count++;
      $date = $row['PurchaseDate'];
      $orderID = $row['OrderID'];
      $price = $row['OrderPrice'];
      $dStatus=$row['DeliveryStatus'];
      echo '<tr>
      <td align="center">'.$count.'</td>
      <td align="center">'.$date.'</td>
      <td align="center">
      <a href="#">'.$orderID.'</a>
      </td>
      <td align="center">$'.number_format($price, !($price == (int)$price) * 2).'</td>
      <td align="center">'.$dStatus.'</td>
      </tr>';
    }
  }
}

function homeSearch($type){
  $conn = dbConnection();
  $sql = "select product.PID,images.Image1,images.Image2,product.DesignerName,product.Price from images inner join product on images.PID = product.PID and product.Type='$type'";
  $result = $conn->query($sql);
  $count = 0;
  if($result->num_rows > 0){
    while($row = $result->fetch_assoc()) {
      if($count==0){
        $img1 = $row['Image1'];
        $img11 =$row['Image2'];
        $pid1 = $row['PID'];
        $designername = $row['DesignerName'];
        $price = $row['Price'];
        $count++;
      }
      else if($count==1){
        $img2 = $row['Image1'];
        $img22 =$row['Image2'];
        $pid2 = $row['PID'];
        $count=0;

        echo'<div class="row" id="image-panels">
        <div class="col-sm-6">
        <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="4000">
        <!-- Indicators -->
        <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
        <div class="item active">
        <a href="product?pid='.$pid1.'">
        <img src="'.$img1.'" alt="...">
        </a>
        <div class="carousel-caption">
        <p>Designed By : '.$designername.' </p>
        <p>Designer Price : $'.number_format($price, !($price == (int)$price) * 2).' </p>
        </div>
        </div>

        <div class="item">
        <a href="product?pid='.$pid1.'">
        <img src="'.$img11.'" alt="...">
        </a>
        <div class="carousel-caption">
        <p>Designed By : '.$designername.' </p>
        <p>Designer Price : $'.number_format($price, !($price == (int)$price) * 2).' </p>
        </div>
        </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
        </a>
        </div>

        </div>

        <div class="col-sm-6">

        <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="4000">
        <!-- Indicators -->
        <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
        <div class="item active">
        <a href="product?pid='.$pid2.'">
        <img src="'.$img2.'" alt="...">
        </a>
        <div class="carousel-caption">
        <p>Designed By : '.$designername.' </p>
        <p>Designer Price : $'.number_format($price, !($price == (int)$price) * 2).' </p>
        </div>
        </div>

        <div class="item">
        <a href="product?pid='.$pid2.'">
        <img src="'.$img22.'" alt="...">
        </a>
        <div class="carousel-caption">
        <p>Designed By : '.$designername.' </p>
        <p>Designer Price : $'.number_format($price, !($price == (int)$price) * 2).' </p>
        </div>
        </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
        </a>
        </div>



        </div>
        </div>
        ';



      }
    }
  }
}

//homeSearch(Bag);


function nullSearch(){
  echo'<div class="row" id="image-panels">
  <div class="col-sm-6">
  <div class="nullImage" id="nullImage">
  <img src="Images/noresults.jpg">
  </div>
  </div>
  </div>';
}
//nullSearch();


function homeFilter($option){
  $conn = dbConnection();
  if($option==="h2l"){
    $sql = "select product.PID,images.Image1,images.Image2,product.DesignerName,product.Price from images inner join product on images.PID = product.PID order by Price desc";
  }
  else{
    $sql = "select product.PID,images.Image1,images.Image2,product.DesignerName,product.Price from images inner join product on images.PID = product.PID order by Price asc";
  }
  $result = $conn->query($sql);
  $count = 0;
  if($result->num_rows > 0){
    while($row = $result->fetch_assoc()) {
      if($count==0){
        $img1 = $row['Image1'];
        $img11 =$row['Image2'];
        $pid1 = $row['PID'];
        $designername = $row['DesignerName'];
        $price = $row['Price'];
        $count++;
      }
      else if($count==1){
        $img2 = $row['Image1'];
        $img22 =$row['Image2'];
        $pid2 = $row['PID'];
        $count=0;

        echo'<div class="row" id="image-panels">
        <div class="col-sm-6">
        <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="4000">
        <!-- Indicators -->
        <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
        <div class="item active">
        <a href="product?pid='.$pid1.'">
        <img src="'.$img1.'" alt="...">
        </a>
        <div class="carousel-caption">
        <p>Designed By : '.$designername.' </p>
        <p>Designer Price : $'.number_format($price, !($price == (int)$price) * 2).' </p>
        </div>
        </div>

        <div class="item">
        <a href="product?pid='.$pid1.'">
        <img src="'.$img11.'" alt="...">
        </a>
        <div class="carousel-caption">
        <p>Designed By : '.$designername.' </p>
        <p>Designer Price : $'.number_format($price, !($price == (int)$price) * 2).' </p>
        </div>
        </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
        </a>
        </div>

        </div>

        <div class="col-sm-6">

        <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="4000">
        <!-- Indicators -->
        <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
        <div class="item active">
        <a href="product?pid='.$pid2.'">
        <img src="'.$img2.'" alt="...">
        </a>
        <div class="carousel-caption">
        <p>Designed By : '.$designername.' </p>
        <p>Designer Price : $'.number_format($price, !($price == (int)$price) * 2).' </p>
        </div>
        </div>

        <div class="item">
        <a href="product?pid='.$pid2.'">
        <img src="'.$img22.'" alt="...">
        </a>
        <div class="carousel-caption">
        <p>Designed By : '.$designername.' </p>
        <p>Designer Price : $'.number_format($price, !($price == (int)$price) * 2).' </p>
        </div>
        </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
        </a>
        </div>



        </div>
        </div>
        ';



      }
    }
  }
}

function displaySmall(){

  $conn = dbConnection();
  $sql = "select images.PID,images.Image1,images.Image2,product.DesignerName,product.Price from images inner join product on images.PID = product.PID";
  $result = $conn->query($sql);
  if($result->num_rows > 0){
    while($row = $result->fetch_assoc()) {
      $wimg = $row['Image1'];
      $wpid = $row['PID'];
      $designerName = $row['DesignerName'];
      $price = $row['Price'];
      echo '
      <div class="images" >
      <div class="col-sm-4">
      <div class="thumbnail">
      <a href="product?pid='.$wpid.'">
      <img src="'.$wimg.'" alt="...">
      </a>
      <div class="caption">
      <p align="center">'.$designerName.'</p>
      <p align="center">$'.number_format($price, !($price == (int)$price) * 2).'</p>
      </div>
      </div>
      </div>';

    }
  }
}

//displaySmall();

function previousOrdersByDate($uid,$month,$year){
  $conn = dbConnection();
  $sql = "select * from orders where UID='$uid'";
  $result = $conn->query($sql);
  if($result->num_rows > 0){
    $count = 0;
    while($row = $result->fetch_assoc()) {
      $count++;
      $date = $row['PurchaseDate'];
      $dateBreakDown = (explode("-",$date));
      $Year = $dateBreakDown[0];
      $Month = $dateBreakDown[1];
      if(($Year == $year) && ($Month == $month)){
        $orderID = $row['OrderID'];
        $price = $row['OrderPrice'];
        $dStatus=$row['DeliveryStatus'];
        echo '<tr>
        <td align="center">'.$count.'</td>
        <td align="center">'.$date.'</td>
        <td align="center">
        <a href="#">'.$orderID.'</a>
        </td>
        <td align="center">$'.number_format($price, !($price == (int)$price) * 2).'</td>
        <td align="center">'.$dStatus.'</td>
        </tr>';
      }
    }
  }
}

//previousOrdersByDate(41,07,2015);

function previousOrdersBySearch($uid,$orderID){
  $conn = dbConnection();
  $sql = "select * from orders where UID='$uid' and OrderID='$orderID'";
  $result = $conn->query($sql);
  if($result->num_rows > 0){
    $count = 0;
    while($row = $result->fetch_assoc()) {
      $count++;
      $date = $row['PurchaseDate'];
      $orderID = $row['OrderID'];
      $price = $row['OrderPrice'];
      $dStatus=$row['DeliveryStatus'];
      echo '<tr>
      <td align="center">'.$count.'</td>
      <td align="center">'.$date.'</td>
      <td align="center">
      <a href="#">'.$orderID.'</a>
      </td>
      <td align="center">$'.number_format($price, !($price == (int)$price) * 2).'</td>
      <td align="center">'.$dStatus.'</td>
      </tr>';
    }
  }
}

function logout(){
  setcookie("uid","",time()-36000);
  setcookie("firstname","",time()-36000);
  setcookie("lastname","",time()-36000);
  setcookie("email","",time()-36000);
  setcookie("phone","",time()-36000);
  setcookie("address1","",time()-36000);
  setcookie("address2","",time()-36000);
  setcookie("city","",time()-36000);
  setcookie("zip","",time()-36000);
  setcookie("state","",time()-36000);
}

function priceOfItemsInCart($uid){

  $uid = $_COOKIE['uid'];
  $conn = dbConnection();
  $sql = "select sum(ItemsPrice) from checkout where UID='$uid'";
  $result = $conn->query($sql);
  if($result->num_rows > 0){
    while($row = $result->fetch_assoc()) {
      $subTotal =$row['sum(ItemsPrice)'];
      return number_format($subTotal, !($subTotal == (int)$subTotal) * 2) ;

    }
  }
}


function taxforItemsInCart($uid){

  $uid = $_COOKIE['uid'];
  $conn = dbConnection();
  $sql = "select sum(ItemsPrice) from checkout where UID='$uid'";
  $result = $conn->query($sql);
  if($result->num_rows > 0){
    while($row = $result->fetch_assoc()) {
      $subTotal =$row['sum(ItemsPrice)'];
      $tax = (10/100)*$subTotal;
      return number_format($tax, !($tax == (int)$tax) * 2) ;

    }
  }
}

function orderTotal($uid){
  $subTotal = priceOfItemsInCart($uid);
  $tax=taxforItemsInCart($uid);
  $total = $subTotal+ $tax;
  return $total;
}

function sendPassword($email){
  $conn = dbConnection();
  $sql = "select Password from memberdetails where Email='$email'";
  $result = $conn->query($sql);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
          $to = "harsha_tj@yahoo.in";
            $subject = "This is subject";
            $message = "This is simple text message.";
            $header = "From:harshatjk@gmail.com \r\n";
            $retval = mail ($to,$subject,$message,$header);
            if( $retval == true )
            {
            }
            else
            {
               echo "Message could not be sent...";
            }
        }
    }
}

//sendPassword("harsha_tj@yahoo.in");
?>
