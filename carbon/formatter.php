<?php

require './carbon/Connect.php';
require './vendor/autoload.php';

use Carbon\Carbon;

$connect = connect::connect();
/*
$viewAll = $connect->query('SELECT date_time_emissao_atendimento FROM tb_atendimentos');
$viewA = $viewA->fetchColumn(1);
*/

Carbon::setLocale('pt_BR');


$viewSaida = Carbon::createFromDate($viewAll = $connect->query('SELECT date_time_emissao_atendimento FROM tb_atendimentos WHERE id_atendimento = 4')->fetchColumn());
var_dump($viewSaida->format('d/m/Y H:i:s'));


//trablhar com 3 tabelas login, giche, atendimento

// tabela giche: nome funcionario, numero giche, id funcionario

//login: id_funcionario, nome_funcionario, senha; bloquio de senha pra view
