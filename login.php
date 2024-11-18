<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Totalsports.com®</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            color: #FFFFFF;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-image: url('background.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .header {
            text-align: center;
            margin-top: 10px;
        }

        .header img {
            max-width: 250px;
            height: auto;
        }

        .container {
            max-width: 400px;
            width: 90%;
            margin: 0 auto;
            margin-bottom: 5px;
            background: white;
            color: #000000;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.8);
            font-size: 1.2em;
        }

        input[type="text"], input[type="password"] {
            width: calc(100% - 20px);
            padding: 15px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1em;
        }

        input[type="submit"] {
            background-color: #FF0000;
            color: white;
            padding: 15px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 1em;
        }

        input[type="submit"]:hover {
            background-color: #8B0000;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 400px;
            border-radius: 8px;
            text-align: center;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .button-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .proceed-button {
            background-color: #FF0000;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .proceed-button:hover {
            background-color: #CC0000;
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
        <h2>Login</h2>
        <form method="post" action="validar_login.php">
            <input type="text" name="username" placeholder="Usuário" required>
            <input type="password" name="password" placeholder="Senha" required>
            <input type="submit" value="Entrar">
        </form>
        
        <div id="errorModal" class="modal" style="display: none;">
            <div class="modal-content">
                <span class="close" onclick="document.getElementById('errorModal').style.display='none'">&times;</span>
                <p>Usuário ou senha inválidos!</p>
                <p>Entre com seus dados novamente.</p>
                <div class="button-container">
                    <button onclick="document.getElementById('errorModal').style.display='none'" class="proceed-button">Tentar Novamente</button>
                </div>
            </div>
        </div>

        <div id="successModal" class="modal" style="display: none;">
            <div class="modal-content">
                <span class="close" onclick="document.getElementById('successModal').style.display='none'">&times;</span>
                <p>Login realizado com sucesso!</p>
                <div class="button-container">
                    <button onclick="window.location.href='produtos.php'" class="proceed-button">Ir para Produtos</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        <?php if (isset($_GET['error'])): ?>
            window.onload = function() {
                document.getElementById('errorModal').style.display = 'block';
            }
        <?php endif; ?>

        <?php if (isset($_GET['success'])): ?>
            window.onload = function() {
                document.getElementById('successModal').style.display = 'block';
            }
        <?php endif; ?>

        window.onclick = function(event) {
            if (event.target.className === 'modal') {
                event.target.style.display = 'none';
            }
        }
    </script>

    <footer>
        Totalsports.com® 2024 - Uma criação de Ricardo Cavalcante - RC DEV
    </footer>
</body>
</html>
