<?php
class Pasajeros{
    private $nombre;
    private $num_asiento;
    private $numeroTicket;


    public function __construct($nombre,$num_asiento,$numeroTicket)
    {
        $this->nombre=$nombre;
        $this->num_asiento=$num_asiento;
        $this->numeroTicket=$numeroTicket;
        
    }

    //Set
    public function setNombre($nombre){
        $this->nombre=$nombre;
    }

    public function setApellido($num_asiento){
        $this->num_asiento=$num_asiento;
    }

    public function setNumeroTicket($numeroTicket){
        $this->numeroTicket=$numeroTicket;
    }

   

    //Gets

    public function getNombre(){
        return $this->nombre;
    }

    public function getNumAsiento(){
        return $this->num_asiento;
    }

    public function getNumeroTicket(){
        return $this->numeroTicket;
    }

    

    //__toString

    public function __toString()
    {
        return 
        "Nombre: ".$this->getNombre().
        "\nN° de asiento: ".$this->getNumAsiento().
        "\nNumero de Ticket: ".$this->getNumeroTicket()."\n";
    }
}
?>