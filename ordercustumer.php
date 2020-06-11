<?PHP
	include 'serviceinfo.php';

	$conexion=mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);

	$items="0";
	$QTY=0;
?>

<!DOCTYPE html>
<html>
	<head>
		<title>FOOD MARKET</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<style>
			#myDIV {
			  height: 780px;
			  width: 1920px;
			  overflow: auto;
			}
			#content {
			  height: auto;
			  width: 1900px;
			  background-color: white;
			}
			#myDIVpay {
			  height: 500px;
			  width: 	900px;
			  overflow: auto;
			}
			#contentpay {
			  height: auto;
			  width: 900px;
			  background-color: white;
			}
			#contentpay1 {
			  height: auto;
			  width: 900px;
			  background-color: white;
			}
			</style>

			<style type="text/css">
			
			* {
				margin:0px;
				padding:0px;
			}
			
			#header {
				margin:auto;
				width:auto;
				position:lefth;
				font-family:Arial, Helvetica, sans-serif;
			}
			
			ul, ol {
				list-style:none;
			}
			
			.nav > li {
				float:left;
			}
			
			.nav li a {
				background-color:#000;
				color:#fff;
				text-decoration:none;
				padding:10px 12px;
				display:block;
			}
			
			.nav li a:hover {
				background-color:#434343;
			}
			
			.nav li ul {
				display:none;
				position:absolute;
				min-width:200px;
			}
			
			.nav li:hover > ul {
				display:block;
			}
			
			.nav li ul li {
				position:relative;
			}
			
			.nav li ul li ul {
				right:-200px;
				top:0px;
			}
			
		</style>
		

	</head>

	<script>
	var orderdetails = [][];
	 var idqty = [];
	for(var ciclo=1; ciclo<=500000; ciclo++){
		 idqty[ciclo] = 0;
		 
	}
	 
	 var item=0;
	 var list=0;
	 var price=0;
	 var a=0;
	 var cuenta = 0.0;
	</script>

<body>

<!--aqui es el header-->
	<div class="w3-top">
		<div class="w3-container w3-blue w3-center " >

			<a href="ordercustumer.php" ><img src="logoexample.png" style="width:7%" class="w3-round w3-padding-16 w3-left"><a href="ordercustumer.php" style="text-decoration:none" class="w3-blue w3-center w3-xxlarge w3-text-white">FOOD MARKET <a class=" w3-right w3-xlarge w3-text-black " >HOT SALES EVERYDAY</a></a></a>
			<p></p>
			<a id='items' class=" w3-right w3-large w3-text-black "><?php echo $items ?></a>
			<img src="cart.png" style="width:4%" class=" w3-btn w3-round w3-blue w3-right " onclick="document.getElementById('id01').style.display='block'">
		</div>



<!--aqui es el buscador-->
		<div class="w3-bar w3-black">
			<div id="header">
				<ul class="nav">
					<li><a class=" w3-medium w3-button ">Inicio</a></li>
					<li><a class=" w3-medium w3-button" onclick="departamentos()">Departamentos</a>
						<ul>
								<?php
								$buscador=1;
								$sql="SELECT * FROM categories WHERE CAT_ID > 0";
								$ejecutar=mysqli_query($conexion,$sql);
								while ($mostrar = mysqli_fetch_array($ejecutar)){
								?>
									<li><a id="dep<?php echo $mostrar['CAT_ID']; ?>"   class="w3-green w3-text-white w3-medium w3-button " onclick="categorias(<?php echo $mostrar['CAT_ID']; ?>)"><?php echo $mostrar['CAT_NAME']; ?></a>
										<ul>
											<?php
												$selector=$mostrar['CAT_ID'];
												$sql1="SELECT * FROM subcategories WHERE CAT_ID = $selector";
												$ejecutar1=mysqli_query($conexion,$sql1);
												while ($mostrar1 = mysqli_fetch_array($ejecutar1)){
											?>
											<li><a id="sub<?php echo $mostrar1['SCAT_ID']; ?>"  class="w3-white w3-medium w3-button w3-text-green " onclick="subcategorias(<?php echo $mostrar1['SCAT_ID']; ?>)" ><?php echo $mostrar1['SCAT_NAME']; ?></a>
													

														<ul>
															<?php
																$selector1=$mostrar1['SCAT_ID'];
																$sql2="SELECT * FROM prod_lines WHERE SCAT_ID = $selector1";
																$ejecutar2=mysqli_query($conexion,$sql2);
																while ($mostrar2 = mysqli_fetch_array($ejecutar2)){
															?>
															<li><a id="line<?php echo $mostrar2['LINE_ID']; ?>"   class="w3-white w3-medium w3-button w3-text-green" onclick="lineas(<?php echo $mostrar2['LINE_ID']; ?>)"><?php echo $mostrar2['LINE_NAME']; ?></a></li>

															<?php } ?>

														</ul>
											
											</li>

											<?php } ?>

										</ul>
									</li>
									
								<?php } ?>
								
						</ul>
					</li>

						<li><a class=" w3-medium w3-button ">Acerca de</a>
							
						</li>

						<li><a class=" w3-medium w3-button ">Contacto</a></li>
				</ul>
			</div>
		</div>

