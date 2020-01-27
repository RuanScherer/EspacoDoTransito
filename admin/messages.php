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

    <title>Administrator Messages</title>
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
			<h2 class="font-weight-normal mb-4">Mensagens</h2>
			<ul style="list-style: none;" class="list-group p-0 w-100">
				<?php

				while($row = mysqli_fetch_assoc($messages))
				{
					echo "
					<a href='message-details.php?id=".$row['idtb_message']."' class='list-group-item list-group-item-action flex-column align-items-start'>
				    <div class='d-flex w-100 justify-content-between'>
				      <h5 class='mb-1'>".$row['topic']."</h5>
				      <small>".date("d/m/Y", strtotime($row['date']))."</small>
				    </div>
				    <p class='mb-1'>".$row['message']."</p>
				    <small class='text-muted'>".$row['name']."</small>
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