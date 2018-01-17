<?php
   $id = $_GET['id'];
   include_once "conexao.php";
   $query = $con->prepare("SELECT endereco FROM img where ex=$id");
   $quer = $con->prepare("SELECT endereco FROM img where ex=$id");
   $query->execute();
   $quer->execute();
   $capa = $quer->fetch(PDO::FETCH_OBJ);
   $query2 = $con->prepare("SELECT * FROM eventos where id=$id");
   $query2->execute();
   $row2 = $query2->fetch(PDO::FETCH_OBJ);
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
	<meta name="author" content="Marco A.A., Guilherme L.V.A.">

   <!-- Mobile Specific Metas
   ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
    ================================================== -->
   <link rel="stylesheet" href="css/default.css">
	<link rel="stylesheet" href="css/layout.css">
   <link rel="stylesheet" href="css/media-queries.css">
   <link rel="stylesheet" href="css/magnific-popup.css">
   <link rel="stylesheet" href="estilo.css">

   <!-- Script
   ================================================== -->
	<script src="js/modernizr.js"></script>

   <!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="favicon.ico" >

</head>

<body>

   <!-- Header
   ================================================== -->
   <header id="home" style="background: #161415 url(<?php echo "/ZEUS/site/examples/".$capa->endereco?>) no-repeat top center;">

      <nav id="nav-wrap">

         <a class="mobile-btn" href="#nav-wrap" title="Show navigation">Show navigation</a>
	      <a class="mobile-btn" href="#" title="Hide navigation">Hide navigation</a>

         <ul id="nav" class="nav">
            <li><a class="smoothscroll" href="#">Início</a></li>
            <li><a class="smoothscroll" href="#pagina">Publicação</a></li>            
            <li><a class="smoothscroll" href="#fotos">Imagens</a></li>
            <li><a class="smoothscroll" href="#carc">Caracteristicas</a></li>
            <li><a class="smoothscroll" href="#autores">Autores</a></li>
         </ul> <!-- end #nav -->

      </nav> <!-- end #nav-wrap -->

      <div class="row banner">
         <div class="banner-text">
            <h1 class="responsive-headline"><?php echo  $row2->titulo ?></h1>
            <h3> <?php echo $row2->informacoes?> </h3>
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
      <h1 id="titulo">
         <?php echo $row2->titulo ?> 
      </h1>
      <div id="ocorrencia">Ocorre entre: <?php echo date('d/m/Y',strtotime($row2->data_inicio))?>  até <?php echo date('d/m/Y',strtotime($row2->data_fim))?>  </div>
      <div id="local">Local: <?php echo $row2->localizacao?></div>
      <div id="resumo"><?php echo $row2->resumo ?></div>
   <div id="fotos">
      <div id="rolagem">
         <?php 
            $cont=1;
            while ($row = $query -> fetch(PDO::FETCH_OBJ)){
               echo '<img src="/ZEUS/site/examples/'.$row->endereco.'" width="1000" height="200" alt="" id="img'.$cont.'">';
               $cont++;
            }
         ?>
      </div>
      <div id="miniaturas">
         <?php 
            $query = $con->prepare("SELECT endereco FROM img WHERE ex=$id");
            $query->execute();
            $cont=1;
            while ($row = $query -> fetch(PDO::FETCH_OBJ)){
               echo '<div class="caixa-miniatura">
                  <a href="#img'.$cont.'"><img src="/ZEUS/site/examples/'.$row->endereco.'" width="110" height="60" alt=""></a></div>';
               $cont++;
            }
         ?> 
      </div>
   </div>
      <h1 id="carc">Características:</h1>
      <div id="caracteristica"><?php echo $row2->caracteristicas?></div>
      <h1 id="carc"> Autores: </h1>
      <div id="autores"> <?php echo $row2->autores ?></div>
      <h1 id="carc"> Coordenador: </h1>
      <div id="autores"> <?php echo $row2->coordenador ?></div>
      <h1 id="carc"> Local de Ensaio: </h1>
      <div id="autores"> <?php echo $row2->local_ensaio ?></div>
      <h1 id="carc"> Ponto de Cultura: </h1>
      <div id="autores"> <?php echo $row2->ponto_cultura ?></div>
      <br>

      <?php $resultado = $con->query("SELECT nome, sobrenome FROM usuarios WHERE id = '$row2->usuario'");
      $res = $resultado->fetch(PDO::FETCH_OBJ);
      echo '<div id="autores">Texto publicado por: '.$res->nome. ' '.$res->sobrenome.' em '.date('d/m/Y',strtotime($row2->data_pub)).'</div>'?>
   </div>
   <!-- Contact Section
   ================================================== -->
   <section id="contact">

         <div class="row section-head">

            <div class="two columns header-col">

               <h1><span>Contato</span></h1>

            </div>

            <div class="ten columns">

                  <p class="lead">Nós gostamos de saber a opnião de você leitor... Nos envie um comentário, crítica ou sugestão. Nós estamos felizes em ter você aqui, nos informe se está feliz com nosso trabalho :)
                  </p>

            </div>

         </div>

         <div class="row">

            <div class="eight columns">

               <!-- form -->
               <form action="../sendMessage.php" method="post" id="contactForm" name="contactForm">
               <fieldset>

                  <div>
                     <label for="contactName">Nome <span class="required">*</span></label>
                     <input type="text" value="" size="35" id="contactName" name="contactName">
                  </div>

                  <div>
                     <label for="contactEmail">Email <span class="required">*</span></label>
                     <input type="text" value="" size="35" id="contactEmail" name="contactEmail">
                  </div>
                  <div>
                     <label for="contactMessage">Mensagem <span class="required">*</span></label>
                     <textarea cols="50" rows="6" id="contactMessage" name="contactMessage"></textarea>
                  </div>

                  <div>
                     <button class="submit">Enviar</button>
                     <span id="image-loader">
                        <img alt="" src="images/loader.gif">
                     </span>
                  </div>

               </fieldset>
               </form> <!-- Form End -->

               <!-- contact-warning -->
               <div id="message-warning"> Erro ao enviar!</div>
               <!-- contact-success -->
               <div id="message-success">
                  <i class="fa fa-check"></i>Mensagem enviada... Obrigado!<br>
               </div>

            </div>


            <aside class="four columns footer-widgets">

               <div class="widget widget_contact">

                  <h4>Endereço e Telefone</h4>
                  <p class="address">
                     IFNMG-Câmpus Januária <br>
                     Fazenda São Geraldo, Januária-MG, Brasil<br>
                     <span>(38) 998989847</span>
                  </p>

               </div>

               <div class="widget widget_tweets">

                  <h4 class="widget-title">Alguns comentários sobre esse post</h4>

                  <ul id="twitter">
                     <li>
                        <span>
                        This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet.
                        Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum
                        </span>
                        <b><a href="#">2 Days Ago</a></b>
                     </li>
                     <li>
                        <span>
                        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,
                        eaque ipsa quae ab illo inventore veritatis et quasi
                        </span>
                        <b><a href="#">3 Days Ago</a></b>
                     </li>
                  </ul>

               </div>

            </aside>

      </div>

   </section> <!-- Contact Section End-->


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