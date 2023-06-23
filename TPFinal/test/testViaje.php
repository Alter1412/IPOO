<?php
include_once '../datos/BaseDatos.php';
include_once '../datos/Viaje.php';
include_once '../datos/Empresa.php';
include_once '../datos/Pasajero.php';
include_once '../datos/ResponsableV.php';


//function menu(){}

function menuViaje(){
    echo "*****************************************\n";
    echo "*1- Agregar Empresa                     *\n";
    echo "*2- Agregar Responsables                *\n";
    echo "*3- Agregar Pasajeros                   *\n";
    echo "*4- Agregar Viaje                       *\n";
    echo "*****************************************\n";
    echo "*5- Modificar el Destino                *\n";
    echo "*6- Modificar la Cant Max de Pasajeros  *\n";
    echo "*7- Modificar el Importe del Viaje      *\n";
    echo "*8- Modificar a los Pasajeros           *\n";
    echo "*9- Modificar la Empresa                *\n";
    echo "*10- Modificar al Responsable del Viaje *\n";
    echo "*****************************************\n";
    echo "*11- Eliminar Viaje                     *\n";
    echo "*****************************************\n";
    echo "*12- Listar Pasajeros                   *\n";
    echo "*13- Ver Responsable                    *\n";
    echo "*14- Ver Empresa                        *\n";
    echo "*15- Ver Viaje                          *\n";
    echo "*0- Salir                               *\n";
    echo "*****************************************\n";
}
function menuAgregar(){
    echo "*****************************************\n";
    echo "*1- Agregar Empresa                     *\n";
    echo "*2- Agregar Responsables                *\n";
    echo "*3- Agregar Pasajeros                   *\n";
    echo "*4- Agregar Viaje                       *\n";
    echo "*5- Atras                               *\n";
    echo "*****************************************\n";
}

function menuModificar(){
    echo "*****************************************\n";
    echo "*1- Modifiacar Empresa                  *\n";
    echo "*2- Modificar Responsables              *\n";
    echo "*3- Modificar Viaje                     *\n";
    echo "*4- Atras                               *\n";
    echo "*****************************************\n";
}
function menuEliminar(){
    echo "*****************************************\n";
    echo "*1- Eliminar Empresa                    *\n";
    echo "*2- Eliminar Responsables               *\n";
    echo "*3- Eliminar Viaje                      *\n";
    echo "*4- Atras                               *\n";
    echo "*****************************************\n";
}
 function menu(){
    echo "*****************************************\n";
    echo "*1- Agregar                             *\n";
    echo "*2- Modificar                           *\n";
    echo "*3- Eliminar                            *\n";
    echo "*4- Listar                              *\n";
    echo "*5- Salir                               *\n";
    echo "*****************************************\n";
 }

function menuPasajero(){
    echo "*****************************************\n";
    //echo "*1- Agregar Pasajero                    *\n";
    echo "*1- Modificar a un Pasajero             *\n";
    echo "*2- Eliminar a un Pasajero              *\n";
    echo "*3- Atras                               *\n";
    echo "*****************************************\n";
}

function agregarPasajero($objViaje){
    echo "Ingrese el Documento del pasajero: \n";
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
    echo "*****************************************\n";
    echo "*1- Modificar el Numero de Documento    *\n";
    echo "*2- Modificar el Nombre                 *\n";
    echo "*3- Modificar el Apellido               *\n";
    echo "*4- Modificar el Numero de Telefono     *\n";
    echo "*5- Atras                               *\n";
    echo "*****************************************\n";
}



function menuEmpresa(){
    echo "*****************************************\n";
    //echo "*1- Modificar Id de la Empresa          *\n";
    echo "*1- Modificar el Nombre de la Emprea    *\n";
    echo "*2- Modificar la Direccion de la Empresa*\n";
    echo "*3- atras                               *\n";
    echo "*****************************************\n";
}

