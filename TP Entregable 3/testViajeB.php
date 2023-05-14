<?php
include_once 'Viaje.php';
include_once 'Pasajero.php';
include_once 'PasajeroVIP.php';
include_once 'PasajeroEspecial.php';
include_once 'PasajeroEstandar.php';
include_once 'ResponsableV.php';

/**
 * Funcion que muestra un menu principal
 */
function menuPrincipal(){
    echo "+------------------------------------+\n";
    echo "+ 1- Cargar informacion del viaje    +\n";
    echo "+ 2- Vender Pasaje                   +\n";
    echo "+ 3- Modificar informacion del viaje +\n";
    echo "+ 4- Ver datos del viaje             +\n";
    echo "+ 5- Salir                           +\n";
    echo "+-------------------------------------\n";
}

/**
 * funcion que muestra un menu de opcion 2
 */
function menuOpcion2(){
    echo "+------------------------------------+\n";
    echo "+ Que dato desea modificar?:         +\n";
    echo "+------------------------------------+\n";
    echo "+ 1- Codigo del viaje                +\n";
    echo "+ 2- Destino                         +\n";
    echo "+ 3- Datos del los pasajeros         +\n";
    echo "+ 4- Datos del Responsable del viaje +\n";
    echo "+ 5- Volver atras                    +\n";
    echo "+------------------------------------+\n";

}
/**
 * funcion que muestra un menu para modificar pasajeros
 */
function menuPasajeros(){
    echo "+-------------------------+\n";
    echo "+ Que desea hacer?        +\n";
    echo "+-------------------------+\n";
    echo "+ 1-Modificar un pasajero +\n";
    echo "+ 2-Eliminar un pasajero  +\n";
    echo "+ 3-Atras                 +\n";
    echo "+-------------------------+\n";
}
/**
 * funcion que muestra el menu de subopciones para modificar los datos
 * de los pasajeros
 */
function menuModificarPasajeroEstandar(){
    echo "+----------------------+\n";
    echo "+ Que desea modifcar?  +\n";
    echo "+----------------------+\n";
    echo "+ 1- Nombre            +\n";
    echo "+ 2- Apellido          +\n";
    echo "+ 3- DNI               +\n";
    echo "+ 4- Telefono          +\n";
    echo "+ 5- Numero de Asiento +\n";
    echo "+ 6- Numero de Ticket  +\n";
    echo "+ 7- Atras             +\n";
    echo "+----------------------+\n";
}

function menuModificarPasajeroVip(){
    echo "+-----------------------------+\n";
    echo "+ Que desea modifcar?         +\n";
    echo "+-----------------------------+\n";
    echo "+ 1- Nombre                   +\n";
    echo "+ 2- Apellido                +\n";
    echo "+ 3- DNI                     +\n";
    echo "+ 4- Telefono                +\n";
    echo "+ 5- Numero de Asiento       +\n";
    echo "+ 6- Numero de Ticket        +\n";
    echo "+ 7- N° de pasajero Recuente +\n";
    echo "+ 8- Cantidad de Millas      +\n";
    echo "+ 9- Atras                   +\n";
    echo "+----------------------------+\n";
}
function menuModificarPasajeroEspecial(){
    echo "+-----------------------------+\n";
    echo "+ Que desea modifcar?         +\n";
    echo "+-----------------------------+\n";
    echo "+ 1- Nombre                   +\n";
    echo "+ 2- Apellido                +\n";
    echo "+ 3- DNI                     +\n";
    echo "+ 4- Telefono                +\n";
    echo "+ 5- Numero de Asiento       +\n";
    echo "+ 6- Numero de Ticket        +\n";
    echo "+ 7- Silla de Ruedas         +\n";
    echo "+ 8- Asistencia              +\n";
    echo "+ 9- Comida Especial         +\n";
    echo "+ 0- Atras                   +\n";
    echo "+----------------------------+\n";
}

/**
 * funcion que muestra el menu con las opciones
 * para modificar al responsable del viaje
 */
function menuModificarResponsable(){
    echo "+---------------------+\n";
    echo "+ Que desea modifcar? +\n";
    echo "+---------------------+\n";
    echo "+ 1- N° de Empleado   +\n";
    echo "+ 2- N° de Licencia   +\n";
    echo "+ 3- Nombre           +\n";
    echo "+ 4- Apellido         +\n";
    echo "+ 5- Atras            +\n";
    echo "+---------------------+\n";
}

