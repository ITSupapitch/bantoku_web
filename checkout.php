
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

    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css'>
    
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
<div class="page-wrapper">
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
                <i class="navlist fa fa-shopping-basket"></i></a>
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
<!--     <div class="parallax"></div> -->

<!-- topic part -->
<section class="cl-bg padding-l-vtc" id="sec2">
    <div class="cont padding-m"></div>
</section>

<!-- build detail -->

<center>
  <div class="cont padding-xl">
  <div class="box_scroll round shadow">
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
<center><font class="font_header">แบบฟอร์มกรอกข้อมูลลูกค้า</font></center>
<form name="form1" method="post" class="round" action="save_checkout.php">

      <label for="fname">ชื่อ: </label>
      <input type="text" id="fname" name="txtName" placeholder="ชื่อของคุณ..">

      <label for="lname">นามสกุล: </label>
      <input type="text" id="lname" name="txtSurname" placeholder="นามสกุลของคุณ..">

      <label for="lname">เบอร์ติดต่อ: </label>
      <input type="text" id="tel" name="txtTel" placeholder="เบอร์ติดต่อของคุณ..">

      <label for="lname">ที่อยู่ในการจัดส่ง: </label><br>
      <textarea type="text" id="add" name="txtAddress" placeholder="ที่อยู่นำจัดส่งของคุณ.."></textarea>

      <center><font class="font_note">หมายเหตุ: ชำระเงินปลายทางเท่านั้น!</font>
      <a class="btn trigger" href="#">ยืนยันการสั่งซื้อ</a>
    </center>



    </div>
  </div>
</center>
</div>

<!-- Modal -->
<div class="modal-wrapper ">
  <div class="modal round shadow">
    <div class="head">
      <a class="btn-close trigger"  href="receipt.php">
        <i class="fa fa-times" aria-hidden="true"></i>
      </a>
    </div>
    <div class="content">
        <div class="good-job">
          <i class="fa fa-check-circle-o" aria-hidden="true"></i><br>
          <font class="font_inpopup">ทำการสั่งซื้อสินค้าเรียบร้อย!<br>กำลังจัดส่งความอร่อย ...</font><br><br>
           <input type="hidden" name="total" value="<?=$SumTotal?>">
          <button type="submit" name="Submit" value="ยืนยันการสั่งซื้อ" class="btn">รับใบเสร็จได้เลย</button>
        </div>
      </form>
    </div>
  </div>
</div>
  <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
<?php
mysqli_close($conn);
?>


<!-- footer part -->
  <section>
    <footer id="footer" class="bg-ci2 t-center">
        <br><br><i class="far fa-heart"></i> &nbsp; Dev.faeng & kram &nbsp; <i class="far fa-heart"></i>
        <br><p>Tel : +66(0) 2365 6999 Ext : 3462
        <br>Mobile : +66(O)61-624-9799</p>
        <a href="https://www.facebook.com/breadtalkthai/" target="_blank"><img src="pic/fb.png" class="social" width="50px" height="50px"></a>
        <a href="https://www.instagram.com/breadtalk_thailand/" target="_blank"><img src="pic/ig.png" class="social" width="50px" height="50px"></a>
    </footer>
 </section>

    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="checkout.js"></script>
    <script type="text/javascript" src="checkout_popup.js"></script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>