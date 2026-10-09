<?php

require_once __DIR__ . "/init.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if ($_SESSION['proximo_id'] == 3 ) {
        $_POST['id'] = $_SESSION['proximo_id'];
    } else {
        
        $proximoId = $_SESSION['proximo_id'];

        $_POST['id'] = $proximoId + 1;

    }

    $nomeDigitado = ($_POST['titulo']);
    $descricaoDigitada = ($_POST['descricao']);
    $areaDigitada = ($_POST['area']);
    $dataDigitada = ($_POST['data']);
    $inicioDigitado = ($_POST['inicio']);
    $fimDigitado = ($_POST['fim']);
    $localDigitado = ($_POST['local']);
    $responsavelDigitado = ($_POST['responsavel']);

    if (
        empty($nomeDigitado) && empty($descricaoDigitada) && empty($areaDigitada) && empty($dataDigitada) && empty($inicioDigitado) && empty($fimDigitado) &&
        empty($localDigitado) &&
        empty($responsavelDigitado)
    ) {
        header("Location: cadastro.php?erro=camposVazios");
        exit;
    }

    if (empty($nomeDigitado)) {
        header("Location: cadastro.php?erro=nomeInvalido");
        exit;
    }

    if (empty($descricaoDigitada)) {
        header("Location: cadastro.php?erro=descricaoInvalida");
        exit;
    }

    if (empty($areaDigitada)) {
        header("Location: cadastro.php?erro=areaInvalida");
        exit;
    }

    if (empty($dataDigitada)) {
        header("Location: cadastro.php?erro=dataInvalida");
        exit;
    }

    if (empty($inicioDigitado)) {
        header("Location: cadastro.php?erro=inicioInvalido");
        exit;
    }

    if (empty($fimDigitado)) {
        header("Location: cadastro.php?erro=fimInvalido");
        exit;
    }
    
    if ($inicioDigitado < $fimDigitado) {
        header("Location: cadastro.php?erro=horasInvalidas");
        exit;
    }
    

    $inicioHora = new DateTime($inicioDigitado);

    $fimHora = new DateTime($fimDigitado);

    if($inicioHora >= $fimHora) {
        header("Location: cadastro.php?erro=horasInvalidas");
        exit;
    }

    if (empty($localDigitado)) {
        header("Location: cadastro.php?erro=localInvalido");
        exit;
    }

    if (empty($responsavelDigitado)) {
        header("Location: cadastro.php?erro=responsavelInvalido");
        exit;
    }


    
    $idParaCadastro = $_SESSION['proximo_id'];

    $_SESSION['eventos'][$idParaCadastro] = $_POST;

    $_SESSION['proximo_id'] = $idParaCadastro++;

    header("Location: index.php");
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

    <h1>Eventos SENAI</h1>
    <a href="cadastro.php">Cadastrar Novo Evento</a>
    <br>
    <a href="resetaSession.php">Resetar Sessão</a>
    <br>
    <a href="resetaSession.php">Voltar para o menu</a>

    <div class="textoCadastro">
        <h1>Cadastrar um novo evento</h1>

    </div>


    <div class="containerCadastro">


        <div class="formCadastro">

            <form action="" method="POST">
    
                <label for="">Nome:</label>
                <br>
                <input type="text" name="titulo" id="titulo">
                <br>
        
                <label for="">Descrição</label>
                <br>
                <input type="text" name="descricao" id="descricao">
                <br>
        
                <label for="">Area</label>
                <br>
                <input type="text" name="area" id="area">
                <br>
        
                <label for="">Data</label>
                <br>
                <input type="date" name="data" id="data">
                <br>
        
                <label for="">Inicio:</label>
                <br>
                <input type="time" name="inicio" id="inicio">
                <br>
        
                <label for="">Fim:</label>
                <br>
                <input type="time" name="fim" id="fim">
                <br>
        
                <label for="">Local:</label>
                <br>
                <input type="text" name="local" id="local">
                <br>
        
                <label for="">Responsavel:</label>
                <br>
                <input type="text" name="responsavel" id="responsavel">
                <br>
        
                <button type="submit">Cadastrar</button>
        
            </form>
        </div>
    </div>



    <?php

    if (isset($_GET['erro']) && $_GET['erro'] != "") {

        $erro = $_GET['erro'];

        switch ($erro) {
            case "nomeInvalido":
                print "
                    <div class=textoErro>
                        <p> Erro: O nome digitado está incorreto, tente novamente </p>
                    </div>
                ";
                break;

            case "descricaoInvalida":
                print "
                    <div class=textoErro>
                        <p> Erro: A descricao digitada está incorreta, tente novamente </p>
                    </div>
                ";
                break;

            case "areaInvalida":
                print "
                    <div class=textoErro>
                        <p> Erro: A área digitada está incorreta, tente novamente </p>
                    </div>
                ";
                break;

            case "dataInvalida":
                print "
                    <div class=textoErro>
                        <p>Erro: A data digitada está incorreta, tente novamente </p>
                    </div>
                ";
                break;

            case "inicioInvalido":
                print "
                    <div class=textoErro>
                        <p> Erro: O inicio digitada está incorreta, tente novamente </p>
                    </div>
                ";
                break;

            case "fimInvalido":
                print "
                    <div class=textoErro>
                        <p> Erro: O fim digitada está incorreta, tente novamente </p>
                    </div>
                ";
                break;

            case "localInvalido":

                print "
                    <div class=textoErro>
                        <p> Erro: O local digitado está incorreto, tente novamente </p>
                    </div>
                ";
                break;

            case "responsavelInvalido":

                print "
                    <div class=textoErro>
                        <p> Erro: O responsável digitado está incorreto, tente novamente </p>
                    </div>
                ";
                break;
            
            case "camposVazios":
                print "
                    <div class=textoErro>
                        <p> Erro: Todos os campo digitados estão incorretos, tente novamente </p>
                    </div>
                ";
                break;
            
            case "horasInvalidas":
                print "
                    <div class=textoErro>
                        <p> Erro: Os campos de horários não estão corretos, tente colocar um fim maior que o inicio </p>
                    </div>
                ";
            
        }


    }

    ?>



</body>

</html>