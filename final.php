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

if (isset($_POST['produtos']) && isset($_POST['quantidade'])) {
    $produtosSelecionados = $_POST['produtos'];
    $quantidades = $_POST['quantidade'];
    $total = 0;
    $produtosSelecionadosDetalhes = [];

    foreach ($produtosSelecionados as $id) {
        if (isset($produtos[$id]) && isset($quantidades[$id])) {
            $quantidade = (int)$quantidades[$id];
            $produtosSelecionadosDetalhes[] = [
                'nome' => $produtos[$id]['nome'],
                'preco' => $produtos[$id]['preco'],
                'quantidade' => $quantidade,
                'subtotal' => $produtos[$id]['preco'] * $quantidade
            ];
            $total += $produtos[$id]['preco'] * $quantidade;
        }
    }
} else {
    header('Location: produtos.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Compras - Totalsports.com®</title>
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
            align-items: center;
        }

        .header {
            margin-top: 20px;
            text-align: center;
        }

        .header img {
            max-width: 250px;
            height: auto;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            background: white;
            color: #000000;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.8);
            width: 90%;
            min-height: calc(100vh - 160px);
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

        h3 {
            margin-top: 20px;
        }

        input[type="submit"] {
            background-color: #FF0000;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 20px;
            margin-right: 10px;
        }

        input[type="submit"]:hover {
            background-color: #8B0000;
        }

        .btn-voltar {
            background-color: #FF0000;
            color: white;
            border: none;
            padding: 10px 20px; 
            border-radius: 5px; 
            cursor: pointer; 
            font-size: 16px; 
            margin-top: 20px; 
        }

        .btn-voltar:hover {
            background-color: #8B0000; 
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
    <div class="container">
        <h2>Produtos Selecionados</h2>
        <table>
            <tr>
                <th>Nome</th>
                <th>Quantidade</th>
                <th>Preço Unitário</th>
                <th>Subtotal</th>
            </tr>
            <?php foreach ($produtosSelecionadosDetalhes as $produto): ?>
                <tr>
                    <td><?php echo $produto['nome']; ?></td>
                    <td><?php echo $produto['quantidade']; ?></td>
                    <td>R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?></td>
                    <td>R$ <?php echo number_format($produto['subtotal'], 2, ',', '.'); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>

        <h3>Total: R$ <?php echo number_format($total, 2, ',', '.'); ?></h3>

        <h2>Escolha a Forma de Pagamento</h2>
        <form method="post" action="forma_pagamento.php">
            <select name="pagamento" required>
                <option value="">Selecione uma forma de pagamento</option>
                <option value="Cartão">Crédito - em até 10x sem juros</option>
                <option value="Dinheiro">Débito</option>
                <option value="Transferência">PIX</option>
            </select>
            <input type="hidden" name="total" value="<?php echo $total; ?>">
            <input type="submit" value="Finalizar Compra"> 
            <button type="button" class="btn-voltar" onclick="window.location.href='produtos.php'">Voltar</button>
        </form>
    </div>

    <footer>
        Totalsports.com® 2024 - Ricardo Cavalcante Dev
    </footer>
</body>
</html>
