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

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(to left, rgb(31, 46, 31), rgb(9, 131, 9));
        }

        .tela-login{
            background-color: rgba(0, 0, 0, 0.5);
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 80px;
            border-radius: 15px;
            color: white;
        }

        input{
            padding: 15px;
            border: none;
            outline: none;
            font-size: 15px;
        }

        button{
            background-image: linear-gradient(to left, rgb(48, 223, 48), rgb(135, 255, 135));
            border: none;
            padding: 15px;
            width: 100%;
            border-radius: 10px;
            color: white;
            font-size: 15px;
            transition: 0.2s;
            cursor: pointer;
        }

        button:hover{
            transform: scale(1.05);
        }

        .voltar{
            border-radius: 20px;
            transition: 0.3s;
            cursor: pointer;
        }

        .voltar:hover{
            background-color: rgb(41, 87, 41);
            color: aliceblue;
        }

        .erro {
            color: red;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <nav>
        <a href="formulario.php">
        <input type="button" value="Voltar" class="voltar">
        </a>
    </nav>

    <div class="tela-login">
        <h1>Login</h1>
        <form method="POST" action="">
            <input type="text" name="nome" placeholder="Nome" required><br><br>
            <input type="password" name="senha" placeholder="Senha" required><br><br>
            <button type="submit">Entrar</button>
        </form>
        <?php if (isset($erro)): ?>
            <p class="erro"><?= $erro ?></p>
        <?php endif; ?>
    </div>
</body>
</html>
