<?php
include_once 'Viaje.php';
include_once 'Pasajero.php';
include_once 'PasajeroVIP.php';
include_once 'PasajeroEspecial.php';
include_once 'PasajeroEstandar.php';
include_once 'ResponsableV.php';
$responsable= new ResponsableV(1,123,"alex","zay");
$viaje= new Viaje(111,"paris",3,$responsable,1300);
$contador=1;
do{
    echo "vendo pasaje n° ".$contador."\n";
    echo "+----------------------------+\n";
    echo "+ Que tipo de pasajero es?:  +\n";
    echo "+----------------------------+\n";
    echo "+ 1- Estandar                +\n";
    echo "+ 2- VIP                     +\n";
    echo "+ 3- Especial                +\n";
    echo "+ 4- Cancelar                +\n";
    echo "+----------------------------+\n";
    $tipo=trim(fgets(STDIN));
    if($tipo==1){
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
        echo "Si aparece este mensaje es para ver donde se traba\n";
    }elseif($tipo==2){
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
            echo "Si aparece este mensaje es para ver donde se traba\n";
    }elseif($tipo==3){
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
            echo "Si aparece este mensaje es para ver donde se traba\n";
    }
    echo "Si aparece este mensaje es para ver donde se traba\n";
    $hayPasaje=$viaje->hayPasajesDisponible();
    echo "Si aparece este mensaje es para ver donde se traba\n";
    if($hayPasaje){
        echo "Si aparece este mensaje es para ver donde se traba\n";
        $estaEnLaLista=$viaje->verificaPasajero($un_pasajero);
        echo "Si aparece este mensaje es para ver donde se traba\n";
        if(!$estaEnLaLista){
            echo "Si aparece este mensaje es para ver donde se traba\n";
            $viaje->agregarPasajero($un_pasajero);
            echo "se agrego el pasajero\n"; 
        }else{
            echo "NO se agrego el pasajero, el pasajero se encuentra en la lista\n";
        }
    }else{
        echo "NO Hay pasajes disponibles\n";
    }
    $contador++;

}while($tipo!=4);

?>