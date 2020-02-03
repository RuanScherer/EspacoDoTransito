<?php

include_once("../Controller/CourseController.php");

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

    <title>Administrator Courses</title>
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
			<div class="d-flex justify-content-between align-items-center w-100 mb-4">
				<h2 class="font-weight-normal">Seus Cursos</h2>
				<a href="new-course.php" class="btn btn-success">Novo</a>
			</div>
			<ul class="list-group p-0 w-100 d-flex flex-column flex-sm-row flex-wrap unstyled-list">
				
			</ul>
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