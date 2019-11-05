<?php
namespace TrabajoTarjeta;

class LogicaDePago implements LogicaDePagoInterface{

    public function efectuarPago($tarjeta, $linea, $empresa, $numero, $tiempo) {
        if ($this->checkTransbordo($tarjeta, $linea, $empresa, $numero, $tiempo)){
            return "Transbordo";
        } else if ($this->checkSaldo($tarjeta, $linea, $empresa, $numero, $tiempo)){
            $tarjeta->bajarSaldo($tarjeta->obtenerPrecio());
            $tarjeta->anteriorLinea = $linea;
            $tarjeta->anteriorEmpresa = $empresa;
            $tarjeta->anteriorNumero = $numero;
            $tarjeta->anteriorTiempo = $tiempo->time();

            if ($tarjeta->viajesLimitados != null) {
                if (date('dMY', $tarjeta->ultimoDia) == date('dMY', $tiempo->time())){
                    $tarjeta->viajesDiarios++;
                } else {
                    $tarjeta->ultimoDia = $tiempo->time();
                    $tarjeta->viajesDiarios = 1;
                }
            }

            return $tarjeta->obtenerSaldo();
        } else if ($this->checkPlus($tarjeta)){
            $tarjeta->aumentarPlus();
            return "Plus";
        } else {
            return "No puede viajar";
        }
    }

    private function checkTransbordo(TarjetaInterface $tarjeta, $linea, $empresa, $numero, TiempoInterface $tiempo){
        /*return ( $tarjeta->anteriorLinea && $tarjeta->anteriorEmpresa && $tarjeta->anteriorNumero &&
	        ($tarjeta->anteriorLinea != $linea || 
            $tarjeta->anteriorEmpresa != $empresa ||
            $tarjeta->anteriorNumero != $numero) && 
            $tiempo->time() - $tarjeta->anteriorTiempo < 3600
        );*/

        if ( $tarjeta->anteriorLinea && $tarjeta->anteriorEmpresa && $tarjeta->anteriorNumero &&
        ($tarjeta->anteriorLinea != $linea     || 
        $tarjeta->anteriorEmpresa != $empresa ||
        $tarjeta->anteriorNumero != $numero)) {
            // Cambio de colectivo

            if ($this->esDomingo($tiempo->time()) || $this->esFestivo($tiempo->time())){
                return true;
            }

            if ($this->esDe22a6($tiempo->time()) || $this->esSabadoOMedioFestivo14a22($tiempo->time())){
                // check 2 horas
                if (($tiempo->time() - $tarjeta->anteriorTiempo) < 7200) {
                    return true;
                }
            }
            
            if ($this->esDiaHabil6a22($tiempo->time()) || $this->esSabadoOMedioFestivo6a14($tiempo->time())){
                // check 1 hora
                if (($tiempo->time() - $tarjeta->anteriorTiempo) < 3600) {
                    return true;
                }
            }
            
            return false;
            
        }
    }

    private function esDiaHabil6a22($tiempo){
        if (!$this->esFestivo($tiempo) && !$this->esMedioFestivo($tiempo) &&
        date('D', $tiempo) != "Sat" && date('D', $tiempo) != "Sun") {
            return (date('H', $tiempo) >= 6) && (date('H', $tiempo) < 22);
        }
        return false;
    }

    private function esSabadoOMedioFestivo6a14($tiempo){
        if (date('D', $tiempo) == "Sat" || $this->esMedioFestivo($tiempo)){
            return (date('H', $tiempo) >= 6 && date('H', $tiempo) < 14);
        }
        return false;
    }

    private function esDe22a6($tiempo){
        return (date('H', $tiempo) >= 22 || date('H', $tiempo) < 6);
    }

    private function esSabadoOMedioFestivo14a22($tiempo){
        if (date('D', $tiempo) == "Sat" || $this->esMedioFestivo($tiempo)){
            return (date('H', $tiempo) >= 14) && (date('H', $tiempo) < 22);
        }
        return false;
    }

    private function esDomingo($tiempo){
        return date('D', $tiempo) == "Sun";
    }


    private function esFestivo($tiempo){
        return false;
    }
    
    private function esMedioFestivo($tiempo){
        return false;
    }

    private function checkSaldo(TarjetaInterface $tarjeta, $linea, $empresa, $numero, TiempoInterface $tiempo){
        return ($tarjeta->obtenerSaldo() >= $tarjeta->obtenerPrecio());
    }

    private function checkPlus(TarjetaInterface $tarjeta){
        return ($tarjeta->obtenerPlus() < 2);
    }
}