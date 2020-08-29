<?php
include '../../admin/conexion.php';
include 'admin/functions.php';
$api_url=$page_url;
$pro=(isset($_GET['profile']))?$_GET['profile']:$_REQUEST['profile'];
$pro=$idp;
echo '<br>'.$pro;
profile_vcard($api_url,'vcard',$pro,$profile);
//$empresa=$profile['empresa'];
//$empresa='Billnex';
$empresa='Capital';
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

