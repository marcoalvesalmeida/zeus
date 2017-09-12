<?php
	include_once "conexao.php";
	$end = $_GET['zeus'];
	$id = $_GET['id'];
	$query = $con->prepare("DELETE FROM img WHERE endereco='$end'");
	$query->execute();
	header('Location:galeria.php?zeus='.$id);
?>