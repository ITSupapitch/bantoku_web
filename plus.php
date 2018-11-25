<?php
	ob_start();
	session_start();

	$Line = $_GET["Line"];
	$_SESSION["strQty"][$Line]++;

	header("location:cart.php");
?>

<?/* This code download from www.ThaiCreate.Com */ ?>