<?php
$usu = $_REQUEST["usu"];
if ($usu==''){
$usu=$_GET["usu"];
}

$con = mysql_connect("localhost","root","123456");
if (!$con)
 {
 die('Could not connect: ' . mysql_error());
 }

mysql_select_db("encuesta", $con);

$query="Select * from perfil where correo='".$usu."'";
$recurso =mysql_query($query) or die(mysql_error());
if(mysql_num_rows($recurso)==0){
$row = mysql_fetch_array($recurso);
if ($row['correo']==''){
echo '<SCRIPT LANGUAGE="javascript">';
echo 'location.href = "perfil.php?usu='.$usu.'";';
echo '</SCRIPT>';
exit();
}
}

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
	<script>
function getLocation()
  {
  if (navigator.geolocation)
    {
    navigator.geolocation.getCurrentPosition(showPosition);
    }
    }
function showPosition(position)
  {
  document.getElementById('latitude').value=position.coords.latitude;
document.getElementById('longitude').value=position.coords.longitude;
  }
 getLocation(); 
</script>
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
		<article data-role="content">
<form action="contacto.php" method="post">
<label for="rif">RIF:</label>
 <input id="rif" type="text" name="rif" placeholder="Rif del cliente" required="" />
 <label for="nombre">Nombre:</label>
 <input id="nombre" type="text" name="nombre" placeholder="Nombre del cliente" required="" />
 <fieldset>
   <legend>Concreto alguna venta?: </legend>
      <p><label> <input type="radio" name="vendio" value="si" checked> SI </label></p>
      <p><label> <input type="radio" name="vendio" value="no"> NO </label></p>
      </fieldset>
      <fieldset>
  <legend>Concreto alguna Cobranza?: </legend>
      <p><label> <input type="radio" name="cobro" value="si" checked> SI </label></p>
      <p><label> <input type="radio" name="cobro" value="no"> NO </label></p>
      </fieldset>
  <fieldset>
 <label for="fallas">Productos sin existencia:</label>
 <textarea id="fallas" name="fallas" placeholder="Escriba las fallas de productos que el cliente pidio" required=""></textarea>
 <label for="observaciones">Observaciones o novedades de la visita:</label>
 <textarea id="observaciones" name="observaciones" placeholder="Escriba las observaciones hechas por el cliente" required=""></textarea>

  </fieldset>
 <input id="latitude" type="text" name="latitude"  />
 <input id="longitude" type="text" name="longitude"  />
 <input id="usu" type="text" name="usu" value="<? echo $usu; ?>" size="1"  />
 <input id="submit" type="submit" name="submit" value="Enviar" />
</form>
</article>

</body>
</html>