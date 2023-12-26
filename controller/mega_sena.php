<?php
require_once('verifica.php');

function megaSena(){
    $numerosSorteados = [];

    for($i = 0; $i < 6; $i++){
        $numeroAleatorio = rand(1, 60);

        while(exist($numeroAleatorio, $numerosSorteados)){
            $numeroAleatorio = rand(1, 60);
        }

        $numerosSorteados[$i] = $numeroAleatorio;
    }

    sort($numerosSorteados);

    return $numerosSorteados;
}
