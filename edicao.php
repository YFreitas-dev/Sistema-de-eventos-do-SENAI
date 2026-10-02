<?php

session_start();

require_once 'init.php';



    require_once __DIR__ . "/init.php";

    if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])){
        $id = $_GET['id'];
        header("Location: index.php?id=$id");
        exit();
    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>EventosSENAI - Edição </h1>
      
      
      <?php
      foreach($_SESSION['eventos'] as $chave => $evento){
        print "
        <ul>
        <a href='index.php?id={$chave}'>
            {$evento['titulo']}
            </a>
        </ul>
        ";
      }
      ?>
      

    
      <?php if($evento): ?>
    <form action="index.php" method="POST">
        <input type="text" name="id" id="id"
        hidden
        value="<?= $eventos['id'] ?>"
        >
        
        <label for="titulo">Titulo:</label>
        <input type="text" name="titulo" id="titulo"
        value="<?=$eventos['titulo'] ?>"
        >
        <br>

        <label for="descricao">Descrição: </label>
        <input type="text" name="descricao" id="descricao"
        value="<?=$eventos['descricao'] ?>"
        >
        <br>

        <label for="area">Área: </label>
        <input type="text" name="area" id="area"
        value="<?=$eventos['area'] ?>"
        >
        <br>

        <label for="data">Data: </label>
        <input type="text" name="data" id="data"
        value="<?=$eventos['data'] ?>">
        <br>

        
        <label for="inicio">Inicio: </label>
        <input type="text" name="inicio" id="inicio"
        value="<?=$eventos['inicio'] ?>"
        >
        <br>

        <label for="fim">Fim: </label>
        <input type="text" name="fim" id="fim"
        value="<?=$eventos['fim'] ?>"
        >
        <br>

        <label for="local">Local: </label>
        <input type="text" name="local" id="local"
        value="<?=$eventos['local'] ?>"
        >
        <br>

        <label for="responsavel">Responsável: </label>
        <input type="text" name="responsavel" id="responsavel"
        value="<?=$eventos['responsavel'] ?>"
        >
        <br>

        <button type="submit">Cadastrar:</button>

    </form>
    <?php else: ?>  
        <p>Selecione uma das notícias acima!</p>
    <?php endif; ?>
    
</body>
</html>

?>


