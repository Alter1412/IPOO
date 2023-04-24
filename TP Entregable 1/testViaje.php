<?php
//llamo al arvhivo de la clase Viaje test de sumbit en nueva compu
include 'Viaje.php';



/**
 * Funcion que muestra un menu principal
 */
function menuPrincipal(){
    echo "+------------------------------------+\n";
    echo "+ 1- Cargar informacion del viaje    +\n";
    echo "+ 2- Modificar informacion del viaje +\n";
    echo "+ 3- Ver datos del viaje             +\n";
    echo "+ 4- Salir                           +\n";
    echo "+-------------------------------------\n";
}

/**
 * funcion que muestra el menu de la opcion 1
 */
function menuOpcion1(){
    echo "+-------------------------------+\n";
    echo "+ Que desea cargar?             +\n";
    echo "+-------------------------------+\n";
    echo "+ 1- Datos  del viaje           +\n";
    echo "+ 2- Pasajeros                  +\n";
    echo "+ 3- Atras                      +\n";
    echo "+-------------------------------+\n";
}

/**
 * funcion que muestra un menu de subopciones
 */
function menuSubopcionesOpcion2(){
    echo "+------------------------------------+\n";
    echo "+ Que dato desea modificar?:         +\n";
    echo "+------------------------------------+\n";
    echo "+ 1- Codigo del viaje                +\n";
    echo "+ 2- Destino                         +\n";
    
    echo "+ 3- Datos del los pasajeros         +\n";
    echo "+ 4- Volver atras                    +\n";
    echo "+------------------------------------+\n";

}

/**
 * funcion que muestra el menu de subopciones para modificar los datos
 * de los pasajeros
 */
function menuModificarPasajeros(){
    echo "+---------------------+\n";
    echo "+ Que desea modifcar? +\n";
    echo "+---------------------+\n";
    echo "+ 1- Nombre           +\n";
    echo "+ 2- Apellido         +\n";
    echo "+ 3- DNI              +\n";
    echo "+ 4- Atras            +\n";
    echo "+---------------------+\n";
}
//Guarda codigo de la opcion 1 y crea un objeto Viaje
function codigoOpcion1(){
    echo "Ingrese el codigo de Viaje:\n";
    $codigo=trim(fgets(STDIN));
    echo "Ingrese el Destino:\n";
    $destino=trim(fgets(STDIN));
    echo "Ingrese la cantidad maxima de pasajeros:\n";
    $cmp=trim(fgets(STDIN));
    $unViaje= new Viaje($codigo,$destino,$cmp);
    return $unViaje;
}
/**
 * funcion que agrega pasajeros
 */
function agregarPasajeros(){
    echo "Ingrese el nombre del pasajero: \n";
    $nombre=trim(fgets(STDIN));
    echo "Ingrese el apellido del pasajero\n";
    $apellido=trim(fgets(STDIN));
    echo "Ingrese el dni del pasajero\n";
    $dni=trim(fgets(STDIN));
    $un_pasajero=[];
    $un_pasajero["nombre"]=$nombre;
    $un_pasajero["apellido"]=$apellido;
    $un_pasajero["dni"]=$dni;
    
    return $un_pasajero;
}
/**
 * funcion que muestra un menu para modificar pasajeros
 */
function menuPasajeros(){
    echo "+-------------------------+\n";
    echo "+ Que desea hacer?        +\n";  
    echo "+-------------------------+\n";
    echo "+ 1-Agrgar un pasajero    +\n";
    echo "+ 2-Modificar un pasajero +\n";
    echo "+ 3-Eliminar un pasajero  +\n";
    echo "+ 4-Atras                 +\n";
    echo "+-------------------------+\n";
}
/**
 * funcion que modifica un pasajero y retorna un array
 */
function modificarUnPasajero($travel){
    $t=$travel;
    echo "Ingrese el N° de pasajero: \n";
    $nump=trim(fgets(STDIN));
    
    do{
        
        
        menuModificarPasajeros();
        $s=trim(fgets(STDIN));
        switch ($s){
            case 1:
                echo "Ingrese el nuevo nombre: \n";
                $nuevoNombre=trim(fgets(STDIN));
                $t[$nump-1]["nombre"]=$nuevoNombre;
                break;
            case 2:
                echo "Ingrese el nuevo apellido: \n";
                $t[$nump-1]["apellido"]=trim(fgets(STDIN));
                break;
            case 3:
                echo "Ingrese el nuevo DNI:\n";
                $t[$nump-1]["dni"]=trim(fgets(STDIN));
                break;
            
        }
       
    }while($s!=4 );
    return $t;
}
/**
 * funcion que guarda el codigo para modificar a los pasajeros
 * @param Viaje $v
 */
