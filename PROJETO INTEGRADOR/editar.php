<?php
// Iniciar a sessão
session_start();

// Verificar se o usuário está logado
if (!isset($_SESSION['loggedInUser'])) {
    header('Location: login.php');
    exit();
}

include("db_connect.php");

if (isset($_GET['cod'])) {
    $cod = $_GET['cod'];
    $sql = "SELECT * FROM bd_Pi WHERE cod = :cod";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':cod', $cod);
    $stmt->execute();
    $produto = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($produto) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome'];
            $preco = $_POST['preco'];
            $quantidade = $_POST['quantidade'];

            $sql = "UPDATE bd_Pi SET nome = :nome, preco = :preco, quantidade = :quantidade WHERE cod = :cod";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':preco', $preco);
            $stmt->bindParam(':quantidade', $quantidade);
            $stmt->bindParam(':cod', $cod);

            if ($stmt->execute()) {
                header("Location: teste_banco.php?mensagem=Produto atualizado com sucesso");
                exit();
            } else {
                $erro = "Erro ao atualizar o produto.";
            }
        }
    } else {
        header('Location: teste_banco.php');
        exit();
    }
} else {
    header('Location: teste_banco.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="img\logo-removebg-preview.png" type="image/x-icon" />
    <title>Editar Produto</title>
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f7f7f7;
        }
        .container {
            max-width: 600px;
            margin-top: 50px;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 28px;
            font-weight: bold;
            color: #1693a5;
            text-align: center;
            margin-bottom: 20px;
        }
        .btn-primary {
            background-color: #e9edc9;
            border-color: #fefae0;
            color: #333;
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #1693a5;
        }
        .btn-secondary {
            background-color: #e9edc9;
            border-color: #fefae0;
            color: #333;
        }
        .btn-secondary:hover {
            background-color: #1693a5;
        }
        .form-label {
            font-weight: bold;
            color: #333;
        }
        .form-control {
            border-radius: 5px;
            padding: 10px;
        }
        .alert {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Editar Produto</h1>

        <?php if (isset($erro)) : ?>
            <div class="alert alert-danger text-center">
                <?php echo $erro; ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome do Produto</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?php echo htmlspecialchars($produto['nome']); ?>" required>
            </div>

            <div class="mb-3">
                <label for="preco" class="form-label">Preço</label>
                <input type="number" step="0.01" class="form-control" id="preco" name="preco" value="<?php echo htmlspecialchars($produto['preco']); ?>" required>
            </div>

            <div class="mb-3">
                <label for="quantidade" class="form-label">Quantidade</label>
                <input type="number" class="form-control" id="quantidade" name="quantidade" value="<?php echo htmlspecialchars($produto['quantidade']); ?>" required>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary btn-lg">Salvar Alterações</button>
                <a href="teste_banco.php" class="btn btn-secondary btn-lg">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>
