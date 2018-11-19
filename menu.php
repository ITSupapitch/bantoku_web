<!DOCTYPE html>
<html>
<head>
	<title>Bantoku Menu Page</title>
	<link rel="icon" type="image/png" href="pic/icon.png"/>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="https://jabont.com/jayss/jayss.css">
	<link rel="stylesheet" type="text/css" href="https://jabont.com/jayss/jayss-custom.php?ggfont=Itim&font=5f5f5f&bg=fff1d7&cl=3c280e,ffe9c2,5f5f5f,8B4513,CD853F">
	<link href="https://fonts.googleapis.com/css?family=Itim|Fredoka+One" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="menu.css">

    <!-- cart -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/one-page-wonder.css" rel="stylesheet">

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
<section class="cl-bg padding-vs-vtc" id="sec2">
	<div class="cont padding-s"></div>
</section>

<center>
	<div class='console-container'>
		<span id='text'></span>
	<div class='console-underscore' id='console'>&#95;</div></div>
</center>

<!-- menu list part -->
<section class="cl-bg padding-xs-vtc" id="sec3">
 	<div class="cont padding-l">		
 			<?php
  while($objResult = mysqli_fetch_array($objQuery))
  {
  ?>
 			<box col="4">
 				<inner class="round">
 					<center><br><p class="text_title"><?php echo $objResult["ProductID"];?>. 
 					<?php echo $objResult["ProductName"];?></p></center>
 					<img src="pic/<?=$objResult["Picture"];?>" alt="product" class="round padding-m" width="90%">
					<div class="t-center">
						<a href="order.php?ProductID=<?=$objResult["ProductID"];?>">
						<button class="btn_shop shadow">
							<span class="baht">฿</span>
							<span class="price"><?php echo $objResult["Price"];?></span>
							<span class="plus">+</span>
							<span class="fa fa-shopping-basket basket_shopping"></span>
						</button></a>
					</div><br>
 				</inner>
 			</box>
 			<!-- <box col="4">
 				<inner class="round">
 					<center><br><p class="text_title">ช็อคโกแลตครีมชีส</p></center>
 					<img src="pic/chocolate_creamcheese.jpg" alt="chocolate_creamcheese" class="round padding-m"  width="90%" >
					<div class="t-center">
						<button class="btn_shop shadow">
							<span class="baht">฿</span>
							<span class="price">25</span>
							<span class="plus">+</span>
							<span class="fa fa-shopping-basket basket_shopping"></span>
						</button>
					</div><br>
 				</inner>
 			</box>
 			<box col="4">
 				<inner class="round">
 					<center><br><p class="text_title">มัชรูมแบล็คเปเปอร์</p></center>
 					<img src="pic/mushroom_blackpepper.jpg" alt="mushroom_blackpepper" class="round padding-m"  width="90%" >
					<div class="t-center">
						<button class="btn_shop shadow">
							<span class="baht">฿</span>
							<span class="price">35</span>
							<span class="plus">+</span>
							<span class="fa fa-shopping-basket basket_shopping"></span>
						</button>
					</div><br>
 				</inner>
 			</box>
 			<box col="4">
 				<inner class="round">
 					<center><br><p class="text_title">คัสตาร์ดบัน</p></center>
 					<img src="pic/custard_bun.jpg" alt="custard_bun" class="round padding-m"  width="90%" >
					<div class="t-center">
						<button class="btn_shop shadow">
							<span class="baht">฿</span>
							<span class="price">25</span>
							<span class="plus">+</span>
							<span class="fa fa-shopping-basket basket_shopping"></span>
						</button>
					</div><br>
 				</inner>
 			</box>
 			<box col="4">
 				<inner class="round">
 					<center><br><p class="text_title">ร็อคกี้มิลค์</p></center>
 					<img src="pic/rocky_milk.jpg" alt="rocky_milk" class="round padding-m"  width="90%" >
					<div class="t-center">
						<button class="btn_shop shadow">
							<span class="baht">฿</span>
							<span class="price">30</span>
							<span class="plus">+</span>
							<span class="fa fa-shopping-basket basket_shopping"></span>
						</button>
					</div><br>
 				</inner>
 			</box>
 			<box col="4">
 				<inner class="round">
 					<center><br><p class="text_title">เคอร์รี่ชิคเก้น</p></center>
 					<img src="pic/curry_chicken.jpg" alt="curry_chicken" class="round padding-m"  width="90%" >
					<div class="t-center">
						<button class="btn_shop shadow">
							<span class="baht">฿</span>
							<span class="price">33</span>
							<span class="plus">+</span>
							<span class="fa fa-shopping-basket basket_shopping"></span>
						</button>
					</div><br>
 				</inner>
 			</box>
 			<box col="4">
 				<inner class="round">
 					<center><br><p class="text_title">ชีสโบ้ท</p></center>
 					<img src="pic/cheese_boat.jpg" alt="cheese_boat" class="round padding-m"  width="90%" >
					<div class="t-center" >
						<button class="btn_shop shadow">
							<span class="baht">฿</span>
							<span class="price">39</span>
							<span class="plus">+</span>
							<span class="fa fa-shopping-basket basket_shopping"></span>
						</button>
					</div><br>
 				</inner>
 			</box>
 			<box col="4">
 				<inner class="round">
 					<center><br><p class="text_title">อันปัน</p></center>
 					<img src="pic/anpan.jpg" alt="anpan" class="round padding-m"  width="90%" >
					<div class="t-center">
						<button class="btn_shop shadow">
							<span class="baht">฿</span>
							<span class="price">25</span>
							<span class="plus">+</span>
							<span class="fa fa-shopping-basket basket_shopping"></span>
						</button>
					</div><br>
 				</inner>
 			</box>
 			<box col="4">
 				<inner class="round">
 					<center><br><p class="text_title">นิวเบค่อนชีส</p></center>
 					<img src="pic/newbacon_cheese.jpg" alt="newbacon_cheese" class="round padding-m"  width="90%" >
					<div class="t-center">
						<button class="btn_shop shadow">
							<span class="baht">฿</span>
							<span class="price">40</span>
							<span class="plus">+</span>
							<span class="fa fa-shopping-basket basket_shopping"></span>
						</button>

					</div><br>
 				</inner>
 			</box>
 			<box col="4">
 				<inner class="round">
 					<center><br><p class="text_title">ขนมปังไข่ดาว</p></center>
 					<img src="pic/friedegg_bread.jpg" alt="friedegg_bread" class="round padding-m"  width="90%" >
					<div class="t-center">
						<button class="btn_shop shadow">
							<span class="baht">฿</span>
							<span class="price">45</span>
							<span class="plus">+</span>
							<span class="fa fa-shopping-basket basket_shopping"></span>
						</button>

					</div><br>
 				</inner>
 			</box>
 			<box col="4">
 				<inner class="round">
 					<center><br><p class="text_title">ถั่วแดงอัลมอนด์</p></center>
 					<img src="pic/almond_redbean.jpg" alt="almond_redbean" class="round padding-m"  width="90%" >
					<div class="t-center">
						<button class="btn_shop shadow">
							<span class="baht">฿</span>
							<span class="price">25</span>
							<span class="plus">+</span>
							<span class="fa fa-shopping-basket basket_shopping"></span>
						</button>

					</div><br>
 				</inner>
 			</box>
 			<box col="4">
 				<inner class="round">
 					<center><br><p class="text_title">สตรอเบอร์รี่ครัวซองต์</p></center>
 					<img src="pic/strawberry_croissant.jpg" alt="strawberry_croissant" class="round padding-m"  width="90%" >
					<div class="t-center">
						<button class="btn_shop shadow">
							<span class="baht">฿</span>
							<span class="price">25</span>
							<span class="plus">+</span>
							<span class="fa fa-shopping-basket basket_shopping"></span>
						</button>

					</div><br>
 				</inner>
 			</box>
 			<box col="4">
 				<inner class="round">
 					<center><br><p class="text_title">ซัมเมอร์เบอร์รี่</p></center>
 					<img src="pic/summer_berries.jpg" alt="summer_berries" class="round padding-m"  width="90%" >
					<div class="t-center">
						<button class="btn_shop shadow">
							<span class="baht">฿</span>
							<span class="price">25</span>
							<span class="plus">+</span>
							<span class="fa fa-shopping-basket basket_shopping"></span>
						</button>

					</div><br>
 				</inner>
 			</box>
 			<box col="4">
 				<inner class="round">
 					<center><br><p class="text_title">พัมพ์กิน ซันฟลาวเวอร์</p></center>
 					<img src="pic/pumpkin_sunflower.jpg" alt="pumpkin_sunflower" class="round padding-m"  width="90%" >
					<div class="t-center">
						<button class="btn_shop shadow">
							<span class="baht">฿</span>
							<span class="price">39</span>
							<span class="plus">+</span>
							<span class="fa fa-shopping-basket basket_shopping"></span>
						</button>

					</div><br>
 				</inner>
 			</box>
 			<box col="4">
 				<inner class="round">
 					<center><br><p class="text_title">ฟูจิสเวิร์ล</p></center>
 					<img src="pic/fuji_swirl.jpg" alt="fuji_swirl" class="round padding-m"  width="90%" >
					<div class="t-center">
						<button class="btn_shop shadow">
							<span class="baht">฿</span>
							<span class="price">33</span>
							<span class="plus">+</span>
							<span class="fa fa-shopping-basket basket_shopping"></span>
						</button>

					</div><br>
 				</inner>
 			</box> -->
 <?php
  }
  ?>
 	</div>
 </section>
<!-- footer part -->
 <section id="sec4">
 	<footer id="footer" class="bg-ci2 t-center">
 		<br><br><p>Tel : +66(0) 2365 6999 Ext : 3462
		<br>Mobile : +66(O)61-624-9799</p>
 		<a href="https://www.facebook.com/breadtalkthai/" target="_blank"><img src="pic/fb.png" class="social" width="50px" height="50px"></a>
 		<a href="https://www.instagram.com/breadtalk_thailand/" target="_blank"><img src="pic/ig.png" class="social" width="50px" height="50px"></a>
 	</footer>
 </section>
<?php
mysqli_close($conn);
?>
<script type="text/javascript" src="menu.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
</body>
</html>