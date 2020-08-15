<?php 
//FUNCIONES ESPECIALES MOD: VCARD
$mod='vcard';
//log_visitas($username);
function crear_vcard($path_f,$nombre_archivo,$contenido,&$path_file){
//$path_f='';$nombre_archivo='';$contenido='';
$path_file=$path_f.$nombre_archivo;
$archivo=fopen($path_file, "w+");
fwrite($archivo, $contenido);
fclose($archivo);
}

function crear_ws_vcard($path,$tabla){
global $mysqli,$DBprefix;
 	$query="SELECT * FROM ".$DBprefix.$tabla." ORDER BY ID ASC;";
	crear_json($query,$path,$tabla.'.json');
}

function profile_vcard($api_url,$tabla,$pro,&$profile){
global $page_url,$mod;//global $mysqli,$DBprefix,$url,$page_url,$mod,$ext,$opc,$path_tema,$tema_previo;
$path_JSON='assets/json/'.$tabla.'.json';
if(!file_exists($path_JSON)){$path_JSON=$api_url.'bloques/ws/t/?t='.$tabla;}
 if($path_JSON){
	$objData=file_get_contents($path_JSON);
	$Data=json_decode($objData,true);
	usort($Data, function($a, $b){return strnatcmp($a['ord'], $b['ord']);});//Orden del menu
	$i=0;//if($_SESSION['level']!=-1){echo '<!-- '.$tabla.'.json -->'."\n\r";}else{echo '<!-- '.$tabla.'.json URL:('.$path_JSON.')-->'."\n\r";}
	echo '<!-- '.$tabla.'.json URL:('.$path_JSON.')-->'."\n\r";
	foreach ($Data as $rowm){$i++;
		$perfil=$rowm['profile'];//echo $pro.' - '.$perfil.'<br>';
		$ID=$rowm['ID'];
		$visible=$rowm['visible'];		
		if($perfil==$pro && $visible==1){
			$profile=array('id'=>$rowm['ID'],'perfil'=>$rowm['profile'],'logo'=>$rowm['logo'],'nombre'=>$rowm['nombre'],'empresa'=>$rowm['empresa'],'des'=>$rowm['descripcion'],'puesto'=>$rowm['puesto'],'tel'=>$rowm['tel'],'cell'=>$rowm['cell'],'tel_ofi'=>$rowm['tel_ofi'],'email'=>$rowm['email'],'web'=>$rowm['web'],'fb'=>$rowm['fb'],'tw'=>$rowm['tw'],'lk'=>$rowm['lk'],'ins'=>$rowm['ins'],'bg_color'=>$rowm['bg_color'],'font_fam'=>$rowm['font_fam'],'date_created'=>$rowm['date_created']);			
		}else{$perfil='';}
	}

    if($profile!=''){
$logo=$profile['logo'];
$profile1=$profile['perfil'];
$nombre=$profile['nombre'];
//$des=$profile['descripcion'];
$puesto=$profile['puesto'];
$empresa=$profile['empresa'];
$cell=$profile['cell'];
$email=$profile['email'];
$web=$profile['web'];
$lk=$profile['lk'];
$ins=$profile['ins'];
        
        $path_f='vcf_files/';
		$nombre_archivo=$profile1.'.vcf';
		$contenido='BEGIN:VCARD
VERSION:3.0
N:'.$nombre.'
FN:
ORG:'.$empresa.'
TÍTULO:'.$puesto.'
TEL;WORK;VOZ:'.$cell.'
TEL;CELULAR;VOZ:'.$cell.'
URL;TRABAJO:'.$web.'
EMAIL;INTERNET:'.$email.'
END:VCARD';
		crear_vcard($path_f,$nombre_archivo,$contenido,$path_file);
    }

 }
}


/*//FUNCIONES ADMIN-LTE//*****************************************************************************/
function cadena_replace(&$replace1,&$replace2){
	$replace1=array(' ','.',',','(',')','/','"',"’",'á','é','í','ó','ú','&aacute;','&eacute;','&iacute;','&oacute;','&uacute;','Á','É','Í','Ó','Ú','&Aacute;','&Eacute;','&Iacute;','&Oacute;','&Uacute;','ñ','Ñ','&ntilde;','&Ntilde;');
	$replace2=array('-','-','-','-','-','-','-',"",'a','e','i','o','u','a','e','i','o','u','A','E','I','O','U','A','E','I','O','U','n','N','n','N');
}

function html_iso_servicios(&$nombre){
global $chartset;
 if($chartset=='iso-8859-1'){
 	$nombre=htmlentities($nombre);
	//$nombre=($_SERVER['HTTP_HOST']=='localhost')?htmlentities($nombre):htmlentities($nombre, ENT_COMPAT,'ISO-8859-1', true);
 }
}

