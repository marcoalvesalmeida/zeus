<?php
	include_once "conexao.php";
	$id = $_GET['zeus'];
	$query = $con->query("SELECT endereco FROM img WHERE ex='$id'");
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<title>Galeria</title>
	<meta charset="utf-8">

    <!--  Material Dashboard CSS    -->
    <link href="../assets/css/material-dashboard.css" rel="stylesheet"/>

	<link rel="stylesheet" type="text/css" href="../assets/css/estilo_flex.css">
</head>
<body>
	<header>
		<div class="conteudo">
			<h1>Galeria ZEUS</h1>
			<h2> Clique na imagem que deseja remover </h2>
		</div>
	</header>
	<section class="galeria">
		<div class="conteudo">
			<?php
			while($row = $query->fetch(PDO::FETCH_OBJ)){
				echo '<div class="foto"><a href="deletar.php?zeus='.$row->endereco.'&id='.$id.'"><img src="'.$row->endereco.'" alt=""></a></div>';
			}
			?>
		</div>
			<h2> Dica: Se não desejar excluir você pode adicionar mais imagens...</h2><a href="fotos_per.php?op=atualizar_fotos&zeus=<?php echo $id ?>"><button class="btn btn-primary pull-right">Adicionar</button></a>
		</section>
</body>
</html>