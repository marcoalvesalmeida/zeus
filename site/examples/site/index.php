<?php
include_once "conexao.php";
$query = $con->query("SELECT titulo, id FROM eventos");
   // - Código para gerenciar acessos - //
date_default_timezone_set('America/Sao_Paulo');          
$data = date ('d-m-Y');
$acessos = $con->query("SELECT * FROM acessos where id=(SELECT MAX(id) FROM acessos)");
$d = $acessos->fetch(PDO::FETCH_OBJ);
if(date('d-m-Y',strtotime($d->data_acesso)) == $data && PHP_OS == $d->sistema){
   $d1 = $d->data_acesso;
   $atualiza = $con->prepare("UPDATE acessos SET qtde=qtde+1 WHERE data_acesso='$d1'");
   $atualiza->execute();
}else if(date('Y-m-d',strtotime($data))>=$d->data_acesso){
   $data = date('Y-m-d',strtotime($data));
   $OS = PHP_OS;
   $atualiza = $con->prepare("INSERT INTO acessos VALUES(DEFAULT, '$data', '$OS', 1)");
   $atualiza->execute();
}
?>
<!DOCTYPE html>
<!--[if lt IE 8 ]><html class="no-js ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="no-js ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 8)|!(IE)]><!--><html class="no-js" lang="pt-BR"> <!--<![endif]-->
<head>

   <!--- Basic Page Needs
   ================================================== -->
   <meta charset="utf-8">
   <title>ZEUS - SITE</title>
   <meta name="description" content="">
   <meta name="author" content="">

   <!-- Mobile Specific Metas
   ================================================== -->
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
  ================================================== -->
  <link rel="stylesheet" href="css/default.css">
  <link rel="stylesheet" href="css/layout.css">
  <link rel="stylesheet" href="css/media-queries.css">
  <link rel="stylesheet" href="css/magnific-popup.css">
  <link rel="stylesheet" href="estilo_index.css">

   <!-- Script
   ================================================== -->
   <script src="js/modernizr.js"></script>

   <!-- Favicons
   ================================================== -->
   <link rel="shortcut icon" href="favicon.ico" >
  <!-- JQUERY
  ================================================== -->
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="jquery.quick.search.js"></script>
</head>

<body>

   <!-- Header
   ================================================== -->
   <header id="home" style="background: #161415 url(images/background.jpg) no-repeat top center;">

      <nav id="nav-wrap">

         <a class="mobile-btn" href="#nav-wrap" title="Show navigation">Show navigation</a>
         <a class="mobile-btn" href="#" title="Hide navigation">Hide navigation</a>

         <ul id="nav" class="nav">
            <li class="current"><a class="smoothscroll" href="#home">Início</a></li>
            <li><a class="smoothscroll" href="#pagina">Publicação</a></li>
            <li><a href="/ZEUS/site/examples">ZEUS - ADMIN</a></li>
         </ul> <!-- end #nav -->

      </nav> <!-- end #nav-wrap -->

      <div class="row banner">
         <div class="banner-text">
            <h1 class="responsive-headline">Janu Cultura</h1>
            <h3> Aqui você acessas as manifestações culturais de Januária e região. </h3>
            <hr />
            <ul class="social">
               <li><a href="#"><i class="fa fa-facebook"></i></a></li>
               <li><a href="#"><i class="fa fa-twitter"></i></a></li>
               <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
               <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
               <li><a href="#"><i class="fa fa-instagram"></i></a></li>
               <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
               <li><a href="#"><i class="fa fa-skype"></i></a></li>
            </ul>
         </div>
      </div>

      <p class="scrolldown">
         <a class="smoothscroll" href="#pagina"><i class="icon-down-circle"></i></a>
      </p>

   </header> <!-- Header End -->

   <!-- Conteúdo do site
   ================================================== -->

   <div id="pagina">

      <div class="cont">

        <input type="text" class="input-search" alt="lista-clientes" placeholder="Filtre os resultados" />

        <br style="clear:both">
        <form method="GET">
         <?php
         $sql = $con->prepare("SELECT * FROM eventos order by data_inicio desc");
         $sql->execute();
         echo '<table class="lista-clientes" width="100%">
         <thead>
            <tr>
            <th>Titulo</th>
              <th>Período</th>
              <th>Local</th>
           </tr>
        </thead>';
        while($row= $sql->fetch(PDO::FETCH_OBJ)){
         $titulo = $row->titulo;
         $periodo = date('d/m/Y',strtotime($row->data_inicio)).' - '.date('d/m/Y',strtotime($row->data_fim));
         $local = $row->localizacao;
         echo '
         <tbody>
          <tr>
            <td><a href="publicacao.php?id='.$row->id.'">'.$titulo.'</a></td>
            <td><a href="publicacao.php?id='.$row->id.'">'.$periodo.'</td>
            <td><a href="publicacao.php?id='.$row->id.'">'.$local.'</td>
         </tr>
      </tbody>
      ';
   }
   echo ' </table>';
   ?>

</form>
</div>
</div>

   <!-- footer
   ================================================== -->
   <footer>

      <div class="row">

         <div class="twelve columns">

            <ul class="social-links">
               <li><a href="#"><i class="fa fa-facebook"></i></a></li>
               <li><a href="#"><i class="fa fa-twitter"></i></a></li>
               <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
               <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
               <li><a href="#"><i class="fa fa-instagram"></i></a></li>
               <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
               <li><a href="#"><i class="fa fa-skype"></i></a></li>
            </ul>

            <ul class="copyright">
               <li>&copy; Copyright 2017 ZEUS</li>
               <li><a href="http://facebook.com/marco">Por Marco A.A.</a> & <a href="http://facebook.com/marco">Guilherme L.V.A.</a></li>   
            </ul>

         </div>

         <div id="go-top" style="display: block;"><a class="smoothscroll" title="Back to Top" href="#home"><i class="icon-up-open"></i></a></div>

      </div>

   </footer> <!-- Footer End-->

   <!-- Java Script
   ================================================== -->
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
   <script>window.jQuery || document.write('<script src="js/jquery-1.10.2.min.js"><\/script>')</script>
   <script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>

   <script src="js/jquery.flexslider.js"></script>
   <script src="js/waypoints.js"></script>
   <script src="js/jquery.fittext.js"></script>
   <script src="js/magnific-popup.js"></script>
   <script src="js/doubletaptogo.js"></script>
   <script src="js/spin.js"></script>

   <script src="js/init.js"></script>

</body>

</html>
