<?php
session_start(); // Start the session

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $userData = array(
        'username' => $username,
        'email' => $email,
        'password' => $password,
        'role' => $role
    );

    $file = 'users.json';
    if (file_exists($file)) {
        $currentData = file_get_contents($file);
        $arrayData = json_decode($currentData, true);
    } else {
        $arrayData = array();
    }

    $arrayData[] = $userData;
    $finalData = json_encode($arrayData);

    if (file_put_contents($file, $finalData)) {
        $_SESSION['username'] = $username; // Set session variable
        header("Location: home.php?username=" . urlencode($username));
        exit();
    } else {
        echo "<div class='alert alert-danger'>Erro ao cadastrar. Tente novamente.</div>";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--BOOTSTRAP-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!--ICONS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="shortcut icon" href="img/favicon-16x16_outro.png" type="image/x-icon" />

    <title>SIGN UP</title>

    <style type="text/css">
        @import url('https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap');

        body {
            font-family: 'Raleway', sans-serif;
            width: 100%;
            height: 100vh;
            background: linear-gradient(to right, #45b5c4 0%, #45b5c4 50%, whitesmoke 50%, whitesmoke 100%);

            display: flex;
            justify-content: center;
            align-items: center;
        }

        div[class="um"] {
            width: 40%;
            height: 100vh;
        }

        div[class="dois"] {
            width: 50%;
            height: 100vh;
            padding-left: 20%;
            padding-top: 5%;
        }

        div[class="col-md-4"] {
            width: 70%;
        }

        img {
            width: 90%;
            padding-top: 30%;
            padding-left: 10vh;
            padding-right: 10vh;
        }

        button[class="btn btn-primary"] {
            width: 50%;
            margin-left: 10%;
            background-color: #c7ede8;
            border-color: whitesmoke;
        }

        button[class="btn btn-primary"]:hover {
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
        <img src="img/sign.svg">
    </div>

    <div class="dois">
        <form class="row g-3 needs-validation" autocomplete="off" novalidate method="POST" action="sign.php">
            <h1>Crie uma Conta</h1>
            <h5>Já possui uma conta? <a href="login.php">Entrar</a></h5>
            <br>
            <div class="col-md-4">
                <label for="validationCustom01" class="form-label">Username</label>
                <input type="text" class="form-control" id="validationCustom01" name="username" placeholder="Username..." required>
                <div class="valid-feedback">
                    OK!
                </div>
            </div>

            <div class="col-md-4">
                <label for="validationCustomUsername" class="form-label">Email</label>
                <div class="input-group has-validation">
                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                    <input type="email" class="form-control" id="validationCustomUsername" name="email"
                        aria-describedby="inputGroupPrepend" placeholder="Email..." required>
                    <div class="invalid-feedback">
                        Por favor, escolha um email válido.
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <label for="inputPassword5" class="form-label">Senha</label>
                <input type="password" id="inputPassword5" class="form-control" name="password" placeholder="Senha"
                    aria-describedby="passwordHelpBlock" required>
            </div>

            <div class="col-12">
                <div class="form-check d-inline-block me-3">
                    <input class="form-check-input" type="radio" name="role" value="admin" id="adminRadio" required>
                    <label class="form-check-label" for="adminRadio">
                        Administrador
                    </label>
                </div>
                <div class="form-check d-inline-block">
                    <input class="form-check-input" type="radio" name="role" value="user" id="userRadio" required>
                    <label class="form-check-label" for="userRadio">
                        Usuário
                    </label>
                </div>
            </div>
            <br>
            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                    <label class="form-check-label" for="invalidCheck">
                        Concordo com os termos e condições
                    </label>
                    <div class="invalid-feedback">
                        Você deve aceitar antes de enviar
                    </div>
                </div>
            </div>

            <div class="col-12">
                <button class="btn btn-primary" type="submit">CADASTRAR</button>
            </div>
        </form>
    </div>

    <script type="text/javascript">
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
