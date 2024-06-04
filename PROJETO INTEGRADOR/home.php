<?php
session_start(); // Start the session

if (!isset($_SESSION['username'])) {
    header('Location: sign.php');
    exit();
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
  crossorigin="anonymous"></script>

  <link rel="shortcut icon" href="img/favicon-16x16_outro.png" type="image/x-icon" />
  <title>Home</title>

  <script>
    function buscar() {
      const query = document.getElementById('buscaInput').value;
      const resultadosDiv = document.getElementById('resultados');

      if (query.trim() === "") {
        resultadosDiv.innerHTML = "Por favor, insira um termo para busca.";
        return;
      }

      // Criar objeto XMLHttpRequest para requisição AJAX
      const xhr = new XMLHttpRequest();
      xhr.open("GET", "buscar.php?query=" + encodeURIComponent(query), true);

      // Configurar o evento para processar a resposta
      xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
          resultadosDiv.innerHTML = xhr.responseText; // Atualizar a página com os resultados
        }
      };

      xhr.send(); // Enviar a solicitação
    }
  </script>
  <style type="text/css">
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap');


 

    body {
      font-family: 'Montserrat', sans-serif;
    }

    .navbar-brand {
      font-size: 25px;
      color: #1693a5;
      font-weight: bolder;
    }

    .navbar-brand:hover {
      color: #7ececa;
    }

    .navbar-brand:visited {
      color: #1693a5;
    }

    input:hover::placeholder {
      color: #7ececa;
    }

    button[type="submit"] {
      background-color: #7ececa;
      border-color: #7ececa;
      color: #1693a5;
    }

    button[type="submit"]:hover {
      background-color: #1693a5;
      color: #7ececa;
      border-color: #7ececa;
    }

    .card-title {
      color: #7ececa;
      font-weight: bold;
    }

    a[class="btn btn-outline-secondary"] {
      margin-left: 0vh;
    }

    a[class="btn btn-primary"] {
      background-color: #ccd5ae;
      border-color: #e9edc9;
    }

    a[class="btn btn-primary"]:hover {
      background-color: #e9edc9;
      border-color: #fefae0;
    }

    a[class="btn btn-danger"] {
      color: #1693a5;
      background-color: #7ececa;
      border-color: whitesmoke;
    }

    a[class="btn btn-danger"]:hover {
      color: #7ececa;
      background-color: #1693a5;
      border-color: whitesmoke;
    }

    @media (min-width: 769px) and (max-width: 991px) {
      .alturaCardsHome {
        height: 15vh;
      }

      .alturaImgsHome {
        width: 40vh;
      }

      .marginCards {
        width: 43.5vh;
      }

      a[class="btn btn-outline-secondary"] {
        margin-left: 24vh;
      }

      div[class="container homeContainer"] {
        margin-left: 10%;
      }
    }

    /* TABLETS E CELULARES */
    @media (min-width: 481px) and (max-width: 767px) {
      .alturaCardsHome {
        height: 15vh;
      }

      .alturaImgsHome {
        width: 40vh;
      }

      .marginCards {
        width: 43.5vh;
      }

      a[class="btn btn-outline-secondary"] {
        margin-left: 30vh;
      }

      div[class="container homeContainer"] {
        margin-left: 23vh;
      }
    }

    .alturaCardsHome {
      height: 35vh;
    }

    .alturaImgsHome {
      height: 70vh;
    }

    .nav-link.active:hover {
      color: #1693a5;
    }

    a[class="btn btn-primary"] {
      background-color: #7ececa;
      border-color: #a0ded6;
    }

    a[class="btn btn-primary"]:hover {
      background-color: #a0ded6;
      border-color: #c7ede8;
    }

    div[class="card text-center"] {
      margin: 0;
      padding: 0;
      width: 100%;
    }
    .btn btn-danger:hover{
      background-color: #a0ded6;
    }
    .footer {
    background-color: #7ececa; /* Cor do fundo do footer */
    color: #ecf0f1; /* Cor do texto */
    text-align: center; /* Alinhamento do texto */
    padding: 20px; /* Espaçamento interno */
}

.footer .container {
    max-width: 1200px; /* Largura máxima do footer */
    margin: 0 auto; /* Centraliza o footer */
}

.footer-links {
    list-style: none; /* Remove marcadores de lista */
    padding: 0; /* Remove preenchimento */
}

.footer-links li {
    display: inline; /* Exibe os itens em linha */
    margin: 0 10px; /* Espaçamento entre itens */
}

