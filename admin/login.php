<?php

session_start();

if(isset($_SESSION['id']))
{
  Header("Location: dashboard.php");
}
else
{
  session_destroy();
}

include_once("../Controller/UserController.php");

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

    <title>Administrator Login</title>
  </head>
  <body style="background: linear-gradient(45deg, #016D94, #029DC0)">
    <div class="d-flex flex-column align-items-center justify-content-center p-3" style="width: 100vw; height: 100vh">
      <div class="card shadow-lg" style="width: 100%; max-width: 500px">
        <div class="card-body p-4">
          <form action="?login=1" method="post">
            <h3 class="text-center font-weight-normal mb-3">Painel Administrativo</h3>
            <div class="form-group">
              <label for="login">Login</label>
              <input type="text" class="form-control" id="login" name="login" required>
            </div>
            <div class="form-group">
              <label for="password">Senha</label>
              <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <?php

            if(isset($_GET['login']))
            {
              $user = new UserController($_POST);
              if($user->get())
              {
                Header("Location: dashboard.php");
              }
              else
              {
                echo "
                <p class='alert alert-danger alert-dismissible fade show' role='alert'>
                  Erro ao logar, tente novamente.
                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                  </button>
                </p>
                ";
              }
            }

            ?>
            <button type="submit" class="btn btn-outline-success float-right px-4">Entrar</button>
          </form>
        </div>
        <div class="card-footer d-flex justify-content-center">
          <small class="text-muted">Desenvolvido por Ruan Scherer</small>
        </div>
      </div>
    </div>

    <script src="../js/jquery.slim.min.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.js"></script>
  </body>
</html>