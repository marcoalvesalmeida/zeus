<?php
session_start();
ini_set( 'display_errors', 0 );
include_once "conexao.php";
if(!isset($_SESSION["autenticado"]))
{
	header("location:/ZEUS/site/examples/login");
}    
$end = $_GET['p'];

$query = $con->prepare("DELETE FROM mensagens WHERE id='$end'");
$query->execute();
header('Location:mensagens.php');
?>