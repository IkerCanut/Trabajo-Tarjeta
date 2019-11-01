<?php

namespace TrabajoTarjeta;

interface TiempoInterface {

    /**
     * Checkea si se cumplen las opciones necesarias para el vieje plus y devuelve true o false segun el caso.
     *
     * @param float
     */
    public function mostrarInformacion($saldo);
}