<?php
class PasajroEspecial extends Pasajero{
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

    public function __toString()
    {
        $textoPadre=parent::__toString();
        return $textoPadre."Silla de Rueda: ".$this->getSillaDeRueda().
        "\nAsistencia: ".$this->getAsistencia().
        "\nComidas Especiales: ".$this->getComidasEspeciales()."\n";
    }
}
?>