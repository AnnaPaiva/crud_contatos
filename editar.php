<?php
include 'conexao.php';
session_start();
if (!isset($_SESSION['logado'])) {
    header("Location: login.php");
    exit;
}


$id = $_GET['id'];

$sql = "SELECT * FROM contatos WHERE id = $id";
$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {
    $contato = $resultado->fetch_assoc();
} else {
    echo "Contato não encontrado.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Editar Contato</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">
        <h2>Editar Contato</h2>

        <form action="atualizar.php" method="POST" class="formulario">
            <input type="hidden" name="id" value="<?php echo $contato['id']; ?>">

            <label>Nome</label>
            <input type="text" name="nome" value="<?php echo $contato['nome']; ?>" required>

            <label>Email</label>
            <input type="email" name="email" value="<?php echo $contato['email']; ?>" required>

            <label>Telefone</label>
            <input type="text" name="telefone" value="<?php echo $contato['telefone']; ?>" required>

            <button type="submit" class="btn">Atualizar</button>
            <a href="index.php" class="btn-voltar">Voltar</a>
        </form>
    </div>

</body>

</html>