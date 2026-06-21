<?php
require_once 'includes/data.php';
require_once 'includes/functions.php';
require_once 'includes/db.php';
include 'includes/header.php';

// Lógica de busca/filtro via GET
$busca = isset($_GET['busca']) ? $_GET['busca'] : '';
$produtosFiltrados = filtrarProdutos($produtos, 'curto_alcance');

if (!empty($busca)) {
    $temp = [];
    foreach ($produtosFiltrados as $p) {
        if (stripos($p['nome'], $busca) !== false) {
            $temp[] = $p;
        }
    }
    $produtosFiltrados = $temp;
}
?>

<div class="container my-5">
    <div class="row mb-4 align-items-center">
        <div class="col-md-6">
            <h1 class="section-title">Lâminas de Curto Alcance</h1>
            <p class="text-muted">Explore nossa seleção de facas de churrasco e adagas artesanais.</p>
        </div>
        <div class="col-md-6">
            <form class="d-flex" method="GET" action="curto_alcance.php">
                <input class="form-control me-2" type="search" name="busca" placeholder="Buscar produto..." value="<?php echo htmlspecialchars($busca); ?>">
                <button class="btn btn-primary" type="submit">Buscar</button>
            </form>
        </div>
    </div>

    <!-- Seção: Facas de Churrasco / Uso Diário -->
    <h2 class="mt-5 mb-4"><span class="badge bg-dark">Churrasco & Uso Diário</span></h2>
    <div class="row">
        <?php 
        $churrasco = filtrarProdutos($produtosFiltrados, 'curto_alcance', 'churrasco');
        if (empty($churrasco)):
            echo "<div class='col-12'><p class='alert alert-warning'>Nenhum produto encontrado nesta categoria.</p></div>";
        else:
            foreach ($churrasco as $p): 
        ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="<?php echo $p['imagem']; ?>" class="card-img-top" alt="<?php echo $p['nome']; ?>" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $p['nome']; ?></h5>
                        <p class="card-text small"><?php echo $p['descricao']; ?></p>
                        <p class="price-tag"><?php echo formatarPreco($p['preco']); ?></p>
                        <button class="btn btn-dark btn-sm w-100">Adicionar ao Carrinho</button>
                    </div>
                </div>
            </div>
        <?php 
            endforeach;
        endif; 
        ?>
    </div>

    <!-- Seção: Adagas Artesanais -->
    <h2 class="mt-5 mb-4"><span class="badge bg-dark">Adagas Artesanais</span></h2>
    <div class="row">
        <?php 
        $artesanal = filtrarProdutos($produtosFiltrados, 'curto_alcance', 'artesanal');
        if (empty($artesanal)):
            echo "<div class='col-12'><p class='alert alert-warning'>Nenhum produto encontrado nesta categoria.</p></div>";
        else:
            foreach ($artesanal as $p): 
        ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100 border-warning">
                    <img src="<?php echo $p['imagem']; ?>" class="card-img-top" alt="<?php echo $p['nome']; ?>" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $p['nome']; ?> <span class="badge bg-warning text-dark" style="font-size: 0.6rem">EXCLUSIVO</span></h5>
                        <p class="card-text small"><?php echo $p['descricao']; ?></p>
                        <p class="price-tag"><?php echo formatarPreco($p['preco']); ?></p>
                        <button class="btn btn-primary btn-sm w-100">Encomendar Peça</button>
                    </div>
                </div>
            </div>
        <?php 
            endforeach;
        endif; 
        ?>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
