<?php

namespace TrabajoTarjeta;

use PHPUnit\Framework\TestCase;

class FranquiciaCompletaTest extends TestCase {

    /*
     *  Verifica que se construya correctemante la instancia.
     */
    public function testConstruct () {
        
        $this->tarjetaDePrueba = New FranquiciaCompleta();
        $this->constantesDePrueba = New Constantes();
        
        $this->assertEquals($this->tarjetaDePrueba->obtenerPrecio(),$this->constantesDePrueba->precioLibre);
    }
}
