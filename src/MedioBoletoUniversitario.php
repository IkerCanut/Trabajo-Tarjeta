<?php

namespace TrabajoTarjeta;

class MedioBoletoUniversitario extends Tarjeta {

    protected $constantes;
    protected $precioEntero;
    
    public $viajesLimitados = true;

    public $viajesDiarios = 0;
    public $ultimoDia = null;

    public function __construct() {
        $this->constantes = new Constantes();
        $this->precio = $this->constantes->precioMedioBoletoUniversitario;
        $this->precioEntero = $this->constantes->precioBoletoUniversitario;
        $this->valoresCargables = $this->constantes->cargasPosibles;
    }

    public function obtenerPrecio(){
        if (viajesDiarios < 2){
            return $this->precio;
        } else {
            return $this->precioEntero;
        }
    }
}
