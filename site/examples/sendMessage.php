<?php
session_start();
ini_set( 'display_errors', 0 );
include_once "conexao.php";
if(!isset($_SESSION["autenticado"]))
{
	header("location:/ZEUS/site/examples/login");
}    
$nome=$_POST['contactName'];
$email=$_POST['contactEmail'];
$mensagem=$_POST['contactMessage'];
$query = $con->prepare("INSERT INTO mensagens VALUES(DEFAULT,'$nome','$email','$mensagem')");
$query->execute();
header("location:/ZEUS/site/examples/site");
?>