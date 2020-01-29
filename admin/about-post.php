<?php

include_once("../Controller/PostController.php");

session_start();

if(!isset($_SESSION['id']))
{
	Header("Location: login.php");
}

if(isset($_GET['logout']) || !isset($_GET['id']))
{
	session_destroy();
	Header("Location: login.php");
}

$postController = new PostController($_GET);

$posts = $postController->getPost();

if(isset($_GET['delete']))
{
	$_GET['id'] = $_GET['delete'];
	$post = new PostController($_GET);
	$post->delete();
	Header("Location: blog.php");
}

?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../bootstrap/bootstrap.css">
    <link rel="stylesheet" href="../styles.css">

    <title>Administrator Post</title>
  </head>
  <body>
		<!-- HIGHLIGHT -->
		<main style="background: linear-gradient(45deg, #016D94, #029DC0)" class="d-flex flex-column align-items-center w-100 text-center text-light shadow">
			<!-- HEADER -->
			<nav class="navbar px-4 py-3 navbar-expand-lg navbar-dark w-100 d-flex justify-content-between">
				<h1 class="navbar-brand d-xs-none">Espaço do Trânsito</h1>
				<form action="?logout=1" method="post">
					<button type="submit" class="btn btn-danger px-4 shadow-sm">Sair</button>
				</form>
			</nav>
		</main>

		<!-- POST -->
		<section class="w-100 px-3 py-4 d-flex flex-column align-items-center">
			<?php

			while($row = mysqli_fetch_assoc($posts))
			{
				echo "
				<div class='w-100 p-1 pb-2 d-flex justify-content-between align-items-center' style='max-width: 850px'>
		  		<div class='d-flex align-items-center'>
		  			<a href='blog.php' class='btn btn-light m-1'>Voltar</a>
		  			<span class='lead m-1'>".date("d/m/Y", strtotime($row['postDate']))."</span>
		  		</div>
		  		<div>
						<a href='edit-post?id=".$row['idtb_post']."' class='btn btn-success m-1'>Editar</a>
						<a href='?delete=".$row['idtb_post']."' class='btn btn-danger m-1'>Excluir</a>
					</div>
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

    <script src="../js/jquery.slim.min.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.js"></script>
  </body>
</html>