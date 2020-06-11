<?PHP
include 'serviceinfo.php';

$json=array("foo", "bar", "hello", "world");

$conexion=mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);

		

            $order=$_POST['a'];
            echo "callate".$order;



?>
