<?php
// Configurações de conexão
$host = '143.106.241.3';
$dbname = 'cl202234';
$username = 'cl202234';
$password = 'cl*27122006';

try {
    // Cria uma nova conexão PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Configura o PDO para lançar exceções em caso de erro
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
    exit();
}
?>
