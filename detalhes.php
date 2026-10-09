<?php
require_once 'init.php';

$evento = null;

if(isset($_GET["id"])){
    $id = $_GET["id"];

    foreach($_SESSION["eventos"] as $item){
        if($item["id"] == $id){
            $evento == $item;
        }
    }
}

?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Detalhes do Evento</title>
     <link rel="stylesheet" href="style.css">
</head>
<body>

    <h1>Detalhes do Evento</h1>

    <?php if ($evento == null) { ?>
        <p>Evento não encontrado!</p>
        <a href="index.php">Voltar para a lista</a>
    <?php } else { ?>
        <p><strong>ID:</strong> <?php echo htmlspecialchars($evento['id']); ?></p>
        <p><strong>Título:</strong> <?php echo htmlspecialchars($evento['titulo']); ?></p>
        <p><strong>Descrição:</strong> <?php echo htmlspecialchars($evento['descricao']); ?></p>
        <p><strong>Área:</strong> <?php echo htmlspecialchars($evento['area']); ?></p>
        <p><strong>Data:</strong> <?php echo htmlspecialchars($evento['data']); ?></p>
        <p><strong>Início:</strong> <?php echo htmlspecialchars($evento['inicio']); ?></p>
        <p><strong>Fim:</strong> <?php echo htmlspecialchars($evento['fim']); ?></p>
        <p><strong>Local:</strong> <?php echo htmlspecialchars($evento['local']); ?></p>
        <p><strong>Responsável:</strong> <?php echo htmlspecialchars($evento['responsavel']); ?></p>

        <br>
        <a href="edicao.php?id=<?php echo $evento['id']; ?>">Editar</a> |
        <a href="remocao.php?id=<?php echo $evento['id']; ?>">Remover</a>
        <br><br>
        <a href="index.php">Voltar</a>
    <?php } ?>

</body>
</html>
