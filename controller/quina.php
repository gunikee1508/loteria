<?php
require_once ('verifica.php');

function quina(){
    $numerosSorteados = [];

    for($i = 0; $i < 5; $i++){
        $numeroAleatorio = rand(1, 80);

        while(exist($numeroAleatorio, $numerosSorteados)){
            $numeroAleatorio = rand(1, 80);
        }

        $numerosSorteados[$i] = $numeroAleatorio;
    }

    sort($numerosSorteados);

    return $numerosSorteados;
}
    