.footer-links a {
    text-decoration: none; /* Remove sublinhado */
    color: #ecf0f1; /* Cor do link */
}

.footer-links a:hover {
    text-decoration: underline; /* Sublinhado ao passar o mouse */
}

  </style>

</head>

<body>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand">SY SALE</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="sign.php">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">Opções</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="carregamento4.html">Sistema</a></li>
            <li><a class="dropdown-item" href="carreagamento3.html">Relatar problemas</a></li>
            <li><a class="dropdown-item" href="carregamento5.html">Faça aqui seu sistema</a></li>
            <li><a class="dropdown-item" href="carregamento6.html">Acessebilidade</a></li>
            <li><a class="dropdown-item" href="carregamento8.html">Banco de dados</a></li>
          </ul>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="logout.php"><i class="bi bi-box-arrow-right"></i> Sair</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
  <br>
  <br>
  <div class="container homeContainer">

    <div class="row">
      <div class="col-12">
        <h6 class="display-6"><i class="bi bi-house-door"></i>Bem-vindo(a),<span class="navbar-text ms-auto">
                    <?php
                    if (isset($_GET['username'])) {
                        echo htmlspecialchars($_GET['username']) . "!";
                    }
                    ?>
                </span></h6>
      </div>
    </div>


    <div class="row gap-0 row-gap-4">

      <div class="col-md-4 col-sm-12  marginCards">

        <div class="card">
          <img src="img/database.svg" class="card-img-top alturaImgsHome" alt="Espelho Redondo">
          <div class="card-body alturaCardsHome">
            <h5 class="card-title">Banco de dados</h5>
            <p class="card-text">Acrescemte ou exclua informações em seu banco de dados</p><br>
            <a href="carregamento8.html" class="btn btn-danger">Ver mais</a>
          </div>
        </div>

      </div>

      <div class="col-md-4 col-sm-12 marginCards">

        <div class="card">
          <img src="img/acessibility.svg" class="card-img-top  alturaImgsHome" alt="Banheira">
          <div class="card-body alturaCardsHome">
            <h5 class="card-title">Acessebilidade</h5>
            <p class="card-text">Veja como ela
              é incrementada no site e suas funcionalidade
            </p>
            <a href="carregamento6.html" class="btn btn-danger">Ver mais</a>
          </div>
        </div>

      </div>


      <div class="col-md-4 col-sm-12  marginCards">

        <div class="card">
          <img src="img/problems.svg" class="card-img-top alturaImgsHome" alt="Lixeira">
          <div class="card-body alturaCardsHome">
            <h5 class="card-title">Resolusão de problemas</h5>
            <p class="card-text">Acompanhe as correções de erros do seu Sistema</p><br>
            <a href="carreagamento3.html" class="btn btn-danger">Ver mais</a>
          </div>
        </div>

      </div>

      <div class="col-md-4 col-sm-12  marginCards">

        <div class="card" class="cardSistema">
          <img src="undraw_to_do_re_jaef.svg" class="card-img-top alturaImgsHome" alt="Tapete">
          <div class="card-body alturaCardsHome">
            <h5 class="card-title">Funcionalidade do Sistema</h5>
            <p class="card-text">Veja como anda a funcinalidade do seu Sistema</p><br>
            <a href="forms_validacao_usuario_sitema.html" class="btn btn-danger">Ver mais</a>
          </div>

        </div>
      </div>

      <div class="col-md-4 col-sm-12  marginCards">

        <div class="card" class="cardSistema">
          <img src="img/system.svg" class="card-img-top alturaImgsHome" alt="Tapete">
          <div class="card-body alturaCardsHome">
            <h5 class="card-title">Sistema</h5>
            <p class="card-text">Faça seu sistema aqui!</p><br>
            <a href="carregamento5.html" class="btn btn-danger">Ver mais</a>
          </div>

        </div>
      </div>
    </div>


    <br>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"></script>

    <br>


    <!--<div class="card text-center">
  <div class="card-header">
    SOBRE
  </div>
  <div class="card-body">
    <h5 class="card-title">Fale Conosco!</h5>
    <p class="card-text">Como foi sua experiência? Conte para nós!</p>
    <a href="forms.html" class="btn btn-primary"><i class="bi bi-envelope-check"></i> Clique Aqui</a>
  </div>
</div>-->

<footer class="footer">
  <div class="container">
      <p>&copy; 2024 - SY SALE. Todos os direitos reservados.</p>
      <ul class="footer-links">
          
      </ul>
  </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>