<?php
	ini_set( 'display_errors', 0 );
	include_once "conexao.php";
	//Gráfico por Sistema Operacional
	$sistemas = $con->query("SELECT DISTINCT(sistema) FROM acessos");
	$qtde =  $con->query("SELECT SUM(qtde) 'total' FROM acessos");
	$total = $qtde->fetch(PDO::FETCH_OBJ);
	//Gráfico por data
	$datas = $con->query("SELECT DISTINCT(data_acesso) 'data' FROM acessos");
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<title>Gráficos</title>
	<meta charset="utf-8">
</head>
<body>
<div class="caixa" style="border:1px solid #000; width: 50%; height: 300px; background-color: #696969; margin-left: 25%;">
	<?php
	$cont=1;
	while($row = $sistemas->fetch(PDO::FETCH_OBJ)){
		$sis = $row ->sistema;
		$perc = $con->query("SELECT sum(qtde) 'unit' FROM acessos WHERE sistema = '$sis'");
		$unit = $perc->fetch(PDO::FETCH_OBJ);
		$width = 100/($total->total/$unit->unit);
		$width = $width."%";
		if($sis == 'WINNT'){
			$sis = 'Windows';
		}
		echo '
		<div class="barra" style="background-color: #000; margin-left: 0% ; width:'.$width.'; height: 40px; color:#00ffff;">
			'.$sis." - ".number_format(($width),2).'%
		</div><br>';
		$cont++;
	}
	?>
</div>
<br><br><br><br><br>
<div class="caixa" style="border:1px solid #000; width: 50%; height: 300px; background-color: #696969; margin-left: 25%;">
	<?php
	$cont=1;
	while($row = $datas->fetch(PDO::FETCH_OBJ)){
		$dat = $row ->data;
		$perc = $con->query("SELECT sum(qtde) 'unit' FROM acessos WHERE data_acesso = '$dat'");
		$unit = $perc->fetch(PDO::FETCH_OBJ);
		$width = 100/($total->total/$unit->unit);
		$width = $width."%";
		echo '
		<div class="barra" style="background-color: #000; margin-left: 0% ; width:'.$width.'; height: 40px; color:#00ffff;">
			'.date('d/m/Y',strtotime($dat))." - ".number_format(($width),2).'%
		</div><br>';
		$cont++;
	}
	?>
</div>
</body>
</html>