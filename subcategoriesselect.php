<?php
include 'serviceinfo.php';
$conexion=mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);

if(!empty($_GET['CATID'])){
    $CATID=$_GET['CATID'];
    $sql="SELECT * FROM subcategories WHERE CAT_ID = $CATID";
    $ejecutar=mysqli_query($conexion,$sql);

    echo "<option selected=TRUE disabled=disabled value=0>select option</option>";
    while ($mostrar = mysqli_fetch_array($ejecutar)){
     echo "<option value=".$mostrar['SCAT_ID'].">".$mostrar['SCAT_NAME']."</option>";

    }
}

if(!empty($_GET['LINEID'])){
    $CATID=$_GET['LINEID'];
    $sql="SELECT * FROM prod_lines WHERE SCAT_ID = $CATID";
    $ejecutar=mysqli_query($conexion,$sql);

    echo "<option selected=TRUE disabled=disabled value=0>select option</option>";
    while ($mostrar = mysqli_fetch_array($ejecutar)){
     echo "<option value=".$mostrar['LINE_ID'].">".$mostrar['LINE_NAME']."</option>";
    }
}
?>
