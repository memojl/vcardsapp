<?php 
function file_ima($cover){
global $page_url,$mod;
   $file='<input type="hidden" class="form-control" id="cover" name="cover" value="'.$cover.'">
   <img src="'.$page_url.'modulos/'.$mod.'/fotos/'.$cover.'" style="width:200px;" title="'.$cover.'">
   <a href="javascript:up(1);">Cambiar Foto</a><div id="upload"></div>';
   return $file;
}

function select_empresa($tabla,$url_api,$empresa){
global $page_url,$path_jsonDB,$path_jsonWS;
   $data=query_data($tabla,$url_api);//print_r($data);
   $empresa1='';
   $option='<option>Seleccione Empresa</option>';
	foreach ($data as $rowm){$i++;
		if($empresa1!=$rowm['empresa']){$sel=($rowm['empresa']==$empresa)?' selected':'';
			$option.='<option value="'.$rowm['empresa'].'"'.$sel.'>'.$rowm['empresa'].'</option>';
      }
      $empresa1=$rowm['empresa'];
	}
   $select='<select class="form-control" id="empresa" name="empresa" style="float:left;">'.$option.'</select>';
   return $select;
}

function query_all_tabla_vcard($th,$tabla,$url_api,$display){
global $page_url,$path_jsonDB,$path_jsonWS;
	$data=query_data($tabla,$url_api);//print_r($data);
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
      $row=$data[$key];if($th!=''){$key+=1;}
      echo '<tr id="'.$key.'">'."\n";
      echo '<td style="display:'.$display.';"><button class="btn btn-primary btn-edit"><i class="fa fa-edit"></i></button> | <button class="btn btn-danger btn-delete"><i class="fa fa-trash"></i></button></td>';   
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

function crear_ajax_vcard(){
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

function modal_vcard(){
global $mod;

if($cover==''){$cover='nodisponible1.jpg';}
$file=file_ima($cover);
$seleccion0=($visible=='0')?'selected':'';
$seleccion1=($visible=='1')?'selected':'';

    echo '<!-- Modal -->
<div class="modal fade" id="addVcard" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="gridSystemModalLabel">Registro Vcard</h4>
        </div>
        <div class="modal-body">
            <div class="row">

             <!--div class="col-md-12"-->
               <!-- form start -->
               <form id="form1" name="form1" role="form" method="POST" enctype="multipart/form-data">
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
                                 '.select_empresa($tabla=$mod,$url_api,$empresa).'
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
                     <!--input type="hidden" class="form-control" id="user" name="user" value="\'$username;\'"-->
                     <?php if($action==\'edit\'){\'
                     <input type="hidden" class="form-control" id="id" name="id" value="\'$id;\'">
                     <!--input type="hidden" class="form-control" id="fmod" name="fmod" value="\'$date;\'"-->				
                     <?php }else{\'
                     <!--input type="hidden" class="form-control" id="alta" name="alta" value="\'$date;\'"-->                
                     <?php }\'
                     <!--input id="Guardar" name="Guardar" type="submit" class="btn btn-primary" value="Guardar"--> 
                     <!--a class="btn btn-default" href="\'$refer;\'">Cancelar</a-->
                  </div>
               </form>
             <!--/div--><!-- /.col-->            

            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary">Guardar</button>
        </div>
    </div>
  </div>
</div>
<!-- /Modal -->';
}