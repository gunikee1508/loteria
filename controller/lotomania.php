<?php
require_once ('verifica.php');

function lotomania(){
    $numerosSorteados = [];

    for($i = 0; $i < 50; $i++){
        $numeroAleatorio = rand(1, 100);

        while(exist($numeroAleatorio, $numerosSorteados)){
            $numeroAleatorio = rand(1, 100);
        }

        $numerosSorteados[$i] = $numeroAleatorio;
    }

    sort($numerosSorteados);

    return $numerosSorteados;
}
    