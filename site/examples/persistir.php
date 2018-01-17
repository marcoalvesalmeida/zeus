<?php
	session_start();
	ini_set( 'display_errors', 0 );
	include_once "conexao.php";
	if(!isset($_SESSION["autenticado"]))
	{
		header("location:/ZEUS/site/examples/login");
	}    
	$array[0] = $_POST['titulo'];
	$array[1] = $_POST['data-inicio'];
	$array[2] = $_POST['data-fim'];
	$array[3] = $_POST['autores'];
	$array[4] = $_POST['local'];
	$array[5] = $_POST['resumo'];
	$array[6] = $_POST['carc'];
	$array[7] = $_POST['coord'];
	$array[8] = $_POST['ensaio'];
	$array[9] = $_POST['pcultura'];
	$array[10] = $_POST['oinfo'];
	$array[11] =  $_POST['usuario'];
	$array[12] =  $_POST['data_p'];
	if(isset($array[0])){
		$query = $con->prepare("INSERT INTO eventos VALUES (DEFAULT,'$array[0]','$array[1]','$array[2]','$array[3]','$array[4]','$array[5]','$array[6]','$array[7]','$array[8]','$array[9]','$array[10]','$array[11]','$array[12]')");
		$query->execute();
		$result = $con->prepare("SELECT * FROM eventos WHERE titulo='$array[0]'");
		$result->execute();
		$id = 999999999;
		if($result){
			$row = $result->fetch(PDO::FETCH_OBJ);
			//echo $row['id'];
			$id = $row->id;
	    	$_SESSION['id'] = $id;
		}
	}else{
		$id = $_SESSION['id'];
		$_SESSION['id'] = $id;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title> Upload - ZEUS </title>
	 <!-- Bootstrap core CSS     -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />

    <!--  Material Dashboard CSS    -->
    <link href="../assets/css/material-dashboard.css" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../assets/css/demo.css" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
<form method="post" enctype="multipart/form-data" action="send.php" style="width: 60%;">
	<div style="margin-left: 65%;">
   		<input name="arquivo" type="file" class="btn btn-info pull-left"/>
    <br/>
    </div>
   <br/>
    <br/>
     <br/>
   <button type="" class="btn btn-primary pull-right">Finalizar</button>
   <button type="submit" class="btn btn-primary pull-right">Salvar</button>
  	
</form>
</body>
</html>