/**
 * funcion que carga un responsable del viaje
 */
function cargarResponsable(){
    echo "Ingrese N° de empleado: \n";
    $numEmpleado=trim(fgets(STDIN));
    echo "Ingrese el N° de licencia:\n";
    $numLicencia=trim(fgets(STDIN));
    echo "Ingrese el Nombre:\n";
    $nombre=trim(fgets(STDIN));
    echo "Ingrese el Apellido:\n";
    $apellido=trim(fgets(STDIN));
    $responsable_viaje= new ResponsableV($numEmpleado,$numLicencia,$nombre,$apellido);
    
    
    return $responsable_viaje;
}

//Guarda codigo de la opcion 1 y crea un objeto Viaje
function codigoOpcion1SubOpcion1(){
    echo "Ingrese el codigo de Viaje:\n";
    $codigo=trim(fgets(STDIN));
    echo "Ingrese el Destino:\n";
    $destino=trim(fgets(STDIN));
    echo "Ingrese la cantidad maxima de pasajeros:\n";
    $cmp=trim(fgets(STDIN));
    echo "Ingrese al responsable del viaje:\n";
    $responsableViaje=cargarResponsable();
    echo "Ingrese el costo del viaje:\n";
    $costoViaje=trim(fgets(STDIN));
    $unViaje= new Viaje($codigo,$destino,$cmp,$responsableViaje,$costoViaje);
    return $unViaje;
}

function tipoDePasajero(){
    echo "+----------------------------+\n";
    echo "+ Que tipo de pasajero es?:  +\n";
    echo "+----------------------------+\n";
    echo "+ 1- Estandar                +\n";
    echo "+ 2- VIP                     +\n";
    echo "+ 3- Especial                +\n";
    echo "+----------------------------+\n";
}

function cargaPasajeroEstandar(){
    echo "Ingrese el nombre del pasajero: \n";
    $nombre=trim(fgets(STDIN));
    echo "Ingrese el apellido del pasajero\n";
    $apellido=trim(fgets(STDIN));
    echo "Ingrese el dni del pasajero\n";
    $dni=trim(fgets(STDIN));
    echo "Ingrese el numero de Telefono:\n";
    $telefono=trim(fgets(STDIN));
    echo "Ingrese el N° de asiento:\n";
    $numAsiento=trim(fgets(STDIN));
    echo "Ingrese el N° de Ticket:\n";
    $numTicket=trim(fgets(STDIN));
    $un_pasajero= new PasajeroEstandar($nombre,$apellido,$dni,$telefono,$numAsiento,$numTicket);
    return $un_pasajero;
}

function cargarPAsajeroVIP(){
    echo "Ingrese el nombre del pasajero: \n";
    $nombre=trim(fgets(STDIN));
    echo "Ingrese el apellido del pasajero\n";
    $apellido=trim(fgets(STDIN));
    echo "Ingrese el dni del pasajero\n";
    $dni=trim(fgets(STDIN));
    echo "Ingrese el numero de Telefono:\n";
    $telefono=trim(fgets(STDIN));
    echo "Ingrese el N° de asiento:\n";
    $numAsiento=trim(fgets(STDIN));
    echo "Ingrese el N° de Ticket:\n";
    $numTicket=trim(fgets(STDIN));
    echo "Ingrese N° de pasajero Recuente:\n";
    $num_pasajero_recuente=trim(fgets(STDIN));
    echo "Ingrese la cantidad de Millas:\n";
    $cant_millas=trim(fgets(STDIN));
    $un_pasajero= new PasajeroVIP($nombre,$apellido,$dni,$telefono,$numAsiento,
                                    $numTicket,$num_pasajero_recuente,$cant_millas);
    return $un_pasajero;
}

