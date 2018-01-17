<?php
	session_start();
	ini_set( 'display_errors', 0 );
	include_once "conexao.php";
	if(!isset($_SESSION["autenticado"]))
	{	
		header("location:/ZEUS/site/examples/login");
	}    
	$altura = 350;
	$altura2 = 350;
	//Gráfico por Sistema Operacional
	$sistemas = $con->query("SELECT DISTINCT(sistema) FROM acessos");
	$qtde =  $con->query("SELECT SUM(qtde) 'total' FROM acessos");
	$total = $qtde->fetch(PDO::FETCH_OBJ);
	//Gráfico por data
	$datas = $con->query("SELECT DISTINCT(month(data_acesso)) 'data', YEAR(data_acesso) 'ano' FROM acessos ORDER BY data ASC");
	//Ajuste Gráfico 1
	$ajuste = $con->query("SELECT COUNT(DISTINCT(sistema)) 'qtde' FROM acessos");
	$qtaj=$ajuste->fetch(PDO::FETCH_OBJ);
	$limite = $qtaj->qtde;
	if($limite>5){
		$tamanho += ((qtde-5)*30);
	}
	//Ajuste do Gráfico 2
	$ajuste2 = $con->query("SELECT COUNT(DISTINCT(sistema)) 'qtde2' FROM acessos");
	$qtaj2=$ajuste2->fetch(PDO::FETCH_OBJ);
	$limite2 = $qtaj2->qtde;
	if($limite2>5){
		$tamanho2 += ((qtde2-5)*30);
	}
?>
<!doctype html>
<html lang="pt-br">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
	<link rel="icon" type="image/png" href="../assets/img/favicon.png" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>ZEUS - Gráficos</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	<meta name="viewport" content="width=device-width" />


	<!-- Bootstrap core CSS     -->
	<link href="../assets/css/bootstrap.min.css" rel="stylesheet" />

	<!--  Material Dashboard CSS    -->
	<link href="../assets/css/material-dashboard.css" rel="stylesheet"/>


	<!--     Fonts and icons     -->
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
</head>

<body>

	<div class="wrapper">
		<div class="sidebar" data-color="orange" data-image="../assets/img/sidebar-1.jpg">
			<!--
	        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"
		    Tip 2: you can also add an image using data-image tag

		-->

		<div class="logo">
			<a href="#" class="simple-text">
				ZEUS
			</a>
		</div>


		<div class="sidebar-wrapper">
			<ul class="nav">
				<li>
					<a href="index.php">
						<i class="material-icons">dashboard</i>
						<p>Inserir</p>
					</a>
				</li>
				<li>
					<a href="user.php">
						<i class="material-icons">person</i>
						<p>Perfil</p>
					</a>
				</li>
				<li>
					<a href="table.php">
						<i class="material-icons">content_paste</i>
						<p>Minhas publicações</p>
					</a>
				</li>
				<li class="active">
					<a href="graphics.php">
						<i class="material-icons">library_books</i>
						<p>Gráficos</p>
					</a>
				</li>
				<li>
					<a href="mensagens.php">
						<i class="material-icons">dashboard</i>
						<p>Mensagens</p>
					</a>
				</li>
				<li>
					<a href="beckup.sql" download>
						<i class="material-icons">dashboard</i>
						<p>Backup</p>
					</a>
				</li>
			</ul>
		</div>
	</div>

	<div class="main-panel">
		<nav class="navbar navbar-transparent navbar-absolute">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">Painel Administrativo</a>
				</div>
				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav navbar-right">						
						<li>
						<form action="/ZEUS/site/examples/site" method="post">
							<button class="btn btn-warning" type="submit">
								Ir para o site
							</button>

						</form>
						</li>
						<li>
							<form action="/ZEUS/site/examples/exit.php" method="post">
								<button class="btn btn-danger" type="submit">
									Sair
								</button>
							</form>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	        <div class="content">
	            <div class="container-fluid">
	                <div class="row"> 
	                    <div class="col-md-12">
	                        <div class="card card-plain">
	                        <p class="graphic1" style="font-family: 'Hobo Std' color:#000; text-align: center;"> Gráfico de acessos por Sistemas Operacionais </p>
<div class="caixa" style="border:1px solid #000; width: 70%; height:<?php echo $tamanho.'px' ?>; background-color: #c0c0c0; margin-left: 15%; font-size: 130%; box-shadow: 5px 5px 5px #000;">
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
		<div class="barra" style="background-color: #FF8C00; margin-left: 0% ; width:'.$width.'; height: 40px; color:#000; box-shadow: 5px 5px 5px #000;">
			'.$sis." - ".number_format(($width),2).'%
		</div><br>';
		$cont++;
	}
	?>
</div>
<br><br><br>
<p class="graphic2" style="font-family: 'Hobo Std' color:#000; text-align: center;"> Gráfico de acessos Mensais </p>
<div class="caixa" style="border:1px solid #000; width: 70%; height: <?php echo $tamanhod.'px' ?>; background-color: #c0c0c0; margin-left: 15%; font-size: 130%; box-shadow: 5px 5px 5px #000;">
	<?php
	$cont=1;
	while($row = $datas->fetch(PDO::FETCH_OBJ)){
		$dat = $row ->data;
		$perc = $con->query("SELECT sum(qtde) 'unit' FROM acessos WHERE month(data_acesso) = '$dat'");
		$unit = $perc->fetch(PDO::FETCH_OBJ);
		$width = 100/($total->total/$unit->unit);
		$width = $width."%";
		echo '
		<div class="barra" style="background-color: #FF8C00; margin-left: 0% ; width:'.$width.'; height: 40px; color:#000; box-shadow: 5px 5px 5px #000;">
			'.$dat.'/'.$row->ano." - ".number_format(($width),2).'%
		</div><br>';
		$cont++;
	}
	?>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>

	        <footer class="footer">
	            <div class="container-fluid">
	                <p class="copyright pull-right">
	                    &copy; Projeto ZEUS -<a href="#marcoalvesdealmeida"> Marco A.A. </a>&<a href="#"> Guilherme L.V.A.</a>
	                </p>
	            </div>
	        </footer>
	    </div>
	</div>

</body>

	<!--   Core JS Files   -->
	<script src="../assets/js/jquery-3.1.0.min.js" type="text/javascript"></script>
	<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="../assets/js/material.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="../assets/js/chartist.min.js"></script>

	<!--  Notifications Plugin    -->
	<script src="../assets/js/bootstrap-notify.js"></script>

	<!--  Google Maps Plugin    -->
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

	<!-- Material Dashboard javascript methods -->
	<script src="../assets/js/material-dashboard.js"></script>

	<!-- Material Dashboard DEMO methods, don't include it in your project! -->
	<script src="../assets/js/demo.js"></script>

</html>
