<?php
namespace TrabajoTarjeta;

class LogicaDePago implements LogicaDePagoInterface{

    public function efectuarPago($tarjeta, $linea, $empresa, $numero, $tiempo){
        if (!$tarjeta->anteriorTiempo){         // NUNCA HUBO TRANSBORDO
            if ($tarjeta->saldo){
                
            }
        }
    }
}