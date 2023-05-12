<?php
class Pasajero{
    private $nombre;
    private $apellido;
    private $numeroDocumento;
    private $telefono;
    private $num_asiento;
    private $numeroTicket;

    public function __construct($nombre,$apellido,$numeroDocumento,$telefono,$num_asiento,$numeroTicket)
    {
        $this->nombre=$nombre;
        $this->apellido=$apellido;
        $this->numeroDocumento=$numeroDocumento;
        $this->telefono=$telefono;
        $this->num_asiento=$num_asiento;
        $this->numeroTicket=$numeroTicket;
    }

    //Set
    public function setNombre($nombre){
        $this->nombre=$nombre;
    }

    public function setApellido($apellido){
        $this->apellido=$apellido;
    }

    public function setNumeroDocumento($numeroDocumento){
        $this->numeroDocumento=$numeroDocumento;
    }

    public function setTelefono($telefono){
        $this->telefono=$telefono;
    }

    public function setNumAsiento($num_asiento){
        $this->num_asiento=$num_asiento;
    }

    public function setNumeroTicket($numeroTicket){
        $this->numeroTicket=$numeroTicket;
    }


    //Gets

    public function getNombre(){
        return $this->nombre;
    }

    public function getApellido(){
        return $this->apellido;
    }

    public function getNumeroDocumento(){
        return $this->numeroDocumento;
    }

    public function getTelefono(){
        return $this->telefono;
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
        "\nApelido: ".$this->getApellido().
        "\nNumero de Documento: ".$this->getNumeroDocumento().
        "\nTelefono: ".$this->getTelefono().
        "\nN° de asiento: ".$this->getNumAsiento().
        "\nNumero de Ticket: ".$this->getNumeroTicket()."\n";
    }

   
}
?>