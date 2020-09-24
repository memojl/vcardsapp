<?php
if(isset($_SESSION["username"])){
	if($_SESSION["level"]>=-1 && $_SESSION["level"]<=6){
		if($_SESSION["level"]==-1){
			$user_type='Administrador';
        	$user_access='admin/index';
        	$adminLTE='<a target="_blank" href="'.$page_url.'index.php?mod=dashboard">AdminLTE</a>';
		}else{
			$user_type='Miembro';
			$user_access='miembros/index';
		}
        
		include_once ('panel/pages/'.$ext.'.html');
		
	}else{echo '<div id="cont-user">No tiene permiso para ver esta secci&oacute;n.</div>';}
}else{header("Location: ".$page_url."index.php");}
?>