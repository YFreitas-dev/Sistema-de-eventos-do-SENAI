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
</head>

<body>

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

    <?php

    if (isset($_GET['erro']) && $_GET['erro'] != "") {

        $erro = $_GET['erro'];

        switch ($erro) {
            case "nomeInvalido":
                echo "O nome digitado está incorreto, tente novamente";
                break;

            case "descricaoInvalida":
                echo "A descricao digitada está incorreta, tente novamente";
                break;

            case "areaInvalida":
                echo "A área digitada está incorreta, tente novamente";
                break;

            case "dataInvalida":
                echo "A data digitada está incorreta, tente novamente";
                break;

            case "inicioInvalido":
                echo "O inicio digitada está incorreta, tente novamente";
                break;

            case "fimInvalido":
                echo "O fim digitada está incorreta, tente novamente";
                break;

            case "localInvalido":
                echo "O local digitado está incorreto, tente novamente";
                break;

            case "responsavelInvalido":
                echo "O responsável digitado está incorreto, tente novamente";
                break;
            
            case "camposVazios":
                echo "Todos os campo digitados estão incorretos, tente novamente";
                break;

        }


    }

    ?>



</body>

</html>