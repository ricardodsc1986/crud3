<?php
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$usuarios = [
    ['username' => 'admin', 'password' => 'senha'],
    ['username' => 'usuario1', 'password' => 'senha1'],
    ['username' => 'usuario2', 'password' => 'senha2'],
];

$loginValido = false;
foreach ($usuarios as $usuario) {
    if ($username === $usuario['username'] && $password === $usuario['password']) {
        $loginValido = true;
        break;
    }
}

if ($loginValido) {
    $_SESSION['usuario'] = $username;
    header('Location: login.php?success=1');
    exit();
} else {
    header('Location: login.php?error=1');
    exit();
}
?>
