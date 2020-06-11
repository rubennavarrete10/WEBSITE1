<?PHP
include 'serviceinfo.php';

	$conexion=mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>PRODUCT LINE FILL SERVICE</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

		<style>
			#myDIV {
			  height: 540px;
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
 	    <form action="productlinewebservice.php" method="POST">
 	              <h2 class="w3-center w3-xlarge">ADD PRODUCT LINE</h2>
 								<p></p>
 	              <a>LINE ID <input type="text" name="LINEID" required>
 								<a>LINE NAME <input type="text" name="LINENAME" required>
								<a>CATEGORIE NAME </a>

											<select id="CATID" name="CATID" onchange="sel()" required>
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

								<a>SUBCATEGORIE NAME </a>

										<select id="SUBCAT" name="SCATID" required>
										<option selected="true" disabled="disabled">select option</option>
										</select>

 	              <a>ACTIVE <input type="text" name="PRODUCTLINEACTIVE" required>
 	              <p>DESCRIPTION <input type="text" name="PRODUCTLINEDESCRIPTION" required></p></a></a></a>
 	              <p></p>
 	              <input type="reset" class="w3-button w3-red w3-right" value="CLEAR">
 								<button type="submit" class="w3-button w3-green w3-right" >SAVE</button>
 	    </form>
 	 </div>

	 		<h2 class="w3-center w3-xlarge">LINE DATA BASE</h2>
			<div id=content  >
				<table class="w3-table-all">
				<tr>
					<th width="370" >LINE ID</th>
					<th width="370" >LINE NAME</th>
					<th width="370" >CATEGORIE ID</th>
					<th width="370" >SUBCATEGORIE ID</th>
					<th width="370" >ACTIVE</th>
					<th width="370" >DESCRIPTION</th>
					<th width="350" >CHANGE</th>
					<th></th>
				</tr>
			</table>
			</div>

 			<div id="myDIV" class="w3-resposive">
 				<div id=content>
 				<table class="w3-table-all ">

 	                  <?php
 	                  $sql="SELECT * FROM prod_lines WHERE LINE_ID > 0 ";
 	                  $ejecutar=mysqli_query($conexion,$sql);
 	                  while ($mostrar = mysqli_fetch_array($ejecutar)){
 	                    ?>
 	                  <tr>
 	                    <td width="100"><?php echo $mostrar['LINE_ID'] ?></td>
 	                    <td width="100"><?php echo $mostrar['LINE_NAME'] ?></td>
											<td width="100"><?php echo $mostrar['CAT_ID'] ?></td>
											<td width="100"><?php echo $mostrar['SCAT_ID'] ?></td>
 	                    <td width="100"><?php echo $mostrar['ACTIVE'] ?></td>
 	                    <td width="100"><?php echo $mostrar['DESCRIPTION'] ?></td>
 	                    <td width="100" height="50"><a type="submit" class="w3-button w3-green" href=updatelinewebservice.php?ID=<?php echo $mostrar['LINE_ID'] ?>>CHANGE<a width="100" height="50"><a type="submit" class="w3-button w3-red" href=productlinewebservice.php?IDD=<?php echo $mostrar['LINE_ID'] ?>>DELETE</a></td>
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


</script>
</html>
