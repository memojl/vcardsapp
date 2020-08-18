<?php 
include '../../../admin/conexion.php';
include 'functions.php';

switch(true){
  case($opc=='opcion'):
  
  break;	
  case($opc=='items'):
    servicios($ext);
  break;	
  default:
    $tabla='vcard';
    switch(true){
      case($action=='buscar'):
      break;
      case($action=='delete'):
      break;
      case($action=='edit' || $action=='add'):
      break;
      default:
        $modo = (isset($_REQUEST['mode'])&& $_REQUEST['mode'] !=NULL)?$_REQUEST['mode']:'';
        if($modo == 'ajax'){$cond_opc=($opc!='')?'&opc='.$opc:'';
          
        }else{

        }
      break;
    }    
  break;
}