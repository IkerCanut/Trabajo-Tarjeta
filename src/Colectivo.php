<?php

namespace TrabajoTarjeta;

class Colectivo implements ColectivoInterface {
    protected $linea;
    protected $empresa;
    protected $numero;
    protected $visor;

    protected $logicaDePago;

    public function __construct($linea, $empresa, $numero) {
        $this->linea = $linea;
        $this->empresa = $empresa;
        $this->numero = $numero;
        $this->visor = new Visor();
        $this->logicaDePago = new LogicaDePago();
    }

    public function linea() {
        return $this->linea;
    }

    public function empresa() {
        return $this->empresa;
    }

    public function numero() {
        return $this->numero;
    }

    public function pagarCon(TarjetaInterface $tarjeta, TiempoInterface $tiempo){
   
        $informacion = $this->logicaDePago->efectuarPago
                ($tarjeta, $this->linea, $this->empresa, $this->numero, $tiempo);

        $this->visor->mostrarInformacion($informacion);
        return ($informacion);
    }
}
