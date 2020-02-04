<?php

include_once("../Controller/SubscriptionController.php");

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

$subscriptionController = new SubscriptionController($_POST);

$subscriptions = $subscriptionController->getAll();

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

    <title>Administrator Inscrições</title>
  </head>
  <body>
		<!-- HIGHLIGHT -->
		<main class="d-flex flex-column align-items-center w-100 text-center text-light shadow background-right">
			<!-- HEADER -->
			<nav class="navbar px-4 py-3 navbar-expand-lg navbar-dark w-100 d-flex justify-content-between">
				<h1 class="navbar-brand d-xs-none">Espaço do Trânsito</h1>
				<form action="?logout=1" method="post">
					<button type="submit" class="btn btn-danger px-4 shadow-sm mr-2">Sair</button>
				</form>
			</nav>
		</main>

		<!-- POSTS -->
		<section class="w-100 px-3 py-4 d-flex flex-column align-items-center">
			<div class="w-100 mb-2">
				<a href="dashboard.php" class="text-muted text-decoration-none">Voltar para o painel administrativo</a>
			</div>
			<h2 class="font-weight-normal mb-4 align-self-start">Inscrições</h2>
			<ul class="list-group p-0 w-100 d-flex flex-column flex-sm-row flex-wrap unstyled-list">
				<?php

				while($row = mysqli_fetch_assoc($subscriptions))
				{
					echo "
				  <div class='card shadow m-2 w-100 max-400'>
						<div class='card-body p0 d-flex flex-column justify-content-between'>
							<div>
								<h4 class='card-title'>".$row['name']."</h4>
								<p class='card-text text-muted'>".$row['course']."</p>
							</div>
							<a href='about-subscription.php?id=".$row['idtb_subscription']."' class='mt-3 btn btn-light'>Ver detalhes</a>
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