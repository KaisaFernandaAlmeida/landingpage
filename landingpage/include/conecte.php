<?php
header('Content-type: text/html; charset=iso-8859-1');
mb_internal_encoding("iso-8859-1");
date_default_timezone_set('America/Sao_Paulo');

$titulo = ".:: Ka&iacute;sa Fernanda ::.";

if($_SERVER["HTTP_HOST"] == 'localhost'){
	$url = "http://localhost/login/";
	
	$user='root';
	$password='';

}

$base = "_media/";

try {
  $PDO = new PDO('mysql:host=localhost;dbname=landingpage_kaisa', $user, $password);
    $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}

?>
