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
      <div class="card p-3" style="width: 100%; max-width: 500px">
        <div class="card-body">
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
            <button type="submit" class="btn btn-outline-success float-right px-4">Entrar</button>
          </form>
        </div>
      </div>
    </div>

    <script src="../js/jquery.slim.min.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.js"></script>
  </body>
</html>