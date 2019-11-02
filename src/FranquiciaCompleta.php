<?php

namespace TrabajoTarjeta;

class FranquiciaCompleta extends Tarjeta {
  public $precio = null;
  protected $saldo = 1;
  protected $constantes;

  public function __construct($saldo = 0) {
    $this->constantes = new Constantes();
    $this->precio = $this->constantes->precioLibre;
  }
}