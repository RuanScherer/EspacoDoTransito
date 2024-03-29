<?php

include_once("../Controller/SubscriptionController.php");

session_start();

if(!isset($_SESSION['id']) || !isset($_GET['id']))
{
	Header("Location: login.php");
}

$subscriptionController = new SubscriptionController($_GET);

$subscription = $subscriptionController->getSubscription();

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

    <title>Administrator Inscrição</title>
  </head>
  <body>
		<!-- ABOUT THE COURSE -->
		<?php
		while($row = mysqli_fetch_assoc($subscription)) {
		?>
		<section class="w-100 px-3 py-4 mb-3 d-flex flex-column align-items-center">
			<img src="../assets/logo.png" style="width: 150px" class="mb-3">
			<div class="card w-100 max-800">
			  <div class="card-header">
			  	Ficha de Inscrição
			  </div>
			  <div class="card-body">
			  	<h5 class="card-title">Curso de Interesse</h5>
			    <p class="card-text my-2"><strong>Nome: </strong><?php echo $row['course'];?></p>
			  </div>
			  <hr class="my-2">
			  <div class="card-body">
			  	<h5 class="card-title">Informações Pessoais</h5>
			    <p class="card-text my-2"><strong>Nome: </strong><?php echo $row['name'];?></p>
			    <p class="card-text my-2"><strong>RG: </strong><?php echo $row['rg']; ?></p>
			    <p class="card-text my-2"><strong>CPF: </strong><?php echo $row['cpf']; ?></p>
			    <p class="card-text my-2"><strong>Data de Nascimento: </strong><?php echo date("d/m/Y", strtotime($row['birthday'])); ?></p>
			    <p class="card-text my-2"><strong>Escolaridade: </strong><?php echo $row['schooling']; ?></p>
			  </div>
			  <hr class="my-2">
			  <div class="card-body">
			  	<h5 class="card-title">Informações de Localização</h5>
			  	<p class="card-text my-2"><strong>Endereço: </strong><?php echo $row['address']; ?></p>
			  	<p class="card-text my-2"><strong>Número: </strong><?php echo $row['number']; ?></p>
			  	<p class="card-text my-2"><strong>Complemento: </strong><?php echo $row['aditional']; ?></p>
			  	<p class="card-text my-2"><strong>Bairro: </strong><?php echo $row['district']; ?></p>
			  	<p class="card-text my-2"><strong>Cidade: </strong><?php echo $row['city']; ?></p>
			  	<p class="card-text my-2"><strong>UF: </strong><?php echo $row['uf']; ?></p>
			  	<p class="card-text my-2"><strong>CEP: </strong><?php echo $row['cep']; ?></p>
			  </div>
			  <hr class="my-2">
			  <div class="card-body">
			  	<h5 class="card-title">Informações de Contato</h5>
					<p class="card-text my-2"><strong>Telefone: </strong><?php echo $row['phone']; ?></p>
					<p class="card-text my-2"><strong>Celular: </strong><?php echo $row['cellphone']; ?></p>
					<p class="card-text my-2"><strong>Email: </strong><?php echo $row['email']; ?></p>
			  </div>
			  <hr class="my-2">
			  <div class="card-body">
			  	<h5 class="card-title">Informações do Condutor</h5>
					<p class="card-text my-2"><strong>CNH: </strong><?php echo $row['cnh']; ?></p>
					<p class="card-text my-2"><strong>Categoria: </strong><?php echo $row['categorie']; ?></p>
					<p class="card-text my-2"><strong>RENACH: </strong><?php echo $row['renach'];} ?></p>
			  </div>
			</div>
		</section>

    <script src="../js/jquery.slim.min.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script type="text/javascript">
    	window.print();
    </script>
  </body>
</html>