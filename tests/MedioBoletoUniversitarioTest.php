<?php

namespace TrabajoTarjeta;

use PHPUnit\Framework\TestCase;

class MedioBoletoUniversitarioTest extends TestCase {

    protected $tarjetaDePrueba;
    
    /*
     *  Verifica que se construya correctemante la instancia.
     */
    public function testConstruct () {
        
        $this->tarjetaDePrueba = New MedioBoletoUniversitario();
        $this->constantesDePrueba = New Constantes();
        
        $this->assertEquals($this->tarjetaDePrueba->obtenerPrecio(),$this->constantesDePrueba->precioMedioBoletoUniversitario);
    }
    
    public function testObtenerPrecio () {
        
        $this->tarjetaDePrueba = New MedioBoletoUniversitario();
        $this->constantesDePrueba = New Constantes();
        
        $i = 0;
        
        
        for($i = 0; $i < $this->constantesDePrueba->viajesUniversitariosPorDia; $i++) {
            
            $this->assertEquals($this->tarjetaDePrueba->obtenerPrecio(),$this->constantesDePrueba->$this->constantes->precioMedioBoletoUniversitario);
            $this->tarjetaDePrueba->viajesDiarios ++;
        }
        
        $this->assertEquals($this->tarjetaDePrueba->obtenerPrecio(),$this->constantesDePrueba->$this->constantes->precioBoletoUniversitario);
    }
}