function select_empresa($tabla,$empresa){
global $mysqli,$DBprefix,$url,$page_url,$mod,$ext,$opc,$path_tema,$tema_previo;
//file_json($tabla,$path_JSON);//$tabla='vcard';
$path_JSON='modulos/vcard/asstes/json/'.$tabla.'.json';
if(!file_exists($path_JSON)){$path_JSON=$page_url.'bloques/ws/t/?t='.$tabla;}
 if($path_JSON){$i=0;//echo '<!-- '.$tabla.'.json URL:('.$path_JSON.')-->'."\n\r";
	$objData=file_get_contents($path_JSON);
	$Data=json_decode($objData,true);
	usort($Data, function($a, $b){return strnatcmp($a['ord'], $b['ord']);});//Orden del menu
	$empresa1='';
	echo '<select class="form-control" id="empresa" name="empresa" style="width:60%;float:left;">';
	foreach ($Data as $rowm){$i++;
		if($empresa1!=$rowm['empresa']){
			$sel=($rowm['empresa']==$empresa)?' selected':'';
			echo '<option value="'.$rowm['empresa'].'"'.$sel.'>'.$rowm['empresa'].'</option>';
		}
		$empresa1=$rowm['empresa'];
	}
	echo '</select>';

 }
}

function vcard_id($tabla,$id,&$reg){
global $mysqli,$DBprefix,$url,$page_url,$mod,$ext,$opc,$path_tema,$tema_previo;
//file_json($tabla,$path_JSON);//$tabla='vcard';
//$path_JSON='bloques/webservices/rest/json/'.$tabla.'.json';
$path_JSON='modulos/vcard/asstes/json/'.$tabla.'.json';
if(!file_exists($path_JSON)){$path_JSON=$page_url.'bloques/ws/t/?t='.$tabla;}
 if($path_JSON){$i=0;//echo '<!-- '.$tabla.'.json URL:('.$path_JSON.')-->'."\n\r";
	$objData=file_get_contents($path_JSON);
	$Data=json_decode($objData,true);
	usort($Data, function($a, $b){return strnatcmp($a['ord'], $b['ord']);});//Orden del menu
	foreach ($Data as $rowm){$i++;
		$ID=$rowm['ID'];
		$visible=$rowm['visible'];		
		if($ID==$id){
			$reg=array('id'=>$rowm['ID'],'profile'=>$rowm['profile'],'logo'=>$rowm['logo'],'nombre'=>$rowm['nombre'],'empresa'=>$rowm['empresa'],'des'=>$rowm['descripcion'],'puesto'=>$rowm['puesto'],'tel'=>$rowm['tel'],'cell'=>$rowm['cell'],'tel_ofi'=>$rowm['tel_ofi'],'email'=>$rowm['email'],'web'=>$rowm['web'],'fb'=>$rowm['fb'],'tw'=>$rowm['tw'],'lk'=>$rowm['lk'],'ins'=>$rowm['ins'],'bg_color'=>$rowm['bg_color'],'font_fam'=>$rowm['font_fam'],'date_created'=>$rowm['date_created'],'visible'=>$rowm['visible']);						
		}//else{$perfil='';}
	}
 }
}

function compact_ajax_mod($fun,$tag_id,$url_ajax,$seg,$jqs){
echo '<script>
var $jq = jQuery.noConflict();
//$(document).ready(function() {	
	function '.$fun.'(){
		$jq.ajax({
			type: \'POST\',
			url: \''.$url_ajax.'\',
			success: function(respuesta) {			
				$(\'#'.$tag_id.'\').html(respuesta);
	   		}
		});
	}
	setInterval('.$fun.', '.$seg.'000);//setInterval(function(){'.$fun.'();},'.$seg.'000)//Actualizamos cada '.$seg.' segundo    	
	window.onload='.$fun.';
//});
</script>';
if($tag_id!=''){echo '<div id="'.$tag_id.'" class="row w3ls_banner_bottom_grids"></div>';}
}

function crear_ajax_servicios(){
global $mysqli,$DBprefix,$page_url,$path_tema,$mod,$ext,$opc,$action,$URL;
$cond_opc=($opc!='')?'&opc='.$opc:'';
	
//ajax_crud($campos,$salidadebusaqueda,1=tinyMCE);
$campos='
			logo: $("#cover").val(),
			profile: $("#profile").val(),
			nombre: $("#nombre").val(),
			puesto: $("#puesto").val(),
			empresa: $("#empresa").val(),
			cell: $("#cell").val(),
			email: $("#email").val(),
			web: $("#web").val(),
			lk: $("#lk").val(),
			ins: $("#ins").val(),
			visible: $("#visible").val(),
      		id: $("#id").val()';
$template='
	<div class="col-md-3 col-xs-12">
		<div class="box box-primary">
			<div class="box-header with-border">
       			<h3 class="box-title">C&oacute;digo: <b>${task.profile}</b></h3>
				<span class="controles">${sel}
					<a href="'.$page_url.'index.php?mod='.$mod.'&ext=admin/index'.$cond_opc.'&form=1&action=edit&id=${task.ID}" title="Editar"><i class="fa fa-edit"></i></a> | <a href="#" taskid="${task.ID}" class="task-delete" title="Borrar"><i class="fa fa-trash"></i></a>
				</span>
			</div>
			<div class="box-body">
				<div class="ima-size">
					<img src="'.$page_url.'modulos/'.$mod.'/assets/fotos/${task.logo}" class="ima-size img-responsive">
				</div>
				<div id="title"><strong>${task.nombre}</strong></div>	
			</div><!-- /.box-body -->
		</div>
	</div>';
ajax_crud($campos,$template,1);
}


?>