<!--aqui es la pagina con los items-->
			<div id="myDIV" class="w3-resposive">
				<div id=content>
					<table id="menuselected" class="w3-table ">
						<td class="w3-container w3-center w3-cyan w3-large">
							<h1>ESTA ES LA PAGINA PRINCIPAL DEL CLIENTE</h1>
							<img src="relleno.jpg" alt="Avatar" style="width:80%">
						</td>
					</table>
				</div>
			</div>






<!--aqui es el cart del shoping diseno y logica basica-->
		<div id="id01" class="w3-modal">
    <div class="w3-modal-content">

      <header class="w3-container w3-white">
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-btn w3-hover-red w3-display-topright">&times;</span>
        <h2 class="w3-center">YOUR CART</h2>
				<h5 id=itemcart >ITEMS 0</h5>
      </header>

			<div id=contentpay >
				<table class="w3-table ">
				<tr>
					<th width="160px" >IMAGE</th>
					<th width="155px" >NAME</th>
					<th width="130px" >QTY</th>
					<th width="130px" >SUBTOTAL</th>
					<th  >DESCRIPTION</th>
				</tr>
			</table>
			</div>
				<div id="myDIVpay" class="w3-resposive">
				<div id=contenpay>
				<table id=tablecart class="w3-table ">

					</table>
				</div>
			</div>

      <footer class="w3-container w3-center w3-white">
				<p></p>
				<h1>Product Total <a id="cuenta" class="w3-right">0.00</a><a class="w3-right"> $ </a></H1>
        <a  class="w3-btn w3-yellow w3-right w3-xlarge"  onclick="document.getElementById('id02').style.display='block',document.getElementById('id01').style.display='none'">Checkout</a>
      </footer>
    </div>
  	</div>



