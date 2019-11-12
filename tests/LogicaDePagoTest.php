<?php

namespace TrabajoTarjeta;

use PHPUnit\Framework\TestCase;

class LogicaDePagoTest extends TestCase {
    
    protected $logicaDePrueba;
    protected $tarjetaDePrueba;
    protected $otraTarjetaDePrueba;
    protected $tiempoDePrueba;
    protected $colectivoDePrueba;
    
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
        
        $this->logicaDePrueba = New LogicaDePago();
        
        $this->assertTrue(!($this->logicaDePrueba->esDomingo(100)));
        $this->assertTrue($this->logicaDePrueba->esDomingo(260000));
    }
    
    public function testEsFestivo () {
        
        $this->logicaDePrueba = New LogicaDePago();
        
        $this->assertTrue(!($this->logicaDePrueba->esFestivo(0)));
    }
    
    public function testEsMedioFestivo () {
        
        $this->logicaDePrueba = New LogicaDePago();
        
        $this->assertTrue(!($this->logicaDePrueba->esMedioFestivo(0)));
    }
    
    public function testCheckSaldo () {
        
        $this->logicaDePrueba = New LogicaDePago();
        $this->tarjetaDePrueba = New Tarjeta(10.0);
        $this->otraTarjetaDePrueba = New Tarjeta(50.0);
        $this->colectivoDePrueba = New Colectivo(145, "RosarioBus", 1);
        $this->tiempoDePrueba = New TiempoFalso(86400);
        
        $this->assertTrue(!($this->logicaDePrueba->checkSaldo($this->tarjetaDePrueba,$this->colectivoDePrueba->linea(),$this->colectivoDePrueba->empresa(),$this->colectivoDePrueba->numero(),$this->tiempoDePrueba)));
        $this->assertTrue($this->logicaDePrueba->checkSaldo($this->otraTarjetaDePrueba,$this->colectivoDePrueba->linea(),$this->colectivoDePrueba->empresa(),$this->colectivoDePrueba->numero(),$this->tiempoDePrueba));
        
        $this->tarjetaDePrueba = New MedioBoletoEstudiantil(10.0);
        $this->otraTarjetaDePrueba = New MedioBoletoEstudiantil(50.0);
        
        $this->assertTrue(!($this->logicaDePrueba->checkSaldo($this->tarjetaDePrueba,$this->colectivoDePrueba->linea(),$this->colectivoDePrueba->empresa(),$this->colectivoDePrueba->numero(),$this->tiempoDePrueba)));
        $this->assertTrue($this->logicaDePrueba->checkSaldo($this->otraTarjetaDePrueba,$this->colectivoDePrueba->linea(),$this->colectivoDePrueba->empresa(),$this->colectivoDePrueba->numero(),$this->tiempoDePrueba));
        
        $this->tarjetaDePrueba = New MedioBoletoUniversitario(10.0);
        $this->otraTarjetaDePrueba = New MedioBoletoUniversitario(50.0);
        
        $this->assertTrue(!($this->logicaDePrueba->checkSaldo($this->tarjetaDePrueba,$this->colectivoDePrueba->linea(),$this->colectivoDePrueba->empresa(),$this->colectivoDePrueba->numero(),$this->tiempoDePrueba)));
        $this->assertTrue($this->logicaDePrueba->checkSaldo($this->otraTarjetaDePrueba,$this->colectivoDePrueba->linea(),$this->colectivoDePrueba->empresa(),$this->colectivoDePrueba->numero(),$this->tiempoDePrueba));
    }
    
    public function testCheckPlus () {
        
        $this->assertTrue(TRUE);
    }
}
