<?php
	ini_set( 'display_errors', 0 );
	include_once  "conexao.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title> Principal </title>
</head>
<body>
<form method="post" enctype="multipart/form-data" action="send.php">
   Selecione uma imagem: <input name="arquivo" type="file" />
   <br />
   <input type="number" name="id"><br>
   <input type="submit" value="Salvar" />
</form>
</body>
</html>