<!--es checkout-->
	<div id="id02" class="w3-modal">
    	<div class="w3-modal-content">

		<header class="w3-container w3-white">
			<span onclick="document.getElementById('id02').style.display='none'" class="w3-btn w3-hover-red w3-display-topright">&times;</span>
		</header>

				<div id="myDIVpay" class="w3-resposive">
				<div id=contenpay1>


					<form action="paymetod.php" method="POST" class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin">
						<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
						<h2 class="w3-center">Contact Information</h2>

						<div class="w3-row w3-section">
						  <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
						    <div class="w3-rest">
						      <input class="w3-input w3-border" name="first" type="text" placeholder="First Name" required>
						    </div>
						</div>

						<div class="w3-row w3-section">
						  <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
						    <div class="w3-rest">
						      <input class="w3-input w3-border" name="last" type="text" placeholder="Last Name" required>
						    </div>
						</div>

						<div class="w3-row w3-section">
						  <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-envelope-o"></i></div>
						    <div class="w3-rest">
						      <input class="w3-input w3-border" name="email" type="text" placeholder="Email" required>
						    </div>
						</div>

						<div class="w3-row w3-section">
						  <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-phone"></i></div>
						    <div class="w3-rest">
						      <input class="w3-input w3-border" name="phone" type="text" placeholder="Phone" required>
						    </div>
						</div>

						<div class="w3-row w3-section">
						  <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-pencil"></i></div>
						    <div class="w3-rest">
						      <input class="w3-input w3-border" name="message" type="text" placeholder="Message (optional)">
						    </div>
						</div>
						<p><input class="w3-radio" type="radio" name="DELIVERY" onclick="document.getElementById('ship').style.display='none',document.getElementById('store').style.display='block', requireddelete()" required><label>Pickup at store</label></p>
						<p id="store">1601 W State Hwy 114, Grapevine, TX 76051, Estados Unidos</p>
					  <p><input class="w3-radio" type="radio" name="DELIVERY" onclick="document.getElementById('store').style.display='none',document.getElementById('ship').style.display='block', requiredadd()" ><label>Shipping to</label></p>


						<div id="ship" class="w3-card" >
					  <input class="w3-input w3-border" id="street" name="street" type="text" placeholder="Street address">
						<input class="w3-input w3-border" id="apt" name="apt" type="text" placeholder="Apt,Suite,Unit,Building (optionl)">
						<input class="w3-input w3-border" id="city" name="city" type="text" placeholder="City">
						<input class="w3-input w3-border" id="state" name="state" type="text" placeholder="State / Province / Region">
						<input class="w3-input w3-border" id="zip" name="zip" type="text" placeholder="ZIP code">
						</div>




				</div>
			</div>

      <footer class="w3-container w3-center w3-white">
				<p></p>
				<h1>Product Total <a id="cuenta" class="w3-right">0.00</a><a class="w3-right"> $ </a></H1>
				<button type="submit"class="w3-btn w3-yellow w3-right w3-xlarge" onmouseover="paymetods()">PAY METHOD</button>
      </footer>
			</form>
    </div>
  	</div>

</body>







