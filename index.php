<?php
require_once 'includes/data.php';
require_once 'includes/functions.php';
require_once 'includes/db.php';
include 'includes/header.php';

// Busca produtos (do banco se disponível, senão do array estático)
$produtosExibicao = filtrarProdutos($produtos);
?>

<div class="hero-section">
    <div class="container">
        <h1 class="display-3 fw-bold">Domine a Arte do Corte</h1>
        <p class="lead mb-4">As melhores lâminas artesanais e táticas para colecionadores e profissionais.</p>
        <a href="curto_alcance.php" class="btn btn-primary btn-lg px-5">Ver Coleção</a>
    </div>
</div>

<div class="container my-5">
    <div class="row text-center mb-5">
        <div class="col">
            <h2 class="section-title d-inline-block">Destaques da Semana</h2>
        </div>
    </div>

    <div class="row">
        <?php 
        // Exemplo de uso de FOREACH e IF
        $contador = 0;
        foreach ($produtosExibicao as $produto): 
            if ($contador < 3): // Mostrar apenas os 3 primeiros como destaque
        ?>
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <img src="<?php echo $produto['imagem']; ?>" class="card-img-top" alt="<?php echo $produto['nome']; ?>" style="height: 250px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $produto['nome']; ?></h5>
                        <p class="card-text text-muted"><?php echo $produto['descricao']; ?></p>
                        <p class="price-tag"><?php echo formatarPreco($produto['preco']); ?></p>
                        <a href="#" class="btn btn-outline-dark w-100">Ver Detalhes</a>
                    </div>
                </div>
            </div>
        <?php 
            $contador++;
            endif;
        endforeach; 
        ?>
    </div>
</div>

<div class="bg-dark text-white py-5 mt-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h2 class="text-uppercase" style="color: var(--cor-primaria)">Qualidade Garantida</h2>
                <p>Nossas lâminas passam por rigorosos testes de têmpera e afiação. Trabalhamos apenas com os melhores cuteleiros do país.</p>
                <ul class="list-unstyled">
                    <li><i class="bi bi-check-circle-fill text-warning"></i> Aço Carbono e Inox de Alta Qualidade</li>
                    <li><i class="bi bi-check-circle-fill text-warning"></i> Cabos Ergonômicos e Duráveis</li>
                    <li><i class="bi bi-check-circle-fill text-warning"></i> Garantia Vitalícia de Fabricação</li>
                </ul>
            </div>
            <div class="col-md-6">
                <img src="https://images.unsplash.com/photo-1578912853046-01a7690f894a?auto=format&fit=crop&q=80&w=800" alt="Forja" class="img-fluid rounded shadow">
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
