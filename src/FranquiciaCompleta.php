<?php

namespace TrabajoTarjeta;

class FranquiciaCompleta extends Tarjeta {
  public $precio = null;
  protected $saldo = 1;
  protected $constantes;

  public function __construct($saldo = 1) {
    $this->saldo = $saldo;
    $this->constantes = new Constantes();
    $this->precio = $this->constantes->precioLibre;
  }
}