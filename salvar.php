<?php
include 'conexao.php';
session_start();
if (!isset($_SESSION['logado'])) {
    header("Location: login.php");
    exit;
}


$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];

$sql = "INSERT INTO contatos (nome, email, telefone) VALUES ('$nome', '$email', '$telefone')";

if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
    exit;
} else {
    echo "Erro ao salvar: " . $conn->error;
}
