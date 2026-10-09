<?php 
require_once 'init.php';

$eventos = $_SESSION['eventos'];

?>

<html>
    <head>
       <meta charset="UTF-8">
    <title>Sistema de Eventos SENAI</title>
    </head>
    <body>
     <h1>Eventos SENAI</h1>
    <a href="cadastro.php">Cadastrar Novo Evento</a>
    <br>
    <br>
    <h2>Lista de Eventos</h2>
    <?php
    if (empty($eventos)) {
        echo "<p>Nenhum evento cadastrado.</p>";
    } else {
    ?>
        <table border="2">
             <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Área</th>
                <th>Data</th>
                <th>Horário</th>
                <th>Local</th>
                <th>Ações</th>
            </tr>
           <?php foreach ($eventos as $evento) { ?>

                <tr>
                     <td><?php echo htmlspecialchars($evento['id']); ?></td>
                    <td><?php echo htmlspecialchars($evento['titulo']); ?></td>
                    <td><?php echo htmlspecialchars($evento['area']); ?></td>
                    <td><?php echo htmlspecialchars($evento['data']); ?></td>
                    <td><?php echo htmlspecialchars($evento['inicio']);?></td>
                    <td><?php echo htmlspecialchars($evento['local']); ?></td>

                    <td>
                        <a href="detalhes.php?id=<?php echo $evento['id']; ?>">Detalhes</a> |
                        <a href="edicao.php?id=<?php echo $evento['id']; ?>">Editar</a> |
                        <a href="remocao.php?id=<?php echo $evento['id']; ?>">Remover</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    <?php } ?>

    </body>
</html>