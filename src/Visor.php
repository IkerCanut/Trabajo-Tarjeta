<?php

namespace TrabajoTarjeta;

class Visor implements VisorInterface {
    public function mostrarInformacion($informacion){
        echo $informacion . "\n";
    }
}