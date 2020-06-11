<?php
include 'serviceinfo.php';

if(empty($_GET['IDD'])){
      if(empty($_GET['ID'])){
            $PRODUCTID=$_POST['PRODUCTID'];
            $PRODUCTNAME=$_POST['PRODUCTNAME'];
            $CATID=$_POST['CAT_ID'];
            $SCATID=$_POST['SCAT_ID'];
            $LINEID=$_POST['LINE_ID'];
            $PRODUCTDESCRIPTION=$_POST['PRODUCTDESCRIPTION'];
            $PRODUCTPRICE=$_POST['PRODUCTPRICE'];
            $PRODUCTACTIVE=$_POST['PRODUCTACTIVE'];

      			$PHOTO = $_FILES['PHOTO']['tmp_name'];
      			$PHOTODOC = addslashes(file_get_contents($PHOTO));

            $conexion=mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);
            $sql="INSERT INTO products (PROD_ID,PROD_NAME,CAT_ID,SCAT_ID,LINE_ID,DESCRIPTION,PHOTO,PRICE,ACTIVE) VALUES('$PRODUCTID','$PRODUCTNAME','$CATID','$SCATID','$LINEID','$PRODUCTDESCRIPTION','$PHOTODOC','$PRODUCTPRICE','$PRODUCTACTIVE')";
            $ejecutar=mysqli_query($conexion,$sql);

            /*if(!$ejecutar){
              echo"Hubo Algun Error INSERT";
            }
            else{
              echo"Datos Guardados Correctamente<br><a href='product.php'>Volver</a>";
            }*/
  }
}
if(!empty($_GET['ID'])){
      $PRODUCTID=$_POST['PRODUCTID'];
      $PRODUCTNAME=$_POST['PRODUCTNAME'];
      $CATID=$_POST['CAT_ID'];
      $SCATID=$_POST['SCAT_ID'];
      $LINEID=$_POST['LINE_ID'];
      $PRODUCTDESCRIPTION=$_POST['PRODUCTDESCRIPTION'];
      $PRODUCTPRICE=$_POST['PRODUCTPRICE'];
      $PRODUCTACTIVE=$_POST['PRODUCTACTIVE'];


      $conexion=mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);
      //$sql="INSERT INTO products (PROD_ID,PROD_NAME,CAT_ID,LINE_ID,DESCRIPTION,PHOTO,PRICE,ACTIVE) VALUES('$PRODUCTID','$PRODUCTNAME','$CATID','$LINEID','$PRODUCTDESCRIPTION','$PHOTODOC','$PRODUCTPRICE','$PRODUCTACTIVE')";
      if(empty($_FILES['PHOTO']['tmp_name'])){
        $sql="UPDATE products SET PROD_NAME='$PRODUCTNAME', CAT_ID='$CATID', SCAT_ID='$SCATID', LINE_ID='$LINEID', DESCRIPTION='$PRODUCTDESCRIPTION', PRICE='$PRODUCTPRICE', ACTIVE='$PRODUCTACTIVE' WHERE PROD_ID = $PRODUCTID";
      }
      else {
        $PHOTO = $_FILES['PHOTO']['tmp_name'];
        $PHOTODOC = addslashes(file_get_contents($PHOTO));
        $sql="UPDATE products SET PROD_NAME='$PRODUCTNAME', CAT_ID='$CATID', SCAT_ID='$SCATID', LINE_ID='$LINEID', DESCRIPTION='$PRODUCTDESCRIPTION', PHOTO='$PHOTODOC', PRICE='$PRODUCTPRICE', ACTIVE='$PRODUCTACTIVE' WHERE PROD_ID = $PRODUCTID";
      }
      $ejecutar=mysqli_query($conexion,$sql);

      /*if(!$ejecutar){
        echo"Hubo Algun Error UPDATE<br><a href='updateproductwebservice.php?ID=$PRODUCTID'>Volver</a>";
      }
      else{
        echo"Datos Guardados Correctamente UPDATE<br><a href='product.php'>Volver</a>";
      }*/
}
if(!empty($_GET['IDD'])){
        $conexion=mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);
        $sql="DELETE FROM products WHERE PROD_ID = {$_GET['IDD']}";
        $ejecutar=mysqli_query($conexion,$sql);

      /*  if(!$ejecutar){
          echo"Hubo Algun Error DELETE<br><a href='product.php'>Volver</a>";
        }
        else{
          echo"Datos Guardados Correctamente DELETE<br><a href='product.php'>Volver</a>";
        }*/
  }
?>
<html>
<head>
   <meta http-equiv = "refresh"
   content = "0; url = product.php">
</head>
</html>
