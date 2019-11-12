<?php

namespace TrabajoTarjeta;

use PHPUnit\Framework\TestCase;

class TarjetaTest extends TestCase {
    
    protected $tarjetaDePrueba;
    protected $constantesDePrueba;

    public function testRecargar () {
        
        $this->assertTrue(TRUE);
    }
    
    public function testSetPrecio () {
        
        $this->assertTrue(TRUE);
    }
    
    public function testObtenerPrecio () {
        
        $this->tarjetaDePrueba = New Tarjeta();
        $this->constantesDePrueba = New Constantes();
        
        $this->assertEquals($this->tarjetaDePrueba->obtenerPrecio(),$this->constantesDePrueba->precioCompleto);
    }
    
    public function testObtenerSaldo () {
        
        $this->assertTrue(TRUE);
    }
    
    public function testBajarSaldo () {
        
        $this->assertTrue(TRUE);
    }
    
    public function testObtenerPlus () {
        
        $this->assertTrue(TRUE);
    }
    
    public function testAumentarPlus () {
        
        $this->assertTrue(TRUE);
    }
}
