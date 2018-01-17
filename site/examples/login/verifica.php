<?php
	include_once "conexao.php";
	session_start();
	if(!empty($_POST['email']) && !empty($_POST['senha'])){
		$email = $_POST['email'];
		$senha = md5($_POST['senha']);
		$query = $con->query("SELECT *,COUNT(*) 'qtde' FROM usuarios WHERE email='$email' and senha='$senha'");
		$total = $query->fetch(PDO::FETCH_OBJ);
		if($total->qtde==1){
			session_start();
			$_SESSION["autenticado"] = true;
			$_SESSION["id"] = $total->id;
			$_SESSION["nome"] = $total->nome;
			$_SESSION["sobrenome"] = $total->sobrenome;
			$_SESSION["senha"] = $_POST['senha'];
			$_SESSION["email"] = $total->email;
			$_SESSION["nascimento"] = $total->nascimento;
			$_SESSION["nivel"] = $total->nivel;
			header('location:../index.php');
		}else{
			unset($_SESSION['email']);
			unset($_SESSION['senha']);
			header('location:index.html');
		}
	}else{
		header('location:index.html');
	}
?>