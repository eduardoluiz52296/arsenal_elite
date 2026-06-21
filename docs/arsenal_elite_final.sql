--
-- Script SQL para criação e população do banco de dados 'arsenal_elite'
--
-- Autor: Manus AI
-- Data: 20 de Junho de 2026
-- Versão: 2.0
--
-- Este script cria um banco de dados para um sistema de e-commerce de lâminas, 
-- incluindo tabelas para categorias, produtos, clientes, pedidos e itens de pedido.
-- Ele também popula as tabelas com dados iniciais de exemplo.
--

-- 1. Criação do Banco de Dados
-- Recomenda-se usar DROP DATABASE apenas em ambientes de desenvolvimento/teste.
-- Em produção, tenha cautela ao executar esta linha.
-- DROP DATABASE IF EXISTS arsenal_elite;
-- Banco de dados deve ser criado previamente pela hospedagem.
-- Selecione o banco existente no phpMyAdmin antes de importar.
-- Observação sobre permissões:
-- As declarações GRANT ALL PRIVILEGES e FLUSH PRIVILEGES foram removidas
-- para garantir a portabilidade e segurança do script. Permissões devem ser
-- configuradas separadamente pelo administrador do banco de dados para cada usuário.
-- Exemplo (para ser executado manualmente pelo administrador, se necessário):
-- GRANT ALL PRIVILEGES ON arsenal_elite.* TO 'seu_usuario'@'localhost';
-- FLUSH PRIVILEGES;

-- 2. Tabela de Categorias
-- Armazena as diferentes categorias de produtos (e.g., Curto Alcance, Longo Alcance).
CREATE TABLE IF NOT EXISTS categorias (
    id INT AUTO_INCREMENT PRIMARY KEY COMMENT 'Identificador único da categoria',
    nome VARCHAR(100) NOT NULL COMMENT 'Nome da categoria (e.g., Curto Alcance)',
    descricao TEXT COMMENT 'Descrição detalhada da categoria'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 3. Tabela de Produtos
-- Contém informações detalhadas sobre cada produto disponível para venda.
CREATE TABLE IF NOT EXISTS produtos (
    id INT AUTO_INCREMENT PRIMARY KEY COMMENT 'Identificador único do produto',
    id_categoria INT NOT NULL COMMENT 'Chave estrangeira para a tabela categorias',
    nome VARCHAR(150) NOT NULL COMMENT 'Nome do produto (e.g., Faca do Chef Premium)',
    subcategoria VARCHAR(100) COMMENT 'Subcategoria do produto (e.g., churrasco, arremesso)',
    preco DECIMAL(10, 2) NOT NULL COMMENT 'Preço unitário do produto',
    descricao TEXT COMMENT 'Descrição detalhada do produto',
    imagem VARCHAR(255) COMMENT 'Caminho ou URL da imagem do produto',
    FOREIGN KEY (id_categoria) REFERENCES categorias(id)
        ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 4. Tabela de Clientes
-- Armazena os dados dos clientes cadastrados no sistema.
CREATE TABLE IF NOT EXISTS clientes (
    id INT AUTO_INCREMENT PRIMARY KEY COMMENT 'Identificador único do cliente',
    nome VARCHAR(150) NOT NULL COMMENT 'Nome completo do cliente',
    email VARCHAR(150) UNIQUE NOT NULL COMMENT 'Endereço de e-mail do cliente (único)',
    telefone VARCHAR(20) COMMENT 'Número de telefone do cliente',
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP COMMENT 'Data e hora do cadastro do cliente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 5. Tabela de Pedidos
-- Registra os pedidos feitos pelos clientes.
CREATE TABLE IF NOT EXISTS pedidos (
    id INT AUTO_INCREMENT PRIMARY KEY COMMENT 'Identificador único do pedido',
    id_cliente INT NOT NULL COMMENT 'Chave estrangeira para a tabela clientes',
    data_pedido DATETIME DEFAULT CURRENT_TIMESTAMP COMMENT 'Data e hora em que o pedido foi realizado',
    status VARCHAR(50) DEFAULT 'Pendente' COMMENT 'Status atual do pedido (e.g., Pendente, Finalizado, Cancelado)',
    total DECIMAL(10, 2) NOT NULL COMMENT 'Valor total do pedido',
    FOREIGN KEY (id_cliente) REFERENCES clientes(id)
        ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 6. Tabela N:N - Itens do Pedido (Relaciona Pedidos e Produtos)
-- Detalha os produtos incluídos em cada pedido, com quantidade e preço unitário no momento da compra.
CREATE TABLE IF NOT EXISTS item_pedido (
    id_pedido INT NOT NULL COMMENT 'Chave estrangeira para a tabela pedidos',
    id_produto INT NOT NULL COMMENT 'Chave estrangeira para a tabela produtos',
    quantidade INT NOT NULL COMMENT 'Quantidade do produto neste item do pedido',
    preco_unitario DECIMAL(10, 2) NOT NULL COMMENT 'Preço unitário do produto no momento da compra',
    PRIMARY KEY (id_pedido, id_produto) COMMENT 'Chave primária composta para garantir unicidade do item no pedido',
    FOREIGN KEY (id_pedido) REFERENCES pedidos(id)
        ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_produto) REFERENCES produtos(id)
        ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 7. População de Dados Inicial
-- Inserção de dados de exemplo para testes e demonstração.

INSERT INTO categorias (nome, descricao) VALUES 
('Curto Alcance', 'Lâminas para uso próximo, utilitárias e adagas.'),
('Longo Alcance', 'Lâminas projetadas para arremesso e precisão.');

INSERT INTO produtos (id_categoria, nome, subcategoria, preco, descricao, imagem) VALUES 
(1, 'Faca do Chef Premium', 'churrasco', 250.00, 'Aço damasco, cabo de madeira nobre.', 'assets/img/chef_premium.jpg'),
(1, 'Faca de Churrasco Gaúcha', 'churrasco', 180.00, 'Ideal para cortes precisos de carnes.', 'assets/img/churrasco_gaucha.jpg'),
(1, 'Adaga de Ritual Ébano', 'artesanal', 450.00, 'Lâmina forjada à mão com detalhes em prata.', 'assets/img/adaga_ebano.jpg'),
(1, 'Adaga Medieval Templária', 'artesanal', 320.00, 'Réplica histórica com acabamento impecável.', 'assets/img/adaga_templaria.jpg'),
(2, 'Kit 3 Kunais de Arremesso', 'arremesso', 120.00, 'Equilíbrio perfeito para precisão absoluta.', 'assets/img/kunai_kit.jpg'),
(2, 'Faca de Arremesso Profissional', 'arremesso', 85.00, 'Aço carbono de alta resistência.', 'assets/img/arremesso_prof.jpg'),
(2, 'Shuriken Estrela Ninja', 'arremesso', 45.00, '4 pontas afiadas, aerodinâmica superior.', 'assets/img/shuriken.jpg');

INSERT INTO clientes (nome, email, telefone) VALUES 
('João Silva', 'joao@email.com', '(11) 98888-7777'),
('Maria Oliveira', 'maria@email.com', '(21) 97777-6666');

INSERT INTO pedidos (id_cliente, total, status) VALUES 
(1, 370.00, 'Finalizado'),
(2, 120.00, 'Em Processamento');

INSERT INTO item_pedido (id_pedido, id_produto, quantidade, preco_unitario) VALUES 
(1, 1, 1, 250.00), -- João comprou 1 Faca Chef
(1, 5, 1, 120.00), -- João comprou 1 Kit Kunai
(2, 5, 1, 120.00); -- Maria comprou 1 Kit Kunai
