<?php

namespace TrabajoTarjeta;

use PHPUnit\Framework\TestCase;

class MedioBoletoEstudiantilTest extends TestCase {

    /*
     *  Verifica que se construya correctemante la instancia.
     */
    public function testConstruct () {
        
        $this->tarjetaDePrueba = New MedioBoletoEstudiantil();
        $this->constantesDePrueba = New Constantes();
        
        $this->assertEquals($this->tarjetaDePrueba->precio,$this->constantesDePrueba->precioMedioBoletoEstudiantil);        
    }
}