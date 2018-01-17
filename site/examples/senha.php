<?php
session_start();
ini_set( 'display_errors', 0 );
include_once "conexao.php";
if(!isset($_SESSION["autenticado"]))
{
	header("location:/ZEUS/site/examples/login");
}
include_once "conexao.php";
$array[0] = $_POST['email'];
$array[1] = $_POST['nascimento'];
$array[2] = $_POST['nome'];
$array[3] = $_POST['sobrenome'];
$array[4] = md5($_POST['senha']);
$array[5] = $_POST['nivel'];
$array[6] = $_POST['id'];
$query = $con->prepare("UPDATE usuarios SET email = '$array[0]', nascimento = '$array[1]', nome= '$array[2]', sobrenome = '$array[3]', senha = '$array[4]', nivel = '$array[5]' WHERE id='$array[6]'");
$query->execute();
header('Location:exit.php');
?>