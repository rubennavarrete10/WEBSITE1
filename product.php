<?PHP
include 'serviceinfo.php';

	$conexion=mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>PRODUCT FILL SERVICE</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<style>
			#myDIV {
			  height: 500px;
			  width: 1920px;
			  overflow: auto;
			}
			#content {
			  height: auto;
			  width: 1900px;
			  background-color: white;
			}
			</style>

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

		<div class="w3-container w3-cyan">
			<form action="subirfoto.php" method="POST" enctype="multipart/form-data">
								<h2 class="w3-center w3-xlarge">ADD PRODUCT </h2>
								<p></p>
								<a>PRODUCT ID <input type="text" name="PRODUCTID" required>
								<a>PRODUCT NAME <input type="text" name="PRODUCTNAME" required>



								<a>CATEGORIE NAME </a>
												<select id="CATID" name="CAT_ID" onchange="sel()" required>
												<option selected="true" disabled="disabled">select option</option>
												<?php
												$z=0;
												$sql="SELECT * FROM categories WHERE CAT_ID > 0";
												$ejecutar=mysqli_query($conexion,$sql);
												while ($mostrar = mysqli_fetch_array($ejecutar)){
													$z++;
													?>
													<option value="<?php echo $mostrar['CAT_ID'] ?>"><?php echo $mostrar['CAT_NAME'] ?></option>
												<?php
												}
												?>
												</select>
								<a>SUBCATEGORIE ID </a>
											<select id="SUBCAT" name="SCAT_ID" onchange="sel1()" required>
											<option selected="true" disabled="disabled">select option</option>
											</select>
								<a>LINE ID </a>
											<select id="LINEID" name="LINE_ID"  required>
											<option selected="true" disabled="disabled">select option</option>
											</select>

							  <p>DESCRIPTION <input type= “text” name="PRODUCTDESCRIPTION" required>
							  <a>PRICE <input type= “text” name="PRODUCTPRICE" required>
							  <a>ACTIVE <input type= “text” name="PRODUCTACTIVE" required>
								<a> SELECT PHOTO <input type="FILE" class="form-control" name=PHOTO required>
								</a></a></a></p>
								<p></p>
								<input type="reset" class="w3-button w3-red w3-right" value="CLEAR">
								<button type="submit" class="w3-button w3-green w3-right" >SAVE</button>
			</form>
	 </div>

			<h2 class="w3-center w3-xlarge">PRODUCT DATA BASE</h2>
			<div id=content >
				<table class="w3-table-all ">
				<tr>
					<th width="200" >PROD_ID</th>
					<th width="210" >PROD_NAME</th>
					<th width="200" >CAT_ID</th>
					<th width="200" >SCAT_ID</th>
					<th width="200" >LINE_ID</th>
					<th width="210" >DESCRIPTION</th>
					<th width="240" >PHOTO</th>
					<th width="200" >PRICE</th>
					<th width="210" >ACTIVE</th>
					<th width="200" >CHANGE</th>
					<th></th>
				</tr>
			</table>
			</div>

			<div id="myDIV" class="w3-resposive">
				<div id=content>
				<table class="w3-table-all ">
							<?php
										$sql="SELECT * FROM products WHERE PROD_ID > 0";
										$ejecutar=mysqli_query($conexion,$sql);
										while ($mostrar = mysqli_fetch_array($ejecutar)){
											?>
										<tr>
											<td width="100" height="50"><?php echo $mostrar['PROD_ID'] ?></td>
											<td width="100" height="50"><?php echo $mostrar['PROD_NAME'] ?></td>
											<td width="100" height="50"><?php echo $mostrar['CAT_ID'] ?></td>
										  <td width="100" height="50"><?php echo $mostrar['SCAT_ID'] ?></td>
											<td width="100" height="50"><?php echo $mostrar['LINE_ID'] ?></td>
											<td width="100" height="50"><?php echo $mostrar['DESCRIPTION'] ?></td>
											<td width="100" height="50">
												<img src=getphoto.php?ID=<?php echo $mostrar['PROD_ID'] ?> alt='NOT IMAGE' width="100" height="100" />
												<a href=getphoto.php?ID=<?php echo $mostrar['PROD_ID'] ?>>SHOW</a>
											</td>
											<td width="100" height="50"><?php echo $mostrar['PRICE'] ?></td>
											<td width="100" height="50"><?php echo $mostrar['ACTIVE'] ?></td>
											<td width="100" height="50"><a type="submit" class="w3-button w3-green" href=updateproductwebservice.php?ID=<?php echo $mostrar['PROD_ID'] ?>>CHANGE<a width="100" height="50"><a type="submit" class="w3-button w3-red" href=productwebservice.php?IDD=<?php echo $mostrar['PROD_ID'] ?>>DELETE</a></td>
										</tr>
										<?php
									}
										?>
					</table>
		</div>
		</div>


</body>
<script>
			function sel(){
				var value = document.getElementById("CATID").value;
				var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
							document.getElementById("SUBCAT").innerHTML = this.responseText;
					}
				};
				xhttp.open("GET", "subcategoriesselect.php?CATID="+value, true);
				xhttp.send();
			}

			function sel1(){
				var value1 = document.getElementById("SUBCAT").value;
				var xhttp1 = new XMLHttpRequest();
				xhttp1.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
							document.getElementById("LINEID").innerHTML = this.responseText;
					}
				};
				xhttp1.open("GET", "subcategoriesselect.php?LINEID="+value1, true);
				xhttp1.send();
			}

</script>
</html>
