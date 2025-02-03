<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];

    if ($nome == 'atleticafisio' && $senha == '123') {
        $_SESSION['usuario'] = $nome;
        header('Location: sistema.php');
        exit();
    } else {
        $erro = 'Nome de usuário ou senha inválidos.';
    }
}
?>