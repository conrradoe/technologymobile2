<?php
$usu = $_REQUEST["usu"];
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
			        <li><a href="#" class="ui-btn-active"><img border="0" src="images/logotech.png" width="173" height="30" align="left">Perfil de usuario</a></li>
			    </ul>
			</div>
		</header>
		<article data-role="content">
		<p>Bienvenido al sistema de reportes, completa tu informacion personal para crear el perfil de usuario, este proceso se realiza una sola vez.</p>
<form action="http://sinergiasms.no-ip.org:8080/technologymobile2/crear_perfil.php" method="post">
<label for="nombre">Nombre:</label>
 <input id="nombre" type="text" name="nombre" placeholder="Nombre y apellido" required="" />
 <label for="telefono">Telefono:</label>
 <input id="telefono" type="text" name="telefono" placeholder="Telefono celular" required="" />
 <label for="usu">Correo de contacto:</label>
 <input id="usu" type="text" name="usu" value="<? echo $usu; ?>" placeholder="ejemplo@correo.com" required="" />
 <label for="email">Correo Alternativo:</label>
 <input id="email" type="email" name="email" placeholder="ejemplo@correo.com" required="" />&nbsp;
 <label for="latitude">GPS:</label>
 <input id="latitude" type="text" name="latitude"  />
 <input id="longitude" type="text" name="longitude"  />
 <input id="submit" type="submit" name="submit" value="Enviar" />
</form>
</article>

</body>
</html>