<?php

require './vendor/autoload.php';
require './carbon/Connect.php';

use Carbon\Carbon;

$connect = Connect::connect();
/*
$viewData = $connect->query('SELECT  date_time_emissao_atendimento FROM tb_atendimentos');
$viewData = $viewData->fetch();

$formato = Carbon::create($day, $month, $Year, $hour, $minute, $second, $tz);

//dd($formato -> format('d/m/Y'));
//dd($formatovar_dump($viewData));
//var_dump($viewData);

//dd($formato2->format('d/m/Y'));
//dd($viewData->date_emissao_atendimento);
//dd($viewData->date_time_emissao_atendimento);

dd($viewData->date_time_emissao_atendimento->format('d/m/Y') . ($viewData->date_time_emissao_atendimento->format('H:i:s')));
dd($viewData->$formato2);
*/
$posts = $connect->query('SELECT  date_emissao_atendimento, date_time_emissao_atendimento FROM tb_atendimentos WHERE id_atendimento = 3');
$posts = $posts->fetch();

Carbon::setLocale('pt-BR');

$date = Carbon::createFromDate($posts->date_emissao_atendimento);
$Data = Carbon::create($posts->date_time_emissao_atendimento);
//var_dump($date->format('d/m/Y'));
var_dump($Data->format('d/m/Y H:i:s'));

$viewAll = $connect->query('SELECT * FROM tb_atendimentos WHERE id_atendimento = 3');
$viewAll = $viewAll->fetch();

var_dump($viewAll);
