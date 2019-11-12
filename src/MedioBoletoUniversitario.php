<?php

namespace TrabajoTarjeta;

class MedioBoletoUniversitario extends Tarjeta {

    protected $constantes;
    protected $precioEntero;
    protected $limitePorDia;

    public $viajesLimitados = true;

    public $viajesDiarios = 1;
    public $ultimoDia = null;

    public function __construct($saldo = 0) {
        $this->saldo = $saldo;
        $this->constantes = new Constantes();
        $this->precio = $this->constantes->precioMedioBoletoUniversitario;
        $this->precioEntero = $this->constantes->precioBoletoUniversitario;
        $this->valoresCargables = $this->constantes->cargasPosibles;
        $this->limitePorDia = $this->constantes->viajesUniversitariosPorDia;
    }

    public function obtenerPrecio(){
        if ($this->viajesDiarios < $this->limitePorDia){
            return $this->precio;
        } else {
            return $this->precioEntero;
        }
    }
}
