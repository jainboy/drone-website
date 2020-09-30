<?php
  include './admin1/db/db.php';
  include './add_to_cart.php';
  session_start();
  error_reporting(E_ALL & ~E_NOTICE);
  $obj=new add_to_cart();
  $totalProduct=$obj->totalProduct();
  if(isset($_SESSION['USER_LOGIN']))
  {
    $uid=$_SESSION['USER_ID'];
    $wishlist_count=mysqli_num_rows(mysqli_query($con,"SELECT `product`.`pro_name`,`product`.`pro_image`,`product`.`pro_sell_price`,`product`.`pro_mrp`,`wishlist`.`id` FROM `product`,`wishlist` WHERE `wishlist`.`product_id`=`product`.`id` AND `wishlist`.`user_id`='$uid'"));  
  }
  ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/smoothproducts.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
