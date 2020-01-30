<?php

include_once("../Controller/PostController.php");

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

    <title>Administrator Novo Post</title>
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

		<!-- FORM -->
		<section class="w-100 px-3 py-4 d-flex flex-column align-items-center">
			<h2 class="font-weight-normal">Novo Post</h2>
			<form method="post" action="?create=1" class="w-100 p-2" style="max-width: 550px">
			  <div class="form-group">
			    <label for="title">Título</label>
			    <input type="text" class="form-control" id="title" name="title" aria-describedby="title" placeholder="Seu título objetivo" maxlength="45" required>
			  </div>
			  <div class="form-group">
			    <label for="body">Conteúdo</label>
    			<textarea class="form-control" id="body" name="body" rows="10" placeholder="Conteúdo do post..." required></textarea>
			  </div>
			  <?php

			  if(isset($_GET['create']))
        {
          $post = new PostController($_POST);
          if($post->new())
          {
            echo "
            <p class='alert alert-success alert-dismissible fade show' role='alert'>
              Sucesso! Seu post foi criado.
              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
            </p>
            ";
          }
          else
          {
            echo "
            <p class='alert alert-danger alert-dismissible fade show' role='alert'>
              Ops! Parece que houve um erro ao criar o post, tente novamente.
              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
            </p>
            ";
          }
        }

			  ?>
			  <div class="d-flex justify-content-between align-items-center">
			  	<a href='blog.php' class="btn btn-light px-4">Voltar</a>
			  	<button type="submit" class="btn btn-success px-4">Criar</button>
			  </div>
			</form>
		</section>

    <script src="../js/jquery.slim.min.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.js"></script>
  </body>
</html>