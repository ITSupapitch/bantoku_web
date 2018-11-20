<?php
session_start();
?>
<html>
<head>
<title>Bantoku Check Out Page</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<?php
$conn = mysqli_connect("localhost","root","root","bantoku");
$strSQL = "SELECT * FROM product";
$objQuery = mysqli_query($conn,$strSQL)  or die(mysqli_error($conn));
?>
<table width="400"  border="1">
  <tr>
    <td width="101">ProductID</td>
    <td width="82">ProductName</td>
    <td width="82">Price</td>
    <td width="79">Qty</td>
    <td width="79">Total</td>
  </tr>
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
	  <tr>
		<td><?=$_SESSION["strProductID"][$i];?></td>
		<td><?=$objResult["ProductName"];?></td>
		<td><?=$objResult["Price"];?></td>
		<td><?=$_SESSION["strQty"][$i];?></td>
		<td><?=number_format($Total,2);?></td>
	  </tr>
	  <?php
	  }
  }
  ?>
</table>
Sum Total <?=number_format($SumTotal,2);?>
<br><br>
<form name="form1" method="post" action="save_checkout.php">
  <table width="304" border="1">
    <tr>
      <td width="71">Name</td>
      <td width="217"><input type="text" name="txtName"></td>
    </tr>
    <tr>
      <td>Surname</td>
      <td><input type="text" name="txtSurname"></input></td>
    </tr>
    <tr>
      <td>Tel</td>
      <td><input type="text" name="txtTel"></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><textarea name="txtAddress"></textarea></td>
    </tr>
    <input type="hidden" name="total" value="<?=$SumTotal?>">
    
  </table>
    <input type="submit" name="Submit" value="Submit">
</form>
<?php
mysqli_close($conn);
?>
</body>
</html>

<?php /* This code download from www.ThaiCreate.Com */ ?>