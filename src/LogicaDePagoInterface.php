<?php

namespace TrabajoTarjeta;

interface LogicaDePagoInterface {

    /**
     * Recarga una tarjeta con un cierto valor de dinero.
     *
     * @param TarjetaInterface $tarjeta
     * @param string $linea
     * @param string $empresa
     * @param int $numero
     * @param TiempoInterface $tiempo
     *
     * @return bool
     */
    public function efectuarPago($tarjeta, $linea, $empresa, $numero, $tiempo);
}