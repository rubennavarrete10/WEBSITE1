<table>
<?php
include 'serviceinfo.php';

$conexion=mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);

if(!empty($_GET['MSC'])){
    $msc=$_GET['MSC'];

	$a=1;
	$sql="SELECT * FROM products WHERE CAT_ID = $msc";
	$ejecutar=mysqli_query($conexion,$sql);
	while ($mostrar = mysqli_fetch_array($ejecutar)){

		if($a>=6)
		{
    		$a=1;
			echo "<tr></tr>";
		}
        
        $a++;
        
		echo "<td>";
		echo	"<div class='w3-container'>";
        echo       "<div class='w3-card-4 w3-white'>";
        echo            "<div class='w3-container w3-center'>";
        echo                "<img src=getphoto.php?ID=".$mostrar['PROD_ID']." alt='NOT IMAGE' width='300' height='300' />";
        echo                    "<h3.".$mostrar['PROD_NAME']."</h3>";
        echo                    "<h5>".$mostrar['DESCRIPTION']."</h5>";
        echo                    "<a>$ </a><a id=P".$mostrar['PROD_ID'].">".$mostrar['PRICE']."</a>";
        echo                    "<div class='w3-section'>";
        echo                            "<p>QTY</p>";
        echo                            "<button  class='w3-button w3-white w3-border' onclick='refreshqtydown(".$mostrar['PROD_ID'].")'>-</button>";
        echo                            "<a id='QTY".$mostrar['PROD_ID']."'> 0 </a>";
        echo                            "<button  class='w3-button w3-white w3-border' onclick='refreshqtyup(".$mostrar['PROD_ID'].")' >+</button>";
        echo                            "<p></p>";
        echo                            "<button  class='w3-button w3-green' onclick='funcionAdd(".$mostrar['PROD_ID'].")' >Add</button>";
        echo                    "</div>";
        echo            "</div>";
        echo        "</div>";
		echo	"</div>";
		echo "</td>";
	 }	
}

if(!empty($_GET['MSSC'])){
    $mssc=$_GET['MSSC'];

	$a=1;
	$sql="SELECT * FROM products WHERE SCAT_ID = $mssc";
	$ejecutar=mysqli_query($conexion,$sql);
	while ($mostrar = mysqli_fetch_array($ejecutar)){

		if($a>=6)
		{
    		$a=1;
			echo "<tr></tr>";
		}
        
        $a++;
        
		echo "<td>";
		echo	"<div class='w3-container'>";
        echo       "<div class='w3-card-4 w3-white'>";
        echo            "<div class='w3-container w3-center'>";
        echo                "<img src=getphoto.php?ID=".$mostrar['PROD_ID']." alt='NOT IMAGE' width='300' height='300' />";
        echo                    "<h3.".$mostrar['PROD_NAME']."</h3>";
        echo                    "<h5>".$mostrar['DESCRIPTION']."</h5>";
        echo                    "<a>$ </a><a id=P".$mostrar['PROD_ID'].">".$mostrar['PRICE']."</a>";
        echo                    "<div class='w3-section'>";
        echo                            "<p>QTY</p>";
        echo                            "<button  class='w3-button w3-white w3-border' onclick='refreshqtydown(".$mostrar['PROD_ID'].")'>-</button>";
        echo                            "<a id='QTY".$mostrar['PROD_ID']."'> 0 </a>";
        echo                            "<button  class='w3-button w3-white w3-border' onclick='refreshqtyup(".$mostrar['PROD_ID'].")' >+</button>";
        echo                            "<p></p>";
        echo                            "<button  class='w3-button w3-green' onclick='funcionAdd(".$mostrar['PROD_ID'].")' >Add</button>";
        echo                    "</div>";
        echo            "</div>";
        echo        "</div>";
		echo	"</div>";
		echo "</td>";
	 }	
}

if(!empty($_GET['MSL'])){
    $msl=$_GET['MSL'];

	$a=1;
	$sql="SELECT * FROM products WHERE LINE_ID = $msl";
	$ejecutar=mysqli_query($conexion,$sql);
	while ($mostrar = mysqli_fetch_array($ejecutar)){

		if($a>=6)
		{
    		$a=1;
			echo "<tr></tr>";
		}
        
        $a++;
        
		echo "<td>";
		echo	"<div class='w3-container'>";
        echo       "<div class='w3-card-4 w3-white'>";
        echo            "<div class='w3-container w3-center'>";
        echo                "<img src=getphoto.php?ID=".$mostrar['PROD_ID']." alt='NOT IMAGE' width='300' height='300' />";
        echo                    "<h3.".$mostrar['PROD_NAME']."</h3>";
        echo                    "<h5>".$mostrar['DESCRIPTION']."</h5>";
        echo                    "<a>$ </a><a id=P".$mostrar['PROD_ID'].">".$mostrar['PRICE']."</a>";
        echo                    "<div class='w3-section'>";
        echo                            "<p>QTY</p>";
        echo                            "<button  class='w3-button w3-white w3-border' onclick='refreshqtydown(".$mostrar['PROD_ID'].")'>-</button>";
        echo                            "<a id='QTY".$mostrar['PROD_ID']."'> 0 </a>";
        echo                            "<button  class='w3-button w3-white w3-border' onclick='refreshqtyup(".$mostrar['PROD_ID'].")' >+</button>";
        echo                            "<p></p>";
        echo                            "<button  class='w3-button w3-green' onclick='funcionAdd(".$mostrar['PROD_ID'].")' >Add</button>";
        echo                    "</div>";
        echo            "</div>";
        echo        "</div>";
		echo	"</div>";
		echo "</td>";
	 }	
}

if(!empty($_GET['MSD'])){
    echo "<div class='w3-container w3-center w3-cyan w3-large'>";
    echo "<h1>ESTA ES LA PAGINA PRINCIPAL DEL CLIENTE</h1>";
    echo "<img src='relleno.jpg' alt='Avatar' style='width:80%'>";
    echo "</div>";
}?>
</table>
