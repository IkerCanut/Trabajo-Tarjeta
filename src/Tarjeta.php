<?php

namespace TrabajoTarjeta;

class Tarjeta implements TarjetaInterface {
  protected $valoresCargables;

  protected $saldo;
  
  //Que la variable plus comience desde 0 se refiere a que todavia no se ha usado ningun viaje plus
  protected $plus = 0;

  public $precio = 14.80;

  public $anteriorTiempo = null;

  public $anteriorColectivo = null;

  public $actualColectivo;

  public function __construct($saldo = 0) {
    $this->saldo = $saldo;
    
    $this->valoresCargables = (new Constantes())->cargasPosibles;
  }

  public function recargar($monto) {
    foreach ($this->valoresCargables as $tupla) {
      if ($monto == $tupla[0]) {
      
        $this->saldo += $tupla[1];
        
        if ($this->plus == 1 && $this->saldo >= $this->precio) {
          $this->saldo -= $this->precio;
          $this->plus = 0;
        }
        if ($this->plus == 2) {
          if ($this->saldo >= $this->precio && $this->saldo < $this->precio * 2) {
            $this->saldo -= $this->precio;
            $this->plus = 1;
          }
          if ($this->saldo >= $this->precio * 2) {
            $this->saldo -= $this->precio;
            $this->plus = 0;
          }
        }
        return true;
      }
    }
    return false;
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
