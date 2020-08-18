<?php 

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
	//$sel='<select class="form-control" id="empresa" name="empresa" style="width:60%;float:left;">';
	foreach ($Data as $rowm){$i++;
		if($empresa1!=$rowm['empresa']){
			$sel=($rowm['empresa']==$empresa)?' selected':'';
			$sel1.='<option value="'.$rowm['empresa'].'"'.$sel.'>'.$rowm['empresa'].'</option>';
		}
		$empresa1=$rowm['empresa'];
	}
	$select.='<select class="form-control" id="empresa" name="empresa" style="float:left;">'.$sel1.'</select>';
    return $select;
 }
}


function file_ima($cover){
global $page_url,$mod;
   $file='<input type="hidden" class="form-control" id="cover" name="cover" value="'.$cover.'">
   <img src="'.$page_url.'modulos/'.$mod.'/fotos/'.$cover.'" style="width:200px;" title="'.$cover.'">
   <a href="javascript:up(1);">Cambiar Foto</a><div id="upload"></div>';
   return $file;
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
                                 '.select_empresa($tabla=$mod,$empresa).'
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