function codigoModificacionPasajero($v){

    $pasajeros=$v->getPasajeros();
    $cantPasMax=$v->getCantidadPasajerosMaxima();
    $cantPasajerosActual=count($pasajeros);
    $cont=0;
    $esVacio=[];
    do{
        menuPasajeros();
        $selc=trim(fgets(STDIN));
        
        switch($selc){
            
            case 1:
                $pasajeros=$v->getPasajeros();
                        //---------------
                        $llenarLugar=elementoVacio($pasajeros, $v->getCantidadPasajerosMaxima());
                        if($llenarLugar!=-1 && $llenarLugar<$v->getCantidadPasajerosMaxima()){
                            $pasajeros[$llenarLugar]=agregarPasajeros();
                            $v->setPasajeros($pasajeros);
                            echo "Pasajero agregado\n";
                        }else{
                            echo "Lista llena.\n";
                            echo "Cantidad de pasajeros maxima alcansada\n";
                        }
                
                  
                break;
            case 2:
                echo $v->__toString();
                $v->setPasajeros(modificarUnPasajero($pasajeros));
                break;
            case 3:
                echo $v->__toString();
                echo "Ingrese el N° de pasajero a eliminar:\n";
                
                $num=trim(fgets(STDIN));
                unset($pasajeros[$num-1]);
                
                $v->setPasajeros($pasajeros);
                echo "Pasajero Eliminado\n";
                break;
                
        }
       
        
    }while($selc!=4 );
}
/**
 * funcion que guarda el codigo de la opcion dos
 * @param Viaje $elViaje
 */
function codigoOpcion2($elViaje){
    do{
        menuSubopcionesOpcion2();
        $o=trim(fgets(STDIN));
        switch($o){
            case 1:
                echo "Ingrese el nuevo codigo: \n";
                $nuevoCodigo=trim(fgets(STDIN));
                $elViaje->setCodigo_viaje($nuevoCodigo);
                break;
            case 2:
                echo "Ingrese el nuevo destino:\n";
                $nuevoDestino=trim(fgets(STDIN));
                $elViaje->setDestino_viaje($nuevoDestino);
                break;
            case 3:
                codigoModificacionPasajero($elViaje);
                break;
                

        }
        
    }while($o!=4 );
}

/**
 * Funcion que retorna la posicion del primer elemento vacio que encuentra del array
 * @param array $arrayPasajeros
 * @return int
 */
function elementoVacio($arrayPasajeros,$maxPasajeros){
    $i=0;
    $stop=$maxPasajeros;
    $encontrado=false;
    while($i<$stop && $encontrado==false){
        if(empty($arrayPasajeros[$i])){
            $posicion=$i;
            $i=$i+1;
            $encontrado=true;
        }else{
            $posicion=-1;
            $i=$i+1;
        }

    }
    return $posicion;
}
//CODIGO PRINCIPAL

echo "--------------------------------------\n";
echo "+     Bienvenido a Viaje Feliz       +\n";
echo "--------------------------------------\n";
echo "+ Que desea realizar?:               +\n";
echo "--------------------------------------\n";



$un_pasajero=[];
$un_pasajero=["nombre"];

$un_pasajero=["apellido"];

$un_pasajero=["dni"];



$contador=0;
$vacio=[];
$estaVacio=false;

do{
    menuPrincipal();
    $opcion=trim(fgets(STDIN));
    switch($opcion){
        case 1:
            do{
                menuOpcion1();
                $s=trim(fgets(STDIN));
                switch($s){
                    case 1:
                        $viaje=codigoOpcion1();
                        
                        break;
                    case 2:
                        
                        if($viaje==null){
                            echo "Carge un Viaje\n";
                        }else{
                            $listaPasajeros=$viaje->getPasajeros();
                        
                            $llenarLugarPasajero=elementoVacio($listaPasajeros, $viaje->getCantidadPasajerosMaxima());
                            if($llenarLugarPasajero!=-1 && $llenarLugarPasajero<$viaje->getCantidadPasajerosMaxima()){
                                $listaPasajeros[$llenarLugarPasajero]=agregarPasajeros();
                                $viaje->setPasajeros($listaPasajeros);
                            }else{
                                echo "Lista llena.\n";
                        }
                       
                        }
                      
                }
            }while($s!=3);
            
            break;
        case 2:
            if($viaje==null){
                echo "Carge un Viaje\n";
            }else{
                codigoOpcion2($viaje);
            }
            break;
        case 3:
            if($viaje==null){
                echo "Carge un Viaje\n";
            }else{
                echo $viaje->__toString();
            }
            
        }
}while($opcion!=4);


?>