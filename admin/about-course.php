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
    <link rel="stylesheet" href="../bootstrap/bootstrap.css">
    <link rel="stylesheet" href="../styles.css">

    <!-- Icon -->
    <link rel="sortcut icon" href="../assets/logo.png" type="image/png"/>

    <title>Administrator Curso</title>
  </head>
  <body>
		<!-- MODAL -->
  	<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Confirmar Ação</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        Tem certeza que deseja excluir o post?
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
		        <a href="?delete=" id="confirm-delete" class="btn btn-danger">Sim, excluir</a>
		      </div>
		    </div>
		  </div>
		</div>

		<!-- HIGHLIGHT -->
		<main class="d-flex flex-column align-items-center w-100 text-center text-light shadow background-dark">
			<!-- HEADER -->
			<nav class="navbar px-4 py-3 navbar-expand-lg navbar-dark w-100 d-flex justify-content-between">
				<h1 class="navbar-brand d-xs-none">Espaço do Trânsito</h1>
				<form action="?logout=1" method="post">
					<button type="submit" class="btn btn-danger px-4 shadow-sm mr-2">Sair</button>
				</form>
			</nav>
		</main>

		<!-- ABOUT THE COURSE -->
		<?php
		while($row = mysqli_fetch_assoc($course)) {
		?>
		<section class="w-100 px-3 py-4 mb-3 d-flex flex-column align-items-center">
			<h2 class="font-weight-normal mb-4"><?php echo $row['name']; ?></h2>
			<div class="card w-100 max-800">
			  <div class="card-header d-flex justify-content-between">
			  	<a href="courses.php" class="btn btn-light btn-sm mx-1">Voltar</a>
			  	<div>
				    <a href="edit-course.php?id=<?php echo $row['idtb_course']; ?>" class="btn btn-sm btn-success mx-1">Editar</a>
				  	<button id='<?php echo $row['idtb_course']; ?>' class='btn btn-danger btn-sm delete-post mx-1' data-toggle='modal' data-target='#delete-modal'>Excluir</button>
			  	</div>
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

    <script src="../js/jquery.slim.min.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script type="text/javascript">
    	deleteButtons = [...document.getElementsByClassName("delete-post")];
    	deleteButtons.forEach((el) => {
    		el.onclick = () => {
    			document.querySelector("#confirm-delete").href += el.id;
    		}
    	});
    </script>
  </body>
</html>