function cargarPasajeroEspecial(){
    echo "Ingrese el nombre del pasajero: \n";
            $nombre=trim(fgets(STDIN));
            echo "Ingrese el apellido del pasajero\n";
            $apellido=trim(fgets(STDIN));
            echo "Ingrese el dni del pasajero\n";
            $dni=trim(fgets(STDIN));
            echo "Ingrese el numero de Telefono:\n";
            $telefono=trim(fgets(STDIN));
            echo "Ingrese el N° de asiento:\n";
            $numAsiento=trim(fgets(STDIN));
            echo "Ingrese el N° de Ticket:\n";
            $numTicket=trim(fgets(STDIN));
            echo "Necesita silla de ruedas?:\n";
            $respuesta1=trim(fgets(STDIN));
            if($respuesta1=="si" || $respuesta1=="si" || $respuesta1=="SI"){
                $silla_de_rueda=true;
            }else{
                $silla_de_rueda=false;
            }
            echo "Necesita asistencia en el embarque y desenbarque?\n";
            $respuesta2=trim(fgets(STDIN));
            if($respuesta2=="si" || $respuesta2=="si" || $respuesta2=="SI"){
                $asistencia=true;
            }else{
                $asistencia=false;
            }
            echo "Necesita Comida Especial?\n";
            $respuesta3=trim(fgets(STDIN));
            if($respuesta3=="si" || $respuesta3=="si" || $respuesta3=="SI"){
                $comidas_especiales=true;
            }else{
                $comidas_especiales=false;
            }
            $un_pasajero= new PasajeroEspecial($nombre,$apellido,$dni,$telefono,$numAsiento,
                                $numTicket,$silla_de_rueda,$asistencia,$comidas_especiales);
            return $un_pasajero;
}
/**
 * funcion que crea pasajeros
 */
function cargarPasajeros(){
    tipoDePasajero();
    $tipo=trim(fgets(STDIN));
    switch($tipo){
        case 1:
            $un_pasajero=cargaPasajeroEstandar();
            break;
        case 2:
            $un_pasajero=cargarPAsajeroVIP();
            break;
        case 3:
            $un_pasajero=cargarPasajeroEspecial();
            break;
             
    }
    return $un_pasajero;
}
/**
 * Funcion que agrega pasajeros al viaje
 */
function agregarPasajero($viaje){

    $nuevoPasajero= cargarPasajeros();
    $agregado=$viaje->agregarPasajero($nuevoPasajero);
    if($agregado){
        echo "Pasajero agregado\n";
    }else{
        echo "El pasajero ya se encuentra en la lista\n";
    }
    
}

/**
 * funcion que modifica que recibe un viaje, pide el DNI del pasajero
 * a modificar, modifica dicho pasajero
 * @param Pasajeros $pasajeros
 * @return Pasajeros
 */
