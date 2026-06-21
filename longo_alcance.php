<?php
require_once 'includes/data.php';
require_once 'includes/functions.php';
require_once 'includes/db.php';
include 'includes/header.php';

$produtosLongoAlcance = filtrarProdutos($produtos, 'longo_alcance');
?>

<div class="container my-5">
    <div class="row mb-5">
        <div class="col-12 text-center">
            <h1 class="display-4 fw-bold">Longo Alcance</h1>
            <p class="lead">Precisão, equilíbrio e aerodinâmica para arremessos perfeitos.</p>
            <hr class="w-25 mx-auto border-4 border-primary">
        </div>
    </div>

    <div class="row">
        <?php 
        // Validação de Regras de Negócio (ex: array vazio)
        if (empty($produtosLongoAlcance)):
            echo "<div class='col-12 text-center'><div class='alert alert-info'>Nossa forja está trabalhando em novos itens de longo alcance. Volte em breve!</div></div>";
        else:
            foreach ($produtosLongoAlcance as $p): 
        ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100 bg-light">
                    <img src="<?php echo $p['imagem']; ?>" class="card-img-top" alt="<?php echo $p['nome']; ?>" style="height: 220px; object-fit: cover;">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start">
                            <h5 class="card-title"><?php echo $p['nome']; ?></h5>
                            <span class="badge bg-danger">PROMO</span>
                        </div>
                        <p class="card-text"><?php echo $p['descricao']; ?></p>
                        
                        <!-- Uso de função para calcular desconto -->
                        <p class="mb-0 text-muted text-decoration-line-through small"><?php echo formatarPreco($p['preco']); ?></p>
                        <p class="price-tag"><?php echo formatarPreco(calcularDesconto($p['preco'], 10)); ?> <small class="text-muted" style="font-size: 0.7rem">(10% OFF)</small></p>
                        
                        <button class="btn btn-dark w-100 mt-2">Comprar Agora</button>
                    </div>
                </div>
            </div>
        <?php 
            endforeach;
        endif; 
        ?>
    </div>

    <div class="row mt-5">
        <div class="col-12">
            <div class="p-5 mb-4 bg-secondary text-white rounded-3">
                <div class="container-fluid py-5">
                    <h2 class="display-5 fw-bold">Treinamento de Arremesso</h2>
                    <p class="col-md-8 fs-4">Oferecemos workshops mensais para iniciantes na arte do arremesso de facas e shurikens. Aprenda a técnica correta e segurança.</p>
                    <button class="btn btn-primary btn-lg" type="button">Saiba Mais</button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
