<?php

namespace TrabajoTarjeta;

class MedioBoletoEstudiantil extends Tarjeta {
    protected $constantes;

    public function __construct() {
        $this->constantes = new Constantes();
        $this->precio = $this->constantes->precioMedioBoletoUniversitario;
        $this->valoresCargables = $this->constantes->cargasPosibles;
    }
}
