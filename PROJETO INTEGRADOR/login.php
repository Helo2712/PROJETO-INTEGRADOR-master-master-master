<?php
session_start();

// Inclui o arquivo de conexão
require 'db_connect.php';  // Certifique-se de que o caminho está correto

$loginError = ''; // Variável para armazenar a mensagem de erro

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepara a query para selecionar o usuário com o email fornecido
    $sql = "SELECT usuario, senha, tipo FROM projetInt WHERE email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(1, $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($user) {
        if ($user['senha'] === $password) {
            $_SESSION['loggedInUser'] = $user['usuario'];
            $_SESSION['userType'] = $user['tipo']; // Salva o tipo de usuário na sessão
            header('Location: home.php?username=' . urlencode($user['usuario']));
            exit();
        } else {
            $loginError = 'Senha incorreta.';
        }
    } else {
        $loginError = 'Email não encontrado.';
    }
    

    // Fecha a declaração e a conexão
    $stmt = null;
    $conn = null;
}



?>




<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="shortcut icon" href="img\logo-removebg-preview.png" type="image/x-icon" />

    <title>LOGIN</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap');
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
            width: 100%;
            height: 100vh;
            background: linear-gradient(to right, #45b5c4 0%, #45b5c4 50%, whitesmoke 50%, whitesmoke 100%);

            display: flex;
            justify-content: center;
            align-items: center;
        }
        .um {
            width: 40%;
            height: 100vh;
        }
        .dois {
            width: 50%;
            height: 100vh;
            padding-left: 20%;
            padding-top: 5%;
        }
        .col-md-4 {
            width: 70%;
        }

        img {
            width: 90%;
            padding-top: 30%;
            padding-left: 10vh;
            padding-right: 10vh;
        }
        .btn-primary {
            width: 50%;
            margin-left: 10%;
            background-color: #c7ede8;
            border-color: whitesmoke;
        }
        .btn-primary:hover {
            background-color: #7ececa;
            border-color: #7ececa;
        }

        h1 {
            color: #7ECECA;
            font-weight: bold;
        }

        h5 {
            color: #7ECECA;
        }

        a {
            text-decoration: none;
            color: #1693a5;
        }

        a:hover {
            color: #45b5c4;
        }
        
        a:active {
            color: #c7ede8;
        }
    </style>
</head>

<body>

    <div class="um">
        <img src="img/login.svg">
    </div>

    <div class="dois">
        <form class="row g-3 needs-validation" autocomplete="off" novalidate method="POST" action="login.php">
            <h1>Entrar</h1>
            <h5>Não possui uma conta? <a href="sign.php">Cadastre-se</a></h5>
            <br>

            <!-- Exibe a mensagem de erro acima dos campos -->
            <?php if (!empty($loginError)): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $loginError; ?>
                </div>
            <?php endif; ?>

            <div class="col-md-4">
                <label for="loginEmail" class="form-label">Email</label>
                <input type="email" class="form-control" id="loginEmail" name="email" placeholder="Email..." required>
                <div class="invalid-feedback">
                    Por favor, escolha um email válido.
                </div>
            </div>

            <div class="col-md-4">
                <label for="loginPassword" class="form-label">Senha</label>
                <input type="password" id="loginPassword" class="form-control" name="password" placeholder="Senha" required>
            </div>

            <div class="col-12">
                <button class="btn btn-primary" type="submit">ENTRAR</button>
            </div>
        </form>

    </div>

    <script>
        (() => {
            'use strict'

            const forms = document.querySelectorAll('.needs-validation')
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
</body>

</html>
