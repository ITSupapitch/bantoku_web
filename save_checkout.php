<?php
session_start();

$conn = mysqli_connect("localhost","root","root","bantoku");

  $Total = 0;
  $SumTotal = 0;

  $strSQL = "
	INSERT INTO orders (OrderDate,Name,Surname,Address,Tel)
	VALUES
	('".date("Y-m-d H:i:s")."','".$_POST["txtName"]."','".$_POST["txtSurname"]."','".$_POST["txtAddress"]."','".$_POST["txtTel"]."') 
  ";
  mysqli_query($conn,$strSQL) or die(mysqli_error($conn));

  $strOrderID = mysqli_insert_id($conn);

  for($i=0;$i<=(int)$_SESSION["intLine"];$i++)
  {
	  if($_SESSION["strProductID"][$i] != "")
	  {
			  $strSQL = "
				INSERT INTO orders_detail (OrderID,ProductID,Qty)
				VALUES
				('".$strOrderID."','".$_SESSION["strProductID"][$i]."','".$_SESSION["strQty"][$i]."') 
			  ";
			  mysqli_query($conn,$strSQL) or die(mysqli_error($conn));
	  }
  }

mysqli_close($conn);

session_destroy();

header("location:finish_order.php?OrderID=".$strOrderID);
?>

<?php /* This code download from www.ThaiCreate.Com */ ?>