function modificarUnPasajero($viaje){
    $estandar= new ReflectionClass('PasajeroEstandar');
    $vip= new ReflectionClass('PasajeroVIP');
    $especial= new ReflectionClass('PasajeroEspecial');
    echo $viaje->__toString();
    echo "Ingrese el DNI del Pasajero a Modificar:\n";
    $dniPasajero=trim(fgets(STDIN));
    $elPasajero=$viaje->buscarPasajero($dniPasajero);

    if($elPasajero instanceof PasajeroEstandar){
        do{
        
            menuModificarPasajeroEstandar();
            $s=trim(fgets(STDIN));
            switch ($s){
                case 1:
                    echo "Ingrese el nuevo nombre: \n";
                    $nuevoNombre=trim(fgets(STDIN));
                    $elPasajero->setNombre($nuevoNombre);
                    break;
                case 2:
                    echo "Ingrese el nuevo apellido: \n";
                    $nuevoApellido=trim(fgets(STDIN));
                    $elPasajero->setApellido($nuevoApellido);
                    break;
                case 3:
                    echo "Ingrese el nuevo DNI:\n";
                    $nuevoDni=trim(fgets(STDIN));
                    $elPasajero->setNumeroDocumento($nuevoDni);
                    break;
                case 4:
                    echo "Ingrese el nuevo telefono:\n";
                    $nuevoTelefono=trim(fgets(STDIN));
                    $elPasajero->setTelefono($nuevoTelefono);
                    break;
                case 5:
                    echo "Ingrese el nuevo Numero de Asiento:\n";
                    $nuevoAsiento=trim(fgets(STDIN));
                    $elPasajero->setNumAsiento($nuevoAsiento);
                    break;
                case 6:
                    echo "Ingrese el nuevo Numero de Ticket:\n";
                    $nuevoTicket=trim(fgets(STDIN));
                    $elPasajero->setNumeroTicket($nuevoTicket);
                    break;
                
            }
           
        }while($s!=7);
    }elseif($elPasajero instanceof PasajeroVIP){
        do{
        
        
            menuModificarPasajeroVip();
            $s=trim(fgets(STDIN));
            switch ($s){
                case 1:
                    echo "Ingrese el nuevo nombre: \n";
                    $nuevoNombre=trim(fgets(STDIN));
                    $elPasajero->setNombre($nuevoNombre);
                    break;
                case 2:
                    echo "Ingrese el nuevo apellido: \n";
                    $nuevoApellido=trim(fgets(STDIN));
                    $elPasajero->setApellido($nuevoApellido);
                    break;
                case 3:
                    echo "Ingrese el nuevo DNI:\n";
                    $nuevoDni=trim(fgets(STDIN));
                    $elPasajero->setNumeroDocumento($nuevoDni);
                    break;
                case 4:
                    echo "Ingrese el nuevo telefono:\n";
                    $nuevoTelefono=trim(fgets(STDIN));
                    $elPasajero->setTelefono($nuevoTelefono);
                    break;
                case 5:
                    echo "Ingrese el nuevo Numero de Asiento:\n";
                    $nuevoAsiento=trim(fgets(STDIN));
                    $elPasajero->setNumAsiento($nuevoAsiento);
                    break;
                case 6:
                    echo "Ingrese el nuevo Numero de Ticket:\n";
                    $nuevoTicket=trim(fgets(STDIN));
                    $elPasajero->setNumeroTicket($nuevoTicket);
                    break;
                case 7: 
                    echo "Ingrese el nuevo N° de Pasajero Recuente:\n";
                    $nuevoNumRecuente=trim(fgets(STDIN));
                    $elPasajero->setNumPasajeroRecuente($nuevoNumRecuente);
                    break;
                case 8:
                    echo "Ingrese la nueva Cantidad de Millas:\n";
                    $nuevaCantMillas=trim(fgets(STDIN));
                    $elPasajero->setCantMillas($nuevaCantMillas);
                    break;
                
            }
           
        }while($s!=9 );
    }elseif($elPasajero instanceof PasajeroEspecial){
        do{
        
        
            menuModificarPasajeroEspecial();
            $s=trim(fgets(STDIN));
            switch ($s){
                case 1:
                    echo "Ingrese el nuevo nombre: \n";
                    $nuevoNombre=trim(fgets(STDIN));
                    $elPasajero->setNombre($nuevoNombre);
                    break;
                case 2:
                    echo "Ingrese el nuevo apellido: \n";
                    $nuevoApellido=trim(fgets(STDIN));
                    $elPasajero->setApellido($nuevoApellido);
                    break;
                case 3:
                    echo "Ingrese el nuevo DNI:\n";
                    $nuevoDni=trim(fgets(STDIN));
                    $elPasajero->setNumeroDocumento($nuevoDni);
                    break;
                case 4:
                    echo "Ingrese el nuevo telefono:\n";
                    $nuevoTelefono=trim(fgets(STDIN));
                    $elPasajero->setTelefono($nuevoTelefono);
                    break;
                case 5:
                    echo "Ingrese el nuevo Numero de Asiento:\n";
                    $nuevoAsiento=trim(fgets(STDIN));
                    $elPasajero->setNumAsiento($nuevoAsiento);
                    break;
                case 6:
                    echo "Ingrese el nuevo Numero de Ticket:\n";
                    $nuevoTicket=trim(fgets(STDIN));
                    $elPasajero->setNumeroTicket($nuevoTicket);
                    break;
                case 7:
                    echo "Necesita silla de ruedas?:\n";
                    $respuesta1=trim(fgets(STDIN));
                    if($respuesta1=="si" || $respuesta1=="si" || $respuesta1=="SI"){
                        $elPasajero->setSillaDeRueda(true);
                    }else{
                        $elPasajero->setSillaDeRueda(false);;
                    }
                    break;
                case 8:
                    echo "Necesita asistencia en el embarque y desenbarque?\n";
                    $respuesta2=trim(fgets(STDIN));
                    if($respuesta2=="si" || $respuesta2=="si" || $respuesta2=="SI"){
                        $elPasajero->setAsistencia(true);
                    }else{
                        $elPasajero->setAsistencia(false);
                    }
                    break;
                case 9:
                    echo "Necesita Comida Especial?\n";
                    $respuesta3=trim(fgets(STDIN));
                    if($respuesta3=="si" || $respuesta3=="si" || $respuesta3=="SI"){
                        $elPasajero->setComidasEspeciales(true);
                    }else{
                        $elPasajero->setComidasEspeciales(false);
                    }
                    break;
                
            }
           
        }while($s!=0 );
    }
   
   
}

