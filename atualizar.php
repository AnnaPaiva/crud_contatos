<?php
include 'conexao.php';
session_start();
if (!isset($_SESSION['logado'])) {
    header("Location: login.php");
    exit;
}


$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];

$sql = "UPDATE contatos SET nome='$nome', email='$email', telefone='$telefone' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
    exit;
} else {
    echo "Erro ao atualizar: " . $conn->error;
}
