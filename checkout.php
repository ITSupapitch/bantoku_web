
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    

    <!-- cart -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/one-page-wonder.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="checkout.css">

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
$conn = mysqli_connect("localhost","root","root","bantoku");
$strSQL = "SELECT * FROM product";
$objQuery = mysqli_query($conn,$strSQL)  or die(mysqli_error($conn));
?>

<!-- build parallax -->
    <div class="parallax"></div>

<!-- topic part -->
<section class="cl-bg padding-l-vtc" id="sec2">
    <div class="cont padding-s"></div>
</section>
<center><h1>แบบฟอร์มกรอกข้อมูลลูกค้า</h1></center>
<!-- build detail -->

<section class="cl-bg padding-xs-vtc" id="sec3">
  <div class="cont padding-xl">
  <div class="box_scroll">
  <?php
  $Total = 0;
  $SumTotal = 0;

  for($i=0;$i<=(int)$_SESSION["intLine"];$i++)
  {
    if($_SESSION["strProductID"][$i] != "")
    {
    $strSQL = "SELECT * FROM product WHERE ProductID = '".$_SESSION["strProductID"][$i]."' ";
    $objQuery = mysqli_query($conn,$strSQL)  or die(mysqli_error($conn));
    $objResult = mysqli_fetch_array($objQuery);
    $Total = $_SESSION["strQty"][$i] * $objResult["Price"];
    $SumTotal = $SumTotal + $Total;
    ?>
    <?php
    }
  }
  ?>

<form name="form1" method="post" class="round shadow" action="save_checkout.php">
      Name: 
      <input type="text" name="txtName"><br><br>
    
      Surname: 
      <input type="text" name="txtSurname"><br><br>

      Tel: 
      <input type="text" name="txtTel"><br><br>

      Address: 
      <textarea name="txtAddress"></textarea><br><br>

      <h3>หมายเหตุ: ชำระเงินปลายทางเท่านั้น!</h>
    
    <input type="hidden" name="total" value="<?=$SumTotal?>">
    <br><input type="submit" name="Submit" value="Confirm">
</form>
<?php
mysqli_close($conn);
?>

<!-- popup part -->

         <!--  <div class="popup" id="success">
            <div class="popup-inner">
                <center><h1>สั่งซื้อสินค้าเรียบร้อยแล้ว</h1></center>
              <a class="popup__close" href="receipt.php">X</a>
            </div>
          </div> -->

    </div>
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
    <script type="text/javascript" src="checkout.js"></script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>