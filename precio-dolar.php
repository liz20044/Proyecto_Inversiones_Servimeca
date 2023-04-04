<?php

function consultarDolar() {
    $conexion = curl_init('https://www.bcv.org.ve/');

    curl_setopt($conexion, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($conexion, CURLOPT_SSL_VERIFYPEER, false);

    curl_setopt($conexion, CURLOPT_RETURNTRANSFER, true);

    $respuesta = curl_exec($conexion);
    
    // Chequear error
    if (curl_error($conexion)) {
        curl_close($conexion);
        echo "<h1>Problemas de conexión a internet<h1>";
    }

    curl_close($conexion);

    $document = new DOMDocument;

    error_reporting(0);
    $document->loadHTML($respuesta);
    error_reporting(E_ALL);

    $dolarDiv = $document->getElementById('dolar');
    $strong = $dolarDiv->getElementsByTagName('strong')[0];

    $precioEnString = trim($strong->textContent); 
    $precioEnString = str_replace(',', '.', $precioEnString); 
    
    $precio = floatval($precioEnString);
    $precio = number_format($precio, 2);
    $precio = floatval($precio);

    return $precio;
}