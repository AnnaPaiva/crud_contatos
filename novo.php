<?php
include 'conexao.php';

session_start();
if (!isset($_SESSION['logado'])) {
    header("Location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Novo Contato</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">
        <h2>Adicionar Novo Contato</h2>

        <form action="salvar.php" method="POST" class="formulario">
            <label>Nome</label>
            <input type="text" name="nome" required>

            <label>Email</label>
            <input type="email" name="email" required>

            <label>Telefone</label>
            <input type="text" name="telefone" required>

            <button type="submit" class="btn">Salvar</button>
            <a href="index.php" class="btn-voltar">Voltar</a>
        </form>
    </div>

</body>

</html>