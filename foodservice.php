<?PHP
include 'serviceinfo.php';
	$conexion=mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>FOOD SERVICE</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	</head>





	<body>

		<div class="w3-top">
			<div class="w3-container w3-blue w3-text-blue">
				<a href="foodservice.php"><img src="logoexample.png" style="width:7%" class="w3-round w3-padding-16 w3-left"></a>
				<a href="foodservice.php"><h1 class="w3-blue w3-center w3-xxlarge w3-text-black">FOOD SERVICE SETUP</h1></a>
				<h1 class="w3-blue w3-right w3-xlarge w3-text-black" >HOT SALES EVERYDAY</h1>
			</div>

			<div class="w3-bar w3-black">
			  <a href="categories.php" class="w3-bar-item w3-button">ADD CATEGORIE</a>
				<a href="subcategories.php" class="w3-bar-item w3-button">ADD SUBCATEGORIE</a>
			  <a href="productline.php" class="w3-bar-item w3-button">ADD PRODUCT LINE</a>
			  <a href="product.php" class="w3-bar-item w3-button">ADD PRODUCT</a>
				<a href="orderservice.php" class="w3-bar-item w3-button">ORDERS</a>
				<a href="ordercustumer.php" class="w3-bar-item w3-button">NEW ORDER</a>
		</div>

		<div class="w3-container w3-center w3-cyan w3-large">
			<h1>ESTA ES LA PAGINA PRINCIPAL DEL CLIENTE</h1>
			<img src="relleno.jpg" alt="Avatar" style="width:80%">
		</div>

	</body>



</html>
