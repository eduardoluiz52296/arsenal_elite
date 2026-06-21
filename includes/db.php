<?php
$host = 'localhost';
$db   = 'arsenal_elite';
$user = 'root';
$pass = ''; // No sandbox geralmente é vazio
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
     $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
     // Em produção, não mostre a mensagem de erro detalhada
     // throw new \PDOException($e->getMessage(), (int)$e->getCode());
     
     // Para este projeto acadêmico, vamos simular os dados se o banco não estiver disponível
     $pdo = null;
}
?>
