# delivery_shop

O Objetivo do Sistema Delivery Shop é atender a demanda de usuarios que necessitam fazer compras de produtos no comercio local, sem a necessidade de sair de casa
Assim sendo através de pedidos Online.

Foi Desenvolvido tela Inicial com Apresentação do sistema e slides de imagens, Tela de Login que pode ser logado como Pessoa Fisica ou Estabelecimento,
Tela de cadastro onde é possivel cadastar os dados do usuário sendo pessoa fisica ou estabelecimento, Tela de catalogo onde o usuário pode ver os produtos anunciados, e painel de controle do estabelecimento onde pode ver os pedidos e fazer cadastro de novos produtos.


LINGUAGENS UTILIZADAS:
PHP, HTML, CSS, Javascript e MySql

Diretório Github: https://github.com/kelbergorpa/delivery_shop

PARA EXECUTAR O SISTEMA :

É necessário ter instalado os aplicativos, MySql e Xampp Control Painel.
_______________________________________________________________________________________

1 - COLAR A PASTA COM O PROJETO NO DIRETÓRIO C:\xampp\htdocs\
_______________________________________________________________________________________

2 - Abrir o arquivo conexao.php e na linha 5, no lugar de "admin", colocar a senha do usuario root do banco de dados
________________________________________________________________________________________

3 - ABRIR MYSQL, LOGAR COMO ROOT E DAR OS COMANDOS PARA CRIAÇÃO DO BANCO DE DADOS:


create database delivery_shop;
use delivery_shop;

CREATE TABLE pessoa_fisica(
id int AUTO_INCREMENT ,
nome varchar(50),
sobrenome varchar(50),
cpf varchar(20),
email varchar(60),
senha varchar(50),
estado varchar(50),
cidade varchar(50),
bairro varchar(50),
rua varchar(50),
numero varchar(8),
telefone varchar(21),
PRIMARY KEY (id)
);

CREATE TABLE estabelecimento(
id int AUTO_INCREMENT ,
nome varchar(50),
cnpj varchar(20),
email varchar(60),
senha varchar(50),
estado varchar(50) ,
cidade varchar(50) ,
bairro varchar(50) ,
rua varchar(50) ,
numero varchar(8),
telefone varchar(20) ,
PRIMARY KEY (id)
);

CREATE TABLE categoria(
id int AUTO_INCREMENT,
id_estabelecimento int,
nome varchar(50),
PRIMARY KEY (id),
FOREIGN KEY (id_estabelecimento) REFERENCES estabelecimento(id)

);

CREATE TABLE produto(
id int AUTO_INCREMENT,
id_estabelecimento int,
nome varchar(50),
preco float(50),
imagem varchar(9999),
id_categoria int,
descricao varchar(50),
PRIMARY KEY (id),
FOREIGN KEY (id_categoria) REFERENCES categoria(id),
FOREIGN KEY (id_estabelecimento) REFERENCES estabelecimento(id)
);

CREATE TABLE pedido(
id_pedido int AUTO_INCREMENT,
numero_pedido varchar(10),
id_pessoa int,
id_produto int,
quantidade int,
subtotal float,
valor_total float,
PRIMARY KEY (id_pedido),
FOREIGN KEY (id_pessoa) REFERENCES pessoa_fisica(id),
FOREIGN KEY (id_produto) REFERENCES produto(id)
);

____________________________________________________________________________________________

4 - ABRIR O XAMPP CONTROL PAINEL E DAR START NO SERVIDOR APACHE;
____________________________________________________________________________________________

5 - ABRIR NAVEGADOR E DIGITAR O ENDEREÇO: localhost/delivery