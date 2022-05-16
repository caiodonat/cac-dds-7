<?php

require './vendor/autoload.php';
require './carbon/Connect.php';

use Carbon\Carbon;

$connect = Connect::connect();

$viewcpf = $connect->query('SELECT date_emissao_atendimento FROM tb_atendimentos');
$viewcpf = $viewcpf->fetchall($format);
/*
$viewdt = $connect->query('SELECT data_atendimento FROM tb_atendimentos');
$viewdt = $viewdt->fetch();
*/
Carbon::setLocale('pt-BR');

var_dump($viewcpf);
//var_dump($viewdt);

$format::createFromDate($day . "/" . $month . "/" . $year);

$date = Carbon::createFromDate($viewcpf);
