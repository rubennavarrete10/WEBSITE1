<?PHP
include 'serviceinfo.php';

if(empty($_GET['IDD'])){
	if(empty($_GET['ID'])){
			$SCATID=$_POST['SCATID'];
			$CATID=$_POST['CATID'];
			$CATNAME=$_POST['SCATNAME'];
			$CATACTIVE=$_POST['SCATACTIVE'];
			$CATDESCRIPTION=$_POST['SCATDESCRIPTION'];

			$conexion=mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);
			$sql="INSERT INTO subcategories (SCAT_ID,SCAT_NAME,CAT_ID,ACTIVE,DESCRIPTION) VALUES('$SCATID','$CATNAME','$CATID','$CATACTIVE','$CATDESCRIPTION')";
			$ejecutar=mysqli_query($conexion,$sql);
	}
}

if(!empty($_GET['ID'])){
	$SCATID=$_POST['SCATID'];
	$CATID=$_POST['CATID'];
	$CATNAME=$_POST['SCATNAME'];
	$CATACTIVE=$_POST['SCATACTIVE'];
	$CATDESCRIPTION=$_POST['SCATDESCRIPTION'];

	      $conexion=mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);
	      $sql="UPDATE subcategories SET SCAT_NAME='$CATNAME', CAT_ID='$CATID', ACTIVE='$CATACTIVE' , DESCRIPTION='$CATDESCRIPTION' WHERE SCAT_ID = $SCATID";
	      $ejecutar=mysqli_query($conexion,$sql);
	}
	if(!empty($_GET['IDD'])){
		      $conexion=mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);
		      $sql="DELETE FROM subcategories WHERE SCAT_ID = {$_GET['IDD']}";
		      $ejecutar=mysqli_query($conexion,$sql);
		}
?>
	<html>
	<head>
	   <meta http-equiv = "refresh"
	   content = "0; url = subcategories.php">
	</head>
	</html>
