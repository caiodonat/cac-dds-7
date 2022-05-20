<?php

require './carbon/FormartViews.php';

// "Conexão" do autoload e Conexão com o banco de dados no require
require './vendor/autoload.php';
require './carbon/Connect.php';

use Carbon\Carbon;
//Teoricamente dá para fazer criação de um view tables, criando uma Variavel PHP junto com a formatação do proprio Carbon;

$connect = Connect::connect();

$viewDate = $connect->query('SELECT   date_time_emissao_atendimento FROM tb_atendimentos');
$viewDate = $viewDate->fetch();

Carbon::setLocale('pt-BR');

$date = Carbon::createFromDate($viewDate->date_time_emissao_atendimento);
dd($date->format('d/m/Y H:i:s'));
