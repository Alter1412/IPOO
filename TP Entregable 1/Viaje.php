<?php
class Viaje{
    private $codigo_vaje;
    private $destino_viaje;
    private $cant_max_pasajeros;
    private $pasajeros;
    //private $un_pasajero;

    public function __construct($codigoViaje,$destino,$cantMaxPasajeros){
        $this->codigo_vaje=$codigoViaje;
        $this->destino_viaje=$destino;
        $this->cant_max_pasajeros=$cantMaxPasajeros;
        $this->pasajeros=[];
        /*$this->un_pasajero=[];
        $this->un_pasajero["nombre"]=[];
        $this->un_pasajero["apellido"]=[];
        $this->un_pasajero["DNI"]=[];
        Esto va en la clase test*/
        
    }
    //metodos set
    public function setCodigo_viaje($codigo){
        $this->codigo_vaje=$codigo;

    }

    public function setDestino_viaje($destinoViaje){
        $this->destino_viaje=$destinoViaje;
    }

    public function setCantidadPasajerosMaxima($cantMaxPasajeros){
        $this->cant_max_pasajeros=$cantMaxPasajeros;
    }
    public function setPasajeros($listaPasajeros){
        $this->pasajeros=$listaPasajeros;
    }
   /*public function setNombre_un_pasajero($nombre){
        $this->un_pasajero["nombre"]=$nombre;
    }
    public function setApellido_un_pasajero($apellido){
        $this->un_pasajero["apellido"]=$apellido;
    }
    public function setDni_un_pasajero($dni){
        $this->un_pasajero["DNI"]=$dni;
    }
    */
    //metodos get
    public function getCodigo_viaje(){
        return $this->codigo_vaje;

    }

    public function getDestino_viaje(){
        return $this->destino_viaje;
    }

    public function getCantidadPasajerosMaxima(){
        return $this->cant_max_pasajeros;
    }
    //funcion que retorna un arreglo de pasajeros
    public function getPasajeros(){
        return $this->pasajeros;
    }

    public function mostrarDatosPasajeros(){
        $arrayPasajeros=$this->getPasajeros();
        $listap="\n";
        $stop=$this->getCantidadPasajerosMaxima();
        for ($i=0;$i<$stop;$i++){
            $listap=$listap."   Nombre: ".$arrayPasajeros[$i]["nombre"].
            "\n Apellido: ".$arrayPasajeros[$i]["apellido"].
            "\n DNI: ".$arrayPasajeros[$i]["dni"]."\n
            ------------------\n";
        }
        return $listap;
    }

    public function __toString()
    {
        
        return "Codigo de viaje: ".$this->getCodigo_viaje().
        "\nDestino: ".$this->getDestino_viaje().
        "\nCantidad Maxima de Pasajeros: ".$this->getCantidadPasajerosMaxima().
        "\nLista de Pasajeros: \n".$this->mostrarDatosPasajeros()."\n";
    }
}
?>