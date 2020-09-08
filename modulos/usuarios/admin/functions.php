<?php 
//FUNCIONES ESPECIALES MOD: VCARD
function file_ima($cover){
global $page_url,$mod;
$mod='vcard';
   $file='<input type="hidden" class="form-control" id="cover" name="cover" value="'.$cover.'">
   <img id="ima" src="'.$page_url.'modulos/'.$mod.'/fotos/'.$cover.'" style="width:150px;" title="'.$cover.'">
   <a href="javascript:up(1);">Cambiar Foto</a><div id="upload"></div>';
   return $file;
}

function select_empresa($tabla,$url_api,$empresa){
global $page_url,$path_jsonDB,$path_jsonWS;
   $data=query_data($tabla,$url_api);//print_r($data);
   $empresa1='';
   $option='<option>Seleccione Empresa</option>';
	foreach ($data as $rowm){$i++;
		if($empresa1==$rowm['empresa']){$sel=($rowm['empresa']==$empresa)?' selected':'';
			$option.='<option value="'.$rowm['empresa'].'"'.$sel.'>'.$rowm['empresa'].'</option>';
      	}else{$option.='';}
      	$empresa1=$rowm['empresa'];
	}
   $select='<select class="form-control" id="empresa" name="empresa" style="float:left;">'.$option.'</select>';
   return $select;
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
?>