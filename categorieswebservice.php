<?PHP
include 'serviceinfo.php';

if(empty($_GET['IDD'])){
	if(empty($_GET['ID'])){
			$CATID=$_POST['CATID'];
			$CATNAME=$_POST['CATNAME'];
			$CATACTIVE=$_POST['CATACTIVE'];
			$CATDESCRIPTION=$_POST['CATDESCRIPTION'];

			$conexion=mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);
			$sql="INSERT INTO categories (CAT_ID,CAT_NAME,ACTIVE,DESCRIPTION) VALUES('$CATID','$CATNAME','$CATACTIVE','$CATDESCRIPTION')";
			$ejecutar=mysqli_query($conexion,$sql);

			/*if(!$ejecutar){
				echo"Hubo Algun Error";
			}else{
				echo"Datos Guardados Correctamente<br><a href='categories.php'>Volver</a>";
			}*/
	}
}

if(!empty($_GET['ID'])){
	$CATID=$_POST['CATID'];
	$CATNAME=$_POST['CATNAME'];
	$CATACTIVE=$_POST['CATACTIVE'];
	$CATDESCRIPTION=$_POST['CATDESCRIPTION'];

	      $conexion=mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);
	      $sql="UPDATE categories SET CAT_NAME='$CATNAME', ACTIVE='$CATACTIVE' , DESCRIPTION='$CATDESCRIPTION' WHERE CAT_ID = $CATID";
	      $ejecutar=mysqli_query($conexion,$sql);

	      /*if(!$ejecutar){
	        echo"Hubo Algun Error UPDATE<br><a href='updatecategorieswebservice.php?ID=$CATID'>Volver</a>";
	      }
	      else{
	        echo"Datos Guardados Correctamente UPDATE<br><a href='categories.php'>Volver</a>";
	      }*/
	}
	if(!empty($_GET['IDD'])){
		      $conexion=mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);
		      $sql="DELETE FROM categories WHERE CAT_ID = {$_GET['IDD']}";
		      $ejecutar=mysqli_query($conexion,$sql);

		      /*if(!$ejecutar){
		        echo"Hubo Algun Error DELETE<br><a href='categories.php>Volver</a>";
		      }
		      else{
		        echo"Datos Guardados Correctamente DELETE<br><a href='categories.php'>Volver</a>";
		      }*/
		}
?>
	<html>
	<head>
	   <meta http-equiv = "refresh"
	   content = "0; url = categories.php">
	</head>
	</html>
