<!doctype html>
<html lang="pt-br">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
	<link rel="icon" type="image/png" href="../assets/img/favicon.png" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>ZEUS</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />

    <!--  Material Dashboard CSS    -->
    <link href="../assets/css/material-dashboard.css" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../assets/css/demo.css" rel="stylesheet" />

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
	                    <a href="dashboard.php">
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
	            </ul>
	    	</div>
	    </div>

	    <div class="main-panel">
			<nav class="navbar navbar-transparent navbar-absolute">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse">
							<span class="sr-only">Toggle navigation</span>						
						</button>
						<a class="navbar-brand" href="#">Painel Administrativo</a>
					</div>
					<div class="collapse navbar-collapse">
						<ul class="nav navbar-nav navbar-right">
						
							
							<li>
								<a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
	 							   <i class="material-icons">person</i>
	 							   <p class="hidden-lg hidden-md">Profile</p>
		 						</a>
							</li>
						</ul>

						<form class="navbar-form navbar-right" role="search">
							<div class="form-group  is-empty">
	                        	<input type="text" class="form-control" placeholder="Buscar">
	                        	<span class="material-input"></span>
							</div>
							<button type="submit" class="btn btn-white btn-round btn-just-icon">
								<i class="material-icons">search</i><div class="ripple-container"></div>
							</button>
	                    </form>
					</div>
				</div>
			</nav>
			<div class="content">
	            <div class="container-fluid">
	                <div class="row">
	                    <div class="col-md-8">
	                        <div class="card">
	                            <div class="card-header" data-background-color="purple">
	                                <h4 class="title">Cadastrar Publicação</h4>
									<p class="category">Informações</p>
	                            </div>
	                            <div class="card-content">
	                                <form action="persistir.php" method="post" enctype="multipart/form-data">
	                                    <div class="row">
	                                        <div class="col-md-3">
												<div class="form-group label-floating">
													
													<label class="control-label">Manifestação</label>
													<input type="text" class="form-control" name="titulo" required>
												</div>
	                                        </div>
												<?php											
													date_default_timezone_set('America/Sao_Paulo');          
													$data = date ('Y-m-d H:i');
												?>
	                                        <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Período de Ocorrencia (Início)</label>
													<input type="date" class="form-control" value=<?php echo $data?> name="data-inicio" required>
												</div>
	                                        </div>
	                                   
	                                        <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Período de Ocorrencia (Fim)</label>
													<input type="date" class="form-control" name="data-fim" value=<?php echo $data?> required>
												</div>

												
											
	                                        </div>
	                                    </div>

	                                    <div class="row">
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Principais Autores</label>
													<input type="text" class="form-control" name="autores">
												</div>
	                                        </div>
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Local</label>
													<input type="text" class="form-control" name="local" >
												</div>
	                                        </div>
	                                    </div>

	                                    <div class="row">
	                                        <div class="col-md-12">
												<div class="form-group label-floating ">
													<label class="control-label">Resumo</label>
													<textarea class="form-control" name="resumo" ></textarea> 
												</div>
	                                        </div>
	                                    </div>

	                                    	
										  										
	                                    <div class="row">
	                                        <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Principais Caracteristicas</label>
													<input type="text" class="form-control" name="carc">
												</div>
	                                        </div>
	                                        <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Coordenador</label>
													<input type="text" class="form-control" name="coord">
												</div>
	                                        </div>
	                                        <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Local de Ensaio</label>
													<input type="text" class="form-control" name="ensaio" >
												</div>
	                                        </div>
	                                    </div>
	                                    <div class="row">
	                                        <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Ponto de Cultura</label>
													<input type="text" class="form-control" name="pcultura">
												</div>
	                                        </div>
	                                        <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Outras Informações</label>
													<input type="text" class="form-control" name="oinfo">
												</div>
	                                        </div>
	                                    </div>	
	                                    <button type="submit" class="btn btn-primary pull-right">Próxima</button>
	                                    <div class="clearfix"></div>
	                                </form>
	                            </div>
	                        </div>
	                    </div>

		
		</div>
		        <footer class="footer">
	            <div class="container-fluid">
	          
	               <p class="copyright pull-right">
	                    &copy; <a href="#">Projeto ZEUS</a> -<a href="#"> Marco A.A. -</a><a href="#"> Guilherme L.V.A. - </a><a href="#">Caio X.M.</a> 
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
