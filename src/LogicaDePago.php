<?php
namespace TrabajoTarjeta;

class LogicaDePago implements LogicaDePagoInterface{

    public function efectuarPago($tarjeta, $linea, $empresa, $numero, $tiempo){
        $tarjeta->bajarSaldo($tarjeta->precio);
        return $tarjeta->obtenerSaldo();
        /*if checkTransbordo() => "Transbordo"
        if checkSaldo() => "Normal"
        if checkPlus() => "Plus"
        else => "No puede"*/
    }
}