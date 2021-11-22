<?php
include("conexao.php");
$tipo = $_GET['tipo'];
echo $tipo;
$nome = $_POST['nomeProduto'];
$categoria = $_POST['categoriaProduto'];
$descricao = $_POST['descricaoProduto'];

$jsonString = file_get_contents('../json/login.json');
$data = json_decode($jsonString, true);

if ($tipo == "categoria") {
    $nome = $_POST['nomeCategoria'];
    $insercao = "INSERT INTO categoria(nome, id_estabelecimento) VALUE('{$nome}', {$data['idLogado']})";

    $query = mysqli_query($conexao, $insercao);
    if ($query == null) {
        echo $query;
    } else {
        header("Location: ./estabelecimento.php");
    }
} else {
    $insercao = "INSERT INTO produto(nome, id_categoria, descricao, id_estabelecimento) VALUE('{$nome}', 1, '{$descricao}', {$data['idLogado']})";

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
    if ($query == null) {
        echo $query;
    } else {
       header("Location: ./estabelecimento.php");
    }
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

</body>

</html>