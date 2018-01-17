<?php
session_start();
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
$array[6] = $_SESSION['id'];
echo $array[0];
$query = $con->prepare("INSERT INTO usuarios VALUES (DEFAULT,'$array[2]','$array[3]', '$array[1]', '$array[0]', '$array[4]','$array[5]')");
$query->execute();
header('Location:user.php');
?>