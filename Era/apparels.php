<?php
include "modules.php";

$query = [
  "jeans"=>"select product.ProductName,images.PID,images.Image1, images.Image2,product.DesignerName,product.Price from images inner join product on images.PID = product.PID and product.type='Jeans'",
  "tshirt"=>"select product.ProductName,images.PID,images.Image1, images.Image2,product.DesignerName,product.Price from images inner join product on images.PID = product.PID and product.type='Tshirt'",
  "bag"=>"select product.ProductName,images.PID,images.Image1, images.Image2,product.DesignerName,product.Price from images inner join product on images.PID = product.PID and product.type='Bag'"
];

$data =$_POST['showCase'];

showImages($query[$data]);

?>
