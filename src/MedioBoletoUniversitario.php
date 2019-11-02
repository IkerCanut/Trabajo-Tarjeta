<?php

namespace TrabajoTarjeta;

class MedioBoletoUniversitario extends Tarjeta {

    protected $constantes;
    protected $precioEntero;
    protected $limitePorDia;

    public $viajesLimitados = true;

    public $viajesDiarios = 0;
    public $ultimoDia = null;

    public function __construct() {
        $this->constantes = new Constantes();
        $this->precio = $this->constantes->precioMedioBoletoUniversitario;
        $this->precioEntero = $this->constantes->precioBoletoUniversitario;
        $this->valoresCargables = $this->constantes->cargasPosibles;
        $this->limitePorDia = $this->constantes->viajesUniversitariosPorDia;
    }

    public function obtenerPrecio(){
        if ($this->viajesDiarios < $this->limitePorDia){
            echo "TOTALES: " . $this->viajesDiarios . " / LIMITE: " . $this->limitePorDia . "\n";
            return $this->precio;
        } else {
            return $this->precioEntero;
        }
    }
}
