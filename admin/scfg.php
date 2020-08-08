<?php 
$h_s='vcardsapp.herokuapp.com';
if($_SERVER['HTTP_HOST']==$h_s || $_SERVER['HTTP_HOST']=='www.'.$h_s){
$db_host = "us-cdbr-east-02.cleardb.com";// Localhost
$db_base = "heroku_ea9087febfa9f0e";      // Nombre de la Base de Datos
$db_user = "b34eed1f660661";      // Usuario de la Base de Datos
$db_pass = "1ef05877";     	// Password de la Base de Datos 
}else{
$db_host = "localhost";     // Localhost
$db_base = "vcardsapp";    // Nombre de la Base de Datos
$db_user = "root";        	// Usuario de la Base de Datos
$db_pass = "";     	// Password de la Base de Datos
}
$config = [
    "driver" => "mysql",
    "host" => $db_host,
    "database" => $db_base,
    "username" => $db_user,
    "password" => $db_pass,
    "port" => "3306",
    "charset" => "utf8mb4"
];
$DBprefix = "vcard_";		// Prefijo para las tablas de la Base de datos.
/*DEFINICION DE VARIABLES PARA PHP7*/
define('DB_HOST',$db_host);
define('DB_USER',$db_user);
define('DB_PASSWORD',$db_pass);
define('DB_DB',$db_base);
?>