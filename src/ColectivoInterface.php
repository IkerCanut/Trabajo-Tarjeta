<?php

namespace TrabajoTarjeta;

interface ColectivoInterface {

    /**
     * Devuelve el nombre de la linea. Ejemplo '142 Negro'
     *
     * @return string
     */
    public function linea();

    /**
     * Devuelve el nombre de la empresa. Ejemplo 'Semtur'
     *
     * @return string
     */
    public function empresa();

    /**
     * Devuelve el numero de unidad. Ejemplo: 12
     *
     * @return int
     */
    public function numero();

    /**
     * Paga un viaje en el colectivo con una tarjeta en particular.
     *
     * @param TarjetaInterface $tarjeta
     *
     * @return TRUE|FALSE
     *  TRUE si pudo pagar correctamente
     *  FALSE si no hay saldo suficiente en la tarjeta.
     */
    public function pagarCon(TarjetaInterface $tarjeta);

}