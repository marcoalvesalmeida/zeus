<?php
	session_start();
ini_set( 'display_errors', 0 );
include_once "conexao.php";
if(!isset($_SESSION["autenticado"]))
{
	header("location:/ZEUS/site/examples/login");
}
include_once "conexao.php";

$ide = $_GET['p'];

$query = $con->prepare("DELETE FROM eventos WHERE titulo='$ide';");
$query->execute();

header('Location: table.php');

?>