/**
 * funcion que guarda el codigo para modificar a los pasajeros
 * @param Viaje $viaje
 */
function codigoModificacionPasajero($viaje){

    
    
    do{
        menuPasajeros();
        $selc=trim(fgets(STDIN));
        
        switch($selc){
            
            case 1:
                modificarUnPasajero($viaje);

                break;
            case 2:
                echo $viaje->__toString();
                echo "Ingrese el DNI de pasajero a eliminar:\n";
                $dniPasajero=trim(fgets(STDIN));
                $eliminado=$viaje->eliminarPasajero($dniPasajero);
                if($eliminado){
                    echo "Pasajero Eliminado\n";
                }else{
                    echo "El Pasajero no pudo ser Eliminado\n";
                }
                
                break;
                
        }
       
        
    }while($selc!=3 );
}


/**
 * Funcion que modifica al responsable del viaje
 * @param Viaje $viaje
 * @return ResponsableV
 */
function modificarResponsableViaje($viaje){
   
    do{
        $responsable=$viaje->getResponsableViaje();
        menuModificarResponsable();
        $respuesta=trim(fgets(STDIN));
        switch($respuesta){
            case 1:
                echo "Ingrese el Nuevo N°:\n";
                $nuevoNumEmpleado=trim(fgets(STDIN));
                $responsable->setNumeroEmpleado($nuevoNumEmpleado);
                break;
            case 2: 
                echo "Ingrese el nuevo N° de Licencia:\n";
                $nuevoNumLincencia=trim(fgets(STDIN));
                $responsable->setNumeroLicencia($nuevoNumLincencia);
                break;
            case 3:
                echo "Ingrese el Nuevo Nombre:\n";
                $nuevoNombre=trim(fgets(STDIN));
                $responsable->setNombre($nuevoNombre);
                break;
            case 4:
                echo "Ingrese el Nuevo Apellido:\n";
                $nuevoApellido=trim(fgets(STDIN));
                $responsable->setApellido($nuevoApellido);
                break;
        }
    
    }while($respuesta!=5);
    return $responsable;


}


/**
 * funcion que guarda el codigo de la opcion dos
 * @param Viaje $elViaje
 */
function codigoOpcion2($elViaje){
    do{
        menuOpcion2();
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
            case 4://modificar responsable
                $elViaje->setResponsableViaje(modificarResponsableViaje($elViaje));

                

        }
        
    }while($o!=5 );
}


//CODIGO PRINCIPAL
echo "--------------------------------------\n";
echo "+     Bienvenido a Viaje Feliz       +\n";
echo "--------------------------------------\n";
echo "+ Que desea realizar?:               +\n";
echo "--------------------------------------\n";



do{
    menuPrincipal();
    $opcion=trim(fgets(STDIN));
    switch($opcion){
        case 1:
            $viaje=codigoOpcion1SubOpcion1();

            break;
        case 2:
            if($viaje==null){
                echo "Carge un Viaje\n";
            }else{
                $disponibilidad=$viaje->hayPasajesDisponible();
                if($disponibilidad){
                    $un_pasajero=cargarPasajeros();
                    $repetido=$viaje->verificaPasajero($un_pasajero);
                    if(!$repetido){
                        $importe=$viaje->venderPasaje($un_pasajero);
                        if($importe!=-1){
                            echo "Total a pagar: ".$importe."\n";
                        }else{
                            echo "No se pudo realizar la venta.\n";
                        }
                    }else{
                        echo "Ya existe el pasajero\n";
                    }
                }else{
                    echo "No hay Pasajes Disponibles\n";
                }
                
            }
            
            break;
        case 3:
            if($viaje==null){
                echo "Carge un Viaje\n";
            }else{
                codigoOpcion2($viaje);
            }
            break;
        case 4:
            if($viaje==null){
                echo "Carge un Viaje\n";
            }else{
                echo $viaje->__toString();
                if($viaje->hayPasajesDisponible()){
                    echo "Hay pasajes disponibles.\n";
                }else{
                    echo "No hay pasajes disponibles.\n";
                }
            }
            break;
            
        }
}while($opcion!=5);

?>