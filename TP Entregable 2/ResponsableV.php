<?php
class ResponsableV{
    private $numeroEmpleado;
    private $numeroLicencia;
    private $nombre;
    private $apellido;

    public function __construct($numeroEmpleado,$numeroLicencia,$nombre,$apellido)
    {
        $this->numeroEmpleado=$numeroEmpleado;
        $this->numeroLicencia=$numeroLicencia;
        $this->nombre=$nombre;
        $this->apellido=$apellido;
    }

    //Set
    public function setNombre($nombre){
        $this->nombre=$nombre;
    }

    public function setApellido($apellido){
        $this->apellido=$apellido;
    }

    public function setNumeroEmpleado($numeroEmpleado){
        $this->numeroEmpleado=$numeroEmpleado;
    }

    public function setNumeroLicencia($numeroLicencia){
        $this->numeroLicencia=$numeroLicencia;
    }

    //Gets

    public function getNombre(){
        return $this->nombre;
    }

    public function getApellido(){
        return $this->apellido;
    }

    public function getNumeroEmpleado(){
        return $this->numeroEmpleado;
    }

    public function getNumeroLicencia(){
        return $this->numeroLicencia;
    }

    //__toString

    public function __toString()
    {
        return 
        "Numero de Empleado: ".$this->getNumeroEmpleado().
        "\nNUmero de Licencia: ".$this->getNumeroLicencia().
        "\nNombre: ".$this->getNombre().
        "\nApelido: ".$this->getApellido();
    }
}
?>