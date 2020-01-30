<?php

include_once("Controller/PostController.php");

if(!isset($_GET['id']))
{
	Header("Location: blog.php");
}

$postController = new PostController($_GET);

$posts = $postController->getPost();

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

    <title>Espaço do Trânsito - Post</title>
  </head>
  <body>
		<!-- HIGHLIGHT -->
		<main style="background: linear-gradient(45deg, #016D94, #029DC0)" class="d-flex flex-column align-items-center w-100 text-center text-light">
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
		</main>

		<!-- POST -->
		<section class="w-100 px-3 py-4 d-flex flex-column align-items-center">
			<?php

			while($row = mysqli_fetch_assoc($posts))
			{
				echo "
				<div class='w-100 p-1 pb-2 d-flex justify-content-between align-items-center' style='max-width: 850px'>
		  		<a href='blog.php' class='btn btn-light m-1'>Voltar</a>
		  		<span class='lead m-1'>".date("d/m/Y", strtotime($row['postDate']))."</span>
		  	</div>
			  <div class='jumbotron bg-light px-5 py-5 w-100' style='max-width: 850px'>
				  <h1 class='display-4'>".$row['title']."</h1>
				  <hr class='my-4'>
				  <p>".nl2br($row['body'])."</p>
				</div>
				";
			}

			?>
		</section>

    <script src="js/jquery.slim.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.js"></script>
  </body>
</html>