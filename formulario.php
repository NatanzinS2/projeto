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