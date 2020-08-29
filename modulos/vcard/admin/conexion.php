<?php
//Funcion para quitar los Notice (Avisos) de PHP7
error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT & ~E_WARNING & ~E_NOTICE);
// Desactivar toda notificación de error
//error_reporting(0);

$year		= date('Y');
$month		= date('m');
$day		= date('d');
$fecha		= date('Y-m-d');
$date		= date("Y-m-d H:i:s");
$time		= date('Gis');
$host		= $_SERVER['HTTP_HOST'];			//Nombre del dominio (dominio.com).
$ip_address = $_SERVER['REMOTE_ADDR'];			//Se obtiene la direccion ip del visitante de la pagina web.
$ip			= ($ip_address!='' && $ip_address!=NULL && $ip_address!='::1')?$ip_address:gethostbyname($host);
$IPv4 		= ip2long($ip);						//Direccion IPv4 
$pag_self 	= $_SERVER['PHP_SELF'];			//Se obtiene el nombre de la pagina.
$pag_url 	= $_SERVER['REQUEST_URI'];		//Se obtiene el nombre de la pagina incluyendo variables.
$pag_name 	= basename($_SERVER['PHP_SELF']);
$refer 		= (isset($_SERVER['HTTP_REFERER']))?$_SERVER['HTTP_REFERER']:'';
$mod 		= (isset($_GET['mod']))?$_GET['mod']:'Home';
$ext 		= (isset($_GET['ext']))?$_GET['ext']:'';
switch(true){case($ext=='admin/index'):$ext2='admin';break;case($ext=='miembros/index'):$ext2='miembros';break;default:$ext2=$ext;break;}
$opc		= (isset($_GET['opc']))?$_GET['opc']:'';
$action 	= (isset($_GET['action']))?$_GET['action']:'';
$ctrl 		= (isset($_GET['ctrl']))?$_GET['ctrl']:'';
$frm 		= (isset($_GET['frm']))?$_GET['frm']:'';
$form		= (isset($_GET['form']))?$_GET['form']:'';
//$id 		= (iseet($_GET['id']))?$_GET['id']:'';
$idp 		= (isset($_GET['id']))?$_GET['id']:'';
$idf 		= (isset($_GET['idf']))?$_GET['idf']:'';
$vhref 		= (isset($_GET['vhref']))?$_GET['vhref']:''; //Variable de seguimiento.

$server=$_SERVER['HTTP_HOST'];
$s=($server=='thebillnex.com')?'s':'';
$dominio='http'.$s.'://'.$server.'/';
if($server=='localhost'){
	$path_root='MisSitios/billnex-vcard/';
}else{
	$path_root=($server=='thebillnex.com')?'billnex-vcard/':'';
}
$page_url=$dominio.$path_root;
$url=$dominio.$pag_self;			//Se obtiene la url de la pagina.
$URL=$dominio.$pag_url;
