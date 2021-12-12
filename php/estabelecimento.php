<?php

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/estabelecimento.css">
    <link rel="shortcut icon" href="../img/logo.jpg">
    <title>Sua Loja - Delivery Shop</title>
</head>

<body>
    <!--Cria o script dos botões-->

    <div id="box">
        <div class="container" id="container">
            <img src="../img/teste.png" alt="">
            <button name="historico" onclick="showHistorico()">Histórico de Pedidos</button>
            <button name="perfil" onclick="editarPerfil()">Editar Perfil</button>
            <button name="catalogo" onclick="editarCatalogo()">Cadastrar Produtos</button>
            <button name="produtos" ><a href="http://localhost/delivery/php/visualizarProdutos.php?id=1">Visualizar Produtos</a></button>
            <button onclick="logoff()">Sair</button>

        </div>

        <script>
            function logoff() {
                window.location.replace("./systemLogoff.php");
            }
        </script>


        <div class="pedido">
        <?php
        

        if(array_key_exists('button1', $_POST)) {
            button1();
        }
        else if(array_key_exists('button2', $_POST)) {
            button2();
        }
        function button1() {
        include("conexao.php");
        $teste2=$_POST['teste'];
        $sql4 = "DELETE FROM pedido WHERE id_pedido = $teste2";
        $result4 = mysqli_query($conexao, $sql4);
        echo "<script>window.opener.location.reload();</script>";
        echo "<script>window.close();</script>";
        }
        
        
    ?>  
    
      

        

            <table>
                <tr>
                    <!-- ADICIONAR A FUNÇÃO DE ABRIR PEDIDO-->
                    <?php
        include("conexao.php");
        $sql = "SELECT * FROM pedido";
        $result = mysqli_query($conexao, $sql);
        $rows = mysqli_num_rows($result);
        
        if ($rows == 0) {
        } else {
            $escrever = "";
            $escrever2 = "";
            while ($row = $result->fetch_array()) {
                $sql2 = "SELECT * FROM pessoa_fisica WHERE id = {$row['id_pessoa']}";
                $result2 = mysqli_query($conexao, $sql2);
                $rows2 = mysqli_num_rows($result2);
                $sql3 = "SELECT * FROM produto WHERE id = {$row['id_produto']}";
                $result3 = mysqli_query($conexao, $sql3);
                $rows3 = mysqli_num_rows($result3);

                while ($row2 = $result2->fetch_array()) {
                    $escrever2 =  "<h3>Nome: {$row2['nome']}</h3> <br> <h2>Endereço: {$row2['rua']}, Nº: {$row2['numero']}, Bairro: {$row2['bairro']}</h2>" ;
                    while ($row3 = $result3->fetch_array()) {
                        $escrever3 =  "<h3>Produto: {$row3['nome']}</h3> <br> <h2>Quantidade: {$row['quantidade']}, Valor: {$row['valor_total']}</h2>" ;
                        
                    } 
                } 
                $teste=$row['id_pedido'];
                $escrever = "
                <td onclick='abrirPedido()'>
                        <h1>Ped: {$row['id_pedido']}</h1>
                      {$escrever2}
                      {$escrever3}

                <form  method='post'>
                <input type='hidden' name='teste' value='{$teste}'>
                <input type='submit' name=''
                class='button' value='Finalizar Ped' />
                </form>  
                
                
                </td>
                ";

                echo $escrever;
            }
        }
            ?>
                </tr>
                
            </table>
        </div>

    </div>




    <div class="pedido-detalhado" id="pedidodetalhado">
        <i class="fa fa-times" aria-hidden="true" onclick="fecharAba()" ></i> 
        <div class="nome-cliente">
            <h3>O PEDIDO SERÁ FINALIZADO!</h3>
        </div>
        

        <button>CANCELAR</button>
    </div>
    <!-- FILE IMAGE NO CATALOGO:-->

    <div class="catalogo" id="catalogo">
        <i class="fa fa-times" aria-hidden="true" onclick="fecharAba()" ></i> 
        <div class="categoria">
            <form action="./criarPedidoOuCategoria.php?tipo=categoria" method="POST">
                <h1>Criar Nova Categoria:</h1>
                <label for="">Nome da Categoria:</label>
                <br>
                <input type="text" name="nomeCategoria" id="nomeCategoria">
                <br>
                <button type="submit">Adicionar ao Catalogo</button>
            </form>
        </div>
        <hr>
        <div class="produto">
            <form action="./criarPedidoOuCategoria.php?tipo=produto" method="post" >
                <h1>Adicionar um produto novo:</h1>
                <!--<input type="file" name="" id="">-->
                <label for="">Nome do Produto:</label>
                <br>
                <input type="text" placeholder=" Nome do Produto" name="nomeProduto">
                <br>
                <label for="">Preço:</label>
                <br>
               R$ <input type="number" step="0.01" placeholder= " Ex: 12.29 " name="precoProduto">
                <br><br>
                <label for="">URL da Imagem:</label>
                <br>
                <input type="text" name="imagemProduto">
                <br><br>
                <label for="">Selecione uma categoria:</label>
                <div class="select-box">
                    <select name="categoriaProduto" id="">
                        <?php
                        include("conexao.php");
                        $jsonString = file_get_contents('../json/login.json');
                        $data = json_decode($jsonString, true);
                        $sql = "SELECT * FROM categoria WHERE id_estabelecimento = {$data['idLogado']}";
                        $result = mysqli_query($conexao, $sql);
                        $rows = mysqli_num_rows($result);
                        if ($rows == 0) {
                            echo "<option value=''>Selecione</option>";
                        } else {
                            while ($row = $result->fetch_array()) {
                                echo "<option value='{$row['id']}'>{$row['nome']}</option>";
                            }
                        }
                        ?>
                    </select>
                </div>

                <label for="">Descrição:</label>
                <br>
                <textarea name="descricaoProduto" id="" maxlength="200"></textarea>
                <br>
                <button type="submit">Adicionar ao Catalogo</button>
            </form>
        </div>
    </div>


    <div class="editar-perfil" id="perfil">
        <i class="fa fa-times" aria-hidden="true" onclick="fecharAba()"></i>
        <form action="" method="post">
            <label for="">Nome:</label>
            <br>
            <input type="text" placeholder="Nome">
            <br>
            <label for="">Telefone:</label>
            <br>
            <input type="text" placeholder="Telefone">
            <br>
            <label for="">Horário de Funcionamento</label>
            <br>
            <label for=""> Início:</label>
            <input type="time" name="" id="">
            <br>
            <label for=""> Final:</label>
            <input type="time" name="" id="">
            <br>
            <label for="">Descrição:</label>
            <br>
            <textarea name="" id="" maxlength="180" placeholder="Descrição"></textarea>
            <br>
            <button>Salvar</button>

        </form>


    </div>

    <div class="historico-de-pedidos" id="historico">
        <i class="fa fa-times" aria-hidden="true" onclick="fecharAba()" ></i> 
        <div class="procurar"> Histórico de Pedidos

            

        </div>

        <table>
            <tr>
                <!-- NO MÁXIMO 3 COLUNAS UMAS COM A DATA E OUTRA COM AS INFORMAÇÕES-->
                <td>
                    <!-- Data do pedido quando foi entregue-->
                    <h4>Data:12/12/2021</h4>
                </td>
                <td>
                    <!-- Nome Cliente, CPF e Pedido-->
                    <h4>Kelber Silva</h4>
                    <p>CPF: 07687211863</p>
                    <p>Pediu: Mouse USB</p>
                </td>
                <td>
                    <!-- Método de pagamento -->
                    <h4>Cartão</h4>
                </td>
            </tr>


        </table>

    </div>
    <script src="../js/file.js"></script>
    <script src="../js/estabelecimento.js"></script>
    <script> </script>


<?php
function php_func(){
    echo "<script>console.log('Debug Objects: ' );</script>";
}
?>


<script>
window.onload = function() {
    var el = document.getElementById('elementoTeste'); 

el.addEventListener('click', function() { // no evento click 
    clickMe(); // executa a função a() passando o tipo do metodo que é c();
}, false);
    
    
    
        function clickMe(){
        var result ="<?php button1(); ?>"
        document.write(result)

    }

};
</script>    



</body>

</html>