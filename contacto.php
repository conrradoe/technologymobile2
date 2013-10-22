<?php
date_default_timezone_set("America/Caracas" );
$rif = $_POST["rif"];
$nombre = $_POST["nombre"];
$vendio = $_POST["vendio"];
$cobro = $_POST["cobro"];
$fallas = $_POST["fallas"];
$observaciones = $_POST["observaciones"];
$latitude = $_POST["latitude"];
$longitude = $_POST["longitude"];
$user= $_POST["usu"];


$con = mysql_connect("localhost","root","123456");
if (!$con)
 {
 die('Could not connect: ' . mysql_error());
 }

$str_today = date("Y-m-d H:i:s");

mysql_select_db("encuesta", $con);
$query="INSERT INTO encuestas (user,rif,nombre,vendio,cobro,fallas,observaciones,latitude,longitude,fecha) values ('$user','$rif','$nombre','$vendio','$cobro','$fallas','$observaciones','$latitude','$longitude','$str_today')";
mysql_query($query) or die(mysql_error());
?>
<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TECHNOLOGY</title>
	<link rel="stylesheet"  href="css/themes/default/jquery.mobile-1.3.1.min.css">
	<script src="js/static/jquery.js"></script>
	<script src="js/static/jquery.mobile-1.3.1.min.js"></script>
	</head>
<body>


	<section id="login" data-role="page">
		<header data-role="header">
			<div data-role="navbar">
			    <ul>
			        <li><a href="#" class="ui-btn-active"><img border="0" src="images/logotech.png" width="173" height="30" align="left">Encuesta</a></li>
			    </ul>
			</div>
		</header>
		<p align="center">Datos guardados correctamente... <br>
		<img border="0" src="images/info.png" width="64" height="64"></p>
		

	<p align="center"><a href="otro.php?usu=<? echo $user; ?>">
	<img border="0" src="images/continuar.gif" width="128" height="53"></a></p>
		

</body>
</html>