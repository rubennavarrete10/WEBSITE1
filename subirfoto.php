<?php

include 'serviceinfo.php';

    //$revisar = getimagesize($_FILES["PHOTO"]["tmp_name"]);
    //if($revisar !== false){
        $PHOTO = $_FILES['PHOTO']['tmp_name'];
        $PHOTODOC = addslashes(file_get_contents($PHOTO));

          $PRODUCTID=$_POST['PRODUCTID'];
          $PRODUCTNAME=$_POST['PRODUCTNAME'];
          $CATID=$_POST['CAT_ID'];
          $SCATID=$_POST['SCAT_ID'];
          $LINEID=$_POST['LINE_ID'];
          $PRODUCTDESCRIPTION=$_POST['PRODUCTDESCRIPTION'];
          $PRODUCTPRICE=$_POST['PRODUCTPRICE'];
          $PRODUCTACTIVE=$_POST['PRODUCTACTIVE'];


          $conexion=mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);
          $sql="INSERT INTO products (PROD_ID,PROD_NAME,CAT_ID,SCAT_ID,LINE_ID,DESCRIPTION,PHOTO,PRICE,ACTIVE) VALUES('$PRODUCTID','$PRODUCTNAME','$CATID','$SCATID','$LINEID','$PRODUCTDESCRIPTION','$PHOTODOC','$PRODUCTPRICE','$PRODUCTACTIVE')";
          $ejecutar=mysqli_query($conexion,$sql);


?>
<html>
<head>
   <meta http-equiv = "refresh"
   content = "0; url = product.php">
</head>
</html>
