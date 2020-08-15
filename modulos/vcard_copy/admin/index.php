<?php 
if(isset($_SESSION["username"])){
	if($_SESSION["level"]==-1 || $_SESSION["level"]==1){
		include 'functions.php';
		editor_tiny_mce();//sql_opciones('tiny_text_des',$valor);$tiny_text=$valor;
$tabla='vcard';
$cond_opc=($opc!='')?'&opc='.$opc:'';
if($username=='admin'){
$vistas=($action!='' && $action=='listado')?'<i class="fa fa-list"></i> | <a href="'.$page_url.'index.php?mod='.$mod.'&ext='.$ext.$cond_opc.'"><i class="fa fa-th-large"></i></a>':'<a href="'.$page_url.'index.php?mod='.$mod.'&ext='.$ext.$cond_opc.'&action=listado"><i class="fa fa-list"></i></a> | <i class="fa fa-th-large"></i>';
}
//$vistas=($action!='' && $action=='listado')?'<i class="fa fa-list"></i> | <a id="load(1);" href="#"><i class="fa fa-th-large"></i></a>':'<a id="listado" href="#"><i class="fa fa-list"></i></a> | <i class="fa fa-th-large"></i>';
?>
<script>
function add_empresa(val){
	if(val==1){document.getElementById('sel_empresa').innerHTML='<input type="text" class="form-control" id="empresa" name="empresa" value=""><div><a href="javascript:add_empresa(0);">Cancelar</a></div>';
	}else{document.getElementById('sel_empresa').innerHTML='<?php select_empresa($tabla,$empresa);?><div style="float:right;"><a href="javascript:add_empresa(1);"><i class="fa fa-plus"></i> Agregar Empresa</a></div>';}
}
</script>
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
			switch(true){
				case($action=='add'):
					$titulo1='Agregar';$tit='Subir';$precio='0.00';
				break;
				case($action=='edit' && !empty($_GET['id'])):
					$titulo1='Editar';$tit='Cambiar';$id=$_GET['id'];
					//$sql=mysqli_query($mysqli,"SELECT * FROM ".$DBprefix.$tabla." WHERE ID='{$id}';") or print mysqli_error($mysqli); 
					//if($reg=mysqli_fetch_array($sql)){
            vcard_id($tabla,$id,$reg);
						//$id=$reg['ID'];
						$profile=$reg['profile'];
						$cover=$reg['logo'];
						$nombre=$reg['nombre'];
            $puesto=$reg['puesto'];
						$des=$reg['descripcion'];
						$empresa=$reg['empresa'];
						$cell=$reg['cell'];
            $email=$reg['email'];
            $web=$reg['web'];
            $lk=$reg['lk'];
            $ins=$reg['ins'];
						$visible=$reg['visible'];
					//}
				break;
			}

if($cover==''){$cover='nodisponible1.jpg';}
$file='<input type="hidden" class="form-control" id="cover" name="cover" value="'.$cover.'">
<img src="'.$page_url.'modulos/'.$mod.'/assets/fotos/'.$cover.'" style="width:200px;" title="'.$cover.'">
<a href="javascript:up(1);">'.$tit.' Foto</a><div id="upload"></div>';

//if($_POST['Aceptar']){}
?>
<div id="aviso"><?php echo $aviso;?></div>
	<div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo $titulo1;?> Vcard</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form id="form1" name="form1" role="form" method="POST" enctype="multipart/form-data" action="">
              <div class="box-body">
                <div class="form-group col-md-6">
                  <label for="cover">Imagen</label>
                  <div id="imagen"><?php echo $file;?></div>                  
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="profile">Profile</label>
                    <input type="text" class="form-control" id="profile" name="profile" value="<?php echo $profile;?>">
                  </div>
                  <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre;?>">
                  </div>
                  <div class="form-group">
                    <label for="puesto">Puesto</label>
                    <input type="text" class="form-control" id="puesto" name="puesto" value="<?php echo $puesto;?>">
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control text-right" id="email" name="email" value="<?php echo $email;?>">
                  </div>
                </div>
                <!--div class="form-group col-md-12">
                  <label for="des">Descripci&oacute;n</label>
                  <textarea class="form-control" id="des" name="des"><?php echo $des;?></textarea>
                </div-->

                <div class="form-group col-md-4">
                  <label for="cell">Cell</label>
                  <input type="text" class="form-control text-right" id="cell" name="cell" value="<?php echo $cell;?>">
                </div>
                <div class="form-group col-md-4">
                  <label for="empresa">Empresa</label>
                    <div id="sel_empresa">
                    <?php select_empresa($tabla,$empresa);?><div style="float: right;"><a href="javascript:add_empresa(1);"><i class="fa fa-plus"></i> Agregar Empresa</a></div>
                    </div>
                </div>
                <div class="form-group col-md-4">
                  <label for="web">Web</label>
                  <input type="text" class="form-control text-right" id="web" name="web" value="<?php echo $web;?>">
                </div>
                
                <div class="form-group col-md-4">
                  <label for="lk">LinkedIn</label>
                  <input type="text" class="form-control text-right" id="lk" name="lk" value="<?php echo $lk;?>">
                </div>
                <div class="form-group col-md-4">
                  <label for="ins">Instagram</label>
                  <input type="text" class="form-control text-right" id="ins" name="ins" value="<?php echo $ins;?>">
                </div>
				        <div class="form-group col-md-4">
                  <label>Visible</label>
                  <select class="form-control" id="visible" name="visible">
                    <option value="0" <?php echo $seleccion=($visible==0) ? 'selected' : '';?>>No</option>
                    <option value="1" <?php echo $seleccion=($visible==1) ? 'selected' : '';?>>Si</option>
                  </select>
                </div>
              </div><!-- /.box-body -->
              <div class="box-footer text-right">
                <!--input type="hidden" class="form-control" id="user" name="user" value="<?php echo $username;?>"-->
                <?php if($action=='edit'){?>
              	<input type="hidden" class="form-control" id="id" name="id" value="<?php echo $id;?>">
                <!--input type="hidden" class="form-control" id="fmod" name="fmod" value="<?php echo $date;?>"-->				
				<?php }else{?>
              	<!--input type="hidden" class="form-control" id="alta" name="alta" value="<?php echo $date;?>"-->                
				<?php }?>
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
    	<?php head_producto();?>
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
	<?php crear_ws_vcard('modulos/vcard/assets/json/',$tabla);//crear_ws($tabla);?>

	</div>         
</section>
<!--/Content-->
<?php
		break;		
	}
	break;
}
?>
	</div><!-- /.row-->
</section><!-- /.content -->
<?php crear_ajax_servicios();?>
<?php 
	}else{echo '<div id="cont-user">No tiene permiso para ver esta secci&oacute;n.</div>';}
}else{header("Location: ".$page_url."index.php");}
?>