<?php

include_once("Controller/MessageController.php");

if(isset($_GET['send']))
{
	$message = new MessageController($_POST);
	$message->new();
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

    <!-- Font Awesome Kit -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" crossorigin="anonymous">

    <title>Espaço do Trânsito</title>
  </head>
  <body>
		<!-- HIGHLIGHT -->
		<main style="background: linear-gradient(45deg, #016D94, #029DC0)" class="d-flex flex-column align-items-center w-100 text-center text-light pb-5">
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
				      <a class="nav-link" href="courses.html">Cursos</a>
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

			<h1 class="text-center mt-4" style="max-width: 80%">Espaço do Trânsito</h1>
			<h4 style="max-width: 95%" class="font-weight-normal mb-4">Trabalhando com mudanças de comportamentos no trânsito.</h4>
			<!-- ADICIONAR SETA COM ANIMAÇÃO -->
		</main>

		<!-- NOTICES -->
		<section class="w-100 p-3 d-flex flex-column align-items-center">
			<h2 class="text-center font-weight-normal mb-1">Destaques</h2>
			<ul style="list-style: none;" class="d-flex flex-column align-items-center p-0">
				<li class="jumbotron p-4 my-3 w-100">
				  <h4 class="font-weight-normal">Formação para Instrutor</h4>
				  <p class="lead">Início dia 25/01 a 22/03/2020. Sábados e Domingos - 08h00 as 17h20</p>
				  <hr class="my-4">
				  <a class="btn text-white" style="background-color: #029DC0" href="courses/instrutor.html" role="button">Saiba mais</a>
				</li>
				<li class="jumbotron p-4 my-3 w-100">
				  <h4 class="font-weight-normal">Curso de Atualização para Instrutor - (C.A.I.)</h4>
				  <p class="lead">Nos dias 08 e 09/02/2020 Sábado e Domingo.</p>
				  <hr class="my-4">
				  <a class="btn text-white" style="background-color: #029DC0" href="courses/atualizacao-instrutor.html" role="button">Saiba mais</a>
				</li>
				<li class="jumbotron p-4 my-3 w-100">
				  <h4 class="font-weight-normal">Curso de Atualização de Diretor Geral - (ADG)</h4>
				  <p class="lead">Dias 05 e 06 de Fevereiro de 2020.</p>
				  <hr class="my-4">
				  <a class="btn text-white" style="background-color: #029DC0" href="courses/atualizacao-diretor-geral.html" role="button">Saiba mais</a>
				</li>
			</ul>
		</section>

		<!-- ABOUT -->
		<section style="background: linear-gradient(45deg, #029DC0, #016D94)" class="d-flex flex-column align-items-center w-100 py-4 px-3 text-center text-light">
			<h2 class="text-center font-weight-normal mb-3">Sobre Nós</h2>
			<p style="max-width: 650px">A Empresa Espaço do Trânsito LTDA. ME agora é uma realidade. Nosso objetivo é trabalhar mudanças de comportamentos no trânsito, através de cursos de capacitações e de formação, também estaremos junto com a sociedade realizando parcerias para um trânsito mais humano. Estaremos buscando o que há de melhor no mercado para instruir nossos alunos, e alcançar seus objetivos.</p>
		</section>

		<!-- CONTACT -->
		<section class="w-100 p-3 d-flex flex-column align-items-center">
			<h2 class="text-center font-weight-normal">Entre em contato</h2>
			<form method="post" action="?send=1" class="w-100" style="max-width: 550px">
			  <div class="form-group">
			    <label for="email">Email</label>
			    <input type="email" class="form-control" id="email" name="email" required>
			  </div>
			  <div class="form-group">
			    <label for="name">Nome</label>
			    <input type="text" class="form-control" id="name" name="name" required>
			  </div>
			  <div class="form-group">
			    <label for="topic">Assunto</label>
			    <input type="text" class="form-control" id="topic" name="topic" required>
			  </div>
			  <div class="form-group">
			    <label for="message">Mensagem</label>
			    <textarea class="form-control" id="message" name="message" rows="4" maxlength="100" required></textarea>
			    <small class="form-text my-2">
					  <a href="contact.php" class="text-muted link"><u>Mais opções de contato aqui.</u></a>
					</small>
			  </div>
			  <button type="submit" id="send" class="btn text-white w-100" style="background-color: #029DC0">Enviar</button>
			</form>
		</section>

		<!-- OPENING HOUR -->
		<div class="mb-3 py-3 w-100 d-flex flex-column align-items-center">
			<h3 class="text-center font-weight-normal">Horário de Atendimento</h3>
			<span class="text-center">De segunda à sexta das 08h00 às 12h00 e das 13h30 às 17h00</span>
		</div>


		<!-- FOOTER -->
		<footer class="d-flex flex-column align-items-center text-light w-100" style="background: linear-gradient(45deg, #016D94, #029DC0)">
			<div class="d-flex justify-content-between w-100 p-4">
				<div>
					<h4>Localização</h4>
					<span>Rua 25 de Agosto, 190</br>Itoupava Norte, Blumenau - SC</br>CEP 89053-300</span>
				</div>
				<a class="mt-2" href="https://www.facebook.com/Espa%C3%A7o-do-Tr%C3%A2nsito-Ltda-ME-218579714981802/?ref=br_rs" target="_blank">
					<img src="assets/facebook-square-brands.svg" style="width: 50px"></i>
				</a>
			</div>
		</footer>

    <script src="js/jquery.slim.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.js"></script>
    <script type="text/javascript">
    	fields = [...document.getElementsByClass("form-control")];
    	document.querySelector("#send").onclick = () => {
    		count = 0;
    		fields.forEach((field) => {
    			if(field.value.length > 0) {
    				count += 1;
    			}
    		});
    		if(count == 4) {
    			alert("Mensagem enviada.");
    		} else {
    			count = 0;
    		}
    	}
    </script>
  </body>
</html>