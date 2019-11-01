<?php

namespace TrabajoTarjeta;

class Visor implements VisorInterface {
    public function mostrarInformacion($informacion){
        print_r($informacion);
    }
}