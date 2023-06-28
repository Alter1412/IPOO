<?php

include_once '../datos/BaseDatos.php';
include_once '../datos/Viaje.php';
include_once '../datos/Empresa.php';
include_once '../datos/Pasajero.php';
include_once '../datos/ResponsableV.php';

function menuAgregar(){
    echo "\n*****************************************\n";
    echo "*1- Agregar Empresa                     *\n";
    echo "*2- Agregar Responsables                *\n";
    echo "*3- Agregar Viaje                       *\n";
    echo "*4- Agregar Pasajeros                   *\n";
    echo "*5- Atras                               *\n";
    echo "*****************************************\n";
}

function agregarEmpresa(){
    echo "Ingrese el Nombre de La Empresa: \n";
    $nombre=trim(fgets(STDIN));
    echo "Ingrese la Direccion de la Empresa:\n";
    $direccion=trim(fgets(STDIN));
    $empresa= new Empresa();
    $empresa->cargar(0,$nombre,$direccion);
    return $empresa;
}

function agregarResponsable(){
    echo "Ingrese el N° de Licencia: \n";
    $licencia=trim(fgets(STDIN));
    echo "Ingrese el Nombre del Responsable:\n";
    $nombre=trim(fgets(STDIN));
    echo "Ingrese el Apellido del Responsable:\n";
    $apellido=trim(fgets(STDIN));
    $responsable= new ResponsableV();
    $responsable->cargar(0,$licencia,$nombre,$apellido);
    return $responsable;
}

function agregarViaje(){
    echo "\nIngrese el Destino:\n";
    $destino=trim(fgets(STDIN));
    echo "Ingrese la Cantidad Maxima de Pasajeros:\n";
    $cantPas=trim(fgets(STDIN));
    echo "Ingrese el Importe del Viaje: \n";
    $importe=trim(fgets(STDIN));
    $empresa=new Empresa();
    $colEmpresas=$empresa->listar();
    foreach ($colEmpresas as $unaEmpresa){
        echo $unaEmpresa;
        echo "\n-----------\n";
    }
    echo "Ingrese El Id de la Empresa:\n";
    $IdEmpresa=trim(fgets(STDIN));
    $empresa->Buscar($IdEmpresa);
    
    $resp= new ResponsableV();
    $colResp=$resp->listar();
    foreach ($colResp as $unResp){
        echo $unResp;
        echo "\n-----------\n";
    }
    echo "Ingrese el N° de Empleado del Responsable\n";
    $numRes=trim(fgets(STDIN));
    $resp->Buscar($numRes);
    
    $viaje= new Viaje();
    $viaje->cargar(0,$destino,$cantPas,[],$empresa,$resp,$importe);
    
    return $viaje;
}

function menuModificar(){
    echo "\n*****************************************\n";
    echo "*1- Modifiacar Empresa                  *\n";
    echo "*2- Modificar Responsables              *\n";
    echo "*3- Modificar Viaje                     *\n";
    echo "*4- Atras                               *\n";
    echo "*****************************************\n";
}
function menuEliminar(){
    echo "\n*****************************************\n";
    echo "*1- Eliminar Viaje                      *\n";
    echo "*2- Eliminar Empresa                    *\n";
    echo "*3- Eliminar Responsables               *\n";
    echo "*4- Atras                               *\n";
    echo "*****************************************\n";
}
 function menu(){
    echo "\n*****************************************\n";
    echo "*1- Agregar                             *\n";
    echo "*2- Modificar                           *\n";
    echo "*3- Eliminar                            *\n";
    echo "*4- Listar                              *\n";
    echo "*5- Salir                               *\n";
    echo "*****************************************\n";
 }

 function menuListar(){
    echo "\n*****************************************\n";
    echo "*1- Listar Pasajeros                    *\n";
    echo "*2- Listar Viaje                        *\n";
    echo "*3- Listar Empresa                      *\n";
    echo "*4- Listar Responsables                 *\n";
    echo "*5- Atras                               *\n";
    echo "*****************************************\n";
 }
