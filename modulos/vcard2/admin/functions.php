<?php 
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
   <img id="ima" src="'.$page_url.'modulos/'.$mod.'/fotos/'.$cover.'" style="width:150px;" title="'.$cover.'">
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
		if($empresa1!=$rowm['empresa']){$sel=($rowm['empresa']==$empresa)?' selected':'';
			$option.='<option value="'.$rowm['empresa'].'"'.$sel.'>'.$rowm['empresa'].'</option>';
      }else{$option.='';}
      $empresa1=$rowm['empresa'];
	}
   $select='<select class="form-control" id="empresa" name="empresa" style="float:left;">'.$option.'</select>';
   return $select;
}

function query_all_tabla_vcard($index,$th,$tabla,$url_api,$crud){
global $page_url,$path_jsonDB,$path_jsonWS;
   $display=($crud!=0)?'':'none';
   $data=query_data($tabla,$url_api);//print_r($data);
   usort($data, function($a, $b){global $index;return strnatcmp($a[$index], $b[$index]);});//Orden por ID
	//CAMPOS
   $i=0;$campos='<th style="display:'.$display.';">Acciones</th>'."\n";
      if($th!=''){
         for($j=0;$j<count($th);$j++){
            $campos.='<th>'.$th[$j].'</th>'."\n";
         }
      }else{
         foreach($data as $key){$i++;
            if($i==1){
               foreach($key as $datos=>$value){
                  $campos.='<th>'.$datos.'</th>'."\n";
               }  
            }  
         }   
      }
	echo '<tr>'.$campos.'</tr>'."\n";
   //DATOS
	foreach($data as $key => $value){
      $row=$data[$key];if($index!=''){$key=$row['ID'];}
      echo '<tr id="'.$key.'">'."\n";
      echo '<td style="display:'.$display.';"><button class="btn btn-primary btn-edit" data-toggle="modal" data-target="#addVcard"><i class="fa fa-edit"></i></button> | <button class="btn btn-danger btn-delete"><i class="fa fa-trash"></i></button></td>';   
      if($th!=''){
         for($j=0;$j<count($th);$j++){$datos=$th[$j];
            echo '<td>'.$row[$datos].'</td>'."\n";
         }
      }else{
         foreach($row as $datos=>$value){//echo '<td>'.$row[$datos].'</td>'."\n";
            echo '<td>'.$value.'</td>'."\n";
			}
      }
      echo '</tr>'."\n";
   }
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
$campos=array(1=>$campos,$campos1,$campos2,$campos3);

$cond_action=($action!='')?'&action='.$action:'';
if($js==1){
$edit_form='$.post(\'modulos/'.$mod.'/admin/backend.php?action=form_id\', {id}, (response) => {
      let tasks=JSON.parse(response);
      let task=tasks[0];
      //console.log(response);console.log(task);
      '.$campos[4].'
      const cover = task.cover;
      $("#ima").attr(\'src\', \'./modulos/'.$mod.'/fotos/\' + cover);      		
   });';
}else{
$edit_form='   
      '.$campos[2].'
   
      '.$campos[3].'
      $("#ima").attr(\'src\', \'./modulos/'.$mod.'/fotos/\' + cover);';
}

$contenido='
// JavaScript Document
function load(page) {
   var parametros = {
     "mode": "ajax",
     "page": page
   };
   $("#loader").fadeIn(\'slow\');
   $.ajax({
     url: \'modulos/'.$mod.'/admin/backend.php?mod='.$mod.$cond_action.'\',
     data: parametros,
     beforeSend: function (objeto) {
       $("#loader").html("<img src=\'apps/dashboards/loader.gif\'>");
     },
     success: function (data) {
       $(".outer_div").html(data);
       $("#loader").html("");
     }
   });
}

$(document).ready(function () {
	// Global Settings
	//console.log(\'jQuery esta funcionando\');
	let edit = false;
	load(1);
 
	//BOTONES
	/*Boton Agregar*/
	$(\'.btn-add\').click(function () {
		$("#ima").attr(\'src\', \'./modulos/'.$mod.'/fotos/nodisponible1.jpg\');
		$("#form1").trigger(\'reset\');
		edit = false;
	});
 
	function listado(page) {
	   var parametros = {
		  "mode": "ajax",
		  "page": page
	   };
	   $("#loader").fadeIn(\'slow\');
	   $.ajax({
		  url: \'modulos/'.$mod.'/admin/backend.php?mod=vcard&action=listado\',
		  data: parametros,
		  beforeSend: function (objeto) {
			 $("#loader").html("<img src=\'apps/dashboards/loader.gif\'>");
		  },
		  success: function (data) {
			 $(".outer_div").html(data);
			 $("#loader").html("");
		  }
	   });
	}
 
	//AGREGAR/EDITAR
	$("#form1").submit(function (e) {
	   e.preventDefault();
	   tinyMCE.triggerSave();
	   const postData = {
         '.$campos[1].'
	   };
	   const url = edit === false ? \'modulos/'.$mod.'/admin/backend.php?mod=vcard&ext=admin/index&action=add\' : \'modulos/'.$mod.'/admin/backend.php?mod=vcard&ext=admin/index&action=edit\';
	   console.log(postData, url);
	   $.post(url, postData, function (response) {
		  console.log("Se ha actualizado el registro.");
		  $("#form1").trigger(\'reset\');
		  $("#addVcard").modal(\'hide\');
		  $("#aviso").html(response).delay(1000).slideToggle("slow").delay(3000).slideToggle("slow");
		  load(1);
		  //edit = false;
	   });
	});
 
	//editar_form
	$(document).on(\'click\',\'.btn-edit\',function(){	
		const element = $(this)[0].parentElement.parentElement;const id = $(element).attr(\'id\');
		//let tr = $(this).parents("tr");const Id = tr.attr("id");console.log(Id);
		//const id = $(this).closest(\'tr\').attr(\'id\'); //capturamos el atributo ID de la fila
		console.log(id);
      '.$edit_form.'
	   edit = true;
	});
  
	//BORRAR
	$(document).on(\'click\', \'.btn-delete\', function () {
      const element = $(this)[0].parentElement.parentElement;const id = $(element).attr(\'id\');
      //console.log(id);
	   Swal.fire({
		  title: "Esta seguro de eliminar la Tarjeta ("+id+")?",
		  text: "Esta operacion no se puede revertir!",
		  icon: \'warning\',
		  showCancelButton: true,
		  confirmButtonColor: \'#d33\',
		  cancelButtonColor: \'#3085d6\',
		  confirmButtonText: \'Borrar\'
	   }).then((result) => {
		  if (result.value) {
			 //let id = $(this).closest(\'tr\').attr(\'id\'); //capturamos el atributo ID de la fila  
			 //eliminamos la Tarjeta de firebase      
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
			 $(".alert-dismissible").delay(3000).fadeOut("slow");
			 console.log("Subido Correctamente");
		  }
	   });
	   //return false;
	});

});//document
';
crear_archivo('modulos/'.$mod.'/js/','ajax_'.$mod.'.js',$contenido,$path_file);
}

function crear_ajax_vcard(){
global $mysqli,$DBprefix,$page_url,$path_tema,$mod,$ext,$opc,$action,$URL;
   $cond_opc=($opc!='')?'&opc='.$opc:'';
 
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
                  <img src="'.$page_url.'modulos/'.$mod.'/fotos/${task.cover}" class="ima-size img-responsive">
               </div>
               <div id="title"><strong>${task.nombre}</strong></div>	
            </div><!-- /.box-body -->
         </div>
      </div>';
   ajax_crud_vcard($tabla,$template,1);//ajax_crud($campos,$salidadebusaqueda,1=tinyMCE);
}

function modal_vcard(){
global $username,$mod;

if($cover==''){$cover='nodisponible1.jpg';}
$file=file_ima($cover);
$seleccion0=($visible=='0')?'selected':'';
$seleccion1=($visible=='1')?'selected':'';

    echo '<!-- Modal -->
<div class="modal fade" id="addVcard" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form id="form1">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="gridSystemModalLabel">Registro Vcard</h4>
        </div>
        <div class="modal-body">
            <div class="row">
             <!--div class="col-md-12"-->
               <!-- form start -->
               
                  <div class="box-body">
                     <div class="col-md-4">
                        <div class="form-group">   
                           <label for="cover">Imagen</label>
                           <div id="imagen">'.$file.'</div>
                        </div>
                        <!--div class="form-group">
                           <label for="des">Descripci&oacute;n</label>
                           <textarea class="form-control" id="des" name="des"></textarea>
                        </div-->
                        <div class="form-group">
                           <input type="text" class="form-control" id="ID" name="ID" value="" placeholder="ID">
                        </div>
                        <div class="form-group">
                           <input type="text" class="form-control" id="f_create" name="f_create" value="" placeholder="Creado">
                        </div>
                        <div class="form-group">
                           <input type="text" class="form-control" id="f_update" name="f_update" value="" placeholder="Actualizado">
                        </div>
                        <div class="form-group">
                           <input type="text" class="form-control" id="vcard" name="vcard" value="1" placeholder="vcard">
                        </div>
                        <div class="form-group">
                           <input type="text" class="form-control" id="user" name="user" value="'.$_SESSION["username"].'" placeholder="usuario">
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="profile">Profile</label>
                           <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                              <input type="text" class="form-control" id="profile" name="profile" value="">
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="nombre">Nombre</label>
                           <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-user"></i></span>
                              <input type="text" class="form-control" id="nombre" name="nombre" value="">
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="puesto">Puesto</label>
                           <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-user-secret"></i></span>
                              <input type="text" class="form-control" id="puesto" name="puesto" value="">
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="email">Email</label>
                           <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                              <input type="email" class="form-control" id="email" name="email" value="">
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="cell">Movil</label>
                           <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-mobile-phone"></i></span>
                              <input type="tel" class="form-control" id="cell" name="cell" value="">
                           </div>   
                        </div>
                        <div class="form-group">
                           <label for="tel_ofi">Tel-Oficina</label>
                           <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                              <input type="tel" class="form-control" id="tel_ofi" name="tel_ofi" value="">
                           </div>
                        </div>                                
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="empresa">Empresa</label>
                           <div id="sel_empresa">
                              <div class="input-group">
                                 <span class="input-group-addon"><i class="fa fa-industry"></i></span>
                                 '.select_empresa($tabla='vcard',$url_api,$empresa).'
                              </div>
                              <div style="padding: 5px 12px"><a href="javascript:add_empresa(1);"><i class="fa fa-plus"></i> Empresa</a></div>
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="web">Web</label>
                           <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                              <input type="text" class="form-control" id="web" name="web" value="">
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="fb">Facebook</label>
                           <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-facebook"></i></span>
                              <input type="text" class="form-control" id="fb" name="fb" value="">
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="lk">LinkedIn</label>
                           <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-linkedin"></i></span>
                              <input type="text" class="form-control" id="lk" name="lk" value="">
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="ins">Instagram</label>
                           <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-instagram"></i></span>
                              <input type="text" class="form-control" id="ins" name="ins" value="">
                           </div>
                        </div>
                        <div class="form-group">
                           <label>Visible</label>
                           <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-eye-slash"></i></span>
                              <select class="form-control" id="visible" name="visible">
                                 <option value="0" '.$seleccion0.'>No</option>
                                 <option value="1" '.$seleccion1.'>Si</option>
                              </select>
                           <div>
                        </div>
                     </div>                     
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                  </div>
               
             <!--/div--><!-- /.col-->            

            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary guardar">Guardar</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- /Modal -->';
}