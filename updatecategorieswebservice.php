<html>
	<head>
		<title>FOOD SERVICE</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
      $sql="SELECT * FROM categories WHERE CAT_ID = {$_GET['ID']}";
      $ejecutar=mysqli_query($conexion,$sql);

      while ($mostrar = mysqli_fetch_array($ejecutar)){
        ?>

        <body>
          <div class="w3-container w3-cyan">
            <form action="categorieswebservice.php?ID=UPDATE" method="POST" enctype="multipart/form-data">
                      <h2 class="w3-center w3-xlarge">UPDATE CATEGORIES </h2>
                      <p></p>
                      <a>CATEGORIE ID <input type="text" name="CATID" required placeholder="NEW PRODUCT ID" value="<?php echo $mostrar['CAT_ID'] ?>">
                      <a>CATEGORIE NAME <input type="text" name="CATNAME" required placeholder="NEW PRODUCT NAME" value="<?php echo $mostrar['CAT_NAME'] ?>"></a></a></a></a>
											<a>ACTIVE <input type= “text” name="CATACTIVE" required placeholder="NEW PRODUCT ACTIVE" value="<?php echo $mostrar['ACTIVE'] ?>">
                      <a>DESCRIPTION <input type= “text” name="CATDESCRIPTION" required placeholder="NEW PRODUCT DESCRIPTION" value="<?php echo $mostrar['DESCRIPTION'] ?>">
                      </a></a></a></a>
                      <p></p>
                      <a class="w3-button w3-white w3-right"  href="categories.php">BACK</a>
                      <button type="submit" class="w3-button w3-green w3-right" >UPDATE</button>
            </form>
          </div>
      	</body>

      <?php
      }
    }
    ?>
</html>
