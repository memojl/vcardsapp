<?php 
include 'functions.php';

switch(true){
    case($opc=='opcion'):
  
    break;	
    case($opc=='items'):
      servicios($ext);
    break;	
    default:
        $tabla='vcard';
    
    
    break;
}