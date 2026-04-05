<?php
session_start();
include 'conexao.php';

if (isset($_POST['usuario'])) {
    $usuario = $_POST['usuario'];
    $senha = md5($_POST['senha']);

    $sql = "SELECT * FROM usuarios WHERE usuario='$usuario' AND senha='$senha'";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
        $_SESSION['logado'] = true;
        header("Location: index.php");
        exit;
    } else {
        $erro = "Usuário ou senha incorretos";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">
        <h2>Login</h2>

        <?php if (isset($erro)): ?>
            <p style="color:red; text-align:center;"><?php echo $erro; ?></p>
        <?php endif; ?>

        <form method="POST" class="formulario">
            <label>Usuário</label>
            <input type="text" name="usuario" required>

            <label>Senha</label>
            <input type="password" name="senha" required>

            <button type="submit" class="btn">Entrar</button>
        </form>
    </div>

</body>

</html>