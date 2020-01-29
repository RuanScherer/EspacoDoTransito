<?php

include_once("../Controller/PostController.php");

session_start();

if(!isset($_SESSION['id']))
{
	Header("Location: login.php");
}

if(isset($_GET['logout']))
{
	session_destroy();
	Header("Location: login.php");
}

$postController = new PostController($_POST);

$posts = $postController->getAll();

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

    <title>Administrator Blog</title>
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

		<!-- POSTS -->
		<section class="w-100 px-3 py-4 d-flex flex-column align-items-center">
			<div class="d-flex justify-content-between align-items-center w-100 mb-4">
				<h2 class="font-weight-normal">Posts Ativos</h2>
				<a href="new-post.php" class="btn btn-success">Novo</a>
			</div>
			<ul style="list-style: none;" class="list-group p-0 w-100 d-flex flex-column flex-sm-row flex-wrap">
				<?php

				while($row = mysqli_fetch_assoc($posts))
				{
					echo "
				  <div class='card shadow m-2 w-100' style='max-width: 400px;'>
						<div class='card-body p0 d-flex flex-column justify-content-between'>
							<div>
								<h4 class='card-title'>".$row['title']."</h4>
								<p class='card-text text-muted'>".date("d/m/Y", strtotime($row['postDate']))."</p>
							</div>
							<div class='mt-3 d-flex justify-content-between align-items-center'>
								<a href='about-post.php?id=".$row['idtb_post']."' class='btn btn-light'>Ver mais</a>
								<div>
									<a href='edit-post?id=".$row['idtb_post']."' class='text-center btn btn-success m-1'>Editar</a>
									<a href='?delete=".$row['idtb_post']."' class='text-center btn btn-danger'>Excluir</a>
								</div>
							</div>
						</div>
					</div>
					";
				}

				?>
			</ul>
		</section>

    <script src="../js/jquery.slim.min.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.js"></script>
  </body>
</html>