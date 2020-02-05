<?php

include_once("Controller/SubscriptionController.php");

if(isset($_GET['send']))
{
	$subscription = new SubscriptionController($_POST);
	$subscription->new();
	Header("Location: subscribe.php");
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

    <style type="text/css">
    	.hidden {
    		display: none !important;
    	}
    	#tip-background {
    		position: fixed;
    		width: 100vw;
    		height: 100vh;
    		background-color: rgba(0, 0, 0, 0.7);
    	}
    	#renach-tip {
    		max-width: 95%;
    	}
    </style>

    <!-- Icon -->
    <link rel="sortcut icon" href="assets/logo.png" type="image/png"/>

    <title>Espaço do Trânsito - Inscrever-se</title>
  </head>
  <body>
  	<div class="hidden p-3 d-flex flex-column justify-content-center align-items-center" id="tip-background">
  		<img src="assets/renach.jpeg" id="renach-tip">
  		<button class="btn btn-sm btn-secondary mt-3" id="close-tip">Entendi</button>
  	</div>
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

			<h1 class="text-center mt-4 title-width">Inscreva-se</h1>
			<h4 class="font-weight-normal mb-4 subtitle-width">Preencha o formulário e em poucos minutos tenha sua inscrição realizada.</h4>
			<!-- ADICIONAR SETA COM ANIMAÇÃO -->
		</main>

		<!-- SUBSCRIBE -->
		<section class="w-100 px-3 py-4 d-flex flex-column align-items-center">
			<form method="post" action="?send=1" class="w-100 max-550 mb-4">
			  <div class="form-group">
			    <label for="name">Nome Completo</label>
			    <input type="name" class="form-control field" id="name" name="name" required>
			  </div>
			  <div class="form-group">
			    <label for="rg">RG</label>
			    <input type="text" class="form-control field" id="rg" name="rg" maxlength="9" required>
			  </div>
			  <div class="form-group">
			    <label for="cpf">CPF</label>
			    <input type="text" class="form-control field" id="cpf" name="cpf" maxlength="14" required>
			  </div>
			  <div class="form-group">
			    <label for="birthday">Data de Nascimento</label>
			    <input type="date" class="form-control field" id="birthday" name="birthday" required>
			  </div>
			  <div class="form-group">
			    <label for="address">Endereço</label>
			    <input type="text" class="form-control field" id="address" name="address" required>
			  </div>
			  <div class="form-group">
			    <label for="number">Número</label>
			    <input type="number" class="form-control field" id="number" name="number" required>
			  </div>
			  <div class="form-group">
			    <label for="aditional">Complemento</label>
			    <input type="text" class="form-control field" id="aditional" name="aditional">
			  </div>
			  <div class="form-group">
			    <label for="district">Bairro</label>
			    <input type="text" class="form-control field" id="district" name="district" required>
			  </div>
			  <div class="form-group">
			    <label for="city">Cidade</label>
			    <input type="text" class="form-control field" id="city" name="city" required>
			  </div>
			  <div class="form-group">
			    <label for="uf">UF</label>
			    <input type="text" class="form-control field" id="uf" name="uf" maxlength="2" required>
			  </div>
			  <div class="form-group">
			    <label for="cep">CEP</label>
			    <input type="text" class="form-control field" id="cep" name="cep" required>
			  </div>
			  <div class="form-group">
			    <label for="phone">Telefone</label>
			    <input type="text" class="form-control field" id="phone" name="phone" maxlength="13">
			  </div>
			  <div class="form-group">
			    <label for="cellphone">Celular</label>
			    <input type="text" class="form-control field" id="cellphone" name="cellphone" maxlength="14" required>
			  </div>
			  <div class="form-group">
			    <label for="email">Email</label>
			    <input type="mail" class="form-control field" id="email" name="email" required>
			  </div>
			  <div class="form-group">
			    <label for="cnh">CNH</label>
			    <input type="text" class="form-control field" id="cnh" name="cnh" required>
			  </div>
			  <div class="form-group">
			    <label for="categorie">Categoria</label>
			    <input type="text" class="form-control field" id="categorie" name="categorie" maxlength="1" required>
			  </div>
			  <div class="form-group">
			    <label for="renach">RENACH</label>
			    <input type="text" class="form-control field" id="renach" name="renach" required>
			    <a class="text-muted btn-link btn p-0" id="renach-help">Não sabe oque é o RENACH? Clique aqui.</a>
			  </div>
			  <div class="form-group">
			    <label for="schooling">Escolaridade</label>
			    <select class="custom-select" id="schooling" name="schooling" required>
					  <option value="Ensino Fundamental Incompleto">Ensino Fundamental Incompleto</option>
					  <option value="Ensino Fundamental Completo">Ensino Fundamental Completo</option>
					  <option value="Ensino Médio Incompleto">Ensino Médio Incompleto</option>
					  <option value="Ensino Médio Completo">Ensino Médio Completo</option>
					  <option value="Ensino Superior Incompleto">Ensino Superior Incompleto</option>
					  <option value="Ensino Superior Completo">Ensino Superior Completo</option>
					</select>
			  </div>
			  <div class="form-group">
			    <label for="course">Curso de Interesse</label>
			    <select class="custom-select" id="course" name="course" required>
					  <option value="Atualização de Examinadores de Trânsito">Atualização de Examinadores de Trânsito</option>
					  <option value="Atualização de Vistoria de Identificação Veicular">Atualização de Vistoria de Identificação Veicular</option>
					  <option value="Atualização de Diretor de Ensino">Atualização de Diretor de Ensino</option>
					  <option value="Atualização de Diretor Geral">Atualização de Diretor Geral</option>
					  <option value="Atualização para Instrutor">Atualização para Instrutor</option>
					  <option value="Formação para Diretor Geral - Intensivo">Formação para Diretor Geral - Intensivo</option>
					  <option value="Transporte Coletivo de Passageiros">Transporte Coletivo de Passageiros</option>
					  <option value="Transporte de Carga Indivisível">Transporte de Carga Indivisível</option>
					  <option value="Transporte de Emergência">Transporte de Emergência</option>
					  <option value="Transporte Escolar">Transporte Escolar</option>
					  <option value="Vistoria e Identificação Veicular - Final de Semana">Vistoria e Identificação Veicular - Final de Semana</option>
					  <option value="Transporte de Produtos Perigosos">Transporte de Produtos Perigosos</option>
					  <option value="Formação de Diretor de Ensino">Formação de Diretor de Ensino</option>
					  <option value="Formação para Instrutor - Intensivo">Formação para Instrutor - Intensivo</option>
					  <option value="Atualização para Motofrete">Atualização para Motofrete</option>
					  <option value="Examinador de Trânsito">Examinador de Trânsito</option>
					  <option value="Condutores de Taxis- Intensivo">Condutores de Taxis- Intensivo</option>
					  <option value="Curso para Despachante">Curso para Despachante</option>
					  <option value="Formação para Instrutor - Finais de Semana">Formação para Instrutor - Finais de Semana</option>
					  <option value="Motofrete">Motofrete</option>
					  <option value="Programação Neurolinguística - Como melhorar a comunicação e as relações">Programação Neurolinguística - Como melhorar a comunicação e as relações</option>
					</select>
			  </div>
			  <button type="submit" class="btn w-100 btn-success" id="send">Enviar</button>
			</form>
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
		</footer>

    <script src="js/jquery.slim.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.js"></script>
    <script type="text/javascript">
    	cellphone = document.querySelector("#cellphone");
    	phone = document.querySelector("#phone");
    	cpf = document.querySelector("#cpf");
    	rg = document.querySelector("#rg");
    	renach = document.querySelector("#renach-help");
    	tip = document.querySelector("#tip-background");

    	renach.addEventListener('click', () => {
    		tip.classList.remove("hidden");
    	});

    	document.querySelector("#close-tip").addEventListener('click', () => {
    		tip.classList.add("hidden")
    	});

    	fields = [...document.getElementsByClassName("field")];

    	send = document.querySelector("#send").onclick = () => {
    		count = 0;
    		fields.forEach((field) => {
    			if(field.value.length > 0) {
    				count += 1;
    			}
    		});
    		if(count == 4) {
    			alert("Inscrição efetuada com sucesso.");
    		} else {
    			count = 0;
    		}
    	}

    	// CELLPHONE MASK
    	cellphone.addEventListener('input', (e) => {
          if(cellphone.value.length == 1 && e.inputType != "deleteContentBackward") {
             cellphone.value = "(" + cellphone.value;
          } else if(cellphone.value.length == 3 && e.inputType != "deleteContentBackward") {
          	cellphone.value += ")";
          } else if(cellphone.value.length == 9 && e.inputType != "deleteContentBackward") {
          	cellphone.value += "-";
          }
      })

      // PHONE MASK
    	phone.addEventListener('input', (e) => {
          if(phone.value.length == 1 && e.inputType != "deleteContentBackward") {
             phone.value = "(" + phone.value;
          } else if(phone.value.length == 3 && e.inputType != "deleteContentBackward") {
          	phone.value += ")";
          } else if(phone.value.length == 8 && e.inputType != "deleteContentBackward") {
          	phone.value += "-";
          }
      })

      // CPF MASK
    	cpf.addEventListener('input', (e) => {
          if((cpf.value.length == 3 || cpf.value.length == 7) && e.inputType != "deleteContentBackward") {
              cpf.value += ".";
          } else if (cpf.value.length == 11 && e.inputType != "deleteContentBackward") {
              cpf.value += "-";
          }
      })

      // RG MASK
      rg.addEventListener('input', (e) => {
          if((rg.value.length == 1 || rg.value.length == 5) && e.inputType != "deleteContentBackward") {
              rg.value += ".";
          }
      })
    </script>
  </body>
</html>