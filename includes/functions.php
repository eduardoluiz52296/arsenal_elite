<?php
/**
 * Filtra produtos por categoria ou subcategoria
 */
function filtrarProdutos($lista, $categoria = null, $subcategoria = null) {
    global $pdo;
    
    // Se o PDO estiver ativo, busca do banco
    if (isset($pdo) && $pdo !== null) {
        try {
            $sql = "SELECT p.*, c.nome as categoria_nome FROM produtos p 
                    JOIN categorias c ON p.id_categoria = c.id WHERE 1=1";
            $params = [];
            
            if ($categoria) {
                $sql .= " AND c.nome = ?";
                $params[] = ($categoria == 'curto_alcance' ? 'Curto Alcance' : 'Longo Alcance');
            }
            
            if ($subcategoria) {
                $sql .= " AND p.subcategoria = ?";
                $params[] = $subcategoria;
            }
            
            $stmt = $pdo->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            // Fallback para o array estático se o banco falhar
        }
    }

    // Lógica original com Array (Requisito Acadêmico mantido como fallback)
    if (empty($lista)) return [];
    $filtrados = [];
    foreach ($lista as $item) {
        $catSlug = ($item['categoria'] ?? '');
        $matchCategoria = ($categoria === null || $catSlug === $categoria);
        $matchSubcategoria = ($subcategoria === null || $item['subcategoria'] === $subcategoria);
        if ($matchCategoria && $matchSubcategoria) {
            $filtrados[] = $item;
        }
    }
    return $filtrados;
}

/**
 * Calcula desconto em um preço
 */
function calcularDesconto($preco, $percentual) {
    // Validação de Regras de Negócio com Condicionais
    if (empty($preco) || $preco < 0 || $percentual < 0) {
        return $preco;
    }
    
    $desconto = $preco * ($percentual / 100);
    $resultado = $preco - $desconto;
    
    // Retorno obrigatório do resultado
    return $resultado;
}

/**
 * Busca produto por ID
 */
function buscarPorId($lista, $id) {
    foreach ($lista as $item) {
        if ($item['id'] == $id) {
            return $item;
        }
    }
    return null;
}

/**
 * Formata preço para Real (BRL)
 */
function formatarPreco($valor) {
    return "R$ " . number_format($valor, 2, ',', '.');
}
?>
