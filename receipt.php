
 <?php
session_start();
?><!DOCTYPE html>
<html>
<head>
    <title>Bantoku Cart Page</title>
    <link rel="icon" type="image/png" href="pic/icon.png"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="https://jabont.com/jayss/jayss.css">
    <link rel="stylesheet" type="text/css" href="https://jabont.com/jayss/jayss-custom.php?ggfont=Itim&font=5f5f5f&bg=fff1d7&cl=fff,ffe9c2,5f5f5f,8B4513,CD853F">
    <link href="https://fonts.googleapis.com/css?family=Itim|Fredoka+One" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="receipt.css">

    <!-- cart -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/one-page-wonder.css" rel="stylesheet">

<!--     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css"> -->

</head>
<body>

<!-- build navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.html"><img src="pic/logo.png" width="100px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.html">WELCOME</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="menu.php">MENU</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="promotion.html">PROMOTION</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="history.html">OUR STORY</a>
            </li>            
            <li class="nav-item">
              <a class="nav-link" href="contact.html">CONTACT</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="cart.php">
                <i class="navlist fa fa-shopping-cart"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

<!-- connection part -->
<?php
$conn = mysqli_connect("localhost","root","","bantoku");
$strSQL = "SELECT * FROM orders WHERE OrderID = '".$_GET["OrderID"]."' ";
$objQuery = mysqli_query($conn,$strSQL)  or die(mysql_error($conn));
$objResult = mysqli_fetch_array($objQuery);
?>

<!-- build parallax -->
    <div class="parallax"></div>

<!-- build detail -->
<section class="cont padding-xxl">
  <div class="box_scroll">
  <center>
    <h1>สรุปรายการสินค้าที่สั่งซื้อ</h1>
  <table width="200" border="2">
    <tr>
      <td width="71">ชื่อ</td>
      <td width="217">
    <?=$objResult["Name"];?></td>
    </tr>
    <tr>
      <td>นามสกุล</td>
      <td><?=$objResult["Surname"];?></td>
    </tr>
    <tr>
      <td>เบอร์โทรศัพท์</td>
      <td><?=$objResult["Tel"];?></td>
    </tr>
    <tr>
      <td>ที่อยู่</td>
      <td><?=$objResult["Address"];?></td>
    </tr>
  </table>


<table width="400"  border="2">
  <tr>
    <td width="82">รายการสินค้า</td>
    <td width="82">ราคา</td>
    <td width="79">จำนวน</td>
    <td width="79">ราคา</td>
  </tr>
<?php

$Total = 0;
$SumTotal = 0;

$strSQL2 = "SELECT * FROM orders_detail WHERE OrderID = '".$_GET["OrderID"]."' ";
$objQuery2 = mysqli_query($conn,$strSQL2)  or die(mysqli_error($conn));

while($objResult2 = mysqli_fetch_array($objQuery2))
{
    $strSQL3 = "SELECT * FROM product WHERE ProductID = '".$objResult2["ProductID"]."' ";
    $objQuery3 = mysqli_query($conn,$strSQL3)  or die(mysqli_error($conn));
    $objResult3 = mysqli_fetch_array($objQuery3);
    $Total = $objResult2["Qty"] * $objResult3["Price"];
    $SumTotal = $SumTotal + $Total;
    ?>
    <tr>

  <td><?=$objResult3["ProductName"];?></td>
  <td><?=$objResult3["Price"];?></td>
  <td><?=$objResult2["Qty"];?></td>
  <td><?=number_format($Total,2);?></td>
    </tr>
    <?php
 }
  ?>
</table>
<h2> Total : <?=$objResult["total"];?>฿</h2>
</center> 
</div> 
</section>
<!-- footer part -->
  <section>
    <footer id="footer" class="bg-ci2 t-center">
        <br><br><p>Tel : +66(0) 2365 6999 Ext : 3462
        <br>Mobile : +66(O)61-624-9799</p>
        <a href="https://www.facebook.com/breadtalkthai/" target="_blank"><img src="pic/fb.png" class="social" width="50px" height="50px"></a>
        <a href="https://www.instagram.com/breadtalk_thailand/" target="_blank"><img src="pic/ig.png" class="social" width="50px" height="50px"></a>
    </footer>
 </section>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>