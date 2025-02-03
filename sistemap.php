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
