<?php

namespace TrabajoTarjeta;

use PHPUnit\Framework\TestCase;

class LogicaDePagoTest extends TestCase {
    
    protected $logicaDePrueba;
    
    public function testEfectuarPago () {
        
        $this->assertTrue(TRUE);
    }
    
    public function testEsDiaHabil6a22 () {
        
        $this->assertTrue(TRUE);
    }
    
    public function testEsSabadoOMedioFestivo6a14 () {
        
        $this->assertTrue(TRUE);
    }
    
    public function testEsDe22a6 () {
        
        $this->assertTrue(TRUE);
    }
    
    public function testEsSabadoOMedioFestivo14a22 () {
        
        $this->assertTrue(TRUE);
    }
    
    public function testEsDomingo () {
        
        $this->assertTrue(TRUE);
    }
    
    public function testEsFestivo () {
        
        $this->logicaDePrueba = New LogicaDePago();
        
        $this->assertTrue(!($this->esFestivo(0)));
    }
    
    public function testEsMedioFestivo () {
        
        $this->assertTrue(TRUE);
    }
    
    public function testCheckSaldo () {
        
        $this->assertTrue(TRUE);
    }
    
    public function testCheckPlus () {
        
        $this->assertTrue(TRUE);
    }
}
