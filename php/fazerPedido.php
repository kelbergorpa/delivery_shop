<?php
include("conexao.php");


$numero_pedido = $_GET['numero_pedido'];
$id_produto = (int)$_GET['id_produto'];
$quantidade = (int)$_GET['quantidade'];
$valor = (float)$_GET['valor'];

$subtotal = $quantidade * $valor;
$valor_total = (float)$subtotal;

 
$jsonString = file_get_contents('../json/login.json');
$data = json_decode($jsonString, true);


    $insercao = "INSERT INTO pedido( numero_pedido, id_pessoa, id_produto, quantidade, subtotal, valor_total) VALUE({$numero_pedido},{$data['idLogado']}, {$id_produto}, {$quantidade}, {$subtotal}, {$valor_total})";

    function debug_to_console($data, $context = 'Debug in Console') {

        // Buffering to solve problems frameworks, like header() in this and not a solid return.
        ob_start();
    
        $output  = 'console.info(\'' . $context . ':\');';
        $output .= 'console.log(' . json_encode($data) . ');';
        $output  = sprintf('<script>%s</script>', $output);
    
        echo $output;
    }
    debug_to_console($insercao);

    $query = mysqli_query($conexao, $insercao);
   
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="shortcut icon" href="../img/logo.jpg">
    <title>Pedido Concluido</title>
    <style type="text/css">
        img{border-radius: 60px;}
   </style>
   <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>

<body onLoad="slideFunction()">
    <header>
        <img src="../img/logo.jpg" alt="">
        
    </header>

    <div id="slide">
        
        <div id="desc">
            <h1>PEDIDO ENVIADO COM SUCESSO!</h1>
            <br>
            <p> Seu Pedido está sendo processado pela Loja, em breve você receberá no seu endereço!</p>
            <br>
            <a href="overview.php">Continuar comprando!</a>
        </div>

        <ul>
           
        </ul>

        <div class="imgBox">

            <img src="../img/fundo2.jpg" alt="" class="active">
           
        </div>

    </div>

    <script src="../js/slide.js"></script>
    <script src="../js/pluginIBGE.js"></script>
</body>

</html>

</html>