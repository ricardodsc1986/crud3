<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit();
}

if (isset($_POST['total']) && isset($_POST['pagamento'])) {
    $total = $_POST['total'];
    $pagamento = $_POST['pagamento'];
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
    <title>Pagamento - Totalsports.com®</title>
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
            min-height: 100vh;
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
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .header {
            margin-bottom: 20px;
            text-align: center;
        }

        .header img {
            max-width: 200px;
            height: auto;
        }

        h1 {
            margin-bottom: 20px;
        }

        p {
            margin: 10px 0;
        }

        button {
            background-color: #FF0000;
            color: white;
            padding: 15px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 30%;
            font-size: 1em;
            margin-top: 20px;
        }

        button:hover {
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
    <div class="container">
        <div class="header">
            <img src="logo_loja.jpg" alt="Logo da Loja">
        </div>
        <h1>Pagamento Realizado com Sucesso!</h1>
        <p>Total: R$ <?php echo number_format($total, 2, ',', '.'); ?></p>
        <p>Forma de pagamento: <?php echo htmlspecialchars($pagamento); ?></p>
        <button onclick="window.location.href='produtos.php'">Voltar para Produtos</button>
    </div>

    <footer>
        Totalsports.com® 2024 - Ricardo Cavalcante Dev
    </footer>
</body>
</html>
