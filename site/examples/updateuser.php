<?php
	session_start();
	ini_set( 'display_errors', 0 );
	include_once "conexao.php";
	if(!isset($_SESSION["autenticado"]))
	{
		header("location:/ZEUS/site/examples/login");
	}    
	$id = $_GET["p"];

	$query = $con->query("SELECT * FROM usuarios WHERE id='$id'");
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

	<title>ZEUS - Atualizar Usuário</title>

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
		<div class="sidebar" data-color="blue" data-image="../assets/img/sidebar-1.jpg">
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
				<li class="active">
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
								<button class="btn btn-info" type="submit">
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
							<div class="card-header" data-background-color="blue">
								<h4 class="title">Editar Usuário</h4>

							</div>
							<div class="card-content">
								<form action="senha.php" method="post">
									<div class="row">
										<div class="col-md-5">
											<div class="form-group label-floating">
												<label class="control-label">Email</label>
												<input type="email" class="form-control" name="email" value="<?php echo $row->email ?>" required>
											</div>
										</div>
										<div class="col-md-5">
											<div class="form-group label-floating">
												<label class="control-label">Data de Nascimento</label>
												<input type="date" class="form-control" name="nascimento" value="<?php echo $row->nascimento ?>" required>
											</div>
										</div>
										<div class="col-md-5">
											<div class="form-group label-floating">
												<label class="control-label">Nome</label>
												<input type="text" class="form-control" value="<?php echo $row->nome ?>" name="nome" required>
											</div>
										</div>  
										<div class="col-md-5">
											<div class="form-group label-floating">
												<label class="control-label">Sobrenome</label>
												<input type="text" class="form-control" 
												value="<?php echo $row->sobrenome ?>" 
												name="sobrenome" required>
											</div>
										</div>  
										<div class="col-md-5">
											<div class="form-group label-floating">
												<label class="control-label">Senha</label>
												<input type="password" class="form-control"
												name="senha" required>
											</div>
										</div> 
										<div class="col-md-5">
											<div class="form-group label-floating">
												<label class="control-label">Nível(A ou B)</label>
												<input type="text" class="form-control" 
												value="<?php echo $row->nivel ?>"
												name="nivel" required>
												<input type="number" name="id" value="<?php echo $row->id ?>" style="display:none;">
											</div>
										</div>   
									</div>                                
								</div>                             

							</div>
							<button type="submit" class="btn btn-info pull-right">Salvar</button>
							 <?php
							 if($disabled!='disabled'){
							 	echo '<button type="submit" class="btn btn-danger pull-left">
	                                    <a style="color:#fff;" href="deletaruser.php?pa='.$row->email.'">Remover</a></button>';}?>
							  
							<div class="clearfix">	                                    	
							</div>
						</form>

					</div>
				</div>
			</div>
			<footer class="footer">
	<div class="container-fluid">

		<p class="copyright pull-right">
			&copy; Projeto ZEUS -<a href="marcoalvesdealmeida"> Marco A.A. </a>&<a href="#"> Guilherme L.V.A.
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
