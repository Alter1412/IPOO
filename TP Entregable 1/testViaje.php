<?php
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
    //echo "+ 3- Cantidad maxima de pasajeros    +\n";
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
//Guarda codigo de la opcion 1
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
    //print_r($un_pasajero);
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
        //print_r($t);
        
        menuModificarPasajeros();
        $s=trim(fgets(STDIN));
        switch ($s){
            case 1:
                echo "Ingrese el nuevo nombre: \n";
                $nuevoNombre=trim(fgets(STDIN));
                $t[$nump]["nombre"]=$nuevoNombre;
                break;
            case 2:
                echo "Ingrese el nuevo apellido: \n";
                $t[$nump]["apellido"]=trim(fgets(STDIN));
                break;
            case 3:
                echo "Ingrese el nuevo DNI:\n";
                $t[$nump]["dni"]=trim(fgets(STDIN));
                break;
            
        }
        //echo "Desea modificar otro dato (s/n)?\n";
       // menuModificarPasajeros();
        //$s=trim(fgets(STDIN));
    }while($s!=4 /*&& $respuesta!="n"*/);
    return $t;
}
/**
 * funcion que guarda el codigo para modificar a los pasajeros
 */
function codigoModificacionPasajero($v){

    $pasajeros=$v->getPasajeros();
    $cantPasMax=$v->getCantidadPasajerosMaxima();
    $cantPasajerosActual=count($pasajeros);
    do{
        menuPasajeros();
        $selc=trim(fgets(STDIN));
        switch($selc){
            case 1:
                //print_r($pasajeros);
                if($cantPasajerosActual<$cantPasMax){
                    $pasajeros[$cantPasajerosActual]=agregarPasajeros();
                    //print_r($pasajeros);
                    $v->setPasajeros($pasajeros);
                    echo "Pasajero agregado\n";
                    
                }else{
                    echo "Cantidad de pasajeros maxima alcansada\n";
                }
                break;
            case 2:
                $v->setPasajeros(modificarUnPasajero($pasajeros));
                break;
            case 3:
                echo "Ingrese el N° de pasajero a eliminar:\n";
                //print_r($pasajeros);
                $num=trim(fgets(STDIN));
                unset($pasajeros[$num]);
                //print_r($pasajeros);
                $v->setPasajeros($pasajeros);
                echo "Pasajero Eliminado\n";
                break;
                
        }
       
        
    }while($selc!=4 /*&& $res!="n"*/);
}
/**
 * funcion que guarda el codigo de la opcion dos
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
        //echo "Desea modifcar algo mas? (s/n)\n";
        //menuSubopcionesOpcion2();
        //$o=trim(fgets(STDIN));
    }while($o!=4 /*&& $r!="n"*/);
}

//CODIGO PRINCIPAL
echo "--------------------------------------\n";
echo "+     Bienvenido a Viaje Feliz       +\n";
echo "--------------------------------------\n";
echo "+ Que desea realizar?:               +\n";
echo "--------------------------------------\n";
//$viaje= new Viaje(0000,"paris",1);
//$listaPasajeros=[];

//$listaPasajeros[0]["nombre"]="alter";
//$listaPasajeros[0]["apellido"]="lillo";
//$listaPasajeros[0]["dni"]=11612294;
//$listaPasajeros[1]=$un_pasajero;
$un_pasajero=[];
$un_pasajero=["nombre"];
//$un_pasajero["nombre"]="alter";
$un_pasajero=["apellido"];
//$un_pasajero["apellido"]="lillo";
$un_pasajero=["dni"];
//$un_pasajero["dni"]=11612294;

/*$listaPasajeros=$viaje->getPasajeros();
$listaPasajeros[0]=$un_pasajero;
$viaje->setPasajeros($listaPasajeros);*/
//$contador=0;

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
                        $listaPasajeros=$viaje->getPasajeros();
                        break;
                    case 2:
                        /*echo "Cuantos pasajeros desea agregar?\n";//agregar algun contador que cuente hasta la capacidad maxima de pasajeros?
                        $stop=trim(fgets(STDIN));
                        //$viaje->getCantidadPasajerosMaxima();
                        $listaPasajeros=$viaje->getPasajeros();
                        for($i=0;$i<$stop;$i++){
                            $listaPasajeros[$i]=agregarPasajeros();
                        }
                        */
                        $pAcutales=count($listaPasajeros);//no se puede cargar otro pasajero cuando uno de los pasajeros es eliminado.
                        if($pAcutales < $viaje->getCantidadPasajerosMaxima()){//solo se puede modificar a travez de la opcion modifcar pasajero. Tendra algo que ver con el unset? 
                            $listaPasajeros[$pAcutales]=agregarPasajeros();
                            $viaje->setPasajeros($listaPasajeros);
                            //$contador=$contador+1;
                        }else{
                            echo "Lista llena.\n";
                        }
                }
            }while($s!=3);
            
            break;
        case 2:
            codigoOpcion2($viaje);
            break;
        case 3:
            echo $viaje->__toString();
            
        }
}while($opcion!=4);

?>