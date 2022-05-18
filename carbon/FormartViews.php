<?php

require './vendor/autoload.php';
require './carbon/Connect.php';

use Carbon\Carbon;

$connect = Connect::connect();

$viewData = $connect->query('SELECT date_emissao_atendimento FROM tb_atendimentos');
$viewData = $viewData->fetchAll();
/*
$viewdt = $connect->query('SELECT data_atendimento FROM tb_atendimentos');
$viewdt = $viewdt->fetch();
*/

//dd($viewData . $formato);

//$today = Carbon::today('America/Sao_Paulo');

$formato = Carbon::createFromDate($day, $month, $year );
dd($formato -> format('d/m/Y'));
//dd($viewData -> $formato);
