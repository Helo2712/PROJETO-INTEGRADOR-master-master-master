<?php
session_start(); // Inicia a sessão

// Configuração do banco de dados
$servername = "143.106.241.3";
$username = "cl202234";
$password = "cl*27122006";
$dbname = "cl202234";

// Conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Verifica se o método da requisição é POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtém os dados do formulário
    $cnpj = $_POST['cnpj'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $usuario = $_POST['usuario'];
    $tipo = $_POST['tipo'];

    // Verifica se todos os campos estão preenchidos
    if (empty($cnpj) || empty($nome) || empty($email) || empty($senha) || empty($usuario) || empty($tipo)) {
        echo "<div class='alert alert-danger'>Preencha todos os campos obrigatórios.</div>";
    } else {
        // Prepara a query SQL para inserir os dados na tabela 'projetInt'
        $sql = "INSERT INTO projetInt (cnpj, nome, email, senha, usuario, tipo) VALUES (?, ?, ?, ?, ?, ?)";

        // Prepara a declaração
        $stmt = $conn->prepare($sql);

        // Verifica se a preparação da declaração foi bem-sucedida
        if ($stmt === false) {
            echo "<div class='alert alert-danger'>Erro na preparação da declaração.</div>";
            exit();
        }

        // Faz o bind dos parâmetros e executa a declaração
        $stmt->bind_param("ssssss", $cnpj, $nome, $email, $senha, $usuario, $tipo);

        
        // Executa a declaração
        if ($stmt->execute()) {
            $_SESSION['usuario'] = $usuario; // Define a variável de sessão
            header("Location: login.php");
            exit();
        } else {
            echo "<div class='alert alert-danger'>Erro ao cadastrar. Tente novamente.</div>";
        }

        // Fecha a declaração
        $stmt->close();
    }
}

// Fecha a conexão com o banco de dados
$conn->close();
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
            background-color:#7ececa; 
            border-color: #7ececa; }


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
    <form class="row g-3 needs-validation" autocomplete="off" novalidate method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <h1>Crie uma Conta</h1>
        <h5>Já possui uma conta? <a href="login.php">Entrar</a></h5>
        <br>
        <div class="col-md-4">
            <label for="validationCustom01" class="form-label">CNPJ</label>
            <input type="text" class="form-control" id="validationCustom01" name="cnpj" placeholder="CNPJ..." required>
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
            <input type="password" id="inputPassword5" class="form-control" name="senha" placeholder="Senha"
                aria-describedby="passwordHelpBlock" required>
        </div>

        <div class="col-md-4">
            <label for="validationCustom02" class="form-label">Nome</label>
            <input type="text" class="form-control" id="validationCustom02" name="nome" placeholder="Nome..." required>
            <div class="valid-feedback">
                OK!
            </div>
        </div>

        <div class="col-md-4">
            <label for="validationCustom02" class="form-label">Usuário</label>
            <input type="text" class="form-control" id="validationCustom02" name="usuario" placeholder="Usuário..." required>
            <div class="valid-feedback">
                OK!
            </div>
        </div>

        <div class="col-12">
            <div class="form-check d-inline-block me-3">
                <input class="form-check-input" type="radio" name="tipo" value="admin" id="adminRadio" required>
                <label class="form-check-label" for="adminRadio">
                    Administrador
                </label>
            </div>
            <div class="form-check d-inline-block">
                <input class="form-check-input" type="radio" name="tipo" value="user" id="userRadio" required>
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
<br><br>
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
</body> </html>