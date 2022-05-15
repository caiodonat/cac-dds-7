<?php

require './carbon/FormartViews.php';

//SQL observaçoes pode ser nula

// "Conexão" do autoload e Conexão com o banco de dados no require
require './vendor/autoload.php';
require './carbon/Connect.php';

use Carbon\Carbon;
//Teoricamente dá para fazer criação de um view tables, criando uma Variavel PHP junto com a formatação do proprio Carbon;

$connect = Connect::connect();

//Passando a seleção das tabela do banco, para ser mostrado no terminal por exemplo a tabela posts
$posts = $connect->query('SELECT observacoes FROM tb_atendentes');
$posts = $posts->fetch();

//Passando a linguagem para o terminal
Carbon::setLocale('pt-BR');


var_dump($viewcpf)
    .
    ($viewdt);

//var_dump($viewdt);

//Formatação para "humanos"
//$date = Carbon::createFromDate($posts);

//Formatação
//Carbon::create;
