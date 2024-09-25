<?php
session_start(); // Certifique-se de que a sessão está sendo iniciada no topo da página

// Redirecionar para a página de login se o usuário não estiver logado
if (!isset($_SESSION['loggedInUser'])) {
    header('Location: sign.php');
    exit();
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


    <!--BOOTSTRAP-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!--SCRIPT-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <!--ICON-->
    <link rel="shortcut icon" href="img\logo-removebg-preview.png" type="image/x-icon" />

    <title>Banco de Dados</title>

    <style type="text/css">
         @font-face {
            font-family: 'Space Grotesk';
            src: url('/caminho/para/SpaceGrotesk-Regular.ttf') format('truetype'),
                url('/caminho/para/SpaceGrotesk-Medium.ttf') format('truetype'),
                url('/caminho/para/SpaceGrotesk-SemiBold.ttf') format('truetype');
            font-weight: normal;
            font-style: normal;
        }
          body {
            font-family: 'Space Grotesk', sans-serif;
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
            color:#7ececa;
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
            margin-left: 32vh;
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

        .sistema {
            border: 2px solid rgb(131, 176, 206);
            margin-top: 50px;
            margin-right: 100px;
            margin-left: 100px;
            border-radius: 9px;
            padding: 40px;
            display: flex;
            align-items: center;
        }

        .foto {
            margin-right: 60px;
        }

        .colorful-form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
            border-radius: 10px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
        }

        .form-input {
            width: 100%;
            padding: 10px;
            border: none;
            background-color: #fff;
            color: #333;
            border-radius: 5px;
        }

        textarea.form-input {
            height: 100px;
        }

        .form-button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #ff6f69;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-button:hover {
            background-color: #ff5f59;
        }

        .colorful-form {
            margin-top: 100px;
        }
        .btn-danger {
            background-color: #ff6f69;
            border-color: #ff6f69;
            color: white;
        }

        .btn-danger:hover {
            background-color: #ff5f59;
            border-color: #ff5f59;
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
          <a class="nav-link active" aria-current="page" href="carregamentohome.html">Home</a>
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
    </div>
  </div>
</nav>
  <br>
  <br>

    <!-- Formulário de busca -->
    <form method="GET" action="" class="container mt-5">
        <div class="input-group mb-3">
            <input type="text" name="termo" class="form-control" placeholder="Buscar produto por nome ou código" aria-label="Buscar produto">
            <button type="submit" name="buscar" class="btn btn-primary">Buscar</button>
        </div>
    </form>

    <!-- Tabela de Produtos -->
    <div class="container mt-5">
        <div class="table-responsive">
            <table id="tabela-dados" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Preço</th>
                        <th>Quantidade</th>
                        <th>Código</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                // Inclui o arquivo de conexão com o banco de dados
                include("db_connect.php");

                // Verifica se o formulário foi submetido via GET
                $termoBusca = '';
                if ($_SERVER["REQUEST_METHOD"] === 'GET' && isset($_GET['buscar']) && !empty($_GET['termo'])) {
                    $termoBusca = htmlspecialchars($_GET['termo']); // Evita injeção de código
                    $sql = "SELECT * FROM bd_Pi WHERE LOWER(nome) LIKE LOWER(:termo) OR cod LIKE :termo";
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindValue(':termo', "%$termoBusca%");
                    $stmt->execute();
                    $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
                } else {
                    // Se não houver busca, listar todos os produtos
                    $sql = "SELECT * FROM bd_Pi";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute();
                    $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
                }

                // Exibe os produtos na tabela
                if (!empty($produtos)) {
                    foreach ($produtos as $produto) {
                        echo "<tr>";
                        echo "<td>{$produto['nome']}</td>";
                        echo "<td>{$produto['preco']}</td>";
                        echo "<td>{$produto['quantidade']}</td>";
                        echo "<td>{$produto['cod']}</td>";
                        echo "<td>
                            <a href='editar.php?cod={$produto['cod']}'><i class='fas fa-edit'></i></a>
                        </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Nenhum produto encontrado.</td></tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
