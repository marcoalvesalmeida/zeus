<?php
	$array[0] = $_POST['id'];
	include_once "conexao.php";
	if($_POST['senhaAntiga'] != $_POST['senhaOriginal']){
		header('Location:user.php?notification=01');
	}else if($_POST['senhaNova'] != $_POST['senhaNova2']){
		header('Location:user.php?notification=02');
	}else{
		$array[1] = $_POST['senhaAntiga'];
		$array[2] = $_POST['senhaNova'];
		$array[3] = $_POST['senhaNova2'];
		echo $array[0].'-'.$array[2].'-'.$array[1];
		$query = $con->prepare("UPDATE usuarios SET senha = '$array[2]' WHERE id='$array[0]'");
		$query->execute();
		header('Location:user.php?notification=03');
	}	
?>