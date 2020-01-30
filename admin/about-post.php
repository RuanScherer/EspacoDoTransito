<?php

include_once("../Controller/PostController.php");

session_start();

if(!isset($_SESSION['id']) || !isset($_GET['id']))
{
	Header("Location: login.php");
}

if(isset($_GET['logout']) || !isset($_GET['id']))
{
	session_destroy();
	Header("Location: login.php");
}

$postController = new PostController($_GET);

$posts = $postController->getPost();

if(isset($_GET['delete']))
{
	$_GET['id'] = $_GET['delete'];
	$post = new PostController($_GET);
	$post->delete();
	Header("Location: blog.php");
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

    <title>Administrator Post</title>
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
					<button type="submit" class="btn btn-danger px-4 shadow-sm">Sair</button>
				</form>
			</nav>
		</main>

		<!-- POST -->
		<section class="w-100 px-3 py-4 d-flex flex-column align-items-center">
			<?php

			while($row = mysqli_fetch_assoc($posts))
			{
				echo "
				<div class='w-100 p-1 pb-2 d-flex justify-content-between align-items-center' style='max-width: 850px'>
		  		<div class='d-flex align-items-center'>
		  			<a href='blog.php' class='btn btn-light m-1'>Voltar</a>
		  			<span class='lead m-1'>".date("d/m/Y", strtotime($row['postDate']))."</span>
		  		</div>
		  		<div>
						<a href='edit-post.php?id=".$row['idtb_post']."' class='btn btn-success m-1'>Editar</a>
						<button id='".$row['idtb_post']."' class='btn btn-danger delete-post m-1' data-toggle='modal' data-target='#delete-modal'>Excluir</button>
					</div>
		  	</div>
			  <div class='jumbotron bg-light px-5 py-5 w-100' style='max-width: 850px'>
				  <h1 class='display-4'>".$row['title']."</h1>
				  <hr class='my-4'>
				  <p>".nl2br($row['body'])."</p>
				</div>
				";
			}

			?>
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