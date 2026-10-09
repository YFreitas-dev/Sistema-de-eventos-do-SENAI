<?php

require_once 'init.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} elseif (isset($_POST['id'])) {
    $id = $_POST['id'];
} else {
    $id = null;
}


if (isset($_SESSION['eventos'][$id])) {
    $evento = $_SESSION['eventos'][$id];
} else {
    $evento = null;
}

$dados = $evento;

// se o formulário foi enviado, salva
if ($evento !== null && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['eventos'][$id] = [
        'id' => $id,
        'titulo' => $_POST['titulo'],
        'descricao' => $_POST['descricao'],
        'area' => $_POST['area'],
        'data' => $_POST['data'],
        'inicio' => $_POST['inicio'],
        'fim' => $_POST['fim'],
        'local' => $_POST['local'],
        'responsavel' => $_POST['responsavel']
    ];
    $dados = $_SESSION['eventos'][$id];
    header("Location: index.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link rel="stylesheet" href="edicao.css">
</head>

<body>

    <body>
        <?php if ($evento === null): ?>
            <h1>Evento não encontrado</h1>
            <p>O evento que você tentou editar não existe.</p>
        <?php else: ?>
            <h1>EventosSENAI - Edição</h1>
            <p>Editando: <?= htmlspecialchars($evento['titulo']) ?></p>
        <?php endif; ?>
        <p><a href="index.php">Home</a></p>
    </body>



    <?php if ($evento): ?>
        <form action="edicao.php" method="POST">
            <input type="hidden" name="id" value="<?= $id ?>">

            <label for="titulo">Título:</label>
            <input type="text" name="titulo" id="titulo" value="<?= htmlspecialchars($dados['titulo']) ?>">
            <br>

            <label for="descricao">Descrição:</label>
            <input type="text" name="descricao" id="descricao" value="<?= htmlspecialchars($dados['descricao']) ?>">
            <br>

            <label for="area">Área:</label>
            <input type="text" name="area" id="area" value="<?= htmlspecialchars($dados['area']) ?>">
            <br>

            <label for="data">Data:</label>
            <input type="date" name="data" id="data" value="<?= htmlspecialchars($dados['data']) ?>">
            <br>

            <label for="inicio">Início:</label>
            <input type="time" name="inicio" id="inicio" value="<?= htmlspecialchars($dados['inicio']) ?>">
            <br>

            <label for="fim">Fim:</label>
            <input type="time" name="fim" id="fim" value="<?= htmlspecialchars($dados['fim']) ?>">
            <br>

            <label for="local">Local:</label>
            <input type="text" name="local" id="local" value="<?= htmlspecialchars($dados['local']) ?>">
            <br>

            <label for="responsavel">Responsável:</label>
            <input type="text" name="responsavel" id="responsavel" value="<?= htmlspecialchars($dados['responsavel']) ?>">
            <br>

            <button type="submit">Salvar alterações</button>
            <a href="index.php">Cancelar</a>
        </form>
    <?php else: ?>
        <p>Selecione uma das notícias acima!</p>
    <?php endif; ?>

</body>

</html>

?>