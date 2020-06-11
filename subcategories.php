<?PHP
include 'serviceinfo.php';

	$conexion=mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>SUBCATEGORIES FILL SERVICE</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<!--para usar el scroll en las tablas-->
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
	<!--para usar el scroll en las tablas-->


	<body>
		<!--forma principal de la aplicacion-->
		<div id="menu" class="w3-top">
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
<!--formulario para mysql-->
	 <div id="add" class="w3-container w3-cyan">
	    <form action="subcategorieswebservice.php" method="POST">
	              <h2 class="w3-center w3-xlarge">ADD SUBCATEGORIE</h2>
								<p></p>
	              <a>SUBCATEGORIE ID <input type="text" name="SCATID" required>
								<a>SUBCATEGORIE NAME <input type="text" name="SCATNAME" required>
                <a>CATEGORIE NAME </a>
								<select name="CATID" required>

								<?php
								$sql="SELECT * FROM categories WHERE CAT_ID > 0";
								$ejecutar=mysqli_query($conexion,$sql);
								while ($mostrar = mysqli_fetch_array($ejecutar)){
									?>
									<option value="<?php echo $mostrar['CAT_ID'] ?>"><?php echo $mostrar['CAT_NAME'] ?></option>
								<?php
							}
								?>
								</select>
	              <a>ACTIVE <input type="text" name="SCATACTIVE" required>
	              <a>DESCRIPTION <input type="text" name="SCATDESCRIPTION" required></a></a></a></a>
	              <p></p>
	              <input type="reset" class="w3-button w3-red w3-right" value="CLEAR">
								<button type="submit" class="w3-button w3-green w3-right" >SAVE</button>
	    </form>
	 </div>

<!--encabezados de las tablas-->
			<h2 class="w3-center w3-xlarge">SUBCATEGORIE DATA BASE</h2>
			<div id=content  >
				<table class="w3-table-all">
				<tr>
					<th width="370" >SUBCATEGORIE ID</th>
					<th width="370" >SUBCATEGORIE NAME</th>
          <th width="370" >CATEGORIE ID</th>
					<th width="370" >ACTIVE</th>
					<th width="370" >DESCRIPTION</th>
					<th width="350" >CHANGE</th>
					<th></th>
				</tr>
			</table>
			</div>
<!--tabla autorellenable con mysql-->
			<div id="myDIV" class='w3-resposive'>
				<div id=content>
				<table class="w3-table-all ">

	                  <?php
	                  $sql="SELECT * FROM subcategories WHERE SCAT_ID > 0";
	                  $ejecutar=mysqli_query($conexion,$sql);
	                  while ($mostrar = mysqli_fetch_array($ejecutar)){

											$CATIDPERSONAL1=$mostrar['CAT_ID'];
											$sql1="SELECT CAT_NAME FROM categories WHERE CAT_ID = $CATIDPERSONAL1";
											$ejecutar1=mysqli_query($conexion,$sql1);
											$mostrar1 = mysqli_fetch_array($ejecutar1)
	                    ?>
	                  <tr>
	                    <td width="100"><?php echo $mostrar['SCAT_ID'] ?></td>
	                    <td width="100"><?php echo $mostrar['SCAT_NAME'] ?></td>
                      <td width="100"><?php echo $mostrar1['CAT_NAME'] ?></td>
	                    <td width="100"><?php echo $mostrar['ACTIVE'] ?></td>
	                    <td width="100"><?php echo $mostrar['DESCRIPTION'] ?></td>
	                    <td width="100" height="50"><a type="submit" class="w3-button w3-green" href=updatesubcategorieswebservice.php?ID=<?php echo $mostrar['SCAT_ID'] ?>>CHANGE <a width="100" height="50"><a type="submit" class="w3-button w3-red" href=subcategorieswebservice.php?IDD=<?php echo $mostrar['SCAT_ID'] ?>>DELETE</a></td>
	                  </tr>
	                  <?php
	                }
	                  ?>
	        </table>
	  	</div>
		</div>
	</body>


</html>
