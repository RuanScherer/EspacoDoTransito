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

    <!-- Font Awesome Kit -->
    <script src="https://kit.fontawesome.com/d3701b4e65.js" crossorigin="anonymous"></script>

    <title>Espaço do Trânsito - Blog</title>
  </head>
  <body>
		<!-- HIGHLIGHT -->
		<main style="background: linear-gradient(45deg, #016D94, #029DC0)" class="d-flex flex-column align-items-center w-100 text-center text-light pb-5">
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
				      <a class="nav-link" href="courses.html">Cursos</a>
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

			<h1 class="text-center mt-4" style="max-width: 80%">Blog</h1>
			<h4 style="max-width: 95%" class="font-weight-normal mb-4">Fique por dentro das últimas novidades.</h4>
			<!-- ADICIONAR SETA COM ANIMAÇÃO -->
		</main>

		<!-- POSTS -->
		<section class="w-100 px-3 py-4 d-flex flex-column align-items-center">
			<ul style="list-style: none;" class="d-flex flex-column flex-sm-row align-items-center p-0">
				<?php

				while($row = mysqli_fetch_assoc($posts)) 
				{
					echo "
					<div class='card shadow m-3 w-100' style='max-width: 400px'>
						<div class='card-body p0 d-flex flex-column justify-content-between'>
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
		<footer class="d-flex flex-column align-items-center text-light w-100" style="background: linear-gradient(45deg, #016D94, #029DC0)">
			<div class="d-flex justify-content-between w-100 p-4">
				<div>
					<h4>Localização</h4>
					<span>Rua 25 de Agosto, 190</br>Itoupava Norte, Blumenau - SC</br>CEP 89053-300</span>
				</div>
				<a class="mt-2" href="https://www.facebook.com/Espa%C3%A7o-do-Tr%C3%A2nsito-Ltda-ME-218579714981802/?ref=br_rs" target="_blank">
					<img src="assets/facebook-square-brands.svg" style="width: 50px"></i>
				</a>
			</div>
		</footer>

    <script src="js/jquery.slim.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.js"></script>
  </body>
</html>