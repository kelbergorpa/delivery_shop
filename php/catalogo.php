<?php


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/catalogo.css">
    <link rel="shortcut icon" href="../img/logo.jpg">
    <title>Catalogo - Delivery Shop</title>
</head>

<body>
    <header>
        <a href="./overview.php" class="voltar"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
        <div class="perfil-loja">
            <img src="../img/teste.jpg" alt="">
            <?php
            include("conexao.php");
            $sql = "SELECT * FROM estabelecimento WHERE id = {$_GET['id']}";
            $result = mysqli_query($conexao, $sql);
            $rows = mysqli_num_rows($result);
            if ($rows == 0) {
            } else {
                while ($row = $result->fetch_array()) {
                    $innerHtml = "
                    <h1>{$row['nome']}</h1>
                    <p>{$row['cidade']}-{$row['estado']} / Bairro: {$row['bairro']} - Rua:{$row['rua']} Nº:{$row['numero']}</p>
                    <div>
                <i class='fa fa-phone iconphone' id='phone' aria-hidden='true'></i>
                <label for='phone'>Telefone: {$row['telefone']} </label>
            </div>
                    ";
                }
                echo $innerHtml;
            }
            ?>
            <div class="div-av">
                <input type="checkbox" name="avaliar" id="avaliar">
                <label for="avaliar" class="avaliacao-button">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    Avaliar
                </label>
            </div>
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
                        <input type='checkbox' id='{$row['nome']}'>
                        <label for='{$row['nome']}'>
                        <span class='icon'></span>
                            <h3>{$row['nome']}</h3>
                        </label>
                    </div>
                ";

                echo $escrever;

                $sql2 = "SELECT * FROM produto WHERE id_estabelecimento = {$_GET['id']}  AND id_categoria = {$row['id']}";
                $result2 = mysqli_query($conexao, $sql2);
                $rows2 = mysqli_num_rows($result2);

                while ($row2 = $result2->fetch_array()) {
                    $escrever = "
                    <div class='catalogo-produtos'>
                        <img src='../img/teste.jpg' alt=''>
                        <div class='catalogo-produtos-desc'>
                            <h2>{$row2['nome']}</h2>
                            <p>{$row2['descricao']}</p>
                        </div>
                        <div class='quantity'>
                            <button class='btn minus1'>-</button>
                            <input id='id_form-0-quantity' min='0' name='form-0-quantity' value='0' min='0' type='number'>
                            <button class='btn add1'>+</button>
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
        <button class="button-comprar">Comprar</button>
    </main>




</body>

</html>