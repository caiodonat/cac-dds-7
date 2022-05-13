<?php

    use Carbon\Carbon;


    $today = Carbon::today();

    echo($today->format('d/m/Y'));

    echo('<br>');

    $tomorrow = Carbon::tomorrow();

    $diahoje="10/10/2018";
    echo($diahoje);
