<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/catalogo.css">
    <link rel="shortcut icon" href="../img/logo.jpg">
    <title>Produtos Cadastrados</title>
</head>

<body>
<?php
     global $quantidade ;
        if(array_key_exists('button1', $_POST)) {
            button1();
            
            $quantidade++;
        }
        else if(array_key_exists('button2', $_POST)) {
            button2();
            $quantidade--;
        }
        function button1() {
           
        }
        function button2() {
                
            
        }
    ?>
    <header>
        <a href="./estabelecimento.php" class="voltar"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
        <div class="perfil-loja">
            <img src="../img/teste.png" alt="">
            <?php
            include("conexao.php");
            $sql = "SELECT * FROM estabelecimento WHERE id = {$_GET['id']}";
            $result = mysqli_query($conexao, $sql);
            $rows = mysqli_num_rows($result);
            if ($rows == 0) {
            } else {
                while ($row = $result->fetch_array()) {
                    $innerHtml = "
                    <h1>PRODUTOS CADASTRADOS</h1>
                    
                    
                    ";
                }
                echo $innerHtml;
            }
            ?>
            
        </div>
    </header>

    <main>
        <!-- CADA DIV VAI SER UMA CATEGORIA-->
        <?php
        include("conexao.php");
        $sql = "SELECT * FROM categoria WHERE id_estabelecimento = {$_GET['id']}";
        $result = mysqli_query($conexao, $sql);
        $rows = mysqli_num_rows($result);
        if ($rows == 0) {
        } else {
            $escrever = "";
            while ($row = $result->fetch_array()) {
                $escrever = "
                <div class='box-categoria'>
                    <div class='titulo-categoria'>
                        <input type='checkbox' id='{$row ['nome']}'>
                        <label for='{$row['nome']}'>
                        
                            <h3>{$row['nome']}</h3>
                        </label>
                    </div>
                ";

                echo $escrever;

                $sql2 = "SELECT * FROM produto WHERE id_estabelecimento = {$_GET['id']}  AND id_categoria = {$row['id']}";
                $result2 = mysqli_query($conexao, $sql2);
                $rows2 = mysqli_num_rows($result2);
                $idProduto = 0;
                while ($row2 = $result2->fetch_array()) {
                    $idProduto = $row2['id'];
                    $escrever = "
                    <div class='catalogo-produtos'>
                    

                    
                    <img src={$row2['imagem']}>
                        <div class='catalogo-produtos-desc'>
                            <h2 class='catalogo-produtos-descz'>{$row2['nome']}</h2>
                            <p>R$ {$row2['preco']}</p>
                            <p>{$row2['descricao']}</p>
                            
                        </div>
                        
                           
                    </div>
                    ";

                    echo $escrever;
                }

                $escrever = "
                    </div>
                ";
            }
            echo $escrever;
        }

        ?>
    </main>
 
</body>



</html>