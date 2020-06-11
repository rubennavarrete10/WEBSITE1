<?PHP
include 'serviceinfo.php';

if(!empty($_GET['ID'])){
	$conexion=mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);
	$result = $conexion->query("SELECT PHOTO FROM products WHERE PROD_ID = {$_GET['ID']}");

    if($result->num_rows > 0){
        $imgDatos = $result->fetch_assoc();
        header("Content-type: image/jpg");
        echo $imgDatos['PHOTO'];
    }else{
        echo 'Imagen no existe...';
    }

	}
?>
