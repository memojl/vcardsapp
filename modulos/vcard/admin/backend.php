<?php
include '../../../admin/conexion.php';
include '../../../apps/dashboards/functions.php';
include 'functions.php';

switch(true){
  case($opc=='opcion'):

  break;	
  case($opc=='items'):
	servicios($ext);
  break;	
  default:
  	$tabla='vcard';
	switch(true){
	  case($action=='buscar'):
		$q=$_POST['q'];
		if(!empty($q)){
  			$query="SELECT ID,profile,logo,nombre,visible FROM ".$DBprefix.$tabla." WHERE nombre LIKE '%{$q}%'";
		}else{$query="SELECT * FROM ".$DBprefix.$tabla."";}
  		ws_query($query,1,0);
	  break;
	  case($action=='delete'):
		if(isset($_POST['id'])){
  			$id=$_POST['id'];
  			$sql=mysqli_query($mysqli,"DELETE FROM ".$DBprefix.$tabla." WHERE ID='{$id}';") or print mysqli_error($mysqli);
  			echo 'La tarea ha sido borrada '.$id;  
		}	  
	  break;
	  case($action=='edit' || $action=='add'):
		$id       = (isset($_POST['ID']))?$_POST['ID']:'';
		$cover    = (isset($_POST['cover']))?$_POST['cover']:'';
		$logo     = (isset($_POST['logo']))?$_POST['logo']:'';
		$profile  = (isset($_POST['profile']))?$_POST['profile']:'';
		$nombre   = (isset($_POST['nombre']))?$_POST['nombre']:'';
		$des      = (isset($_POST['des']))?$_POST['des']:'';
		$puesto   = (isset($_POST['puesto']))?$_POST['puesto']:'';
		$empresa  = (isset($_POST['empresa']))?$_POST['empresa']:'';
		$tel      = (isset($_POST['tel']))?$_POST['tel']:'';
		$tel_ofi  = (isset($_POST['tel_ofi']))?$_POST['tel_ofi']:'';
		$cell     = (isset($_POST['cell']))?$_POST['cell']:'';
		$email    = (isset($_POST['email']))?$_POST['email']:'';
		$web      = (isset($_POST['cover']))?$_POST['web']:'';
		$fb       = (isset($_POST['fb']))?$_POST['fb']:'';
		$tw       = (isset($_POST['tw']))?$_POST['tw']:'';
		$lk       = (isset($_POST['lk']))?$_POST['lk']:'';
		$ins      = (isset($_POST['ins']))?$_POST['ins']:'';
		$f_create = (isset($_POST['f_create']))?$_POST['f_create']:'';
		$f_update = (isset($_POST['f_update']))?$_POST['f_update']:'';
		$vcard    = (isset($_POST['vcard']))?$_POST['vcard']:'';
		$user     = (isset($_POST['user']))?$_POST['user']:'';
		$visible  = (isset($_POST['visible']))?$_POST['visible']:'';
	
$c=0;
html_iso_servicios($nombre);
	if($nombre=='' || $visible==''){
		$error = "  *El campo esta vacio.\\n\\r"; $c++; 
	}
	if($nombre=='' && $visible==''){
		$error = "  *Los campos estan vacios.\\n\\r"; $c++; 
	}
	if($c > 0){
		$aviso='
			<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                <h4><i class="icon fa fa-ban"></i> Error!</h4>'.$error.'
			</div>
			';
	}else{
		if($action=='edit'){$edi='editado';
			$save=mysqli_query($mysqli,"UPDATE ".$DBprefix.$tabla." SET cover='{$cover}', profile='{$profile}', logo='{$logo}', nombre='{$nombre}', descripcion='{$des}', puesto='{$puesto}', empresa='{$empresa}', tel='{$tel}', tel_ofi='{$tel_ofi}', cell='{$cell}', email='{$email}', web='{$web}', fb='{$fb}', tw='{$tw}', lk='{$lk}', ins='{$ins}', f_update='{$f_update}', vcard='{$vcard}', user='{$user}', visible='{$visible}' WHERE ID='{$id}';") or print mysqli_error($mysqli);
		}else{$edi='agregado';
			$save=mysqli_query($mysqli,"INSERT INTO ".$DBprefix.$tabla." (cover,profile,logo,nombre,descripcion,puesto,empresa,tel,tel_ofi,cell,email,web,fb,tw,lk,ins,f_create,f_update,vcard,user,visible) VALUES ('{$cover}','{$profile}','{$logo}','{$nombre}','{$des}','{$puesto}','{$empresa}','{$tel}','{$tel_ofi}','{$cell}','{$email}','{$web}','{$fb}','{$tw}','{$lk}','{$ins}','{$f_create}','{$f_update}','{$vcard}','{$user}','{$visible}')") or print mysqli_error($mysqli);
		}	
		$URL=$page_url.'index.php?mod='.$mod.'&ext='.$ext.$cond_opc;	
		recargar(5,$URL,$target);
	}
	validar_aviso($save,'La Vcard se ha '.$edi.' correctamente','No se puedo guardar intentelo nuevamente',$aviso);

	if($save){
		//$path_f='../../../vcard/vcf_files/';
        $path_f='../vcf_files/';
		$nombre_archivo=$profile.'.vcf';
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
		crear_archivo($path_f,$nombre_archivo,$contenido,$path_file);
	}

	echo $aviso;

	  break;
	  case($action=='subir_cover'):
//if($_POST['Aceptar']){
if($cover==''){$cover='nodisponible1.jpg';}
$file='<input type="hidden" class="form-control" id="cover" name="cover" value="'.$cover.'">
<img src="'.$page_url.'modulos/'.$mod.'/assets/fotos/'.$cover.'" style="width:200px;" title="'.$cover.'">
<a href="javascript:up(1);">Cambiar Foto</a><div id="upload"></div>';

//datos del arhivo 
$repositor='../assets/fotos';
$nombre_archivo = $_FILES['userfile']['name']; 
$tipo_archivo = $_FILES['userfile']['type']; 
$tamano_archivo = $_FILES['userfile']['size']; 
$path_archivo = $repositor."/".$nombre_archivo;
//compruebo si las características del archivo son las que deseo 
	if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "png")) && ($tamano_archivo < 1000000))) { 
    	$file='<span style=" font-weight:bold; color:#f00;">El archivo NO ha sido aceptado.</span><br>'.$file;
	}else{ 
    	if (@move_uploaded_file($_FILES['userfile']['tmp_name'],$path_archivo)){
			$file='<input type="hidden" class="form-control" id="cover" name="cover" value="'.$nombre_archivo.'">
			<img src="'.$page_url.'modulos/'.$mod.'/assets/fotos/'.$nombre_archivo.'" style="width:200px;">
			<a href="javascript:up(1);">Cambiar Foto</a><div id="upload"></div>';
		}
		else{
			$file='<span style=" font-weight:bold; color:#f00;">Ocurrió algún error al subir el fichero. No pudo guardarse.</span><br>'.$file;
		}
	}
