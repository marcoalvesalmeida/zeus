<?php
	session_start();
ini_set( 'display_errors', 0 );
include_once "conexao.php";
if(!isset($_SESSION["autenticado"]))
{
	header("location:/ZEUS/site/examples/login");
}    
	$pub = $_GET['p'];
	$query = $con->query("SELECT * FROM eventos WHERE id='$pub'");
	$row = $query->fetch(PDO::FETCH_OBJ);
	if($_SESSION['nivel']=='B'){
		$disabled='disabled';
	}
?>
<!doctype html>
<html lang="pt-br">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
	<link rel="icon" type="image/png" href="../assets/img/favicon.png" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>ZEUS - Atualizar</title>

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
		<div class="sidebar" data-color="purple" data-image="../assets/img/sidebar-1.jpg">
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
				<li class="active">
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
				<li >
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
							<button class="btn btn-primary" type="submit">
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
	                    <div class="col-md-8">
	                        <div class="card">
	                            <div class="card-header" data-background-color="purple">
	                                <h4 class="title">Atualizar Publicação</h4>
									<p class="category">Informações</p>
	                            </div>
	                            <div class="card-content">
	                                <form action="galeria.php?zeus=<?php echo $row->id ?>" method="post" enctype="multipart/form-data">
	                                    <div class="row">
	                                        <div class="col-md-3">
												<div class="form-group label-floating">
													
													<label class="control-label">Manifestação</label>
													<input type="text" class="form-control" name="titulo" value="<?php echo $row->titulo ?>" required>
												</div>
	                                        </div>
	                                        <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Período de Ocorrencia (Início)</label>
													<input type="date" class="form-control" value=<?php echo $row->data_inicio?> name="data-inicio" required>
												</div>
	                                        </div>
	                                   
	                                        <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Período de Ocorrencia (Fim)</label>
													<input type="date" class="form-control" name="data-fim" value=<?php echo $row->data_fim?> required>
												</div>

												
											
	                                        </div>
	                                    </div>

	                                    <div class="row">
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Principais Autores</label>
													<input type="text" class="form-control" name="autores" value="<?php echo $row->autores?>">
												</div>
	                                        </div>
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Local</label>
													<input type="text" class="form-control" name="local" value="<?php echo $row->localizacao?>">
												</div>
	                                        </div>
	                                    </div>

	                                    <div class="row">
	                                        <div class="col-md-12">
												<div class="form-group label-floating ">
													<label class="control-label">Resumo</label>
													<textarea class="form-control" name="resumo"><?php echo $row->resumo?></textarea> 
												</div>
	                                        </div>
	                                    </div>								
	                                    <div class="row">
	                                        <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Principais Caracteristicas</label>
													<input type="text" class="form-control" name="carc" value="<?php echo $row->caracteristicas?>">
												</div>
	                                        </div>
	                                        <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Coordenador</label>
													<input type="text" class="form-control" name="coord" value="<?php echo $row->coordenador?>">
												</div>
	                                        </div>
	                                        <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Local de Ensaio</label>
													<input type="text" class="form-control" name="ensaio" value="<?php echo $row->localizacao?>">
												</div>
	                                        </div>
	                                    </div>
	                                    <div class="row">
	                                        <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Ponto de Cultura</label>
													<input type="text" class="form-control" name="pcultura" value="<?php echo $row->ponto_cultura?>">
												</div>
	                                        </div>
	                                        <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Outras Informações</label>
													<input type="text" class="form-control" name="oinfo" value="<?php echo $row->informacoes?>">
													<input type="text" name="op" value="atualizar" style="display: none;">
												</div>
	                                        </div>
	                                    </div>	
	                                    <button type="submit" class="btn btn-primary pull-right">Próxima</button>
	                                    <?php 
	                                    if($disabled!='disabled'){
	                                    	echo '
	                                    <a href="deletarpub.php?p='.$row->titulo.'">Remover</a>';
	                                    }
	                                    ?>
	                                    <div class="clearfix"></div>
	                                </form>
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

	<script type="text/javascript">
    	$(document).ready(function(){

			// Javascript method's body can be found in assets/js/demos.js
        	demo.initDashboardPageCharts();

    	});
	</script>

</html>
