<?php

include_once("Controller/MessageController.php");
include_once("Controller/CourseController.php");

$courseController = new CourseController($_POST);

$courses = $courseController->getAll();

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

    <!-- Icon -->
    <link rel="sortcut icon" href="assets/logo.png" type="image/png"/>

    <!-- Font Awesome Kit -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" crossorigin="anonymous">

    <title>Espaço do Trânsito</title>
  </head>
  <body>
		<!-- HIGHLIGHT -->
		<main class="d-flex flex-column align-items-center w-100 text-center text-light background-right h100">
			<div class="w-100 pb-5 d-flex flex-column align-items-center justify-content-between h100" style="background-color: rgba(0,0,0,0.5);">
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

			<div class="d-flex flex-column justify-content-center align-items-center py-4 w-100 my-2">
				<h1 class="display-3 text-center title-width">Espaço do Trânsito</h1>
				<h3 class="font-weight-normal subtitle-width">Trabalhando com mudanças de comportamentos no trânsito.</h3>
			</div>

			<div class="d-flex flex-column align-items-center">
				<h5 class="font-weight-normal">Role para baixo</h5>
				<h5 class="mt-1">&#8595;</h5>
			</div>
			<!-- ADICIONAR SETA COM ANIMAÇÃO -->
			</div>
		</main>

		<!-- COURSES -->
		<section class="w-100 p-3 d-flex flex-column align-items-center">
			<h2 class="text-center font-weight-normal mb-2">Destaques</h2>
			<ul class="d-flex flex-column align-items-center p-0 w-100 list-unstyled">
				<?php

				$count = 0;

				while($row = mysqli_fetch_assoc($courses))
				{
					if($count == 4)
					{
						break;
					}
					echo "
				  <div class='card shadow m-2 w-100 max-550'>
						<div class='card-body p0 d-flex flex-column justify-content-between'>
							<div>
								<h4 class='card-title'>".$row['name']."</h4>
								<p class='card-text text-muted'>".$row['description']."</p>
							</div>
							<a href='about-course.php?id=".$row['idtb_course']."' class='btn btn-light mt-2'>Ver mais</a>
						</div>
					</div>
					";
					$count++;
				}

				?>
			</ul>
		</section>

		<!-- SUBSCRIBE -->
		<section style="background: linear-gradient(45deg, #029DC0, #016D94)" class="d-flex flex-column align-items-center w-100 py-4 px-3 text-center text-light">
			<h2 class="text-center font-weight-normal mb-3">Inscreva-se</h2>
			<p style="max-width: 650px">Ficou interessado em nossos cursos? Clique no botão abaixo e tenha sua inscrição feita em poucos minutos!</p>
			<a href="subscribe.php" class="btn btn-light">Ir para página de inscrição</a>
		</section>

		<!-- CONTACT -->
		<section class="w-100 p-3 mb-4 pb-4 d-flex flex-column align-items-center">
			<h2 class="text-center font-weight-normal">Entre em contato</h2>
			<form method="post" action="?send=1" class="w-100 max-550">
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
			  <button type="submit" id="send" class="btn text-white w-100 blue-button">Enviar</button>
			</form>
		</section>

		<!-- ABOUT -->
		<section style="background: linear-gradient(45deg, #029DC0, #016D94)" class="d-flex flex-column align-items-center w-100 py-4 px-3 text-center text-light">
			<h2 class="text-center font-weight-normal mb-3">Sobre Nós</h2>
			<p style="max-width: 650px">A Empresa Espaço do Trânsito LTDA. ME agora é uma realidade. Nosso objetivo é trabalhar mudanças de comportamentos no trânsito, através de cursos de capacitações e de formação, também estaremos junto com a sociedade realizando parcerias para um trânsito mais humano. Estaremos buscando o que há de melhor no mercado para instruir nossos alunos, e alcançar seus objetivos.</p>
		</section>

		<!-- OPENING HOUR -->
		<div class="my-2 py-4 w-100 d-flex flex-column align-items-center">
			<h2 class="text-center font-weight-normal">Horário de Atendimento</h2>
			<p class="text-center mb-1">Segunda à sexta</p>
			<p class="text-center">08h00 às 12h00 e das 13h30 às 17h00</p>
		</div>

		<!-- FOOTER -->
		<footer class="d-flex flex-column align-items-center text-light w-100 background-right">
			<div class="d-flex flex-column align-items-center text-light w-100 px-4 pt-4 pb-0" style="background-color: rgba(0,0,0,0.5);">
				<div class="d-flex justify-content-between w-100">
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
			</div>
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