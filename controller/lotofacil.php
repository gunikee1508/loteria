<?php
require_once ('verifica.php');

function lotofacil(){
    $numerosSorteados = [];

    for($i = 0; $i < 15; $i++){
        $numeroAleatorio = rand(1, 25);

        while(exist($numeroAleatorio, $numerosSorteados)){
            $numeroAleatorio = rand(1, 25);
        }

        $numerosSorteados[$i] = $numeroAleatorio;
    }

    sort($numerosSorteados);

    return $numerosSorteados;
}
    
    


