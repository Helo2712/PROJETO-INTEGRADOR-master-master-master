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

    <title>LOGIN</title>

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
        <img src="img/login.svg">
    </div>

    <div class="dois">
    <?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $file = 'users.json';
    if (file_exists($file)) {
        $currentData = file_get_contents($file);
        $arrayData = json_decode($currentData, true);

        foreach ($arrayData as $user) {
            if ($user['email'] === $email && $user['password'] === $password) {
                session_start();
                $_SESSION['loggedInUser'] = $user['username'];
                header('Location: home.php');
                exit();
            }
        }
        echo "<div class='alert alert-danger'>Email ou senha incorretos.</div>";
    } else {
        echo "<div class='alert alert-danger'>Erro interno. Tente novamente.</div>";
    }
}
?>


<form class="row g-3 needs-validation" autocomplete="off" novalidate method="POST" action="login.php">
            <h1>Entrar</h1>
            <h5>Não possui uma conta? <a href="sign.php">Cadastre-se</a></h5>
            <br>
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
