<?php
require_once 'includes/data.php';
require_once 'includes/functions.php';
require_once 'includes/db.php';
include 'includes/header.php';

$mensagemSucesso = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Simulação de processamento de formulário
    $nome = $_POST['nome'] ?? '';
    if (!empty($nome)) {
        $mensagemSucesso = true;
    }
}
?>

<div class="container my-5">
    <div class="row">
        <div class="col-md-6">
            <h1 class="section-title">Entre em Contato</h1>
            <p>Tem alguma dúvida sobre nossas lâminas ou precisa de um projeto personalizado? Envie-nos uma mensagem.</p>
            
            <div class="mt-4">
                <h5><i class="bi bi-geo-alt-fill text-primary"></i> Nossa Sede</h5>
                <p>Rua das Lâminas, 123 - Distrito Industrial<br>São Paulo - SP, 01234-567</p>
            </div>
            
            <div class="mt-3">
                <h5><i class="bi bi-telephone-fill text-primary"></i> Atendimento</h5>
                <p>Segunda a Sexta: 09h às 18h<br>Sábado: 09h às 13h</p>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="card shadow p-4">
                <?php if ($mensagemSucesso): ?>
                    <div class="alert alert-success">
                        Obrigado, <?php echo htmlspecialchars($nome); ?>! Sua mensagem foi enviada com sucesso. Em breve entraremos em contato.
                    </div>
                <?php endif; ?>
                
                <form action="contato.php" method="POST">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome Completo</label>
                        <input type="text" class="form-control" id="nome" name="nome" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="assunto" class="form-label">Assunto</label>
                        <select class="form-select" id="assunto" name="assunto">
                            <option value="duvida">Dúvida sobre Produto</option>
                            <option value="personalizado">Pedido Personalizado</option>
                            <option value="reclamacao">Reclamação/Sugestão</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="mensagem" class="form-label">Mensagem</label>
                        <textarea class="form-control" id="mensagem" name="mensagem" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Enviar Mensagem</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Mapa fictício (Componente Bootstrap) -->
<div class="container-fluid px-0 mt-5">
    <div class="bg-secondary text-white text-center py-5">
        <h3>Localização Privilegiada</h3>
        <p>Visite nosso showroom e sinta o equilíbrio de nossas peças pessoalmente.</p>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
