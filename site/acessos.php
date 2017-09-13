<?php
	include_once "conexao.php";
	$query = $con->query("SELECT * FROM acessos");
	while($row = $query->fetch(PDO::FETCH_OBJ)){
		if($row->sistema == 'WINNT'){
			$sistema = 'Windows';
		}else if($row->sistema=='Linux'){
			$sistema = 'Linux';
		}else{
			$sistema = 'Indefinido';
		}
		echo 'Acessado por sistema '.$sistema.' em '.date('d-m-Y',strtotime($row->data_acesso)).' e teve '.$row->qtde.' acessos.<br>';
	}
?>
