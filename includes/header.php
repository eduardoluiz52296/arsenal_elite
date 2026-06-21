<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arsenal de Elite - Venda de Armas Brancas</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;700&family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --cor-primaria: #ff4500; /* Laranja Vibrante */
            --cor-secundaria: #1a1a1a; /* Preto Carvão */
            --cor-destaque: #ffd700; /* Ouro */
        }
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f4;
        }
        h1, h2, h3, .navbar-brand {
            font-family: 'Oswald', sans-serif;
            text-transform: uppercase;
        }
        .navbar {
            background-color: var(--cor-secundaria) !important;
            border-bottom: 4px solid var(--cor-primaria);
        }
        .navbar-brand, .nav-link {
            color: white !important;
        }
        .nav-link:hover {
            color: var(--cor-primaria) !important;
        }
        .hero-section {
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('https://images.unsplash.com/photo-1594145070037-01308365116b?auto=format&fit=crop&q=80&w=1920') no-repeat center center;
            background-size: cover;
            color: white;
            padding: 100px 0;
            text-align: center;
        }
        .btn-primary {
            background-color: var(--cor-primaria);
            border-color: var(--cor-primaria);
        }
        .btn-primary:hover {
            background-color: #e63e00;
            border-color: #e63e00;
        }
        .card {
            border: none;
            transition: transform 0.3s;
            margin-bottom: 20px;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .card-title {
            color: var(--cor-secundaria);
            font-weight: bold;
        }
        .price-tag {
            color: var(--cor-primaria);
            font-size: 1.25rem;
            font-weight: bold;
        }
        footer {
            background-color: var(--cor-secundaria);
            color: white;
            padding: 40px 0;
            margin-top: 50px;
            border-top: 4px solid var(--cor-primaria);
        }
        .section-title {
            border-left: 5px solid var(--cor-primaria);
            padding-left: 15px;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <span style="color: var(--cor-primaria)">ARSENAL</span> DE ELITE
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Início</a></li>
                    <li class="nav-item"><a class="nav-link" href="curto_alcance.php">Curto Alcance</a></li>
                    <li class="nav-item"><a class="nav-link" href="longo_alcance.php">Longo Alcance</a></li>
                    <li class="nav-item"><a class="nav-link" href="contato.php">Contato</a></li>
                </ul>
            </div>
        </div>
    </nav>
