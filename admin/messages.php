<?php

include_once("../Controller/MessageController.php");

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

$messageController = new MessageController($_POST);

$messageController->autodestruct();

$messages = $messageController->getAll();

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

    <title>Administrator Messages</title>
  </head>
  <body>
		<!-- HIGHLIGHT -->
		<main class="d-flex flex-column align-items-center w-100 text-center text-light shadow background-right">
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
			<div class="w-100 mb-2 align-self-start">
				<a href="dashboard.php" class="text-muted text-decoration-none">Voltar para o painel administrativo</a>
			</div>
			<h2 class="font-weight-normal mb-4 align-self-start">Mensagens</h2>
			<ul class="list-group p-0 w-100 list-unstyled">
				<?php

				while($row = mysqli_fetch_assoc($messages))
				{
					echo "
					<a class='list-group-item list-group-item-action flex-column align-items-start'>
				    <div class='d-flex w-100 justify-content-between'>
				      <h5 class='mb-1'>".$row['topic']."</h5>
				      <small>".date("d/m/Y", strtotime($row['date']))."</small>
				    </div>
				    <p class='mb-1'>".$row['message']."</p>
				    <small class='text-muted'>".$row['name']." (".$row['email'].")</small>
				  </a>
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