<?php

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

    <!-- Icon -->
    <link rel="sortcut icon" href="../assets/logo.png" type="image/png"/>

    <title>Administrator Dashboard</title>
  </head>
  <body>
		<!-- HIGHLIGHT -->
		<main class="d-flex flex-column align-items-center w-100 text-center text-light pb-5 shadow background-dark">
			<!-- HEADER -->
			<nav class="navbar px-4 py-3 navbar-expand-lg navbar-dark w-100 d-flex justify-content-between">
				<h1 class="navbar-brand d-xs-none">Espaço do Trânsito</h1>
				<form action="?logout=1" method="post">
					<button type="submit" class="btn btn-danger px-4 shadow-sm">Sair</button>
				</form>
			</nav>

			<h1 class="text-center mt-4 title-width">Painel Administrativo</h1>
			<h4 class="font-weight-normal mb-4 subtitle-width">Você no controle.</h4>
		</main>

		<!-- POSTS -->
		<section class="w-100 px-3 py-4 d-flex flex-column align-items-center">
			<h2 class="font-weight-normal mb-3">O que deseja fazer?</h2>
			<ul class="d-flex flex-column flex-sm-row justify-content-center p-0 list-unstyled">
				<div class="card shadow m-2 w-100 max-400">
					<div class="card-body p0 d-flex flex-column justify-content-between">
						<div>
							<h4 class="card-title">Mensagens</h4>
							<p class="card-text">Veja o que as pessoas estão falando para você.</p>
						</div>
						<a href="messages.php" class="text-center btn btn-outline-primary mt-3">Ir</a>
					</div>
				</div>
				<div class="card shadow m-2 w-100 max-400">
					<div class="card-body p0 d-flex flex-column justify-content-between">
						<div>
							<h4 class="card-title">Blog</h4>
							<p class="card-text">Gerencie as postagens que as pessoas irão ver em seu site.</p>
						</div>
						<a href="blog.php" class="text-center btn btn-outline-primary mt-3">Ir</a>
					</div>
				</div>
				<div class="card shadow m-2 w-100 max-400">
					<div class="card-body p0 d-flex flex-column justify-content-between">
						<div>
							<h4 class="card-title">Cursos</h4>
							<p class="card-text">Gerencie os cursos oferecidos pela sua instituição.</p>
						</div>
						<a href="courses.php" class="text-center btn btn-outline-primary mt-3">Ir</a>
					</div>
				</div>
				<div class="card shadow m-2 w-100 max-400">
					<div class="card-body p0 d-flex flex-column justify-content-between">
						<div>
							<h4 class="card-title">Inscrições</h4>
							<p class="card-text">Veja quem está se inscrevendo em seus cursos.</p>
						</div>
						<a href="subscriptions.php" class="text-center btn btn-outline-primary mt-3">Ir</a>
					</div>
				</div>
			</ul>
		</section>

    <script src="../js/jquery.slim.min.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.js"></script>
  </body>
</html>