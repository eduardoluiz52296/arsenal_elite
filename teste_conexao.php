<?php
/**
 * Script de Teste de Conexão e Banco de Dados
 * Este arquivo ajuda a verificar se o seu MySQL e o PHP estão conversando corretamente.
 */
require_once 'includes/db.php';
require_once 'includes/data.php';
require_once 'includes/functions.php';

echo "<!DOCTYPE html>
<html lang='pt-br'>
<head>
    <meta charset='UTF-8'>
    <title>Teste de Conexão - Arsenal Elite</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet'>
    <style>
        body { padding: 50px; background-color: #f8f9fa; }
        .card { max-width: 600px; margin: auto; }
        .status-ok { color: green; font-weight: bold; }
        .status-err { color: red; font-weight: bold; }
    </style>
</head>
<body>
    <div class='card shadow'>
        <div class='card-header bg-dark text-white'>
            <h3>Status do Sistema</h3>
        </div>
        <div class='card-body'>";

// 1. Teste de Conexão PDO
echo "<h5>1. Conexão com o Banco de Dados:</h5>";
if (isset($pdo) && $pdo !== null) {
    echo "<p class='status-ok'>✅ Conectado com sucesso ao MySQL!</p>";
    
    // 2. Teste de Dados nas Tabelas
    echo "<h5>2. Verificação de Dados (Tabela 'produtos'):</h5>";
    try {
        $stmt = $pdo->query("SELECT COUNT(*) as total FROM produtos");
        $row = $stmt->fetch();
        echo "<p>Total de produtos no banco: <strong>" . $row['total'] . "</strong></p>";
        
        if ($row['total'] > 0) {
            echo "<p class='status-ok'>✅ Dados encontrados e prontos para exibição.</p>";
        } else {
            echo "<p class='status-err'>⚠️ O banco está conectado, mas a tabela está vazia. Execute o script 'database.sql'.</p>";
        }
    } catch (Exception $e) {
        echo "<p class='status-err'>❌ Erro ao ler tabela: " . $e->getMessage() . "</p>";
    }
} else {
    echo "<p class='status-err'>❌ Não foi possível conectar ao banco de dados.</p>";
    echo "<p class='text-muted small'>Verifique se o MySQL está rodando e se as credenciais em 'includes/db.php' estão corretas.</p>";
    echo "<p class='alert alert-info'><strong>Nota:</strong> O site continuará funcionando usando o modo de segurança (array estático), mas as alterações feitas no banco de dados não aparecerão.</p>";
}

echo "      <hr>
            <a href='index.php' class='btn btn-primary w-100'>Voltar para o Site</a>
        </div>
    </div>
</body>
</html>";
?>
