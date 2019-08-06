<?php

require 'vendor/autoload.php';

$tarjeta = new TrabajoTarjeta\Tarjeta;

$tarjeta->recargar(100);
$saldo = $tarjeta->obtenerSaldo();

echo "El saldo es $saldo \n";
