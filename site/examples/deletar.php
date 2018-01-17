<?php
session_start();
ini_set( 'display_errors', 0 );
include_once "conexao.php";
if(!isset($_SESSION["autenticado"]))
{
	header("location:/ZEUS/site/examples/login");
}    
$end = $_GET['zeus'];
$id = $_GET['id'];
$query = $con->prepare("DELETE FROM img WHERE endereco='$end'");
$query->execute();
header('Location:galeria.php?zeus='.$id);
?>