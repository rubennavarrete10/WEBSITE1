<html>
	<head>
		<title>FOOD SERVICE</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	</head>

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

<?php
include 'serviceinfo.php';

if(!empty($_GET['ID'])){
      $conexion=mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);
      $sql="SELECT * FROM prod_lines WHERE LINE_ID = {$_GET['ID']}";
      $ejecutar=mysqli_query($conexion,$sql);

      while ($mostrar = mysqli_fetch_array($ejecutar)){
        ?>

        <body>
          <div class="w3-container w3-cyan">
            <form action="productlinewebservice.php?ID=UPDATE" method="POST" enctype="multipart/form-data">
                      <h2 class="w3-center w3-xlarge">UPDATE LINE </h2>
                      <p></p>
                      <a>LINE ID <input type="text" name="LINEID" required placeholder="NEW PRODUCT ID" value="<?php echo $mostrar['LINE_ID'] ?>"></a>
                      <a>LINE NAME <input type="text" name="LINENAME" required placeholder="NEW PRODUCT NAME" value="<?php echo $mostrar['LINE_NAME'] ?>"></a>
											<a>CATEGORIE NAME</a>
													<select id="CATID" name="CATID" onchange="sel()" required>
														<?PHP
														$CATIDPERSONAL1=$mostrar['CAT_ID'];
														$sql1="SELECT * FROM categories WHERE CAT_ID = $CATIDPERSONAL1";
														$ejecutar1=mysqli_query($conexion,$sql1);
														$mostrar1 = mysqli_fetch_array($ejecutar1)
														?>
													<option selected value="<?php echo $mostrar1['CAT_ID'] ?>"><?php echo $mostrar1['CAT_NAME'] ?> ASIGNED</option>

													<?php
													$z=0;
													$sql1="SELECT * FROM categories WHERE CAT_ID > 0";
													$ejecutar1=mysqli_query($conexion,$sql1);
													while ($mostrar1 = mysqli_fetch_array($ejecutar1)){
														$z++;
														?>
														<option value="<?php echo $mostrar1['CAT_ID'] ?>"><?php echo $mostrar1['CAT_NAME'] ?></option>
													<?php
													}
													?>
													</select>
											<a>SUBCATEGORIE NAME</a>
															<select id="SUBCAT" name="SCATID" required>
															<?PHP
															$CATIDPERSONAL1=$mostrar['SCAT_ID'];
															$sql1="SELECT * FROM subcategories WHERE SCAT_ID = $CATIDPERSONAL1";
															$ejecutar1=mysqli_query($conexion,$sql1);
															$mostrar1 = mysqli_fetch_array($ejecutar1)
															?>

														<option selected value="<?php echo $mostrar1['SCAT_ID'] ?>"><?php echo $mostrar1['SCAT_NAME'] ?> ASIGNED</option>

														</select>








											<a>ACTIVE <input type= “text” name="PRODUCTLINEACTIVE" required placeholder="NEW PRODUCT ACTIVE" value="<?php echo $mostrar['ACTIVE'] ?>"></a>
                      <p>DESCRIPTION <input type= “text” name="PRODUCTLINEDESCRIPTION" required placeholder="NEW PRODUCT DESCRIPTION" value="<?php echo $mostrar['DESCRIPTION'] ?>"></p>
                      <p></p>
                      <a class="w3-button w3-white w3-right"  href="productline.php">BACK</a>
                      <button type="submit" class="w3-button w3-green w3-right" >UPDATE</button>
            </form>
          </div>
      	</body>

      <?php
      }
    }
    ?>

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
