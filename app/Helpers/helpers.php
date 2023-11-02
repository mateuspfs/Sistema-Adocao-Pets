<?php

function getNumeroIdade($idade) {
    $result = explode(" ", $idade);
    return (int) $result[0];
}

function getUnidadeIdade($idade) {
    $result = explode(" ", $idade);
    return $result[1];
}

function getNumeroPeso($peso) {
    $result = explode(" ", $peso);
    return (int) $result[0];
}

function getUnidadePeso($peso) {
    $result = explode(" ", $peso);
    return $result[1];
}
