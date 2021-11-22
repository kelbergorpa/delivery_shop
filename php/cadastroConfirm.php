<?php
function cadastrar()
{
    include("conexao.php");
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $estado = $_POST['estado'];
    $cidade = $_POST['cidade'];

    $bairro = $_POST['bairro'];
    $rua = $_POST['rua'];
    $numero = $_POST['numero'];
    $telefone = $_POST['telefone'];

    $insercao = "";

   $answer = $_POST['tipoDeConta'];
   if ($answer == "pf") {
       $sobrenome = $_POST['sobrenome'];
     $cpf = $_POST['cpf'];
       $insercao = "INSERT INTO pessoa_fisica(nome, sobrenome, cpf, email, senha, estado, cidade, bairro, rua, numero, telefone) VALUE('{$nome}', '{$sobrenome}', '{$cpf}', '{$email}', md5('{$senha}'), '{$estado}', '{$cidade}', '{$bairro}', '{$rua}', '{$numero}', '{$telefone}')";
    } else if ($answer == "es") {
       $cnpj = $_POST['cnpj'];
     $insercao = "INSERT INTO estabelecimento(nome, cnpj, email, senha, estado, cidade, bairro, rua, numero, telefone) VALUE('{$nome}', '{$cnpj}', '{$email}', md5('{$senha}'), '{$estado}', '{$cidade}', '{$bairro}', '{$rua}', '{$numero}', '{$telefone}')";
    }

    function debug_to_console($data, $context = 'Debug in Console') {

        // Buffering to solve problems frameworks, like header() in this and not a solid return.
        ob_start();
    
        $output  = 'console.info(\'' . $context . ':\');';
        $output .= 'console.log(' . json_encode($data) . ');';
        $output  = sprintf('<script>%s</script>', $output);
    
        echo $output;
    }
    debug_to_console($conexao);
    
    

    $query = mysqli_query($conexao, $insercao);
    if($query == null) {
        header("Location: ../html/cadastro.html?id=401");
    } else {
        if($answer == "pf") {
            header("Location: ../html/cadastro.html?id=69");
        } else {
            header("Location: ../html/cadastro.html?id=79");
        }
    }
} 
cadastrar();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<script>
</script>
</body>
</html>