<!--|| esto es or-->
		<head>

				<script>
				<?php //$mostrar['PRICE']=10;	echo ' var pricetext="'.$mostrar['PRICE'].'"; '; ?>

					function refreshqtyup(id) {
						var qty = idqty[id];
						qty++;
						idqty[id]=qty;
						document.getElementById("QTY"+id).innerHTML = " "+idqty[id]+" " ;
				  }

					function refreshqtydown(id) {
						var qty = idqty[id];
						if(idqty[id] > 0){
						qty--;
						idqty[id]=qty;
						document.getElementById("QTY"+id).innerHTML = " "+idqty[id]+" " ;
						}
				  }

					function funcionAdd(id) {
						if(idqty[id] != 0 && idqty[id] != "") {
							list++;
							item++;
							var pricetext = document.getElementById("P"+id).innerText;
							price= parseFloat(pricetext);

							//orderdetails[0]][0]=id;
							//orderdetails[list]][1]=idqty[id];*/
							

							price=idqty[id]*price;
							cuenta = cuenta + price;

							var table = document.getElementById("tablecart");
							var row = table.insertRow(0);
							var xhttp = new XMLHttpRequest();
							xhttp.onreadystatechange = function() {
								if (this.readyState == 4 && this.status == 200) {
									//document.getElementById("tablecart").innerHTML = this.responseText;
								  row.innerHTML = this.responseText;
								}
							};
							xhttp.open("GET", "cart.php?idcart="+id+"&qty="+idqty[id]+"&price="+price+"&iditem="+item, true);
							xhttp.send();

							document.getElementById("items").innerHTML = item ; //este es el carrito de la pagina
							document.getElementById("itemcart").innerHTML = "ITEMS "+item ; //items dentro del checkout
							document.getElementById("cuenta").innerHTML = cuenta.toFixed(2); ;
							idqty[id]=0;
							document.getElementById("QTY"+id).innerHTML = " "+idqty[id]+" " ;
						}
						else {
							alert( "QTY ERROR");
						}

				  }

					function remove(idremove,idpreduce,qtyreduce){

						var node = document.getElementById("remove"+idremove);
						node.parentNode.removeChild(node);
						node = document.getElementById("remove1"+idremove);
						node.parentNode.removeChild(node);
						node = document.getElementById("remove2"+idremove);
						node.parentNode.removeChild(node);
						node = document.getElementById("remove3"+idremove);
						node.parentNode.removeChild(node);
						node = document.getElementById("remove4"+idremove);
						node.parentNode.removeChild(node);
						node = document.getElementById("remove5"+idremove);
						node.parentNode.removeChild(node);

						var reduceprice = document.getElementById("P"+idpreduce).innerText;
						price= parseFloat(reduceprice);
						price=qtyreduce*price;
						cuenta = cuenta - price;
						if (cuenta < 0.00)
						{
							cuenta=0.00;
						}

						item--;
						document.getElementById("items").innerHTML = item ; //este es el carrito de la pagina
						document.getElementById("itemcart").innerHTML = "ITEMS "+item ; //items dentro del checkout
						document.getElementById("cuenta").innerHTML = cuenta.toFixed(2);
					}

					function requiredadd() {
						document.getElementById("street").required = true;
						document.getElementById("apt").required = true;
						document.getElementById("city").required = true;
						document.getElementById("state").required = true;
						document.getElementById("zip").required = true;
					}
					function requireddelete() {
						document.getElementById("street").required = false;
						document.getElementById("apt").required = false;
						document.getElementById("city").required = false;
						document.getElementById("state").required = false;
						document.getElementById("zip").required = false;
					}

					function servidor() {

						var xhttp1 = new XMLHttpRequest();
						xhttp1.onreadystatechange = function() {
							if (this.readyState == 4 && this.status == 200) {

							}
						};
						xhttp1.open("GET", "cart.php?idcart="+id+"&qty="+idqty[id]+"&price="+price+"&iditem="+item, true);
						xhttp1.send();

					}

					function w3_open() {
					  document.getElementById("mySidebar").style.display = "block";
					}

					function w3_close() {
					  document.getElementById("mySidebar").style.display = "none";
					}

					function departamentos(id) {
						var xhttp1 = new XMLHttpRequest();
						xhttp1.onreadystatechange = function() {
							if (this.readyState == 4 && this.status == 200) {
								document.getElementById("menuselected").innerHTML = this.responseText;
							}
						};
						xhttp1.open("GET", "menuselected.php?MSD="+id, true);
						xhttp1.send();
					}

					function categorias(id) { 
					  var xhttp1 = new XMLHttpRequest();
						xhttp1.onreadystatechange = function() {
							if (this.readyState == 4 && this.status == 200) {
								document.getElementById("menuselected").innerHTML = this.responseText;
							}
						};
						xhttp1.open("GET", "menuselected.php?MSC="+id, true);
						xhttp1.send();
					}

					function subcategorias(id) {
						var xhttp1 = new XMLHttpRequest();
						xhttp1.onreadystatechange = function() {
							if (this.readyState == 4 && this.status == 200) {
								document.getElementById("menuselected").innerHTML = this.responseText;
							}
						};
						xhttp1.open("GET", "menuselected.php?MSSC="+id, true);
						xhttp1.send();
					}

					function lineas(id) {
						var xhttp1 = new XMLHttpRequest();
						xhttp1.onreadystatechange = function() {
							if (this.readyState == 4 && this.status == 200) {
								document.getElementById("menuselected").innerHTML = this.responseText;
							}
						};
						xhttp1.open("GET", "menuselected.php?MSL="+id, true);
						xhttp1.send();
					}

					function paymetods() {
						var xhttp1 = new XMLHttpRequest();
						xhttp1.onreadystatechange = function() {
							if (this.readyState == 4 && this.status == 200) {
								document.getElementById("menuselected").innerHTML = this.responseText;
							}
						};
						xhttp1.open("POST", "paymetod.php", true);
						xhttp1.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
						xhttp1.send("a=ajas");

						//orderdetails[id]][0]=id;//cual item
						//orderdetails[id]][1]=idqty[id];//cuanto del item
					}

			 </script>

		</head>
  </html>


