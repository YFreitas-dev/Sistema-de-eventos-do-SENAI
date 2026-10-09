<?php

    require_once __DIR__ . "/init.php";

    $seraDeletado = false;

    $elaConfirmou = null;

    $erro = false;

    $mostrarConfirmacao = null;

    if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {

        if($_GET['id'] > count($_SESSION['eventos'])) {
            $erro = true;   
        }

        $mostrarConfirmacao = true;

        $id = $_GET['id'];
        
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
    
        if(isset(($_POST['aceita']))) {

            $seraDeletado = true;

            $elaConfirmou = true;

            unset($_SESSION['eventos'][$_GET['id']]);
            
            header('Location: index.php');
            exit;

        }


        }

        if(isset(($_POST['rejeita']))) {

            $elaConfirmou = false;

            header('Location: index.php');
            exit;
        }
    


    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
            <?php

                if($erro) {
                    
                }

                if($mostrarConfirmacao) {
                        print "
                            <div class=containerConfirmacao>

                                <div class=cardConfirmacao>

                                    <div class=textoConfirmacao>
                                        <p>Você confirma esta remoção?</p>
                                    </div>

                                    <div class=botoes >
                                        <form action='remocao.php?id={$id}' method='POST'>
                                                <button id='aceita' name='aceita' type='submit' style='color: green'>Sim</button>
                                                <button id='rejeita' name='rejeita' type='submit' style='color: red'>Não</button>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        ";

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