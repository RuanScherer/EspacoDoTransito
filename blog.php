<?php

include_once("Controller/PostController.php");

$postController = new PostController($_POST);

$posts = $postController->getAll();

?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/bootstrap.css">
    <link rel="stylesheet" href="styles.css">

    <!-- Icon -->
    <link rel="sortcut icon" href="assets/logo.png" type="image/png"/>

    <title>Espaço do Trânsito - Blog</title>
  </head>
  <body>
		<!-- HIGHLIGHT -->
		<main class="d-flex flex-column align-items-center w-100 text-center text-light pb-5 background-right">
			<!-- HEADER -->
			<nav class="navbar px-4 py-3 navbar-expand-lg navbar-dark w-100 d-flex justify-content-center">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNav">
				  <ul class="navbar-nav">
				  	<li class="nav-item">
				      <a class="nav-link" href="index.php">Home</a>
				    </li>
				    <li class="nav-item">
				      <a class="nav-link" href="courses.php">Cursos</a>
				    </li>
				    <li class="nav-item">
				      <a class="nav-link" href="blog.php">Blog</a>
				    </li>
				    <li class="nav-item">
				      <a class="nav-link" href="contact.php">Contato</a>
				    </li>
				  </ul>
				</div>
			</nav>

			<h1 class="text-center mt-4 title-width">Blog</h1>
			<h4 class="font-weight-normal mb-4 subtitle-width">Fique por dentro das últimas novidades.</h4>
			<!-- ADICIONAR SETA COM ANIMAÇÃO -->
		</main>

		<!-- POSTS -->
		<section class="w-100 px-3 py-4 d-flex flex-column align-items-center">
			<ul class="d-flex flex-column flex-sm-row align-items-xs-center p-0 list-unstyled">
				<?php

				while($row = mysqli_fetch_assoc($posts)) 
				{
					echo "
					<div class='card shadow my-3 mx-sm-2 w-100 max-550'>
						<div class='card-body d-flex flex-column justify-content-between'>
							<div>
								<h4 class='card-title'>".$row['title']."</h4>
								<p class='card-text text-muted'>Publicado em ".date("d/m/Y", strtotime($row['postDate']))."</p>
							</div>
							<a href='article.php?id=".$row['idtb_post']."' class='text-center btn btn-outline-primary mt-3'>Ler</a>
						</div>
					</div>
					";
				}

				?>
			</ul>
		</section>

		<!-- FOOTER -->
		<footer class="d-flex flex-column align-items-center text-light w-100 background-right">
			<div class="d-flex flex-column align-items-center text-light w-100 px-4 pt-4 pb-0" style="background-color: rgba(0,0,0,0.5);">
				<div class="d-flex justify-content-between w-100">
					<div class="d-flex flex-column">
						<h4>Localização</h4>
						<span>Rua 25 de Agosto, 190</br>Itoupava Norte, Blumenau - SC</br>CEP 89053-300</span>
						<a href="https://www.google.com.br/maps/place/R.+25+de+Agosto,+190+-+Itoupava+Norte,+Blumenau+-+SC,+89053-300/@-26.87927,-49.0865652,706m/data=!3m2!1e3!4b1!4m5!3m4!1s0x94df1efcd5cb50a3:0xa3df957d253fd289!8m2!3d-26.8792748!4d-49.0843765" class="text-light mt-2" target="_blank">Abrir no mapa</a>
					</div>
					<div class="d-flex flex-column">
						<a class="mt-2" href="https://www.facebook.com/Espa%C3%A7o-do-Tr%C3%A2nsito-Ltda-ME-218579714981802/?ref=br_rs" target="_blank">
							<img src="assets/facebook-square-brands.svg" style="width: 50px"></i>
						</a>
						<a class="mt-2" href="https://www.youtube.com/channel/UCjI8U2hlQdfPtuZWqUB-o3w" target="_blank">
							<img src="assets/youtube-square-brands.svg" style="width: 50px"></i>
						</a>
					</div>
				</div>
				<span class="mb-4">Desenvolvido por <strong><a class="text-white" href="https://www.instagram.com/scherer_programmer/" target="_blank">Ruan Scherer</a> &#8599;</strong></span>
			</div>
		</footer>

    <script src="js/jquery.slim.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.js"></script>
  </body>
</html>