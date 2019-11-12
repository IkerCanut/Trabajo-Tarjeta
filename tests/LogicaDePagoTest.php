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
        
        $this->logicaDePrueba = New LogicaDePago();
        
        // 00:00 de un Viernes.
        $this->assertTrue($this->logicaDePrueba->esDe22a6(86400));
        
        // 12:00 de un Viernes.
        $this->assertTrue(!($this->logicaDePrueba->esDomingo(129600)));
    }
    
    public function testEsDomingo () {
        
        $this->logicaDePrueba = New LogicaDePago();
        
        // 00:01 de un Jueves.
        $this->assertTrue(!($this->logicaDePrueba->esDomingo(100)));
        
        // 00:13 de un Domingo.
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
        
        // Prueba las tarjetas comunes.
        $this->assertTrue(!($this->logicaDePrueba->checkSaldo($this->tarjetaDePrueba,$this->colectivoDePrueba->linea(),$this->colectivoDePrueba->empresa(),$this->colectivoDePrueba->numero(),$this->tiempoDePrueba)));
        $this->assertTrue($this->logicaDePrueba->checkSaldo($this->otraTarjetaDePrueba,$this->colectivoDePrueba->linea(),$this->colectivoDePrueba->empresa(),$this->colectivoDePrueba->numero(),$this->tiempoDePrueba));
        
        // Prueba las franquicias estudiantiles.
        $this->tarjetaDePrueba = New MedioBoletoEstudiantil(10.0);
        $this->otraTarjetaDePrueba = New MedioBoletoEstudiantil(50.0);
        
        $this->assertTrue(!($this->logicaDePrueba->checkSaldo($this->tarjetaDePrueba,$this->colectivoDePrueba->linea(),$this->colectivoDePrueba->empresa(),$this->colectivoDePrueba->numero(),$this->tiempoDePrueba)));
        $this->assertTrue($this->logicaDePrueba->checkSaldo($this->otraTarjetaDePrueba,$this->colectivoDePrueba->linea(),$this->colectivoDePrueba->empresa(),$this->colectivoDePrueba->numero(),$this->tiempoDePrueba));
        
        // Prueba las franquicias universitarias.
        $this->tarjetaDePrueba = New MedioBoletoUniversitario(10.0);
        $this->otraTarjetaDePrueba = New MedioBoletoUniversitario(50.0);
        
        $this->assertTrue(!($this->logicaDePrueba->checkSaldo($this->tarjetaDePrueba,$this->colectivoDePrueba->linea(),$this->colectivoDePrueba->empresa(),$this->colectivoDePrueba->numero(),$this->tiempoDePrueba)));
        $this->assertTrue($this->logicaDePrueba->checkSaldo($this->otraTarjetaDePrueba,$this->colectivoDePrueba->linea(),$this->colectivoDePrueba->empresa(),$this->colectivoDePrueba->numero(),$this->tiempoDePrueba));
        
        // Prueba las franquicias completas.
        $this->tarjetaDePrueba = New FranquiciaCompleta();
        
        $this->assertTrue($this->logicaDePrueba->checkSaldo($this->otraTarjetaDePrueba,$this->colectivoDePrueba->linea(),$this->colectivoDePrueba->empresa(),$this->colectivoDePrueba->numero(),$this->tiempoDePrueba));
    }
    
    public function testCheckPlus () {
        
        $this->logicaDePrueba = New LogicaDePago();
        $this->tarjetaDePrueba = New Tarjeta();
        $this->otraTarjetaDePrueba = New Tarjeta();
        
        $this->otraTarjetaDePrueba->aumentarPlus();
        
        // Prueba con 0 y 1 plus usados respectivamente.
        $this->assertTrue($this->logicaDePrueba->checkPlus($this->tarjetaDePrueba));
        $this->assertTrue($this->logicaDePrueba->checkPlus($this->otraTarjetaDePrueba));
        
        $this->otraTarjetaDePrueba->aumentarPlus();
        
        // Prueba con 2 plus usados.
        $this->assertTrue(!($this->logicaDePrueba->checkPlus($this->otraTarjetaDePrueba)));
    }
}
