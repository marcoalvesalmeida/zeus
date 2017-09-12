<?php
	include_once "conexao.php";
	function danger($erro,$descricao){
		echo '<div class="alert alert-danger">
					<div class="container-fluid">
  					<div class="alert-icon">
   					<i class="material-icons">Erro '.$erro.'</i>
  				</div>
  				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true"><i class="material-icons">clear</i></span>
  				</button>
  				<b>Alerta de Erro ('.$erro.'):'.$descricao.'</b> 
				</div>
				</div>';
	}
	$query = $con->query("SELECT * FROM usuarios WHERE id=1");
	$usuario = $query->fetch(PDO::FETCH_OBJ);
	if(isset($_GET['notification'])){
		if($_GET['notification']==01){
			danger("01","A senha antiga digitada não corresponde a sua senha original. Por favor tente novamente. Obrigado!");
		}else if($_GET['notification']==02){
			danger("02","A confirmação de nova senha está diferente da nova senha digitada. Por favor tente novamente. Obrigado!");
		}else if($_GET['notification']==03){
			echo '
			<div class="alert alert-success">
			<div class="container-fluid">
			  <div class="alert-icon">
				<i class="material-icons">check</i>
			  </div>
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true"><i class="material-icons">clear</i></span>
			  </button>
			  <b>Sucesso!:</b> A sua senha foi atualizada. Obrigado!
			</div>
			</div>';

		}
	}
?>
<!doctype html>
<html lang="pt-br">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
	<link rel="icon" type="image/png" href="../assets/img/favicon.png" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Perfil</title>

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

	                <li >
	                    <a href="table.php">
	                        <i class="material-icons">content_paste</i>
	                        <p>Minhas publicações</p>
	                    </a>
	                </li>      
	                <li>
	                    <a href="graphics.php">
	                        <i class="material-icons">library_books</i>
	                        <p>Gráficos</p>
	                    </a>
	                </li>
	            </ul>

	    	</div>
	    </div>

	    <div class="main-panel">
			<nav class="navbar navbar-transparent navbar-absolute">
				<div class="container-fluid">
				
					<div class="collapse navbar-collapse">
						<ul class="nav navbar-nav navbar-right">			
					
							<li>
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
	 							   <i class="material-icons">person</i>
	 							   <p class="hidden-lg hidden-md">Perfil</p>
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
	                            <div class="card-header" data-background-color="blue">
	                                <h4 class="title">Editar Perfil</h4>
									
	                            </div>
	                            <div class="card-content">
	                                <form action="senha.php" method="post">
	                                    <div class="row">
	                                        <div class="col-md-5">
												<div class="form-group label-floating">
													<label class="control-label">Email</label>
													<input type="text" class="form-control" name="email" value=<?php echo '"'.$usuario->email.'"';?> disabled>
												</div>
	                                        </div>
	                                        <div class="col-md-3">
												<div class="form-group label-floating">
													<label class="control-label">Senha Antiga*</label>
													<input type="password" class="form-control" name="senhaAntiga" required>
												</div>
	                                        </div>	                                     
	                                      
	                                    </div>


									<div class="row">
	                                        <div class="col-md-5">
												<div class="form-group label-floating">
													<label class="control-label">Nova Senha*</label>
													<input type="password" class="form-control" name="senhaNova" required >
												</div>
	                                        </div>
	                                        <div class="col-md-3">
												<div class="form-group label-floating">
													<label class="control-label">Nova Senha*</label>
													<input type="password" class="form-control" name="senhaNova2" required>
												</div>
												<input type="password" name="senhaOriginal" value=<?php  echo '"'.$usuario->senha.'"';?> style="display: none;">
												<input type="text" name="id" value=<?php  echo '"'.$usuario->id.'"';?> style="display: none;">
	                                        </div>	                               
	                                      
	                                    </div>
		                                    <button type="submit" class="btn btn-info pull-right">Salvar</button>
		                                    <div class="clearfix">	                                    	
	                                    </div>
	                                </form>
	                            </div>
	                        </div>
	                    </div>
						<div class="col-md-4">
    						<div class="card card-profile">
    							<div class="card-avatar">
    								<a href="#adm">
    									<img class="img" src=<?php echo '"'.$usuario->imagem.'"' ?>/>
    								</a>
    							</div>

    							<div class="content">
    								<h6 class="category text-gray">Administrador</h6>
    								<h4 class="card-title"><?php echo $usuario->nome.' '.$usuario->sobrenome ?></h4>    								
    							</div>
    						</div>
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
