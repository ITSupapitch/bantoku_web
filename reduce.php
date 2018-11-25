<?php
	ob_start();
	session_start();

	$Line = $_GET["Line"];
	if ($_SESSION["strQty"][$Line] == 1) {
		$_SESSION["strProductID"][$Line] = "";
		$_SESSION["strQty"][$Line] = "";
	}else{
		$_SESSION["strQty"][$Line]--;		
	}
	

	header("location:cart.php");
?>

<?/* This code download from www.ThaiCreate.Com */ ?>