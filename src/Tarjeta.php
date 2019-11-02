<?php

namespace TrabajoTarjeta;

class Tarjeta implements TarjetaInterface {
  protected $valoresCargables;

  protected $saldo;
  
  protected $constantes;

  //Que la variable plus comience desde 0 se refiere a que todavia no se ha usado ningun viaje plus
  protected $plus = 0;

  protected $precio = null;

  public $anteriorTiempo = null;

  public $anteriorLinea = null;
  public $anteriorEmpresa = null;
  public $anteriorNumero = null;

  public $actualColectivo;

  public function __construct($saldo = 0) {
    $this->saldo = $saldo;
    $this->constantes = new Constantes();
    $this->valoresCargables = $this->constantes->cargasPosibles;
    $this->precio = $this->constantes->precioCompleto;
  }

  public function recargar($monto) {
    foreach ($this->valoresCargables as $tupla) {
      if ($monto == $tupla[0]) {
        $this->saldo += $tupla[1];
        while($this->plus > 0 && $this->saldo >= $this->precio) {
          $this->saldo -= $this->precio; $this->plus--;
        }
        return true;
      }
    }
    return false;
  }

  public function setPrecio($nuevo){
    $this->precio = $nuevo;
  }

  public function obtenerPrecio(){
    return $this->precio;
  }

  public function obtenerSaldo() {
    return $this->saldo;
  }

  public function bajarSaldo($montito) {
    $this->saldo -= $montito;
  }

  public function obtenerPlus() {
    return $this->plus;
  }

  public function aumentarPlus() {
    $this->plus ++;
  }
}