echo $file;
//unlink($URL);
//}
	  
	  break;
	  default:
	  
	$modo = (isset($_REQUEST['mode'])&& $_REQUEST['mode'] !=NULL)?$_REQUEST['mode']:'';
	if($modo == 'ajax'){$cond_opc=($opc!='')?'&opc='.$opc:'';
		//include ''; //incluir el archivo de paginación
		//las variables de paginación
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 8; //la cantidad de registros que desea mostrar		
		$adjacents  = 1; //brecha entre páginas después de varios adyacentes
		$offset = ($page - 1) * $per_page;
		//Cuenta el número total de filas de la tabla*/
		//$count_query=mysqli_query($mysqli,"SELECT count(*) AS numrows FROM tcer_productos ");
		//if($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}
		$sql=mysqli_query($mysqli,"SELECT * FROM ".$DBprefix.$tabla."") or print mysqli_error($mysqli);
		$numrows=mysqli_num_rows($sql);
		$total_pages = ceil($numrows/$per_page);
		$reload = 'index.php';$rep1=array('_','cion');$rep2=array(' ','ci&oacute;n');
		//consulta principal para recuperar los datos
		$sql=mysqli_query($mysqli,"SELECT * FROM ".$DBprefix.$tabla." ORDER BY ID LIMIT {$offset},{$per_page};") or print mysqli_error($mysqli);		
		if($numrows>0){$j=0;
			while($row=mysqli_fetch_array($sql)){$j++;
$id	= $row['ID'];
$cover=$row['cover'];
$logo=$row['logo'];
$profile=$row['profile'];
$nombre=$row['nombre'];
$puesto=$row['puesto'];
$empresa=$row['empresa'];
$visible = $row['visible'];
$logo=($logo!='')?$logo:'nodisponible.jpg';
$seleccion=($visible==0)?'<span style="color:#e00;"><i class="fa fa-close" title="Desactivado"></i></span>':'<span style="color:#0f0;"><i class="fa fa-check" title="Activo"></i></span>';
$activo=($visible==1)?'<span class="label label-success">Activo</span>':'<span class="label label-danger">Desactivado</span>';
				if($action=='listado' && !empty($action)){

$imagen=($cover!='')?'<td class="text-center"><img src="'.$page_url.'modulos/'.$mod.'/assets/fotos/'.$cover.'" alt="Product Image" class="img-rounded" width="60"></td>':'';
$listado.='
	<tr>
		<td class="text-center">'.$id.'</td>		
		<td class="text-center">'.$profile.'</td>
		<td class="text-center">'.$nombre.'</td>
		<td class="text-center">'.$puesto.'</td>
		<td class="text-center">'.$empresa.'</td>
		<td class="text-center">'.$activo.'</td>
		<td>
			<a href="'.$page_url.'index.php?mod='.$mod.'&ext=admin/index'.$cond_opc.'&form=1&action=edit&id='.$id.'" alt="Editar"><i class="fa fa-edit"></i></a> | 
			<a href="#" taskid="'.$id.'" class="task-delete" alt="Borrar"><i class="fa fa-trash"></i></a>

			<!--div class="btn-group pull-right">
				<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Acciones <span class="fa fa-caret-down"></span></button>
				<ul class="dropdown-menu">
					<li><a href="'.$page_url.'index.php?mod='.$mod.'&ext=admin/index'.$cond_opc.'&form=1&action=edit&id='.$id.'"><i class="fa fa-edit"></i> Editar</a></li>
					<li><a href="#" taskid="'.$id.'" class="task-delete"><i class="fa fa-trash"></i> Borrar</a></li>
				</ul>
			</div><!-- /btn-group -->
    	</td>
	</tr>';
					}else{
$listado.='
	<div class="col-md-3 col-xs-12">
		<div class="box box-primary">
			<div class="box-header with-border">
       			<h3 class="box-title">C&oacute;digo: <b>'.$profile.'</b></h3>
				<span class="controles">'.$seleccion.'
					<a href="'.$page_url.'index.php?mod='.$mod.'&ext=admin/index'.$cond_opc.'&form=1&action=edit&id='.$id.'" title="Editar"><i class="fa fa-edit"></i></a> | <a href="#" taskid="'.$id.'" class="task-delete" title="Borrar"><i class="fa fa-trash"></i></a>
				</span>
			</div>
			<div class="box-body">
				<div class="ima-size">
					<img src="'.$page_url.'modulos/'.$mod.'/assets/fotos/'.$cover.'" class="img-responsive ima-size">
				</div>
				<div id="title"><strong>'.$nombre.'</strong></div>	
			</div><!-- /.box-body -->
		</div>
	</div>';
	}
}//WHILE

			if($action=='listado' && !empty($action)){
?>
					<div class="box-body">                        
						<div class="table-responsive">
							<table class="table table-condensed table-hover table-striped ">
			 	 				<tbody>
								<tr>
									<th class="text-center">ID</th>
									<th class="text-center">Id.Profile</th>
									<th class="text-center">Nombre</th>
									<th class="text-center">Puesto</th>
									<th class="text-center">Empresa</th>
                                    <th class="text-center">Estado</th>
									<th>Acciones</th>
								</tr>
								<?php echo $listado;?>
								</tbody>
							</table>
						</div>	
					</div><!-- /.box-body -->
<?php			
			}else{echo '<div class="box-body">'.$listado.'</div>';}?>
					<div class="box-footer clearfix">				
					Mostrando <?php echo $ini=$id-($j-1);?> al <?php echo $id;?> de <?php echo $numrows;?> registros<?php echo paginate($reload, $page, $total_pages, $adjacents);?>					
					</div>
<?php 			
		}else{//$numrows
			echo '
			<div class="alert alert-warning alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4>Error</h4> No hay datos para mostrar.
            </div>';
		}
	}
	break;
	}			
  break;
}
?>