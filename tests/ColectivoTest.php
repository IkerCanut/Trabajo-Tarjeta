<?php

namespace TrabajoTarjeta;

use PHPUnit\Framework\TestCase;

class ColectivoTest extends TestCase {
    
    protected $colectivoDePrueba;
    
    public function testLinea () {
        
        $this->colectivoDePrueba = New Colectivo(145, "RosarioBus", 1);
        
        $this->assertEquals($this->colectivoDePrueba->linea(),145);
    }
    
    public function testEmpresa () {
        $this->colectivoDePrueba = New Colectivo(145, "RosarioBus", 1);
        
        $this->assertEquals($this->colectivoDePrueba->empresa(),"RosarioBus");
    }
    
    public function testNumero () {
        $this->colectivoDePrueba = New Colectivo(145, "RosarioBus", 1);
        
        $this->assertEquals($this->colectivoDePrueba->numero(),1);
    }
    
    public function testPagarCon () {
        
        $this->colectivoDePrueba = New Colectivo(145, "RosarioBus", 1);
        $this->otroColectivoDePrueba = New Colectivo(142, "RosarioBus", 2);
        // Viernes a las 00:00
        $this->tiempoDePrueba = New TiempoFalso(86400);
        $saldoInicial = 70.0;
        
        // Prueba la tarjeta normal.
            $this->tarjetaDePrueba = New Tarjeta($saldoInicial);
            
            $this->assertEquals($this->colectivoDePrueba->pagarCon($this->tarjetaDePrueba,$this->tiempoDePrueba),$this->tarjetaDePrueba->obtenerSaldo());
            
            // Avanza 3 horas.
            $this->tiempoDePrueba->avanzar(10800);
            
            $this->assertEquals($this->colectivoDePrueba->pagarCon($this->tarjetaDePrueba,$this->tiempoDePrueba),$this->tarjetaDePrueba->obtenerSaldo());
            
            // Avanza media hora.
            $this->tiempoDePrueba->avanzar(1800);
            
            $this->assertEquals($this->otroColectivoDePrueba->pagarCon($this->tarjetaDePrueba,$this->tiempoDePrueba),"Transbordo");
            
            // Avanza 3 horas.
            $this->tiempoDePrueba->avanzar(10800);
            
            $this->assertEquals($this->colectivoDePrueba->pagarCon($this->tarjetaDePrueba,$this->tiempoDePrueba),"Plus");
            
            // Avanza 3 horas.
            $this->tiempoDePrueba->avanzar(10800);
            
            $this->assertEquals($this->colectivoDePrueba->pagarCon($this->tarjetaDePrueba,$this->tiempoDePrueba),"Plus");
            
            // Avanza 3 horas.
            $this->tiempoDePrueba->avanzar(10800);
            
            $this->assertEquals($this->colectivoDePrueba->pagarCon($this->tarjetaDePrueba,$this->tiempoDePrueba),"No puede viajar");
        /*
        // Prueba la franquicia completa.
            $this->tarjetaDePrueba = New FranquiciaCompleta();
            $this->tiempoDePrueba = New TiempoFalso(86400);
            
            $this->assertEquals($this->logicaDePrueba->efectuarPago($this->tarjetaDePrueba,$this->colectivoDePrueba->linea(),$this->colectivoDePrueba->empresa(),$this->colectivoDePrueba->numero(),$this->tiempoDePrueba),1);
            
            // Avanza 3 horas.
            $this->tiempoDePrueba->avanzar(10800);
            
            $this->assertEquals($this->logicaDePrueba->efectuarPago($this->tarjetaDePrueba,$this->colectivoDePrueba->linea(),$this->colectivoDePrueba->empresa(),$this->colectivoDePrueba->numero(),$this->tiempoDePrueba),1);
            
            // Avanza media hora.
            $this->tiempoDePrueba->avanzar(1800);
            
            $this->assertEquals($this->logicaDePrueba->efectuarPago($this->tarjetaDePrueba,$this->otroColectivoDePrueba->linea(),$this->otroColectivoDePrueba->empresa(),$this->otroColectivoDePrueba->numero(),$this->tiempoDePrueba),"Transbordo");
            
            // Avanza 3 horas.
            $this->tiempoDePrueba->avanzar(10800);
            
            $this->assertNotEquals($this->logicaDePrueba->efectuarPago($this->tarjetaDePrueba,$this->colectivoDePrueba->linea(),$this->colectivoDePrueba->empresa(),$this->colectivoDePrueba->numero(),$this->tiempoDePrueba),"Plus");
            
            // Avanza 3 horas.
            $this->tiempoDePrueba->avanzar(10800);
            
            $this->assertNotEquals($this->logicaDePrueba->efectuarPago($this->tarjetaDePrueba,$this->colectivoDePrueba->linea(),$this->colectivoDePrueba->empresa(),$this->colectivoDePrueba->numero(),$this->tiempoDePrueba),"Plus");
            
            // Avanza 3 horas.
            $this->tiempoDePrueba->avanzar(10800);
            
            $this->assertNotEquals($this->logicaDePrueba->efectuarPago($this->tarjetaDePrueba,$this->colectivoDePrueba->linea(),$this->colectivoDePrueba->empresa(),$this->colectivoDePrueba->numero(),$this->tiempoDePrueba),"No puede viajar");
            */
        // Prueba el medio boleto estudiantil.
            $this->tiempoDePrueba = New TiempoFalso(86400);
            $saldoInicial = 35.0;
            $this->tarjetaDePrueba = New MedioBoletoEstudiantil($saldoInicial);
            
            $this->assertEquals($this->colectivoDePrueba->pagarCon($this->tarjetaDePrueba,$this->tiempoDePrueba),$this->tarjetaDePrueba->obtenerSaldo());
            
            // Avanza 3 horas.
            $this->tiempoDePrueba->avanzar(10800);
            
            $this->assertEquals($this->colectivoDePrueba->pagarCon($this->tarjetaDePrueba,$this->tiempoDePrueba),$this->tarjetaDePrueba->obtenerSaldo());
            
            // Avanza media hora.
            $this->tiempoDePrueba->avanzar(1800);
            
            $this->assertEquals($this->otroColectivoDePrueba->pagarCon($this->tarjetaDePrueba,$this->tiempoDePrueba),"Transbordo");
            
            // Avanza 3 horas.
            $this->tiempoDePrueba->avanzar(10800);
            
            $this->assertEquals($this->colectivoDePrueba->pagarCon($this->tarjetaDePrueba,$this->tiempoDePrueba),"Plus");
            
            // Avanza 3 horas.
            $this->tiempoDePrueba->avanzar(10800);
            
            $this->assertEquals($this->colectivoDePrueba->pagarCon($this->tarjetaDePrueba,$this->tiempoDePrueba),"Plus");
            
            // Avanza 3 horas.
            $this->tiempoDePrueba->avanzar(10800);
            
            $this->assertEquals($this->colectivoDePrueba->pagarCon($this->tarjetaDePrueba,$this->tiempoDePrueba),"No puede viajar");
        
        // Prueba el medio boleto universitario.
            $this->tiempoDePrueba = New TiempoFalso(86400);
            $saldoInicial = 35.0;
            $this->tarjetaDePrueba = New MedioBoletoUniversitario($saldoInicial);
            
            $this->assertEquals($this->colectivoDePrueba->pagarCon($this->tarjetaDePrueba,$this->tiempoDePrueba),$this->tarjetaDePrueba->obtenerSaldo());
            
            // Avanza 3 horas.
            $this->tiempoDePrueba->avanzar(10800);
            
            $this->assertEquals($this->colectivoDePrueba->pagarCon($this->tarjetaDePrueba,$this->tiempoDePrueba),$this->tarjetaDePrueba->obtenerSaldo());
            
            // Avanza media hora.
            $this->tiempoDePrueba->avanzar(1800);
            
            $this->assertEquals($this->otroColectivoDePrueba->pagarCon($this->tarjetaDePrueba,$this->tiempoDePrueba),"Transbordo");
            
            // Avanza 3 horas.
            $this->tiempoDePrueba->avanzar(10800);
            
            $this->assertEquals($this->colectivoDePrueba->pagarCon($this->tarjetaDePrueba,$this->tiempoDePrueba),"Plus");
            
            // Avanza 3 horas.
            $this->tiempoDePrueba->avanzar(10800);
            
            $this->assertEquals($this->colectivoDePrueba->pagarCon($this->tarjetaDePrueba,$this->tiempoDePrueba),"Plus");
            
            // Avanza 3 horas.
            $this->tiempoDePrueba->avanzar(10800);
            
            $this->assertEquals($this->colectivoDePrueba->pagarCon($this->tarjetaDePrueba,$this->tiempoDePrueba),"No puede viajar");
    }

}
