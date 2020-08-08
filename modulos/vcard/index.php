<?php
$nombre_fichero='../../admin/conexion.php';
if(file_exists($nombre_fichero)){
   include '../../admin/conexion.php';
   $api_url=$page_url;
}else{
   include 'admin/conexion.php';
   $api_url=($_SERVER['HTTP_HOST']=='localhost')?$page_url:'http://billnex.webcindario.com/';
}

include 'admin/functions.php';

$pro=(isset($_GET['profile']))?$_GET['profile']:'';
profile_vcard($api_url,'vcard',$pro,$profile);
//$empresa=$profile['empresa'];
$empresa='Billnex';
//$empresa='Capital';
switch(true){
   case($empresa=='Billnex' && $profile!=''):
      include 'pages/billnex.html';
   break;
   case($empresa=='Capital' && $profile!=''):
      include 'pages/capital.html';
   break;
   case($empresa=='Multiportal' && $profile!=''):
      include 'pages/multiportal.html';
   break;
   default:
      include 'pages/404_'.$empresa.'.html';
   break;
}
?>

