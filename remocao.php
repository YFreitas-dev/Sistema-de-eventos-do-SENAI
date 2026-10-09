<?php

    require_once __DIR__ . "/init.php";

    $seraDeletado = false;

    if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
        $id = $_GET['id'];
        $seraDeletado = true;

        unset($_SESSION['eventos'][$id]);                 
        
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
    
    <div>
        <h1>Eventos SENAI - Deletar</h1>

    </div>

    <div>
        <p>Selecione um dos eventos para deletar abaixo:</p>
    </div>

    <div>
        <ul>

            <?php

                foreach ($_SESSION['eventos'] as $id => $evento) {
                    echo "

                    <li>

                        <a href='remocao.php?id={$id}'>
                        {$evento['titulo']}</a>

                    </li>";
                }



                
                if($seraDeletado) {
                    print "
                        <div>
                            <p> Noticia apagada com sucesso!</p>
                        </div>
                    
                    ";

                    
                }



            ?>
        </ul>
    </div>



</body>
</html>