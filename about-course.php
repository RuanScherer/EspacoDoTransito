<?php

include_once("Controller/CourseController.php");

session_start();

if(!isset($_SESSION['id']) || !isset($_GET['id']))
{
	Header("Location: login.php");
}

if(isset($_GET['logout']))
{
	session_destroy();
	Header("Location: login.php");
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

    <title>Administrator Curso</title>
  </head>
  <body>
		<!-- HIGHLIGHT -->
		<main class="d-flex flex-column align-items-center w-100 text-center text-light pb-5 background-right">
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
			<?php
			while($row = mysqli_fetch_assoc($course)) {
			?>
			<h1 class="text-center mt-4 title-width"><?php echo $row['name']; ?></h1>
			<h4 class="font-weight-normal mb-4 subtitle-width"><?php echo $row['description']; ?></h4>
			<!-- ADICIONAR SETA COM ANIMAÇÃO -->
		</main>

		<!-- ABOUT THE COURSE -->
		<section class="w-100 px-3 py-4 mb-3 d-flex flex-column align-items-center">
			<div class="card w-100 max-800">
			  <div class="card-header d-flex justify-content-start">
			  	Sobre
			  </div>
			  <div class="card-body">
			  	<h5 class="card-title">Informações Básicas</h5>
			    <p class="card-text my-2"><strong>Início: </strong><?php echo $row['start'];?></p>
			    <p class="card-text my-2"><strong>Carga Horária: </strong><?php echo $row['courseLoad']; ?> horas</p>
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