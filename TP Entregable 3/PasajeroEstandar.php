<?php
class PasajeroEstandar extends Pasajero{

    public function __construct($nombre,$apellido,$numeroDocumento,$telefono,$num_asiento,$numeroTicket)
    {
        parent::__construct($nombre,$apellido,$numeroDocumento,$telefono,$num_asiento,$numeroTicket);
    }

    public function __toString()
    {
        return parent::__toString();
    }

    public function darPorcentajeIncremento(){
        $porc=parent::darPorcentajeIncremento();
        $incr=$porc+10;
        return $incr;
    }
}
?>