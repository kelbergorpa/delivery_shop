<?php
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/overview.css">
    <title>Lojas - Delivery Shop</title>
    <link rel="shortcut icon" href="../img/logo.jpg">
</head>

<body>
    <header>
        <img src="../img/logo.jpg" alt="">
        

        <div class="barinfo">
            <a href="systemLogoff.php" class="user"> Sair</a>
        </div>

    </header>


    <div id="blocoEstabelecimentos">
        <div id="buscarRegiao">
           <h1> SELECIONE UMA LOJA </h1> 
        </div>



        <div id="estabelecimentos">
            <ul>

                <?php
                include("conexao.php");

                $sql = "SELECT * FROM estabelecimento";
                $result = mysqli_query($conexao, $sql);
                $rows = mysqli_num_rows($result);
                
                if ($rows == 0) {
                    echo "<p>Não existe estabelecimentos cadastrados no nosso sistema</p>";
                } else {
                    while ($row = $result->fetch_array()) {
                        $innerHtml = "
                        <li>
                    <img src='../img/teste.png' alt=''>
                    <div class='descEstabelecimento'>
                        <a href='./catalogo.php?id={$row['id']}'>{$row['nome']}</a>
                        <h3>Bairro: {$row['bairro']} , Rua: {$row['rua']}, Nº {$row['numero']}</h3>

                        <div class='phone'>
                            <i class='fa fa-phone , iconphone' aria-hidden='true'></i>
                            <label for=''>Telefone: {$row['telefone']} </label>
                            <div class='avalicao'>
                                <i class='fa fa-star' aria-hidden='true'></i>
                                <i class='fa fa-star' aria-hidden='true'></i>
                                <i class='fa fa-star' aria-hidden='true'></i>
                                <i class='fa fa-star' aria-hidden='true'></i>
                                <i class='fa fa-star' aria-hidden='true'></i>
                            </div>

                        </div>
                        <p>A Delivery Shop tem como missão ser o maior sistema de pedidos e entrega de produtos
                           do Brasil, visando o conforto e comodidade do Cliente, e a agilidade no atendimento das Lojas</p>

                    </div>

                    <div class='hours'>
                        <i class='fa fa-clock-o' aria-hidden='true'></i><label for=''>9h~18h</label>
                    </div>

                </li>
                        ";
                        echo $innerHtml;
                    }
                }
                ?>
            </ul>
        </div>
    </div>

</body>
</html>