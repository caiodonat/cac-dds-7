<?php

require './vendor/autoload.php';
require './carbon/Connect.php';

use Carbon\Carbon;

$connect = Connect::connect();

$viewcpf = $connect->query('SELECT cpf FROM tb_atendentes');
$viewcpf = $viewcpf->fetchall();

$viewdt = $connect->query('SELECT data_atendimento FROM tb_atendentes');
$viewdt = $viewdt->fetch();

Carbon::setLocale('pt-BR');

var_dump($viewcpf) .
    var_dump($viewdt);

$date = Carbon::createFromDate($viewcpf);
