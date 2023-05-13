<?php
class Viaje{
    private $codigo_vaje;
    private $destino_viaje;
    private $cant_max_pasajeros;
    private $pasajeros;// ahora son objetos Pasajeros
    private $responsableViaje;
    private $costoViaje;
    private $importeTotal;
    
    /**
     * Metodo construct del objeto Viaje
     */
    public function __construct($codigoViaje,$destino,$cantMaxPasajeros,$responsableViaje,$costoViaje){
        $this->codigo_vaje=$codigoViaje;
        $this->destino_viaje=$destino;
        $this->cant_max_pasajeros=$cantMaxPasajeros;
        $this->responsableViaje=$responsableViaje;
        $this->pasajeros=[];
        $this->costoViaje=$costoViaje;
        
        
    }
    //metodos set
    /**
     * metodo que asigna el codigo de viaje a la variable 
     * $codigo_viaje del objeto Viaje
     */
    public function setCodigo_viaje($codigo){
        $this->codigo_vaje=$codigo;

    }
    /**
     * metodo que asigna el destino del viaje a la variable 
     * $destino_viaje del objeto Viaje
     */
    public function setDestino_viaje($destinoViaje){
        $this->destino_viaje=$destinoViaje;
    }
    /**
     * metodo que asigna la cantidad maxima de pasajeros a la variable
     * $cant_max_pasajeros del objeto Viaje
     */
    public function setCantidadPasajerosMaxima($cantMaxPasajeros){
        $this->cant_max_pasajeros=$cantMaxPasajeros;
    }
    /**
     * metodo set que asigna un arreglo de la clase pasajeros a la variable $pasajeros
     * del objeto Viaje
     */
    public function setPasajeros($listaPasajeros){
        $this->pasajeros=$listaPasajeros;
    }
    /**
     * Metodo que asigna un objeto responsable a la variable $responableViaje
     */
    public function setResponsableViaje($responableViaje){
        $this->responsableViaje=$responableViaje;
    }
    /**
     * Metodo que asigna el costo del viaje
     */
    public function setCostoViaje($costoViaje){
        $this->costoViaje=$costoViaje;
    }
    /**
     * Metodo que asigna el importe total del viaje
     */
    public function setImporteTotal($importeTotal){
        $this->importeTotal=$importeTotal;
    }
  
    //metodos get
    /**
     * metodo que retorna el codigo de viaje
    */
    public function getCodigo_viaje(){
        return $this->codigo_vaje;

    }
    /**
     * metodo que retorna el destino del viaje
     */
    public function getDestino_viaje(){
        return $this->destino_viaje;
    }
    /**
     * metodo que retorna la cantidad maxima de pasajeros
     */
    public function getCantidadPasajerosMaxima(){
        return $this->cant_max_pasajeros;
    }
    //metodo que retorna un arreglo de la clase pasajeros
    public function getPasajeros(){
        return $this->pasajeros;
    }
    /**
     * Metodo que retorna un objeto responable
     */
    public function getResponsableViaje(){
        return $this->responsableViaje;
    }
    /**
     * metodo que retorna el costo del viaje
     */
    public function getCostoViaje(){
        return $this->costoViaje;
    }
    /**
     * metodo que retorna el importe total del viaje
     */
    public function getImporteTotal(){
        return $this->importeTotal;
    }


    /**
     * metodo que retorna una variable que contiene una cadena de string
     */
    public function mostrarDatosPasajeros(){
        $arrayPasajeros=$this->getPasajeros();
        $listap="\n";
        $stop=$this->getCantidadPasajerosMaxima();
        for ($i=0;$i<$stop;$i++){
            $nump=$i;
            $nump=$nump+1;
            if($arrayPasajeros[$i]!=null){
            $listap=$listap.
            "---------------
            \nN° de Pasajero: ".$nump.
            "\n".$arrayPasajeros[$i]->__toString().
            "\n------------------\n";
            }
        }
        return $listap;
    }
    /**
     * metodo que retorna una cadena de string
     */
    public function __toString()
    {
        
        return "Codigo de viaje: ".$this->getCodigo_viaje().
        "\nDestino: ".$this->getDestino_viaje().
        "\nCantidad Maxima de Pasajeros: ".$this->getCantidadPasajerosMaxima().
        "\nResponsable del viaje: \n".$this->getResponsableViaje().
        "\nLista de Pasajeros: \n".$this->mostrarDatosPasajeros();
        
    }

    //metodos propios del viaje


    //metodo que verifica si un pasajero ya esta agregado a la coleccion
    public function verificaPasajero($objPasajero){
        $coleccion=$this->getPasajeros();//coleccion de pasajeros
        $encontrado=false;
        $i=0;
        while($i<count($coleccion) && $encontrado==false){
            $unPasajero=$coleccion[$i];
            if($objPasajero==$unPasajero){
                $encontrado=true;
            }
        }
        return $encontrado;
    }
    /**
     * retorna verdadero si la cantidad de pasajeros del viaje es menor a la cantidad máxima de pasajeros y
     *  falso caso contrario
     */
    public function  hayPasajesDisponible(){
        $limite=$this->getCantidadPasajerosMaxima();
        $cantPasajeros=count($this->getPasajeros());
        $disponible=false;
        if($cantPasajeros<$limite){
            $disponible=true;
        }
        return $disponible;
    }

    /**
     * Funcion que agrega pasajeros.
     * retorna false si el pasajero ya se encuentra en la lista.
     * true si se agrego a la lista
     */
    public function agregarPasajero($objPasajero){
        $colPasajeros=$this->getPasajeros();
        $verificacion=$this->verificaPasajero($objPasajero);
        $agregado=false;
        $disponibilidad=$this->hayPasajesDisponible();
        if($disponibilidad){
            if($verificacion==false){
                array_push($colPasajeros,$objPasajero);
                $this->setPasajeros($colPasajeros);
                $agregado=true;
            }
        }
        return $agregado;
        
    }

    /**
     * Funcion que busca un pasajero segun su dni
     * y retorna su indice.
     * retorna -1 si no lo encuentra
     */
    public function buscarPasajero($dniPasajero){
        $colPasajeros=$this->getPasajeros();
        $i=0;
        $pasajeroEncontrado=null;
        $encontrado=false;
        while($i<count($colPasajeros) && $encontrado==false){
            $dniUnPasajero=$colPasajeros[$i]->getNumeroDocumento();
            if($dniPasajero==$dniUnPasajero){
                $pasajeroEncontrado=$colPasajeros[$i];
                $encontrado=true;
            }
            $i++;
        }
        return $pasajeroEncontrado;
    }

    public function venderPasaje($objPasajero){
        $agregado=$this->agregarPasajero($objPasajero);
        $suma=-1;
        if($agregado){
            $importe=$this->getCostoViaje();
            $suma=$importe+$this->getImporteTotal();
        }
        return $suma;
    }

    /**
     * Funcion que elimina a un pasajero.
     * Retorna true si lo borro, false caso contrario
     */
    public function eliminarPasajero($dniPasajero){
        $colPasajeros=$this->getPasajeros();
        $i=0;
        $borrado=false;
        while($i<count($colPasajeros) && $borrado==false){
            $dniUnPasajero=$colPasajeros[$i]->getNumeroDocumento();
            if($dniPasajero==$dniUnPasajero){
                unset($colPasajeros[$i]);
                $this->setPasajeros($colPasajeros);
                $borrado=true;
            }
            $i++;
        }
        return $borrado;
    }

}
?>