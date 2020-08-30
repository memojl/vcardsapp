<?php 
if(isset($_SESSION["username"])){
	if($_SESSION["level"]==-1 || $_SESSION["level"]==1){
      include 'functions.php';
      editor_tiny_mce();
      $tabla='vcard';
      $cond_opc=($opc!='')?'&opc='.$opc:'';
      if($username=='admin'){
         $vistas=($action!='' && $action=='listado')?'<i class="fa fa-list"></i> | <a href="'.$page_url.'index.php?mod='.$mod.'&ext='.$ext.$cond_opc.'"><i class="fa fa-th-large"></i></a>':'<a href="'.$page_url.'index.php?mod='.$mod.'&ext='.$ext.$cond_opc.'&action=listado"><i class="fa fa-list"></i></a> | <i class="fa fa-th-large"></i>';
      }
?>
<style>
#sel_empresa{display: flex;}
@media only screen and (min-width: 992px){
.modal-lg{width: 85% !important;}
}
</style>    
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $nombre_mod;?>
        <small><?php echo $description_mod;?></small>
      </h1>
	  <?php menu_rutas();?>
    </section>
<!-- Main content -->
<section class="content">
	<div class="row">
<?php
switch(true){
	case($opc=='opcion'):
?>
<?php	
	break;
	default:
	switch(true){
      case($form==1):        
         fecha_php_vcard();
			switch(true){
				case($action=='add'):
					$titulo1='Agregar';$tit='Subir';
				break;
				case($action=='edit' && !empty($_GET['id'])):
					$titulo1='Editar';$tit='Cambiar';$id=$_GET['id'];
               $row=query_row($tabla,'ID',$id);
					//$id=$row['ID'];
					$profile=$row['profile'];
					$cover=$row['cover'];
					$nombre=$row['nombre'];
               $puesto=$row['puesto'];
					$des=$row['descripcion'];
					$empresa=$row['empresa'];
					$cell=$row['cell'];
               $email=$row['email'];
               $web=$row['web'];
               $lk=$row['lk'];
               $ins=$row['ins'];
					$visible=$row['visible'];
				break;
         }

if($cover==''){$cover='nodisponible.jpg';}
$file=file_ima($cover);
$select_empresa=select_empresa($tabla,$url_api,$empresa);
?>
<script>
function add_empresa(val){
if(val==1){document.getElementById('sel_empresa').innerHTML='<input type="text" class="form-control" id="empresa" name="empresa" value=""><div><a href="javascript:add_empresa(0);">Cancelar</a></div>';
}else{document.getElementById('sel_empresa').innerHTML='<div class="input-group"><span class="input-group-addon"><i class="fa fa-industry"></i></span><?php echo $select_empresa;?></div><div style="padding: 5px 12px"><a href="javascript:add_empresa(1);"><i class="fa fa-plus"></i> Empresa</a></div>';}
}
</script>
<div id="aviso"><?php echo $aviso;?></div>
	<div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo $titulo1;?> Vcard</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form id="form1" name="form1" role="form" method="POST" enctype="multipart/form-data">
              <div class="box-body">
              <div class="col-md-4">
                        <div class="form-group">   
                           <label for="cover">Imagen</label>
                           <div id="imagen"><?php echo $file;?></div>
                        </div>
                        <!--div class="form-group">
                           <label for="des">Descripci&oacute;n</label>
                           <textarea class="form-control" id="des" name="des"></textarea>
                        </div-->
                        <?php //if($action=='edit'){?>
                        <div class="form-group">
                           <input type="text" class="form-control" id="ID" name="ID" value="<?php echo $id;?>" placeholder="ID">
                        </div>
				            <?php //}else{?>                        
                        <div class="form-group">
                           <input type="text" class="form-control" id="f_create" name="f_create" value="" placeholder="Creado">
                        </div>
                        <?php //}?>
                        <div class="form-group">
                           <input type="text" class="form-control" id="f_update" name="f_update" value="" placeholder="Actualizado">
                        </div>
                        <div class="form-group">
                           <input type="text" class="form-control" id="vcard" name="vcard" value="1" placeholder="vcard">
                        </div>
                        <div class="form-group">
                           <input type="text" class="form-control" id="user" name="user" value="<?php echo $username;?>" placeholder="usuario">
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="profile">Profile</label>
                           <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                              <input type="text" class="form-control" id="profile" name="profile" value="<?php echo $profile;?>">
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="nombre">Nombre</label>
                           <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-user"></i></span>
                              <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre;?>">
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="puesto">Puesto</label>
                           <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-user-secret"></i></span>
                              <input type="text" class="form-control" id="puesto" name="puesto" value="<?php echo $puesto;?>">
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="email">Email</label>
                           <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                              <input type="email" class="form-control" id="email" name="email" value="<?php echo $email;?>">
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="cell">Movil</label>
                           <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-mobile-phone"></i></span>
                              <input type="tel" class="form-control" id="cell" name="cell" value="<?php echo $cell;?>">
                           </div>   
                        </div>
                        <div class="form-group">
                           <label for="tel_ofi">Tel-Oficina</label>
                           <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                              <input type="tel" class="form-control" id="tel_ofi" name="tel_ofi" value="<?php echo $tel_ofi;?>">
                           </div>
                        </div>                                
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="empresa">Empresa</label>
                           <div id="sel_empresa">
                              <div class="input-group">
                                 <span class="input-group-addon"><i class="fa fa-industry"></i></span>
                                 <?php echo $select_empresa;?>
                              </div>
                              <div style="padding: 5px 12px"><a href="javascript:add_empresa(1);"><i class="fa fa-plus"></i> Empresa</a></div>
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="web">Web</label>
                           <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                              <input type="text" class="form-control" id="web" name="web" value="<?php echo $web;?>">
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="fb">Facebook</label>
                           <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-facebook"></i></span>
                              <input type="text" class="form-control" id="fb" name="fb" value="<?php echo $fb;?>">
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="lk">LinkedIn</label>
                           <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-linkedin"></i></span>
                              <input type="text" class="form-control" id="lk" name="lk" value="<?php echo $lk;?>">
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="ins">Instagram</label>
                           <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-instagram"></i></span>
                              <input type="text" class="form-control" id="ins" name="ins" value="<?php echo $ins;?>">
                           </div>
                        </div>
                        <div class="form-group">
                           <label>Visible</label>
                           <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-eye-slash"></i></span>
                              <select class="form-control" id="visible" name="visible">
                                <option value="0" <?php echo $seleccion=($visible==0) ? 'selected' : '';?>>No</option>
                                <option value="1" <?php echo $seleccion=($visible==1) ? 'selected' : '';?>>Si</option>
                              </select>
                           <div>
                        </div>
                     </div>

              </div><!-- /.box-body -->
              <div class="box-footer text-right">
                <input id="Guardar" name="Guardar" type="submit" class="btn btn-primary" value="Guardar"> 
                <a class="btn btn-default" href="<?php echo $refer;?>">Cancelar</a>
              </div>
            </form>
          </div><!-- /.box -->
    </div><!-- /.col-->
<?php		
		break;
		default:
?>
<!-- Main content -->
<!--header-->
<section class="content">
	<div class="row">
    	<?php head_producto(0);?>
	</div><!--/row-->
</section>    
<!--/header-->
<!--Content-->
<section class="content">					
	<div class="row">
		<div class="col-md-12 col-xs-12">
        <div class="box box-primary">
				  <div class="box-header with-border">
					 <h3 class="box-title">Listado de Productos</h3><span style="float:right;"><?php echo $vistas;?></span>
				  </div><!-- /.box-header -->

          <div id="loader" class="text-center"><img src="<?php echo $page_url;?>apps/dashboards/loader.gif"></div>
				  <div class="outer_div"></div>                

			 </div><!-- /.box -->
		</div><!-- /.col -->
	</div><!-- /.row -->		          		  
	<div class="col-md-12 col-xs-12">
	<?php 
    crear_ws($tabla);//crear_ws_vcard('modulos/vcard/assets/json/',$tabla);            
	?>
	</div>         
</section>
<!--/Content-->
<?php
		break;		
	}
	break;
}
?>
   </div>
   <!-- /.row-->
   <?php //modal_vcard();
   ajax_crud_vcard($tabla,$template,1);//crear_ajax_vcard();
   ?>
</section>
<!-- /.content -->
<?php 		
	}else{echo '<div id="cont-user">No tiene permiso para ver esta secci&oacute;n.</div>';}
}else{header("Location: ".$page_url."index.php");}
?>