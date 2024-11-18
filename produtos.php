<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit();
}

$produtos = [
    ['id' => 1, 'nome' => 'Camiseta Esportiva', 'preco' => 49.90, 'imagens' => ['img/camiseta_esportiva1.jpg', 'img/camiseta_esportiva2.jpg']],
    ['id' => 2, 'nome' => 'Calça de Moletom', 'preco' => 89.90, 'imagens' => ['img/calca_moletom1.jpg', 'img/calca_moletom2.jpg']],
    ['id' => 3, 'nome' => 'Shorts de Corrida', 'preco' => 59.90, 'imagens' => ['img/shorts_corrida1.jpg', 'img/shorts_corrida2.jpg']],
    ['id' => 4, 'nome' => 'Jaqueta Corta-Vento', 'preco' => 129.90, 'imagens' => ['img/jaqueta_corta_vento1.jpg', 'img/jaqueta_corta_vento2.jpg']],
    ['id' => 5, 'nome' => 'Tênis de Corrida', 'preco' => 199.90, 'imagens' => ['img/tenis_corrida1.jpg', 'img/tenis_corrida2.jpg']],
    ['id' => 6, 'nome' => 'Chuteira de Futebol', 'preco' => 249.90, 'imagens' => ['img/chuteira_futebol1.jpg', 'img/chuteira_futebol2.jpg']],
    ['id' => 7, 'nome' => 'Agasalho Esportivo', 'preco' => 159.90, 'imagens' => ['img/agasalho_esportivo1.jpg', 'img/agasalho_esportivo2.jpg']],
    ['id' => 8, 'nome' => 'Blusa de Frio', 'preco' => 99.90, 'imagens' => ['img/blusa_frio1.jpg', 'img/blusa_frio2.jpg']],
    ['id' => 9, 'nome' => 'Bermuda de Praia', 'preco' => 39.90, 'imagens' => ['img/bermuda_praia1.jpg', 'img/bermuda_praia2.jpg']],
    ['id' => 10, 'nome' => 'Sandalha Esportiva', 'preco' => 79.90, 'imagens' => ['img/sandalha_esportiva1.jpg', 'img/sandalha_esportiva2.jpg']],
];
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Totalsports.com®</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-image: url('background.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: #FFFFFF;
            margin: 0;
            display: flex;
            flex-direction: column;
        }

        .header {
            margin-top: 20px;
            text-align: center;
        }

        .header img {
            max-width: 250px;
            height: auto;
        }

        .banner {
            max-height: 400px;
            max-width: 1200px;
            margin: 20px auto;
            display: block;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            background: rgba(255, 255, 255, 0.9);
            color: #000000;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 90%;
            flex-grow: 1;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #FF0000;
            color: #FFFFFF;
        }

        td {
            background-color: #FFFFFF;
            color: #000000;
        }

        input[type="number"] {
            width: 60px;
        }

        .carousel {
            display: flex;
            overflow: hidden;
            justify-content: center;
            align-items: center;
            height: 200px;
        }

        .carousel img {
            width: 200px;
            height: 200px;
            object-fit: cover;
            display: none;
        }

        .carousel img.active {
            display: block;
        }

        .carousel-controls {
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }

        .carousel-controls button {
            background-color: #FF0000;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
            margin: 0 5px;
        }

        .carousel-controls button:hover {
            background-color: #CC0000;
        }

        .button-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
            width: 100%;
        }

        .button-container button {
            background-color: #FF0000;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            margin: 0 10px;
        }

        .button-container button:hover {
            background-color: #8B0000;
        }

        .final-button {
            background-color: #FFD700;
            color: black;
        }

        .final-button:hover {
            background-color: #FFC107;
        }

        footer {
            background-color: #8B0000;
            color: #FFFFFF;
            text-align: center;
            padding: 10px 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="logo_loja.jpg" alt="Logo da Loja">
    </div>
    
    <img src="banner.jpg" alt="Banner" class="banner">

    <div class="container">
        <h1>Seleção de Produtos</h1>
        
        <form method="post" action="final.php">
            <table>
                <tr>
                    <th>Selecionar</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>Imagens</th>
                </tr>
                <?php foreach ($produtos as $produto): ?>
                    <tr>
                        <td>
                            <input type="checkbox" name="produtos[]" value="<?php echo $produto['id']; ?>">
                        </td>
                        <td><?php echo $produto['nome']; ?></td>
                        <td>R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?></td>
                        <td>
                            <input type="number" name="quantidade[<?php echo $produto['id']; ?>]" min="1" value="1">
                        </td>
                        <td>
                            <div class="carousel" id="carousel-<?php echo $produto['id']; ?>">
                                <?php foreach ($produto['imagens'] as $index => $imagem): ?>
                                    <img src="<?php echo $imagem; ?>" alt="<?php echo $produto['nome']; ?> - Imagem <?php echo $index + 1; ?>" class="<?php echo $index === 0 ? 'active' : ''; ?>">
                                <?php endforeach; ?>
                            </div>
                            <div class="carousel-controls">
                                <button type="button" onclick="prevImage(<?php echo $produto['id']; ?>)">&#10094;</button>
                                <button type="button" onclick="nextImage(<?php echo $produto['id']; ?>)">&#10095;</button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <div class="button-container">
                <button type="button" onclick="window.location.href='login.php'">Voltar</button>
                <button type="submit" class="final-button">Continuar para o Pagamento</button>
            </div>
        </form>

        <h2>Localização da Loja</h2>
        <div id="map" style="height: 400px; width: 100%;"></div>
    </div>

    <script>
        function nextImage(productId) {
            const carousel = document.getElementById(`carousel-${productId}`);
            const images = carousel.getElementsByTagName('img');
            let currentIndex = Array.from(images).findIndex(img => img.classList.contains('active'));
            images[currentIndex].classList.remove('active');
            currentIndex = (currentIndex + 1) % images.length;
            images[currentIndex].classList.add('active');
        }

        function prevImage(productId) {
            const carousel = document.getElementById(`carousel-${productId}`);
            const images = carousel.getElementsByTagName('img');
            let currentIndex = Array.from(images).findIndex(img => img.classList.contains('active'));
            images[currentIndex].classList.remove('active');
            currentIndex = (currentIndex - 1 + images.length) % images.length;
            images[currentIndex].classList.add('active');
        }

        function startAutoCarousel(productId) {
            setInterval(() => {
                nextImage(productId);
            }, 2500);
        }

        function initMap() {
            const novaYork = { lat: 40.7128, lng: -74.0060 };
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 12,
                center: novaYork,
            });
            const marker = new google.maps.Marker({
                position: novaYork,
                map: map,
            });
        }

        document.addEventListener('DOMContentLoaded', () => {
            const carousels = document.querySelectorAll('.carousel');
            carousels.forEach(carousel => {
                const productId = carousel.id.split('-')[1];
                startAutoCarousel(productId);
            });
        });
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap"></script>

    <footer>
        Totalsports.com® 2024 - Ricardo Cavalcante Dev
    </footer>
</body>
</html>