function menuResponsable(){
    echo "*****************************************\n";
   // echo "*1- Modificar el Numero de Empleado     *\n";
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

    
    $objEmpresa= new Empresa();
    $objEmpresa->cargar(0,"ViaBariloche","San Martin 1400");
    $resEmp=$objEmpresa->insertar();
    if($resEmp){
        echo "Empresa Ingresada a la Base de Datos\n";
    }else{
        echo $objEmpresa->getmensajeoperacion();
    }
    $objResponsable= new ResponsableV();
    $objResponsable->cargar(0,12345,"Alex","Bornis");
    $resRes=$objResponsable->insertar();
    if($resRes){
        echo "Responsable Ingresado a la Base de Datos\n";
    }else{
        echo $objResponsable->getmensajeoperacion()."\n";
    }
    $objViaje= new Viaje();
    $objViaje->cargar(0,"Paris",3,[],$objEmpresa,$objResponsable,10000);
    $resViaje=$objViaje->insertar();
     if($resViaje){
        echo "Viaje Ingresado a la Base de Datos\n";
    }else{
        echo $objViaje->getmensajeoperacion()."\n";
    }

    

    do{
        menuViaje();
        $opcion=trim(fgets(STDIN));
        switch ($opcion){
            case 1:
                $nuevoPasajero=agregarPasajero($objViaje);
                //echo $nuevoPasajero;
                $colPasajeros=$nuevoPasajero->listar("idviaje=".$objViaje->getIdViaje());
                if(count($colPasajeros)<$objViaje->getCantMaxPasajeros()){
                    //array_push($colPasajeros,$nuevoPasajero);
                    $resPas=$nuevoPasajero->insertar();
                    if($resPas){
                        $colPasajeros=$nuevoPasajero->listar("idviaje=".$objViaje->getIdViaje());
                        $objViaje->setColPasajeros($colPasajeros);
                        echo "Pasajero ingresado a la BD correctamnte\n";
                    }else{
                        echo $nuevoPasajero->getmensajeoperacion()."\n";
                     }
                }else{
                    echo "Cantidad Maxima de Pasajeros Alcanzada\n";
                }
                break;
            case 2:
                echo "Ingrese el nuevo destino\n";
                $nDestino=trim(fgets(STDIN));
                $objViaje->setDestino($nDestino);
                $respuesta=$objViaje->modificar();
                if($respuesta){
                    echo "Destino modificado exitosamente\n";
                }else{
                    echo $objViaje->getmensajeoperacion()."\n";
                }
                break;
            case 3:
                echo "Ingrese la nueva cantidad de pasajeros maxima: \n";
                $nCantPas=trim(fgets(STDIN));
                $objViaje->setCantMaxPasajeros($nCantPas);
                $respuesta=$objViaje->modificar();
                if($respuesta){
                    echo "Cantidad de Pasajeros Modificada Exitosamente\n";
                }else{
                    echo $objViaje->getmensajeoperacion()."\n";
                }
                break;
            case 4:
                do{
                    menuPasajero();
                    $op=trim(fgets(STDIN));
                    switch($op){
                        case 1:
                        echo "Ingrese el DNI del Pasajero a modificar:\n";
                        $dni=trim(fgets(STDIN));
                        $unPasajero= new Pasajero();
                        $existe=$unPasajero->Buscar($dni);
                        if($existe){
                            do{
                                menuModificarPasajeros();
                                $opc=trim(fgets(STDIN));
                                switch($opc){
                                    case 1: 
                                        echo "Ingrese el nuevo DNI:";
                                        $doc=trim(fgets(STDIN));
                                        $unPasajero->setDocumento($doc);
                                        $respuesta=$unPasajero->modificar();
                                        if($respuesta){
                                            echo "Cambio Exitoso\n";
                                        }else{
                                            $unPasajero->getmensajeoperacion();
                                        }
                                        break;
                                    case 2:
                                        echo "Ingrese el nuevo Nombre:\n";
                                        $nombre=trim(fgets(STDIN));
                                        $unPasajero->setNombre($nombre);
                                        $respuesta=$unPasajero->modificar();
                                        if($respuesta){
                                            echo "Cambio Exitoso\n";
                                        }else{
                                            $unPasajero->getmensajeoperacion();
                                        }
                                        break;
                                    case 3: 
                                        echo "Ingrese el nuevo Apellido:\n";
                                        $apellido=trim(fgets(STDIN));
                                        $unPasajero->setApellido($apellido);
                                        $respuesta=$unPasajero->modificar();
                                        if($respuesta){
                                            echo "Cambio Exitoso\n";
                                        }else{
                                            $unPasajero->getmensajeoperacion();
                                        }
                                        break;
                                    case 4:
                                        echo "Ingrese el nuevo Telefono:\n";
                                        $telefono=trim(fgets(STDIN));
                                        $unPasajero->setTelefono($telefono);
                                        $respuesta=$unPasajero->modificar();
                                        if($respuesta){
                                            echo "Cambio Exitoso\n";
                                        }else{
                                            $unPasajero->getmensajeoperacion();
                                        }
                                        break;
                                    }
                                }while($opc!=5);
                        }else{
                            echo "El pasajero no existe\n";
                        }
                                break;
                            case 2:
                                echo "Ingrese el DNI del Pasajero a eliminar:\n";
                                $dni=trim(fgets(STDIN));
                                $elPasajero= new Pasajero();
                                $exist=$elPasajero->Buscar($dni);
                                if($exist){
                                    $res=$elPasajero->eliminar();
                                    if($res){
                                        $actualizarPAsajeros= new Pasajero();
                                        $colPasajerosAct=$actualizarPAsajeros->listar("idviaje=".$objViaje->getIdViaje());
                                        $objViaje->setColPasajeros($colPasajerosAct);
                                        echo "Pasajero Eliminado\n";
                                    }else{
                                        $unPasajero->getmensajeoperacion();
                                    }
                                }
                                break;
                        }
                    

                }while($op!=3);
                break;
            case 5:
                do{
                    //echo "Ingrese el id de la empresa\n";
                    menuEmpresa();
                    $opc=trim(fgets(STDIN));
                    switch($opc){
                        case 1:
                            echo "Ingrese el Nuevo Nombre:\n";
                            $nomEmpresa=trim(fgets(STDIN));
                            $objEmpresa->setNombreEmpresa($nomEmpresa);
                            $res=$objEmpresa->modificar();
                            if($res){
                                echo "Modificacion Exitosa\n";
                            }else{
                                echo $objEmpresa->getmensajeoperacion();
                            }
                            break;
                        case 2:
                            echo "Ingrese la Nueva Direccion:\n";
                            $dirEmpresa=trim(fgets(STDIN));
                            $objEmpresa->setDireccion($dirEmpresa);
                            $res=$objEmpresa->modificar();
                            if($res){
                                echo "Modificacion Exitosa\n";
                            }else{
                                echo $objEmpresa->getmensajeoperacion();
                            }
                            break;

                    }
                }while($opc!=3);
                break;
            case 6:
                do{
                    menuResponsable();
                    $opc=trim(fgets(STDIN));
                    switch($opc){
                        case 1: 
                            echo "Ingrese el nuevo N° de Licencia:\n";
                            $lic=trim(fgets(STDIN));
                            $objResponsable->setNumLicencia($lic);
                            $res=$objResponsable->modificar();
                            if($res){
                                echo "Modificacion Exitosa\n";
                            }else{
                                echo $objResponsable->getmensajeoperacion()."\n";
                            }
                            break;
                        case 2:
                            echo "Ingrese el nuevo Nombre:\n";
                            $nomRes=trim(fgets(STDIN));
                            $objResponsable->setNombre($nomRes);
                            $res=$objResponsable->modificar();
                            if($res){
                                echo "Modificacion Exitosa\n";
                            }else{
                                echo $objResponsable->getmensajeoperacion()."\n";
                            }
                            break;
                        case 3: 
                            echo "Ingrese el nuevo Apellido:\n";
                            $apRes=trim(fgets(STDIN));
                            $objResponsable->setApellido($apRes);
                            $res=$objResponsable->modificar();
                            if($res){
                                echo "Modificacion Exitosa\n";
                            }else{
                                echo $objResponsable->getmensajeoperacion()."\n";
                            }
                            break;
                    }
                }while($opc !=4);
                break;
            case 7:
                echo "Ingrese el Nuevo Importe:\n";
                $importe=trim(fgets(STDIN));
                $objViaje->setImporte($importe);
                $res=$objViaje->modificar();
                if($res){
                    echo "Modificacion Exitosa\n";
                }else{
                    echo $objViaje->getmensajeoperacion();
                }
                break;
            case 8:
                $pasajeros= new Pasajero();
                
                $colPas=$objViaje->getColPasajeros();
                
                if($colPas!=null){
                    $colPas=$pasajeros->listar("idviaje=".$objViaje->getIdViaje());
                    foreach ($colPas as $unPasajero){
		
                        echo $unPasajero;
                        echo "\n-------------------------------------------------------\n";
                    }
                }else{
                    echo "Ingrese Pasajeros al Viaje\n";
                }
                
                break;
            case 9:
                $resp= new ResponsableV();
                $responsable= $resp->listar("rnumeroempleado=".$objViaje->getResponsable()->getNumEmpleado());
                
                foreach ($responsable as $elResponsable){
		
                    echo $elResponsable;
                    echo "\n-------------------------------------------------------\n";
                }

                break;
            case 10:
                $empresa= new Empresa();
                $emp=$empresa->listar("idempresa=".$objViaje->getEmpresa()->getIdEmpresa());
                foreach ($emp as $laEmpresa){
		
                    echo $laEmpresa;
                    echo "\n-------------------------------------------------------\n";
                }
                break;
            case 11:
                $viaje= new Viaje();
                $v=$viaje->listar("idviaje=".$objViaje->getIdViaje());
                foreach ($v as $elViaje){
		
                    echo $elViaje;
                    echo "\n-------------------------------------------------------\n";
                }

                
        }
    }while($opcion!=0);


?>