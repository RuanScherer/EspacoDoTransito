<?php

include_once("../Controller/CourseController.php");

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

if(isset($_GET['alter'])) 
{
  $course2 = new CourseController($_POST);
  $course2->edit();
  Header("Location: about-course.php?id=".$_POST['id']);
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

    <title>Administrator Editar Curso</title>
  </head>
  <body>
		<!-- HIGHLIGHT -->
		<main class="d-flex flex-column align-items-center w-100 text-center text-light shadow background-dark">
			<!-- HEADER -->
			<nav class="navbar px-4 py-3 navbar-expand-lg navbar-dark w-100 d-flex justify-content-between">
				<h1 class="navbar-brand d-xs-none">Espaço do Trânsito</h1>
				<form action="?logout=1" method="post">
					<button type="submit" class="btn btn-danger px-4 shadow-sm">Sair</button>
				</form>
			</nav>
		</main>

		<!-- FORM -->
		<section class="w-100 px-3 py-4 d-flex flex-column align-items-center">
			<h2 class="font-weight-normal">Editar Curso</h2>
        <?php
        while ($row = mysqli_fetch_assoc($course)) 
        {
          echo "
          <form method='post' action='?alter=1&id=".$row['idtb_course']."' class='w-100 p-2 max-550'>
          <div class='form-group' hidden>
            <label for='id'>ID</label>
            <input type='text' class='form-control' id='id' name='id' aria-describedby='id' value='".$row['idtb_course']."' required>
          </div>
  			  <div class='form-group'>
  			    <label for='name'>Nome</label>
  			    <input type='text' class='form-control' id='name' name='name' aria-describedby='name' value='".$row['name']."' required>
  			  </div>
  			  <div class='form-group'>
  			    <label for='description'>Descrição</label>
      			<input type='text' class='form-control' id='description' name='description' value='".$row['description']."' required>
  			  </div>
          <div class='form-group'>
            <label for='start'>Início</label>
            <input type='text' class='form-control' id='start' name='start' aria-describedby='start' value='".$row['start']."' required>
          </div>
          <div class='form-group'>
            <label for='courseLoad'>Carga Horária</label>
            <input type='number' class='form-control' id='courseLoad' name='courseload' aria-describedby='courseLoad' value='".$row['courseLoad']."' required>
          </div>
          <div class='form-group'>
            <label for='prerequisites'>Pré-Requisitos</label>
            <textarea rows='4' type='text' class='form-control' id='prerequisites' name='prerequisites' aria-describedby='prerequisites' required>";
          
          foreach (unserialize($row['prerequisites']) as $requisite) {
            echo $requisite.", ";
          }

          echo "</textarea>
          </div>
          <div class='form-group'>
            <label for='documents'>Documentos Necessários</label>
            <textarea rows='4' type='text' class='form-control' id='documents' name='documents' aria-describedby='documents' required>";

          foreach (unserialize($row['documents']) as $requisite) {
            echo $requisite.", ";
          }
          
          echo "</textarea>
          </div>";
        }

			  ?>
			  <div class="d-flex justify-content-between align-items-center">
			  	<a href='courses.php' class="btn btn-light px-4">Voltar</a>
			  	<button type="submit" class="btn btn-success px-4">Salvar</button>
			  </div>
			</form>
		</section>

    <script src="../js/jquery.slim.min.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.js"></script>
  </body>
</html>