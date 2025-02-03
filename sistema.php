<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit();
}

include_once('config.php');
$sql = "SELECT * FROM usuarios ORDER BY id DESC";
$result = $conexao->query($sql);

if ($result->num_rows > 0) {
    $users = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $users = [];
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISTEMA | ATLETICA</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(to left, rgb(31, 46, 31), rgb(9, 131, 9));
            color: #fff;
            margin: 0;
            padding: 0;
            width: 100%;
        }
        nav {
            text-align: center;
            color: green;
            background-color: aliceblue;
            padding: 10px;
        }
        nav h1 {
            margin: 0;
            position: relative;
            bottom: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table th, table td {
            border: 1px solid #fff;
            padding: 10px;
            text-align: left;
        }
        table th {
            background-color: #067d44;
        }
        table tr:nth-child(even) {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .btn{
            background-color: red;
            padding: 7px;
            border-radius: 10px;
            color: white;
        }
    </style>
</head>
<body>
    <nav>
        <img src="/img/atletica.png" alt="">
        <h1>Acessou o sistema</h1>
    </nav>
    <div class="m-5">
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Sexo</th>
                    <th>Data de nascimento</th>
                    <th>Cidade</th>
                    <th>Endereço</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($users)) : ?>
                    <?php foreach ($users as $user_data) : ?>
                        <tr>
                            <td><?= htmlspecialchars($user_data['nome']) ?></td>
                            <td><?= htmlspecialchars($user_data['email']) ?></td>
                            <td><?= htmlspecialchars($user_data['telefone']) ?></td>
                            <td><?= htmlspecialchars($user_data['sexo']) ?></td>
                            <td><?= htmlspecialchars($user_data['data_nasc']) ?></td>
                            <td><?= htmlspecialchars($user_data['cidade']) ?></td>
                            <td><?= htmlspecialchars($user_data['endereco']) ?></td>
                            <td>
                            <a href="delete.php?id=<?= $user_data['id'] ?>" class="btn">
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                                 <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0'/>
                                    </svg>
                            </a></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="8">Nenhum usuário encontrado.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
