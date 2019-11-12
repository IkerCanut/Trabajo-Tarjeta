<?php

namespace TrabajoTarjeta;

use PHPUnit\Framework\TestCase;

class TarjetaTest extends TestCase {
    
    protected $tarjetaDePrueba;
    protected $otraTarjetaDePrueba;
    protected $constantesDePrueba;

    public function testRecargar () {
        
        $this->assertTrue(TRUE);
    }
    
    public function testSetPrecio () {
        
        $this->tarjetaDePrueba = New Tarjeta();
        $this->tarjetaDePrueba->setPrecio(50);
        
        $this->assertEquals($this->tarjetaDePrueba->obtenerPrecio(),50);
    }
    
    public function testObtenerPrecio () {
        
        $this->tarjetaDePrueba = New Tarjeta();
        $this->constantesDePrueba = New Constantes();
        
        $this->assertEquals($this->tarjetaDePrueba->obtenerPrecio(),$this->constantesDePrueba->precioCompleto);
    }
    
    public function testObtenerSaldo () {
        
        $this->tarjetaDePrueba = New Tarjeta();
        $this->otraTarjetaDePrueba = New Tarjeta(200);
        
        $this->assertEquals($this->tarjetaDePrueba->obtenerSaldo(),0);
        $this->assertEquals($this->otraTarjetaDePrueba->obtenerSaldo(),200);
    }
    
    public function testBajarSaldo () {
        
        $this->tarjetaDePrueba = New Tarjeta(100);
        $this->tarjetaDePrueba->bajarSaldo(50);
        
        $this->assertEquals($this->tarjetaDePrueba->obtenerSaldo(),50);
    }
    
    public function testObtenerPlus () {
        
        $this->tarjetaDePrueba = New Tarjeta();
        
        $this->assertEquals($this->tarjetaDePrueba->obtenerPlus(),0);
    }
    
    public function testAumentarPlus () {
        
        $this->tarjetaDePrueba = New Tarjeta();
        $this->tarjetaDePrueba->aumentarPlus();
        
        $this->assertEquals($this->tarjetaDePrueba->obtenerPlus(),1);
    }
}
