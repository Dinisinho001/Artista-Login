<?php
session_start();

require_once "php/LigarBD.php";
$faqs = $conn->query("select * from artista WHERE nome='T-Rex' ");
if (!$faqs) {
    die('Erro ao aceder à tabela de artista');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="CSS/bootstrap.css">
  <link rel="stylesheet" href="CSS/index.css">
  <link rel="stylesheet" href="CSS/artista.css">
  <script src="js/bootstrap.bundle.min.js"></script>
  <title>Document</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary" id="navbar">
    <div class="container-fluid">
      <a class="navbar-brand py-3" href="index.html" id="text-t">
        <img src="img/logo.svg" height="30px" class="d-inline-block align-top" alt="Logo Mix Music">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
              <li><a class="dropdown-item" href="#">Another option</a></li>
            </ul>
        </ul>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="login.html" id="text">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="register.html" id="text">Registar</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <img src="img/trex.png" alt="png" width="1520px">
  <div class="z">
  <?php
                                while ($faq = $faqs -> fetch_array(MYSQLI_ASSOC)) :
                                ?>
                                    <tr>
                                        <td><strong><h1><?= $faq["nome"] ?></h1></strong></td><br>
                                        <td><strong><?= $faq["qt_seguidores"] ?></strong></td><br>
                                    </tr>
                                <?php
                                endwhile;
                                ?>
    <br><button class="play"></button>
  </div>
  <div class="bn">
    <div class="retangulo">
      <p>T-Rex - UUUUHH</p>
      <source src="" type="mp4">
    </div>
    <div class="retangulo">
      <p>T-Rex - NÃO É POSSÍVEL</p>
    </div>
    <div class="retangulo">
      <p>T-Rex - SURVIVA</p>
    </div>
    <div class="retangulo">
      <p>T-Rex - MEMÓRIA</p>
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
</body>

</html>