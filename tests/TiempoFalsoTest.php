<?php

namespace TrabajoTarjeta;

use PHPUnit\Framework\TestCase;

class TiempoFalsoTest extends TestCase {

    protected $tiempoDePrueba;
    
    public function testAvanzar () {
        
        $this->assertTrue(TRUE);
    }
    
    public function testTime () {
    
        $this->tiempoDePrueba = New TiempoFalso (0);
        
        $this->assertEquals(0,$tiempoDePueba->time());
    }
}
