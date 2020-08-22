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
         //$vistas=($action!='' && $action=='listado')?'<i class="fa fa-list"></i> | <a id="load(1);" href="#"><i class="fa fa-th-large"></i></a>':'<a id="listado" href="#"><i class="fa fa-list"></i></a> | <i class="fa fa-th-large"></i>';
?>
<script>
function add_empresa(val){
	if(val==1){document.getElementById('sel_empresa').innerHTML='<input type="text" class="form-control" id="empresa" name="empresa" value=""><div><a href="javascript:add_empresa(0);">Cancelar</a></div>';
	}else{document.getElementById('sel_empresa').innerHTML='<div class="input-group"><span class="input-group-addon"><i class="fa fa-industry"></i></span><?php echo select_empresa($tabla=$mod,$url_api,$empresa);?></div><div style="padding: 5px 12px"><a href="javascript:add_empresa(1);"><i class="fa fa-plus"></i> Empresa</a></div>';}
}
</script>

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
             
             break;
             default:
         ?>
      <!-- Main content -->
      <!--header-->
      <section class="content">
         <div class="row">
            <?php head_producto();?>
         </div>
         <!--/row-->
      </section>
      <!--/header-->
      <!--Content-->
      <section class="content">
         <div class="row">
            <div class="col-md-12 col-xs-12">
               <div class="box box-primary">
                  <div class="box-header with-border">
                     <h3 class="box-title">Listado de Tarjetas Digitales</h3>
                     <span style="float:right;"><?php echo $vistas;?></span>
                  </div>
                  <!-- /.box-header -->
                  <div id="loader" class="text-center"><img src="<?php echo $page_url;?>apps/dashboards/loader.gif"></div>
                  <div class="outer_div"></div>
               </div>
               <!-- /.box -->
            </div>
            <!-- /.col -->
         </div>
         <!-- /.row -->		          		  
         <div class="col-md-12 col-xs-12">
			<?php 
            crear_ws($tabla=$mod);//crear_ws_vcard('modulos/vcard/assets/json/',$tabla);
            //crear_ajax_vcard();
			?>
         </div>
      </section>
      <!--/Content-->
      <?php
         break;
         }
         ?>
   </div>
   <!-- /.row-->
   <?php modal_vcard();?>
</section>
<!-- /.content -->
<?php 		
	}else{echo '<div id="cont-user">No tiene permiso para ver esta secci&oacute;n.</div>';}
   }else{header("Location: ".$page_url."index.php");}
?>