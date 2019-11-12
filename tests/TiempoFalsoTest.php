<?php

namespace TrabajoTarjeta;

use PHPUnit\Framework\TestCase;

class TiempoFalsoTest extends TestCase {

    protected $tiempoDePrueba;
    
    public function testAvanzar () {
        
        $this->tiempoDePrueba = New TiempoFalso (100);
        $this->tiempoDePrueba->avanzar(200);
        
        $this->assertEquals(300,$this->tiempoDePrueba->time());
    }
    
    public function testTime () {
    
        $this->tiempoDePrueba = New TiempoFalso (0);
        
        $this->assertEquals(0,$this->tiempoDePrueba->time());
    }
}
