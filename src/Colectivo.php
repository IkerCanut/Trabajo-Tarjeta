<?php

namespace TrabajoTarjeta;

class Colectivo implements ColectivoInterface {
    protected $linea;
    protected $empresa;
    protected $numero;
    protected $tiempo;
    protected $visor;

    public function __construct($linea, $empresa, $numero, $tiempo) {
        $this->linea = $linea;
        $this->empresa = $empresa;
        $this->numero = $numero;
        $this->tiempo = $tiempo;
        $this->visor = new Visor();
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

    public function tiempo() {
        return $this->tiempo->time();
    }

    public function pagarCon(TarjetaInterface $tarjeta) {
        $informacion = $tarjeta->pagar($this->linea, $this->empresa, $this->numero);
        $this->visor->mostrarInformacion($informacion);
        
        return ($informacion);
    }
}