function menuViaje(){
    echo "\n*****************************************\n";
    echo "*1- Modificar el Destino                *\n";
    echo "*2- Modificar la Cant Max de Pasajeros  *\n";
    echo "*3- Modificar el Importe del Viaje      *\n";
    echo "*4- Modificar a los Pasajeros           *\n";
    echo "*5- Cambiar la Empresa                  *\n";
    echo "*6- Cambiar el Responsable              *\n";
    echo "*7- Atras                               *\n";
    echo "*****************************************\n";
}
function menuPasajero(){
    echo "\n*****************************************\n";
    echo "*1- Modificar a un Pasajero             *\n";
    echo "*2- Eliminar a un Pasajero              *\n";
    echo "*3- Atras                               *\n";
    echo "*****************************************\n";
}

function agregarPasajero($objViaje){
    echo "\nIngrese el Documento del pasajero: \n";
    $documento=trim(fgets(STDIN));
    echo "Ingrese el Nombre del pasajero:\n";
    $nombre=trim(fgets(STDIN));
    echo "Ingrese el Apellido del pasajero:\n";
    $apellido=trim(fgets(STDIN));
    echo "Ingrese el Telefono del Pasajero:\n";
    $telefono=trim(fgets(STDIN));
    $id=$objViaje->getIdViaje();
    $objPasajero= new Pasajero();
    $objPasajero->cargar($documento,$nombre,$apellido,$telefono,$id);
    return $objPasajero;
}


//function modificarPasajeros(){ }

function menuModificarPasajeros(){
    echo "\n*****************************************\n";
    echo "*1- Modificar el Numero de Documento    *\n";
    echo "*2- Modificar el Nombre                 *\n";
    echo "*3- Modificar el Apellido               *\n";
    echo "*4- Modificar el Numero de Telefono     *\n";
    echo "*5- Atras                               *\n";
    echo "*****************************************\n";
}



function menuEmpresa(){
    echo "\n*****************************************\n";
    echo "*1- Modificar el Nombre de la Emprea    *\n";
    echo "*2- Modificar la Direccion de la Empresa*\n";
    echo "*3- atras                               *\n";
    echo "*****************************************\n";
}

