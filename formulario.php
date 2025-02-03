<?php

if(isset($_POST['submit']))
{
    //print_r('Nome: ' . $_POST['nome']);
    //print_r('<br>');
    //print_r('Email: ' . $_POST['email']);
    //print_r('<br>');
    //print_r('Telefone: ' . $_POST['telefone']);
    //print_r('<br>');
    //print_r('Sexo: ' . $_POST['sexo']);
    //print_r('<br>');
    //print_r('Data de nascimento: ' . $_POST['data_nascimento']);
    //print_r('<br>');
    //print_r('Cidade: ' . $_POST['cidade']);
    //print_r('<br>');print_r('Endereço: ' . $_POST['endereco']);
    //print_r('<br>');

    include_once('config.php');

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $sexo = $_POST['sexo'];
    $data_nasc = $_POST['data_nascimento'];
    $cidade = $_POST['cidade'];
    $endereco = $_POST['endereco'];

    $result = mysqli_query($conexao, "INSERT INTO usuarios(nome, email, telefone, sexo, data_nasc, cidade, endereco) 
        VALUES ('$nome', '$email', '$telefone', '$sexo', '$data_nasc', '$cidade', '$endereco')");
}

?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario | ATLETICA</title>
    <style> 
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(to left, rgb(31, 46, 31), rgb(9, 131, 9));
            margin: 0;
            padding: 0;
            height: 100vh; 
        }

        .box {
            position: relative;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(0, 0, 0, 0.5);
            padding: 15px;
            border-radius: 15px;
            color: white;
            max-width: 330px;
        }


        fieldset{
            border: 3px solid rgb(13, 199, 13);
        }

        legend{
            border: 6px solid rgb(13, 199, 13);
            padding: 1px 1px;
            text-align: center;
            border-radius: 100%;
            width: 34%;
        }

        .inputBox{
            position: relative;
            width: 100%;
        }

        .inputUser{
            background: none;
            border: none;
            border-bottom: 1px solid white;  
            outline: none;
            color: white;
            font-size: 15px;
            letter-spacing: 1px;
            width: 96%; 
        }

        .labelInput{
            position: absolute;
            top: 0px;
            left: 0px;
            pointer-events: none;
            transition: .5s;
        }

        .inputUser:focus ~ .labelInput,
        .inputUser:valid ~ .labelInput{
            top: -20px;
            font-size: 12px;
            color: rgb(13, 199, 13);
        }

        #data_nascimento{
            border: none;
            padding: 8px;
            border-radius: 10px;
            outline: none;
            font-size: 15px;
        }

        #submit{
            background-image: linear-gradient(to left, rgb(48, 223, 48), rgb(135, 255, 135));
            width: 100%;
            border: none;
            padding: 15px;
            color: white;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
            transition: 0.2s;
        }

        #submit:hover{
            transform: scale(1.02);
        }


        .admin{
            cursor: pointer;
            border-radius: 20px;
            border: none;
            padding: 14px;
            align-items: center;
            margin-top: 10px;
            margin-left: 10px;
            transition: 0.3s;
        }

        .admin:hover{
            background-color: rgb(41, 87, 41);
            color: aliceblue;
        }
        
        .nasc{
            display: flex;
            flex-direction: row;
        }
    </style>
</head>
<body>
       <nav>
        <a href="login.php">
        <input type="button" value="ADMIN" class="admin">
        </a>
       </nav>

    <div class="box">
        <form action="formulario.php" method="POST">
            <fieldset>
                
                <br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                    <label for="nome" class="labelInput">Nome Completo</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="email" id="email" class="inputUser" required>
                    <label for="email" class="labelInput">Email</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="tel" name="telefone" id="telefone" class="inputUser" required>
                    <label for="telefone" class="labelInput">Telefone</label>
                </div>
                <br>
                <p>Sexo:</p>
                <input type="radio" id="feminino" name="sexo" value="feminino" required>
                <label for="feminino">Feminino</label>
                <br>
                <input type="radio" id="masculino" name="sexo" value="masculino" required>
                <label for="masculino">Masculino</label>
                <br>
                <input type="radio" id="outro" name="sexo" value="outro" required>
                <label for="outro">Outro</label>
                <br><br>
                <div class="nasc">
                    <label for="data_nasc"><strong>Data de Nascimento:</strong></label>
                    <input type="date" name="data_nascimento" id="data_nascimento" required>
                    </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="cidade" id="cidade" class="inputUser" required>
                    <label for="cidade" class="labelInput">Cidade</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="endereco" id="endereco" class="inputUser" required>
                    <label for="endereco" class="labelInput">Endereço</label>
                </div>
                <br><br>
                <input type="submit" name="submit" id="submit">
            </fieldset>
        </form>
    </div>
    <footer>
        .
        </footer>
</body>
</html>