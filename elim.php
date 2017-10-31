<?php
require_once("modelo/class.php");

$tra = new Herramientas();
$tra->EliminarPersona($_GET["el"]);exit;
?>