<?php
class PasajeroEspecial extends Pasajero{
    //los datos son booleanos
    private $silla_de_rueda;
    private $asistencia;
    private $comidas_especiales;

    public function __construct($nombre,$apellido,$numeroDocumento,$telefono,$num_asiento,$numeroTicket,
                                $silla_de_rueda,$asistencia,$comidas_especiales)
    {
        parent::__construct($nombre,$apellido,$numeroDocumento,$telefono,$num_asiento,$numeroTicket);
        $this->silla_de_rueda=$silla_de_rueda;
        $this->asistencia=$asistencia;
        $this->comidas_especiales=$comidas_especiales;
    }

    public function getSillaDeRueda(){
        return $this->silla_de_rueda;
    }
    public function getAsistencia(){
        return $this->asistencia;
    }
    public function getComidasEspeciales(){
        return $this->comidas_especiales;
    }

    public function setSillaDeRueda($silla_de_rueda){
        $this->silla_de_rueda=$silla_de_rueda;
    }
    public function setAsistencia($asistencia){
        $this->asistencia=$asistencia;
    }
    public function setComidasEspeciales($comidas_especiales){
        $this->comidas_especiales=$comidas_especiales;
    }

    private function toStringAux($necesidad){
        if($necesidad){
            $texto="si";
        }else{
            $texto="no";
        }
        return $texto;
    }

    public function __toString()
    {
        $textoPadre=parent::__toString();
        
        return $textoPadre."Silla de Rueda: ".$this->toStringAux($this->getSillaDeRueda()).
        "\nAsistencia: ".$this->toStringAux($this->getAsistencia()).
        "\nComidas Especiales: ".$this->toStringAux($this->getComidasEspeciales())."\n";
    }



    public function darPorcentajeIncremento(){

        $porc=parent::darPorcentajeIncremento();

        if($this->getSillaDeRueda() && $this->getAsistencia() && $this->getComidasEspeciales()){
            $incremento=$porc+30;
        }elseif(($this->getSillaDeRueda() && !$this->getAsistencia() && !$this->getComidasEspeciales()) ||
                (!$this->getSillaDeRueda() && $this->getAsistencia() && !$this->getComidasEspeciales()) ||
                (!$this->getSillaDeRueda() && !$this->getAsistencia() && $this->getComidasEspeciales())){
            $incremento=$porc+15;
        }
        return $incremento;
    }
}
?>