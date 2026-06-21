# Estrutura do Banco de Dados - Arsenal de Elite

Para atender aos requisitos, o banco de dados contará com as seguintes 5 tabelas principais:

1.  **categorias**: Armazena as categorias principais (Curto Alcance, Longo Alcance).
2.  **produtos**: Armazena os detalhes das lâminas (nome, preço, descrição, imagem). Possui uma FK para `categorias`.
3.  **clientes**: Armazena os dados dos compradores (nome, email, telefone).
4.  **pedidos**: Armazena o cabeçalho das vendas (data, status, id_cliente).
5.  **item_pedido (Tabela N:N)**: Tabela associativa entre `pedidos` e `produtos`, permitindo que um pedido tenha vários produtos e um produto esteja em vários pedidos. Armazena também a quantidade e o preço unitário no momento da venda.

## Relacionamentos:
- **categorias** (1) --- (N) **produtos**
- **clientes** (1) --- (N) **pedidos**
- **pedidos** (N) --- (N) **produtos** (via **item_pedido**)
