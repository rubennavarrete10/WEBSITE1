<?PHP
	include 'serviceinfo.php';

	$conexion=mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);

	$items="0";
	$TOTALDOL='0';
	$QTY=0;
?>

<!DOCTYPE html>
<html>
	<head>
		<title>ORDERS</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<style>
			#myDIV {
			  height: auto;
			  width: 1920px;
			  overflow: auto;
			}
			#content {
			  height: auto;
			  width: 1900px;
			  background-color: white;
			}
			#myDIV1 {
			  height: auto;
			  width: 	1920px;
			  overflow: auto;
			}
			#content1 {
			  height: auto;
			  width: 1900px;
			  background-color: white;
			}

			</style>

	</head>


	<body>

		<div class="w3-top">
			<div id="menu" class="w3-top">
				<div class="w3-container w3-blue w3-text-blue">
					<a href="foodservice.php"><img src="logoexample.png" style="width:7%" class="w3-round w3-padding-16 w3-left"></a>
					<a href="foodservice.php"><h1 class="w3-blue w3-center w3-xxlarge w3-text-black">FOOD SERVICE SETUP</h1></a>
					<h1 class="w3-blue w3-right w3-xlarge w3-text-black" >HOT SALES EVERYDAY</h1>
				</div>

			<div class="w3-bar w3-black">
			  <a href="categories.php" class="w3-bar-item w3-button">ADD CATEGORIE</a>
				<a href="subcategories.php" class="w3-bar-item w3-button">ADD SUBCATEGORIE</a>
			  <a href="productline.php" class="w3-bar-item w3-button">ADD PRODUCR LINE</a>
			  <a href="product.php" class="w3-bar-item w3-button">ADD PRODUCT</a>
				<a href="orderservice.php" class="w3-bar-item w3-button">ORDERS</a>
				<a href="ordercustumer.php" class="w3-bar-item w3-button">NEW ORDER</a>
		</div>

		<!--encabezados de las tablas-->
					<h2 class="w3-center w3-xlarge">ORDERS DATA BASE</h2>
					<div id="myDIV" class='w3-resposive'>
					<div id=content  >
						<table class="w3-table-all">
						<tr>
							<th width="100" >ORDER ID</th>
							<th width="100" >ORDER DATE</th>
							<th width="100" >SERVICE ID</th>
							<th width="100" >STATUS ID</th>
							<th width="130" >PAYMETOD ID</th>
							<th width="140" >PAYED</th>
							<th width="270" >CUSTUMER NAME</th>
							<th width="100" >PREPARATION DATE</th>
							<th width="100" >SHIPPINH DATE</th>
							<th width="100" >DELIVERY DATE</th>
							<th width="120" >CHANGE</th>
						</tr>
					</table>
					</div>
				</div>
		<!--tabla autorellenable con mysql-->
					<div id="myDIV1" class='w3-resposive'>
						<div id=content1>
						<table class="w3-table-all ">

			                  <?php
			                  $sql="SELECT * FROM orders WHERE ORD_ID > 0";
			                  $ejecutar=mysqli_query($conexion,$sql);
			                  while ($mostrar = mysqli_fetch_array($ejecutar)){
			                    ?>
			                  <tr>
			                    <td width="100"><?php echo $mostrar['ORD_ID'] ?></td>
			                    <td width="100"><?php echo $mostrar['ORD_DATE'] ?></td>
			                    <td width="100"><?php echo $mostrar['SRV_ID'] ?></td>
			                    <td width="100"><?php echo $mostrar['STATUS_ID'] ?></td>
													<td width="100"><?php echo $mostrar['PAYM_ID'] ?></td>
			                    <td width="100"><?php echo $mostrar['PAYED'] ?></td>
			                    <td width="100"><?php echo $mostrar['CUST_NAME'] ?></td>
			                    <td width="100"><?php echo $mostrar['PREP_DATE'] ?></td>
													<td width="100"><?php echo $mostrar['SHIP_DATE'] ?></td>
													<td width="100"><?php echo $mostrar['DLVER_DATE'] ?></td>
			                    <td width="100" height="50">
														<a type="submit" class="w3-button w3-green" href=updatecategorieswebservice.php?ID=<?php echo $mostrar['ORD_ID'] ?>>CHANGE </a>
														<a width="100" height="50"><a type="submit" class="w3-button w3-yellow" href=c.php?IDD=<?php echo $mostrar['ORD_ID'] ?>>DETAILS</a>
														<a width="100" height="50"><a type="submit" class="w3-button w3-red" href=c.php?IDD=<?php echo $mostrar['ORD_ID'] ?>>DELETE</a>
													</td>
			                  </tr>
			                  <?php
			                }
			                  ?>
			        </table>
			  	</div>
				</div>


	</body>

<!--head para funciones en javascript-->
		<head>
			<script>

			</script>
		</head>

</html>
