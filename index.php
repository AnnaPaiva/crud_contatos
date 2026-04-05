<?php
session_start();
if (!isset($_SESSION['logado'])) {
    header("Location: login.php");
    exit;
}

include 'conexao.php';

// Variáveis de ordenação
$coluna = $_GET['coluna'] ?? 'id';
$ordem = $_GET['ordem'] ?? 'asc';

// Variável de busca
$busca = $_GET['busca'] ?? '';

// SQL com busca + ordenação
$sql = "SELECT * FROM contatos 
        WHERE nome LIKE '%$busca%' 
        ORDER BY $coluna $ordem";

$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>CRUD de Contatos</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <h1>📇 Lista de Contatos</h1>

    <!-- CAMPO DE BUSCA -->
    <div style="text-align: center; margin-bottom: 20px;">
        <form method="GET" action="index.php">
            <input type="text" name="busca" placeholder="Buscar por nome" value="<?php echo $busca; ?>"
                style="padding: 10px; width: 250px; border-radius: 6px; border: 1px solid #ccc;">

            <button type="submit" class="btn">Buscar</button>
        </form>
    </div>

    <div style="text-align:right; margin-right: 20px;">
        <a href="logout.php" class="btn_delete">Sair</a>
    </div>

    <!-- TABELA -->
    <table border="1" cellpadding="8">
        <tr>
            <th><a href="?coluna=id&ordem=<?php echo ($ordem == 'asc') ? 'desc' : 'asc'; ?>">ID</a></th>
            <th><a href="?coluna=nome&ordem=<?php echo ($ordem == 'asc') ? 'desc' : 'asc'; ?>">Nome</a></th>
            <th><a href="?coluna=email&ordem=<?php echo ($ordem == 'asc') ? 'desc' : 'asc'; ?>">Email</a></th>
            <th><a href="?coluna=telefone&ordem=<?php echo ($ordem == 'asc') ? 'desc' : 'asc'; ?>">Telefone</a></th>
            <th>Ações</th>
        </tr>

        <?php if ($resultado && $resultado->num_rows > 0): ?>
            <?php while ($row = $resultado->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['nome']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['telefone']; ?></td>
                    <td>
                        <a href="editar.php?id=<?php echo $row['id']; ?>" class="btn_edit">Editar</a>
                        <a href="excluir.php?id=<?php echo $row['id']; ?>" class="btn_delete"
                            onclick="return confirm('Tem certeza que deseja excluir este contato?');">
                            Excluir
                        </a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="5">Nenhum contato encontrado.</td>
            </tr>
        <?php endif; ?>
    </table>

    <br><br>
    <div style="text-align: center;">
        <a href="novo.php" class="btn_add">Adicionar novo contato</a>
    </div>

</body>

</html>