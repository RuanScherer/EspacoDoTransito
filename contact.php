<?php

include_once("Controller/MessageController.php");

if(isset($_GET['send']))
{
	$message = new MessageController($_POST);
	$message->new();
	Header("Location: contact.php");
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

    <title>Espaço do Trânsito - Contato</title>
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

			<h1 class="text-center mt-4 title-width">Contato</h1>
			<h4 class="font-weight-normal mb-4 subtitle-width">Tire dúvidas ou deixe uma mensagem.</h4>
			<!-- ADICIONAR SETA COM ANIMAÇÃO -->
		</main>

		<!-- CONTACT -->
		<section class="w-100 px-3 py-4 d-flex flex-column align-items-center">
			<form method="post" action="?send=1" class="w-100 max-550">
			  <div class="form-group">
			    <label for="email">Email</label>
			    <input type="email" class="form-control" id="email" required>
			  </div>
			  <div class="form-group">
			    <label for="name">Nome</label>
			    <input type="text" class="form-control" id="name" required>
			  </div>
			  <div class="form-group">
			    <label for="topic">Assunto</label>
			    <input type="text" class="form-control" id="topic" required>
			  </div>
			  <div class="form-group">
			    <label for="message">Mensagem</label>
			    <textarea class="form-control" id="message" rows="3" required></textarea>
			  </div>
			  <button type="submit" class="btn text-white w-100 blue-button">Enviar</button>
			</form>
			<span class="text-muted mt-3 mb-2">contate-nos por telefone</span>
			<span class="text-center my-1">(47) 3035-1915</span>
			<span class="text-muted mt-3 mb-2">ou também</span>
			<span class="text-center my-1"><a href="https://api.whatsapp.com/send?phone=5547988926175" class="btn-link">Fale conosco pelo WhatsApp</a></span>
		</section>

		<!-- FOOTER -->
		<footer class="d-flex flex-column align-items-center text-light w-100 background-right">
			<div class="d-flex justify-content-between w-100 p-4">
				<div class="d-flex flex-column">
					<h4>Localização</h4>
					<span>Rua 25 de Agosto, 190</br>Itoupava Norte, Blumenau - SC</br>CEP 89053-300</span>
					<a href="https://www.google.com.br/maps/place/R.+25+de+Agosto,+190+-+Itoupava+Norte,+Blumenau+-+SC,+89053-300/@-26.87927,-49.0865652,706m/data=!3m2!1e3!4b1!4m5!3m4!1s0x94df1efcd5cb50a3:0xa3df957d253fd289!8m2!3d-26.8792748!4d-49.0843765" class="text-light mt-2" target="_blank">Abrir no mapa</a>
				</div>
				<div class="d-flex flex-column">
					<a class="mt-2" href="https://www.facebook.com/Espa%C3%A7o-do-Tr%C3%A2nsito-Ltda-ME-218579714981802/?ref=br_rs" target="_blank">
						<img src="assets/facebook-square-brands.svg" style="width: 50px"></i>
					</a>
					<a class="mt-2" href="https://www.youtube.com/channel/UCjI8U2hlQdfPtuZWqUB-o3w" target="_blank">
						<img src="assets/youtube-square-brands.svg" style="width: 50px"></i>
					</a>
				</div>
			</div>
			<span class="mb-4">Desenvolvido por <strong><a class="text-white" href="https://www.instagram.com/scherer_programmer/" target="_blank">Ruan Scherer</a> &#8599;</strong></span>
		</footer>

    <script src="js/jquery.slim.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.js"></script>
    <script type="text/javascript">
    	fields = [...document.getElementsByClassName("form-control")];
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