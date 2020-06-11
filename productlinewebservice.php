<?PHP
include 'serviceinfo.php';

if(empty($_GET['IDD'])){
		if(empty($_GET['ID'])){
			$LINEID=$_POST['LINEID'];
			$CATID=$_POST['CATID'];
			$SCATID=$_POST['SCATID'];
			$LINENAME=$_POST['LINENAME'];
			$PRODUCTLINEACTIVE=$_POST['PRODUCTLINEACTIVE'];
			$PRODUCTLINEDESCRIPTION=$_POST['PRODUCTLINEDESCRIPTION'];

			$conexion=mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);
			$sql="INSERT INTO prod_lines (LINE_ID,LINE_NAME,CAT_ID,SCAT_ID,ACTIVE,DESCRIPTION) VALUES('$LINEID','$LINENAME','$CATID','$SCATID','$PRODUCTLINEACTIVE','$PRODUCTLINEDESCRIPTION')";
			$ejecutar=mysqli_query($conexion,$sql);

	}
}
if(!empty($_GET['ID'])){
	$LINEID=$_POST['LINEID'];
	$CATID=$_POST['CATID'];
	$SCATID=$_POST['SCATID'];
	$LINENAME=$_POST['LINENAME'];
	$PRODUCTLINEACTIVE=$_POST['PRODUCTLINEACTIVE'];
	$PRODUCTLINEDESCRIPTION=$_POST['PRODUCTLINEDESCRIPTION'];

	      $conexion=mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);
	      $sql="UPDATE prod_lines SET CAT_ID='$CATID', SCAT_ID='$SCATID', LINE_NAME='$LINENAME', ACTIVE='$PRODUCTLINEACTIVE' , DESCRIPTION='$PRODUCTLINEDESCRIPTION' WHERE LINE_ID = $LINEID";
	      $ejecutar=mysqli_query($conexion,$sql);

	}
	if(!empty($_GET['IDD'])){
		      $conexion=mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);
		      $sql="DELETE FROM prod_lines WHERE LINE_ID = {$_GET['IDD']}";
		      $ejecutar=mysqli_query($conexion,$sql);


		}
?>
<html>
<head>
	 <meta http-equiv = "refresh"
	 content = "0; url = productline.php">
</head>
</html>
