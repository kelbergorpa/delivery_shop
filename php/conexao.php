<?php

$host = "localhost";
$usuario = "root";
$senha = "admin";
$bd = "delivery_shop";

$conexao = new MySQLi($host, $usuario, $senha, $bd);


if($conexao -> connect_error){
   echo "Desconectado! Erro: " . $mysqli_connection->connect_error;
}


?>