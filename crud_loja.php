<?php
$nome = $_POST["nome"] ?? '';
$tipo = $_POST["tipo"] ?? '';
$preco = $_POST["preco"] ?? '';
$pagamento = $_POST["pagamento"] ?? '';
$idprod = $_POST["idprod"] ?? '';
$acao = $_POST["acao"] ?? '';

$con = new mysqli("127.0.0.1:3306", "root", "", "loja");
session_start();

if($acao == "c") { 
    $sql = "INSERT INTO produtos (nome, tipo, preco, pagamento) VALUES ('$nome', '$tipo', '$preco', '$pagamento')";
    $res = $con->query($sql);
    $_SESSION["aviso"] = "Produto cadastrado com sucesso.";
    header("location: ".$_SERVER['HTTP_REFERER']);
}

if($acao == "r") { 
    $sql = "SELECT * FROM produtos WHERE idprod='$idprod'";
    $res = $con->query($sql);
    if(mysqli_num_rows($res) > 0) {
        $produto = $res->fetch_assoc();
    } else {
        echo "Nenhum resultado encontrado.";
    }
}

if($acao == "u") { 
    $sql = "UPDATE produtos SET nome='$nome', tipo='$tipo', preco='$preco', pagamento='$pagamento' WHERE idprod='$idprod'";
    $res = $con->query($sql);
    $_SESSION["aviso"] = "Dados atualizados com sucesso.";
    header("location: ".$_SERVER['HTTP_REFERER']);
}

if($acao == "d") { 
    $sql = "DELETE FROM produtos WHERE nome='$nome'";
    $res = $con->query($sql);
    $_SESSION["aviso"] = $con->affected_rows." itens deletados.";
    header("location: ".$_SERVER['HTTP_REFERER']);
}

$con->close();
?>