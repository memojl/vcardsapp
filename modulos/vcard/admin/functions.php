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
function html_iso_servicios(&$nombre){
global $chartset;
 if($chartset=='iso-8859-1'){
 	$nombre=htmlentities($nombre);
	//$nombre=($_SERVER['HTTP_HOST']=='localhost')?htmlentities($nombre):htmlentities($nombre, ENT_COMPAT,'ISO-8859-1', true);
 }
}

function file_ima($cover){
global $page_url,$mod;
   $file='<input type="hidden" class="form-control" id="cover" name="cover" value="'.$cover.'">
   <img id="ima" src="'.$page_url.'modulos/'.$mod.'/assets/fotos/'.$cover.'" style="width:150px;" title="'.$cover.'">
   <a href="javascript:up(1);">Cambiar Foto</a><div id="upload"></div>';
   return $file;
}

function fecha_php_vcard(){
global $fecha;
echo '
<script language="JavaScript">
//Configuracion de la funcion: [hora.js].
function fecha(){
var dt = new Date();
var d  = dt.getDate();
var day = (d < 10) ? \'0\' + d : d;
var m = dt.getMonth() + 1;
var month = (m < 10) ? \'0\' + m : m;
var yy = dt.getYear();
var year = (yy < 1000) ? yy + 1900 : yy;
var fecha = year+"-"+month+"-"+day;

var hora = dt.getHours();
var minuto = dt.getMinutes();
var segundo = dt.getSeconds();
var valtime = ((hora<10)? "0" : "")+hora;
valtime += ((minuto<10)? ":0" : ":")+minuto;
valtime += ((segundo<10)? ":0" : ":")+segundo;
tiempo = setTimeout(\'fecha()\',1000);
//document.getElementById("fecha").innerHTML = "'.$fecha.' " + valtime;
document.getElementById("f_create").value = fecha +" "+ valtime;
document.getElementById("f_update").value = fecha +" "+ valtime;
}
window.onload = fecha;
</script>';
}

function select_empresa($tabla,$url_api,$empresa){
global $page_url,$path_jsonDB,$path_jsonWS;
   $data=query_data($tabla,$url_api);//print_r($data);
   $empresa1='';
   $option='<option>Seleccione Empresa</option>';
	foreach ($data as $rowm){$i++;
		if($empresa1==$rowm['empresa']){$sel=($rowm['empresa']==$empresa)?' selected':'';
			$option.='<option value="'.$rowm['empresa'].'"'.$sel.'>'.$empresa1.'/'.$rowm['empresa'].'</option>';
      	}else{$option.='';}
      	$empresa1=$rowm['empresa'];
	}
   $select='<select class="form-control" id="empresa" name="empresa" style="float:left;">'.$option.'</select>';
   return $select;
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

function ajax_crud_vcard($tabla,$template,$js){
global $mysqli,$DBprefix,$URL,$page_url,$path_tema,$mod,$ext,$opc,$form,$action,$ctrl;
$data=query_data($tabla,$url_api);
$i=0;$k=0;
$noc=array('logo','descripcion','tel','vcard','user');
foreach($data as $key){$i++;
   if($i==1){
      foreach($key as $datos=>$value){$k++;//$cam.='<div>'.$datos.'</div>'."\n";
         $campos.=$datos.': $("#'.$datos.'").val(),'."\n";
         for($j=0;$j<count($noc);$j++){
            $cam1=$datos.' = tr.find("td:eq('.$k.')").html();'."\n";
            $cam2='$(\'#'.$datos.'\').val('.$datos.');'."\n";   
            $cam3='$(\'#'.$datos.'\').val(task.'.$datos.');'."\n";
            if($datos==$noc[$j]){$cam1='';$cam2='';$cam3='';break;} 
         }
         $campos1.=$cam1;
         $campos2.=$cam2;
         $campos3.=$cam3;
      }  
   }  
}
//$campos=array(1=>$campos,$campos1,$campos2,$campos3);
$cond_opc=($opc!='')?'&opc='.$opc:'';
$cond_action=($action!='')?'&action='.$action:'';
$edit=($action=='edit')?'true':'false';

$contenido='
// JavaScript Document

$(document).ready(function(){
	// Global Settings
	//console.log(\'jQuery esta funcionando\');
	let edit = '.$edit.';
	load(1);	
 	//listar();

	 function load(page){
		var parametros = {"mode":"ajax","page":page};
		$("#loader").fadeIn(\'slow\');
		$.ajax({
			url:\'modulos/'.$mod.'/admin/backend.php?mod='.$mod.$cond_action.'\',
			data: parametros,
			beforeSend: function(objeto){
				$("#loader").html("<img src=\'apps/dashboards/loader.gif\'>");
			},
			success:function(data){
				$(".outer_div").html(data);
				$("#loader").html("");
			}
		});
	}

	function listado(page){
		var parametros = {"mode":"ajax","page":page};
		$("#loader").fadeIn(\'slow\');
		$.ajax({
			url:\'modulos/'.$mod.'/admin/backend.php?mod='.$mod.'&action=listado\',
			data: parametros,
			beforeSend: function(objeto){
				$("#loader").html("<img src=\'modulos/'.$mod.'/img/loader.gif\'>");
			},
			success:function(data){
				$(".outer_div").html(data);
				$("#loader").html("");
			}
		});
	}

	//LISTAR
	/*
	function listar(){
		$.ajax({
			url: \'modulos/'.$mod.'/admin/backend.php?action=list\',
			type: \'POST\',
			//dataType : \'json\',
			success: function(response){
				let tasks=JSON.parse(response);
				let template="";
				
				tasks.forEach(task=>{
        		template += `
                  <tr taskId="${task.ID}">
                  <td>${task.ID}</td>
                  <td>
                  <a href="#" class="task-item">${task.nom}</a>
                  </td>
                  <td>${task.descripcion}</td>
                  <td>
                    <button class="task-delete btn btn-danger">Borrar</button>
                  </td>
                  </tr>
                `
					});
				$("#task").html(template);
			}
		});
	}
	setInterval(listar,30000);*/

	//AGREGAR/EDITAR
	$("#form1").submit(function(e){
		e.preventDefault();
		tinyMCE.triggerSave();
		const postData={
			'.$campos.'
		};
		const url = edit === false ? \'modulos/'.$mod.'/admin/backend.php?mod='.$mod.'&ext='.$ext.'&action=add\' : \'modulos/'.$mod.'/admin/backend.php?mod='.$mod.'&ext='.$ext.'&action=edit\';		
		console.log(postData, url);
		$.post(url,postData,function(response){
			console.log("Se ha actualizado el registro.");
			$("#form1").trigger(\'reset\');
			$("#addVcard").modal(\'hide\');
			$("#aviso").html(response).fadeIn("slow").delay(3000).fadeOut("slow");
			load(1);
			//edit = false;
		});
	});

	//editar_form
	/*
	$(document).on(\'click\',\'.task-item\',function(){	
		const element = $(this)[0].parentElement.parentElement;
      	const id = $(element).attr(\'taskId\');
      	$.post(\'modulos/'.$mod.'/admin/backend.php?action=edit_form\', {id}, (response) => {
			console.log(response);
			const task=JSON.parse(response);
      		$("#nom").val(task.nom);
      		$("#des").val(task.descripcion);
      		$("#taskId").val(task.ID);
      		edit = true;
        });		
	});*/

	//BORRAR
	$(document).on(\'click\', \'.btn-delete\', function () {
      const element = $(this)[0].parentElement.parentElement;const id = $(element).attr(\'id\');
      //console.log(id);
	   Swal.fire({
		  title: "Esta seguro de eliminar esta Tarjeta ("+id+")?",
		  text: "Esta operacion no se puede revertir!",
		  icon: \'warning\',
		  showCancelButton: true,
		  confirmButtonColor: \'#d33\',
		  cancelButtonColor: \'#3085d6\',
		  confirmButtonText: \'Borrar\'
	   }).then((result) => {
		  if (result.value) {
			 //let id = $(this).closest(\'tr\').attr(\'id\'); //capturamos el atributo ID de la fila  
			 //eliminamos la Tarjete de firebase      
			 $.post(\'modulos/'.$mod.'/admin/backend.php?action=delete\', {id}, (response) => {
				console.log(response);
				load(1);
			 });
			 Swal.fire(\'Eliminado!\', \'La Tarjeta ha sido eliminado.\', \'success\')
		  }
	   })
	});
 
	//BUSCAR
	$("#q").keyup(function (e) {
	   if ($("#q").val()) {
		  let q = $("#q").val();
		  $.ajax({
			 url: \'modulos/'.$mod.'/admin/backend.php?action=buscar\',
			 type: \'POST\',
			 data: {q},
			 success: function (response) {
				let tasks = JSON.parse(response);
				console.log(response);
				let template = \'<div class="box-body">\';
				let sel = "";
				tasks.forEach(task => {
				   visible = `${task.visible}`;
				   sel = (visible == 0) ? \'<span style="color:#e00;"><i class="fa fa-close" title="Desactivado"></i></span>\' : \'<span style="color:#0f0;"><i class="fa fa-check" title="Activo"></i></span>\';
				   template += `
            <div class="col-md-3 col-xs-12">
               <div class="box box-primary">
                  <div class="box-header with-border" id="${task.ID}" >
                         <h3 class="box-title">C&oacute;digo: <b>${task.profile}</b></h3>
                     <span class="controles">${sel}
                        <span class="btn-edit" data-toggle="modal" data-target="#addVcard" title="Editar"><i class="fa fa-edit"></i></span> | <span class="btn-delete" title="Borrar"><i class="fa fa-trash"></i></span>
                     </span>
                  </div>
                  <div class="box-body">
                     <div class="ima-size">
                        <img src="'.$page_url.'modulos/'.$mod.'/fotos/${task.cover}" class="ima-size img-responsive">
                     </div>
                     <div id="title"><strong>${task.nombre}</strong></div>	
                  </div><!-- /.box-body -->
               </div>
            </div>`
				});
				$(".outer_div").html(template + "</div>");
			 }
		  });
	   }
	});
  
	//SUBIR COVER
	$(document).on(\'click\', \'#Aceptar\', function (e) {
	   e.preventDefault();
	   var frmData = new FormData;
	   frmData.append("userfile", $("input[name=userfile]")[0].files[0]);
	   //console.log(\'Se cargo Imagen\');		
	   $.ajax({
		  url: \'modulos/'.$mod.'/admin/backend.php?mod=vcard&action=subir_cover\',
		  type: \'POST\',
		  data: frmData,
		  processData: false,
		  contentType: false,
		  cache: false,
		  beforeSend: function (data) {
			 $("#imagen").html("Subiendo Imagen");
		  },
		  success: function (data) {
			 //$("#form1").trigger("reset");
			 $("#imagen").html(data);
			 $(".alert-dismissible").delay(1000).fadeOut("slow");
			 console.log("Subido Correctamente");
		  }
	   });
	   //return false;
	});

});//document
';
crear_archivo('modulos/'.$mod.'/js/','ajax_'.$mod.'.js',$contenido,$path_file);
}

?>