function menuResponsable(){
    echo "\n*****************************************\n";
    echo "*1- Modificar el Numero de Licencia     *\n";
    echo "*2- Modificar el Nombre                 *\n";
    echo "*3- Modificar el Apellido               *\n";
    echo "*4- Atras                               *\n";
    echo "*****************************************\n";
}


    echo "*****************************************\n";
    echo "*           TP OBLIGATORIO              *\n";
    echo "*****************************************\n";
    echo "*****************************************\n";


    do{
        menu();
        $opcion=trim(fgets(STDIN));
        switch($opcion){
            case 1:
              
                do{
                    menuAgregar();
                    $seleccion=trim(fgets(STDIN));
                    switch($seleccion){
                        case 1: 
                            $objEmpresa=agregarEmpresa();
                            $res=$objEmpresa->insertar();
                            if($res){
                                echo "\nEmpresa agrgada a la Base de Datos\n";
                            }else{
                                echo $objEmpresa->getmensajeoperacion();
                            }
                            break;
                        case 2:
                            $objResponsable=agregarResponsable();
                            $res=$objResponsable->insertar();
                            if($res){
                                echo "\nResponsable agrgado a la Base de Datos\n";
                            }else{
                                echo $objEmpresa->getmensajeoperacion();
                            }
                            break;
                        case 3:
                            $r= new ResponsableV();
                            $lr=$r->listar();
                            $e= new Empresa();
                            $le=$e->listar();
                            if((count($lr)!=0) && (count($le)!=0)){
                                $objViaje=agregarViaje();
                                $res=$objViaje->insertar();
                                if($res){
                                    echo "\nViaje agrgado a la Base de Datos\n";
                                }else{
                                    echo $objViaje->getmensajeoperacion();
                                }
                            }else{
                                echo "\nPor favor ingrese los siguientes datos:\n";
                                if((count($lr)==0) && (count($le)==0)){
                                    echo "Responsable Y Empresa\n";
                                }elseif((count($le)==0) && (count($lr)!=0)){
                                    echo "Empresa\n";
                                }elseif((count($le)!=0) && (count($lr)==0)){
                                    echo "Responsable\n";
                                }
                            }
                            break;
                        case 4:
                            $losviajes= new Viaje();
                            $colViajes= $losviajes->listar();
                            if(count($colViajes)!=0){
                                foreach($colViajes as $viaje){
                                    echo $viaje;
                                    echo "\n------------\n";
                                }
                                echo "Ingrese el Viaje al que desea Agregar Pasajeros:\n";
                                $v=trim(fgets(STDIN));
                                $existeViaje=$losviajes->Buscar($v);
                                if($existeViaje){
                                    $nuevoPasajero=agregarPasajero($losviajes);
                                    //echo $nuevoPasajero;
                                    $colPasajeros=$nuevoPasajero->listar("idviaje=".$losviajes->getIdViaje());
                                    if(count($colPasajeros)<$losviajes->getCantMaxPasajeros()){
                                        //array_push($colPasajeros,$nuevoPasajero);
                                        $resPas=$nuevoPasajero->insertar();
                                        if($resPas){
                                            //$colPasajeros=$nuevoPasajero->listar("idviaje=".$objViaje->getIdViaje());
                                            //$objViaje->setColPasajeros($colPasajeros);
                                            echo "\nPasajero ingresado a la BD correctamnte\n";
                                        }else{
                                            echo $nuevoPasajero->getmensajeoperacion()."\n";
                                        }
                                    }else{
                                        echo "Cantidad Maxima de Pasajeros Alcanzada\n";
                                    }
                                }else{
                                    echo "Viaje Inexistente\n";
                                }
                            }else{
                                echo "\nIngrese un Viaje\n";
                            }
                            break;
                    }
                }while($seleccion!=5);
                break;
            case 2:
                do{
                    menuModificar();
                    $selec=trim(fgets(STDIN));
                    switch($selec){
                        case 1:
                            $emp= new Empresa();
                            $listEmp=$emp->listar();
                            if(count($listEmp)!=0){
                                do{
                                   
                                   
                                    foreach($listEmp as $laEmpresa){
                                        echo $laEmpresa;
                                        echo "\n-----------------\n";
                                    }
                                    echo "Ingrese el id de la empresa a Modificar (s Para salir)\n";
                                    $buscar=trim(fgets(STDIN));
                                    $resp=$emp->Buscar($buscar);
                                    if($resp){
                                        menuEmpresa();
                                        $sel=trim(fgets(STDIN));
                                        switch($sel){
                                            case 1:
                                                echo "\nIngrese el Nuevo Nombre:\n";
                                                $nomEmpresa=trim(fgets(STDIN));
                                                $emp->setNombreEmpresa($nomEmpresa);
                                                $res=$emp->modificar();
                                                if($res){
                                                    echo "\nModificacion Exitosa\n";
                                                }else{
                                                    echo $emp->getmensajeoperacion();
                                                }
                                                break;
                                            case 2:
                                                echo "\nIngrese la Nueva Direccion:\n";
                                                $dirEmpresa=trim(fgets(STDIN));
                                                $emp->setDireccion($dirEmpresa);
                                                $res=$emp->modificar();
                                                if($res){
                                                    echo "\nModificacion Exitosa\n";
                                                }else{
                                                    echo $emp->getmensajeoperacion();
                                                }
                                                break;
            
                                
                                        }
                                    }else{
                                        echo "\nNo existe la Empresa ingresada\n";
                                    }
                                }while($sel!=3 && $buscar!="s");
                            }else{
                                echo "\nNo hay Empresas Para modificar\n";
                            }
                            break;
                        case 2:
                            $respon= new ResponsableV();
                            $listResp=$respon->listar();
                            if(count($listResp)!=0){
                                do{ 
                                   
                                    
                                    foreach($listResp as $unResponsable){
                                        echo $unResponsable;
                                        echo "\n------------------\n";
                                    }
                                    echo "Ingrese el N° de Empleado del Responsable a Modificar:(s para salir)\n";
                                    $buscar=trim(fgets(STDIN));
                                    $resp=$respon->Buscar($buscar);
                                    if($resp){
                                        menuResponsable();
                                        $opc=trim(fgets(STDIN));
                                        switch($opc){
                                            case 1: 
                                                echo "\nIngrese el nuevo N° de Licencia:\n";
                                                $lic=trim(fgets(STDIN));
                                                $respon->setNumLicencia($lic);
                                                $res=$respon->modificar();
                                                if($res){
                                                    echo "\nModificacion Exitosa\n";
                                                }else{
                                                    echo $respon->getmensajeoperacion()."\n";
                                                }
                                                break;
                                            case 2:
                                                echo "\nIngrese el nuevo Nombre:\n";
                                                $nomRes=trim(fgets(STDIN));
                                                $respon->setNombre($nomRes);
                                                $res=$respon->modificar();
                                                if($res){
                                                    echo "\nModificacion Exitosa\n";
                                                }else{
                                                    echo $respon->getmensajeoperacion()."\n";
                                                }
                                                break;
                                            case 3: 
                                                echo "\nIngrese el nuevo Apellido:\n";
                                                $apRes=trim(fgets(STDIN));
                                                $respon->setApellido($apRes);
                                                $res=$respon->modificar();
                                                if($res){
                                                    echo "\nModificacion Exitosa\n";
                                                }else{
                                                    echo $respon->getmensajeoperacion()."\n";
                                                }
                                                break;
                                        }
                                    }else{
                                        echo "\nNo existe el responsable ingresado\n";
                                    }
                                }while($opc !=4 && $buscar!="s");
                            }else{
                                echo "\nNo hay Responsables Para Modificar\n";
                            }
                            break;
                        case 3:
                            $v= new Viaje();
                            $listv=$v->listar();
                            if(count($listv)!=0){
                                do{
                                    foreach($listv as $unv){
                                        echo $unv;
                                        echo "\n------------------\n";
                                    }
                                    echo "\nIngrese el Viaje que desea modificar (s para salir):\n";
                                    $buscar=trim(fgets(STDIN));
                                    $res=$v->Buscar($buscar);
                                    if($res){
                                        menuViaje();
                                        $s=trim(fgets(STDIN));
                                        switch($s){
                                            case 1:
                                                echo "\nIngrese el nuevo destino\n";
                                                $nDestino=trim(fgets(STDIN));
                                                $v->setDestino($nDestino);
                                                $respuesta=$v->modificar();
                                                if($respuesta){
                                                    echo "\nDestino modificado exitosamente\n";
                                                }else{
                                                    echo $v->getmensajeoperacion()."\n";
                                                }
                                                break;
                                            case 2:
                                                echo "\nIngrese la nueva cantidad de pasajeros maxima: \n";
                                                $nCantPas=trim(fgets(STDIN));
                                                $v->setCantMaxPasajeros($nCantPas);
                                                $respuesta=$v->modificar();
                                                if($respuesta){
                                                    echo "\nCantidad de Pasajeros Modificada Exitosamente\n";
                                                }else{
                                                echo $v->getmensajeoperacion()."\n";
                                            }
                                            break;
                                            case 3:
                                                echo "\nIngrese el Nuevo Importe:\n";
                                                $importe=trim(fgets(STDIN));
                                                $v->setImporte($importe);
                                                $res=$v->modificar();
                                                if($res){
                                                    echo "\nModificacion Exitosa\n";
                                                }else{
                                                    echo $v->getmensajeoperacion();
                                                }
                                                break;
                                            case 4:
                                                do{
                                                    menuPasajero();
                                                    $op=trim(fgets(STDIN));
                                                    switch($op){
                                                        case 1:
                                                            $unPasajero= new Pasajero();
                                                            $listaPas=$unPasajero->listar();
                                                            foreach($listaPas as $unPas){
                                                                echo $unPas;
                                                                echo "\n----------\n";
                                                                }
                                                            echo "\nIngrese el DNI del Pasajero a modificar:\n";
                                                            $dni=trim(fgets(STDIN));
                                                            $existe=$unPasajero->Buscar($dni);
                                                            if($existe){
                                                                do{
                                                                    menuModificarPasajeros();
                                                                    $opc=trim(fgets(STDIN));
                                                                    switch($opc){
                                                                        case 1: 
                                                                            echo "\nIngrese el nuevo DNI:\n";
                                                                            $doc=trim(fgets(STDIN));
                                                                            $unPasajero->setDocumento($doc);
                                                                            $respuesta=$unPasajero->modificar();
                                                                            if($respuesta){
                                                                                echo "\nCambio Exitoso\n";
                                                                            }else{
                                                                                $unPasajero->getmensajeoperacion();
                                                                            }
                                                                            break;
                                                                        case 2:
                                                                            echo "\nIngrese el nuevo Nombre:\n";
                                                                            $nombre=trim(fgets(STDIN));
                                                                            $unPasajero->setNombre($nombre);
                                                                            $respuesta=$unPasajero->modificar();
                                                                            if($respuesta){
                                                                                echo "\nCambio Exitoso\n";
                                                                            }else{
                                                                                $unPasajero->getmensajeoperacion();
                                                                            }
                                                                            break;
                                                                        case 3: 
                                                                            echo "\nIngrese el nuevo Apellido:\n";
                                                                            $apellido=trim(fgets(STDIN));
                                                                            $unPasajero->setApellido($apellido);
                                                                            $respuesta=$unPasajero->modificar();
                                                                            if($respuesta){
                                                                                echo "\nCambio Exitoso\n";
                                                                            }else{
                                                                                $unPasajero->getmensajeoperacion();
                                                                            }
                                                                            break;
                                                                        case 4:
                                                                            echo "\nIngrese el nuevo Telefono:\n";
                                                                            $telefono=trim(fgets(STDIN));
                                                                            $unPasajero->setTelefono($telefono);
                                                                            $respuesta=$unPasajero->modificar();
                                                                            if($respuesta){
                                                                                echo "\nCambio Exitoso\n";
                                                                            }else{
                                                                                $unPasajero->getmensajeoperacion();
                                                                            }
                                                                            break;
                                                                    }
                                                                }while($opc!=5);
                                                            }else{
                                                                echo "\nEl pasajero no existe\n";
                                                            }
                                                            break;
                                                        case 2:
                                                            $elPasajero= new Pasajero();
                                                            $listaPas=$elPasajero->listar();
                                                            foreach($listaPas as $unPas){
                                                                echo $unPas;
                                                                echo "\n----------\n";
                                                                }
                                                            echo "\nIngrese el DNI del Pasajero a eliminar:\n";
                                                            $dni=trim(fgets(STDIN));
                                                            $exist=$elPasajero->Buscar($dni);
                                                            if($exist){
                                                                $res=$elPasajero->eliminar();
                                                                if($res){
                                                                    //$actualizarPAsajeros= new Pasajero();
                                                                    //$colPasajerosAct=$actualizarPAsajeros->listar("idviaje=".$objViaje->getIdViaje());
                                                                    //$objViaje->setColPasajeros($colPasajerosAct);
                                                                    echo "\nPasajero Eliminado\n";
                                                                }else{
                                                                    $unPasajero->getmensajeoperacion();
                                                                }
                                                            }
                                                            break;
                                                    }
                                            
                        
                                            }while($op!=3);
                                            break;
                                        case 5:
                                            $lempresa= new Empresa();
                                            $colempresa=$lempresa->listar();
                                            foreach($colempresa as $unaEmp){
                                                echo $unaEmp;
                                                echo "\n------------\n";
                                            }
                                            echo "\nIgrese el Id de la Empresa por cual Empresa desea Cambiar\n";
                                            $entrada=trim(fgets(STDIN));
                                            $res=$lempresa->Buscar($entrada);
                                            if($res){
                                                $objViaje->setEmpresa($lempresa);
                                                $objViaje->modificar();
                                                echo "\nModificacion exitosa\n";
                                            }else{
                                                echo "\nEmpresa Inexistente\n";
                                            }
                                            break;
                                        case 6:
                                            $lresp=new ResponsableV();
                                            $colres=$lresp->listar();
                                            foreach($colres as $unres){
                                                echo $unres;
                                                echo "\n------------\n";
                                            }
                                            echo "\nIngrese el Id del responsable por el cual cambiar:\n";
                                            $entrada=trim(fgets(STDIN));
                                            $res=$lresp->Buscar($entrada);
                                            if($res){
                                                $objViaje->setResponsable($lresp);
                                                $objViaje->modificar();
                                                echo "\nModificacion exitosa\n";
                                            }else{
                                                echo "\nResponsable Inexistente\n";
                                            }
                                            break;
                                    }
                                }else{
                                    echo "\nViaje Inexistente\n";
                                }
                                }while($s!=7 && $buscar!="s");
                            }else{
                                echo "\nNO existen Viajes para modificar\n";
                            }
                            break;
                    }
                }while($selec!=4);
                break;
            case 3:
                do{
                    menuEliminar();
                    $op=trim(fgets(STDIN));
                    switch($op){
                        case 1:
                            $unviaje= new Viaje();
                            $listaViaje=$unviaje->listar();
                            
                            foreach ($listaViaje as $unViaje){
                                echo $unViaje;
                                echo "\n---------------------\n";
                            }
                            echo "\nIngrese el viaje a eliminar:\n";
                            $eliminar=trim(fgets(STDIN));
                            $exist=$unviaje->Buscar($eliminar);
                            if($exist){
                                $colpasajeros=$unviaje->getColPasajeros();
                                if($colpasajeros!=null){
                                    echo "\nEl Viaje contiene Pasajeros.\n
                                        Desea continuar? Se borrara el viaje y los pasajeros que contiene(s/n)\n";
                                        $a=trim(fgets(STDIN));
                                        if($a=="s"){
                                            $listPasajeros=$unviaje->getColPasajeros();
                                                for($j=0;$j<count($listPasajeros);$j++){
                                                    $unpasajero=$listPasajeros[$j];
                                                    $r=$unpasajero->eliminar();
                                                    if($r){
                                                        echo "\nPasajero Eliminado\n";
                                                    }else{
                                                         echo "\nOcurrio un error\n";
                                                    }
                                                }
                                                $respuesta=$unviaje->eliminar();
                                                if($respuesta){
                                                    echo "\nViaje eliminado\n";
                                                }else{
                                                    echo "\nOcurrio un Error\n";
                                                }
                                                
                                        }
                                }else{
                                    $respuesta=$unviaje->eliminar();
                                    if($respuesta){
                                        echo "\nViaje Eliminado\n";
                                    }else{
                                        echo "\nOcurrio un Error\n";
                                    }
                                }
                                
                            }else{
                                echo "\nEl viaje ingresado no Existe\n";
                            }
                            break;
                        case 2:
                            $unaempresa= new Empresa();
                            $listaEmpresa= $unaempresa->listar();
                            foreach($listaEmpresa as $laEmpresa){
                                echo $laEmpresa;
                                echo "\n-----------------\n";
                            }
                            echo "Ingrese el id de la empresa a Eliminar\n";
                            $borrar=trim(fgets(STDIN));
                            $esta=$unaempresa->Buscar($borrar);
                            if($esta){
                                $resp=$unaempresa->eliminar();
                                if($resp){
                                    echo "Empresa Eliminada\n";
                                }else{
                                    echo "La empresa contiene viajes.
                                    \n Si la elimina borrara los viajes y pasajeros relacionados a esta empresa.
                                    \nDesea continuar? (s/n):\n";
                                    $resEliminar=trim(fgets(STDIN));
                                    if($resEliminar =="s"){
                                        $viaje=new Viaje();
                                        $lViajes=$viaje->listar("idempresa=".$unaempresa->getIdEmpresa());
                                        for($i=0; $i< count($lViajes);$i++){
                                            $viaje->Buscar($lViajes[$i]->getIdViaje());
                                            //$resp=$viaje->eliminar();
                                            //if(!$resp){
                                                $listPasajeros=$viaje->getColPasajeros();
                                                for($j=0;$j<count($listPasajeros);$j++){
                                                    $unpasajero=$listPasajeros[$j];
                                                    $r=$unpasajero->eliminar();
                                                    if($r){
                                                        echo "\nPasajero Eliminado\n";
                                                    }else{
                                                        echo "\nOcurrio un Error\n";
                                                    }
                                                }
                                                $resp=$viaje->eliminar();
                                                if($resp){
                                                    echo "\nViaje Eliminado\n";
                                                }else{
                                                    echo "\nOcurrio un Error\n";
                                                }
                                            //}else{
                                                $resp=$unaempresa->eliminar();
                                                if($resp){
                                                    echo "\nEmpresa eliminada\n";
                                                }else{
                                                    echo "\nOcurrio un Error\n";
                                                }
                                            //}
                                        }
                                        
                                    }
                                }
                            }else{
                                echo "\nLa Empresa no Existe\n";
                            }
                            break;
                        case 3:
                            $unresponsable= new ResponsableV();
                            $listaResponsables= $unresponsable->listar();
                            foreach($listaResponsables as $unResponsable){
                                echo $unResponsable;
                                echo "\n------------------\n";
                            }
                            echo "Ingrese el N° de Empleado del Responsable a Eliminar:\n";
                            $numRes=trim(fgets(STDIN));
                            $encontrado=$unresponsable->Buscar($numRes);
                            if($encontrado){
                                $answer=$unresponsable->eliminar();
                                if($answer){
                                    echo "Responsable Eliminado\n";
                                    echo "\n---------------\n";
                                }else{
                                    echo $unresponsable->getmensajeoperacion();
                                }
                            }else{
                                echo "\nEl Responsable no Existe\n";
                            }
                            break;
                    }
                }while($op!=4);
                break;
            case 4:
                do{
                    menuListar();
                    $o=trim(fgets(STDIN));
                    switch($o){
                        case 1:
                            $losviajes= new Viaje();
                            $colViajes= $losviajes->listar();
                            if(count($colViajes)!=0){
                                foreach($colViajes as $viaje){
                                    echo $viaje;
                                    echo "\n------------\n";
                                }
                                echo "\nIngrese el Id del Viaje del cual desea ver los Pasajeros:\n";
                                $idviavje=trim(fgets(STDIN));
                                $pasajero= new Pasajero();
                                $colPas=$pasajero->listar("idviaje=".$idviavje);
                                if(count($colPas)!=0){
                                    foreach($colPas as $pas){
                                        echo $pas;
                                        echo "\n------------\n";
                                    }
                                }else{
                                    echo "\nIngrese Pasajeros\n";
                                }
                            }else{
                                echo "\nIngrese un Viaje\n";
                            }
                            break;
                        case 2:
                            $losviajes= new Viaje();
                            $colViajes= $losviajes->listar();
                            if(count($colViajes)!=0){
                                foreach($colViajes as $viaje){
                                    echo $viaje;
                                    echo "\n------------\n";
                                }
                            }else{
                                echo "\nIngrese un Viaje\n";
                            }
                            break;
                        case 3:
                            $empresa= new Empresa();
                            $listaEmpresa=$empresa->listar();
                            //echo "Cantidad de elementos en el arreglo: ".count($listaEmpresa)."\n";
                            if(count($listaEmpresa)!=0){
                                foreach($listaEmpresa as $empr){
                                    echo $empr;
                                    echo "\n-------------------\n";
                                }
                            }else{
                                echo "\nIngrese una Empresa\n";
                            }
                            break;
                        case 4:
                            $elresponsable= new ResponsableV();
                            $listaRes=$elresponsable->listar();
                            if(count($listaRes)!=0){
                                foreach($listaRes as $re){
                                    echo $re;
                                    echo "\n-------------------\n";
                                }
                            }else{
                                echo "\nIngrese un Responsable\n";
                            }
                            break;
                            
                    }
                }while($o!=5);
        }
    }while($opcion!=5);

?>