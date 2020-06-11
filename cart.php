<?php

include 'serviceinfo.php';

	$conexion=mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);

		if(!empty($_GET['idcart'])&&!empty($_GET['qty'])&&!empty($_GET['price'])&&!empty($_GET['iditem'])){
		 $idcart=$_GET['idcart'];
		 $qty=$_GET['qty'];
		 $price=$_GET['price'];
		 $iditem=$_GET['iditem'];
		}
		else {
			$idcart=0;
			$qty=0;
 		 	$price=0;
			$iditem = 0;
		}
		$conexion=mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);
		$sql="SELECT * FROM products WHERE PROD_ID = $idcart";
		$ejecutar=mysqli_query($conexion,$sql);
		while ($mostrar = mysqli_fetch_array($ejecutar)){

			echo "<tr>";
			echo "<td id=remove".$iditem." width=160px ><img src=getphoto.php?ID=".$mostrar['PROD_ID']." alt='NOT IMAGE' width=100 height=100 /></td>";
			echo "<td id=remove1".$iditem." width=155px >" . $mostrar['PROD_NAME']."<p>$ <a>".$mostrar['PRICE']."</a></p></td>";
			echo "<td  id=remove2".$iditem." width=130px >" .  $qty . "</td>";
			echo "<td id=remove3".$iditem." width=130px >" .  $price . "</td>";
			echo "<td id=remove4".$iditem." >" . $mostrar['DESCRIPTION'] . "</td>";
			echo "<a id=remove5".$iditem." class='w3-button w3-white w3-hover-red w3-xlarge' onclick=remove(".$iditem.",".$idcart.",".$qty.")>x</a>";
			echo "</tr>";

		}

?>
