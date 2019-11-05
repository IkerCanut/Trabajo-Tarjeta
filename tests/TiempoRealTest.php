<?php

namespace TrabajoTarjeta;

use PHPUnit\Framework\TestCase;

class TiempoRealTest extends TestCase {

    protected $tiempoDePrueba;
    
    /*
     *  Verifica que el tiempo avanza correctamente
     */
    public function testTime () {
        $this->tiempoDePrueba = New TiempoReal();
        
        $prediccion = $this->tiempoDePrueba->time();
        sleep(5);
        $this->assertEquals(($this->tiempoDePrueba->time() - 5), $prediccion);
    }
}
