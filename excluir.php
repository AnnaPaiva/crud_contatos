<?php
include 'conexao.php';
session_start();
if (!isset($_SESSION['logado'])) {
    header("Location: login.php");
    exit;
}


$id = $_GET['id'];

$sql = "DELETE FROM contatos WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
    exit;
} else {
    echo "Erro ao excluir: " . $conn->error;
}
