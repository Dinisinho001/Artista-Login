<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/Login.css">
    <link rel="stylesheet" href="CSS/bootstrap.css">
    <link rel="stylesheet" href="CSS/index.css">
    <script src="js/bootstrap.bundle.min.js"></script> 
    <title>Login</title>
</head>

<body>

        <nav class="navbar navbar-expand-lg bg-body-tertiary" id="navbar">
            <div class="container-fluid">
              <a class="navbar-brand py-3" href="index.html" id="text-t">
                <img src="img/logo.svg" height="30px" class="d-inline-block align-top" alt="Logo Mix Music">
              </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.html" id="text">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="biblioteca.html" id="text">Biblioteca</a>
                  </li>
                  
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="playlists.html" id="text">Playlists</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="liked.html" id="text">Liked</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="prime.html" id="text">Premium</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" id="text">
                      Dropdown
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark">
                      <li><a class="dropdown-item" href="colaboracao.html">Colaboração com artistas</a></li>
                      <li>
                        <hr class="dropdown-divider">
                      </li>
                      <li><a class="dropdown-item" href="#">Outras Opeções</a></li>
                    </ul>
                </ul>
                <ul class="navbar-nav ml-auto">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="login.php" id="text">Login</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="register.html" id="text">Registar</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>

          <?php 
                    require_once "php/partials/msg_sucesso.php";
                    require_once "php/partials/msg_erros.php"; 
                    ?>
          
    <div id="a">
        <div id="b">
            <img src="img/telefone.png" alt="png" height="750px" width="770px">
        </div>

        <div id="c">
            <h2 id="v">Bem Vindo!</h2>
            <form class="tab" method="post" action="php/verifica_login.php">
                <label id="abcd">Nome:</label>
                <input type="text" placeholder="Digite seu nome/email/telefone"  name="email">
                <label id="abcd">Senha:</label>
                <input type="password" placeholder="Password"  name="pass">
                <a href="#">Esqueceu a sua senha?</a>
                <input type="submit" value="Entrar">
                <a href="register.html">Criar uma nova conta</a>
            </form>
        </div>
    </div>

    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1" id="cr">© 2023 DWM</p>
        <ul class="list-inline footer-links">
          <li class="list-inline-item"><a href="index.html">Home</a></li>
          <li class="list-inline-item"><a href="sobrenos.html">Sobre nós</a></li>
          <li class="list-inline-item"><a href="termos.html">Termos e condições</a></li>
          <li class="list-inline-item"><a href="https://www.instagram.com" target="_blank">
              <img src="img/instagram-w.png" height="30px" class="d-inline-block align-top" alt="Instagram">
            </a></li>
          <li class="list-inline-item"><a href="https://www.facebook.com" target="_blank">
              <img src="img/facebook-w.png" height="30px" class="d-inline-block align-top" alt="Facebook">
            </a></li>
        </ul>
          </footer>
</html>
</body>
</html>