<?php
class PasajeroVIP extends Pasajero{
    private $num_pasajero_recuente;
    private $cant_millas;

    public function __construct($nombre,$apellido,$numeroDocumento,$telefono,$num_asiento,$numeroTicket,$num_pasajero_recuente,$cant_millas)
    {
        parent::__construct($nombre,$apellido,$numeroDocumento,$telefono,$num_asiento,$numeroTicket);
        $this->num_pasajero_recuente=$num_pasajero_recuente;
        $this->cant_millas=$cant_millas;
    }

    public function getNumPasajeroRecuente(){
        return $this->num_pasajero_recuente;
    }
    public function getCantMillas(){
        return $this->cant_millas;
    }

    public function setNumPasajeroRecuente($num_pasajero_recuente){
        $this->num_pasajero_recuente=$num_pasajero_recuente;
    }
    public function setCantMillas($cant_millas){
        $this->cant_millas=$cant_millas;
    }

    public function __toString()
    {
        $texto=parent::__toString();
        return $texto."N° pasajero Recuente: ".$this->getNumPasajeroRecuente().
        "\nCantidad de Millas: ".$this->getCantMillas()."\n";
    }

    public function darPorcentajeIncremento(){
        //esta es una redifinicion total, ya que no se llama al padre pero tiene el mismo nombre
        //existe redifinicion parcial, en la que se llama al parent
        //y luego esta la herencia(metodo heredado del padre)
        $porc=parent::darPorcentajeIncremento();
        if($this->getCantMillas()<300){
            $porcentajeIncremento=$porc+30;
        }else{
            $porcentajeIncremento=$porc+35;
        }
        return $porcentajeIncremento;
    }
}
?>