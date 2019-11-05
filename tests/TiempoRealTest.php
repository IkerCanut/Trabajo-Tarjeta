<?php

namespace TrabajoTarjeta;

use PHPUnit\Framework\TestCase;

class TiempoRealTest extends TestCase {

    protected $tiempoDePrueba;
    
    public function __Construct () {
        $this->tiempoDePrueba = New TiempoReal();
    }
    
    /*
     *  Verifica que el tiempo avanza correctamente
     */
    public function testTime () {
        $prediccion = $this->tiempoDePrueba->time();
        sleep(5);
        $this->assertEquals(($this->tiempoDePrueba->time() - 5), $prediccion);
    }
}
