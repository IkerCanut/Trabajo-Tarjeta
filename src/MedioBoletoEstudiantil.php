<?php

namespace TrabajoTarjeta;

class MedioBoletoEstudiantil extends Tarjeta {
    protected $constantes;

    public function __construct($saldo = 0) {
        $this->saldo = $saldo;
        $this->constantes = new Constantes();
        $this->precio = $this->constantes->precioMedioBoletoUniversitario;
        $this->valoresCargables = $this->constantes->cargasPosibles;
    }
}
