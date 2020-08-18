<?php 
if(isset($_SESSION["username"])){
   	if($_SESSION["level"]==-1 || $_SESSION["level"]==1){
   		include 'functions.php';
   		editor_tiny_mce();
?>
<style>
@media only screen and (min-width: 992px){
	.modal-lg{width: 90% !important;}
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
			   //crear_ws_vcard('modulos/vcard/assets/json/',$tabla);
			   crear_ws($tabla=$mod);
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
</section>
<!-- /.content -->
<?php modal_vcard();//crear_ajax_servicios();?>
<?php 		
	}else{echo '<div id="cont-user">No tiene permiso para ver esta secci&oacute;n.</div>';}
   }else{header("Location: ".$page_url."index.php");}
?>