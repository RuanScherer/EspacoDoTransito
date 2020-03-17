<?php

include_once("Controller/CourseController.php");

if(!isset($_GET['id']))
{
	Header("Location: courses.php");
}

$courseController = new CourseController($_GET);

$course = $courseController->getCourse();

if(isset($_GET['delete']))
{
	$_GET['id'] = $_GET['delete'];
	$course = new CourseController($_GET);
	$course->delete();
	Header("Location: courses.php");
}

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

    <title>Curso</title>
  </head>
  <body>
		<!-- HIGHLIGHT -->
		<main class="d-flex flex-column align-items-center w-100 text-center text-light background-right">
			<div class="w-100 pb-5 d-flex flex-column align-items-center justify-content-between" style="background-color: rgba(0,0,0,0.5);">
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

			<div class="d-flex flex-column justify-content-center align-items-center py-4 w-100">
				<?php
				while($row = mysqli_fetch_assoc($course)) {
				?>
				<h1 class="text-center title-width"><?php echo $row['name']; ?></h1>
				<h3 class="font-weight-normal subtitle-width"><?php echo $row['description']; ?></h3>
			</div>

			<div class="d-flex flex-column align-items-center">
				<h5 class="font-weight-normal">Role para baixo</h5>
				<h5 class="mt-1">&#8595;</h5>
			</div>
			<!-- ADICIONAR SETA COM ANIMAÇÃO -->
			</div>
		</main>
		<!-- ABOUT THE COURSE -->
		<section class="w-100 px-3 py-4 mb-3 d-flex flex-column align-items-center">
			<div class="card w-100 max-800">
			  <div class="card-header d-flex justify-content-between align-items-center">
			  	Sobre
			  	<a href="subscribe.php?course=<?php echo $row['name']; ?>" class="btn btn-success">Inscrever-se</a>
			  </div>
			  <div class="card-body">
			  	<h5 class="card-title">Informações Básicas</h5>
			    <p class="card-text my-2"><strong>Início: </strong><?php echo $row['start'];?></p>
			    <p class="card-text my-2"><strong>Carga Horária: </strong><?php echo $row['courseLoad']; ?> horas</p>
			  </div>
			  <hr class="my-2">
			  <div class="card-body">
			  	<h5 class="card-title">Financeiro</h5>
			  	<p class="card-text my-2"><strong>Valor: </strong>R$<?php echo $row['price']; ?></p>
			    <p class="card-text my-2"><strong>Formas de Pagamento:</strong></p>
			  	<ul>
			  		<?php
			  			foreach (unserialize($row['payment']) as $payment) 
			  			{
			  				echo "<li>".$payment."</li>";
			  			}
			  		?>
			  	</ul>
			  </div>
			  <hr class="my-2">
			  <div class="card-body">
			  	<h5 class="card-title">Pré-Requisitos</h5>
			  	<ul>
			  		<?php
			  			foreach (unserialize($row['prerequisites']) as $requisite) {
			  				echo "<li>".$requisite."</li>";
			  			}
			  		?>
			  	</ul>
			  </div>
			  <hr class="my-2">
			  <div class="card-body">
			  	<h5 class="card-title">Documentos Necessários</h5>
					<ul>
			  		<?php
			  			foreach (unserialize($row['documents']) as $document) {
			  				echo "<li>".$document."</li>";
			  			}
			  		}
			  		?>
			  	</ul>
			  </div>
			</div>
		</section>

    <script src="js/jquery.slim.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.js"></script>
  </body>
</html>