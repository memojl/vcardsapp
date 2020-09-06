<?php
  include '../../../admin/conexion.php';
  include '../../../apps/dashboards/functions.php';
  include 'functions.php';
  //echo $bootstrap;
  //echo $font_awesome;
  $tabla='vcard';
  
  switch(true){
    case($opc=='opcion'):
  
    break;		
    default:
   
  	switch(true){
  		  case($action=='subir_cover'):
  //if($_POST['Aceptar']){
    if($cover==''){$cover='nodisponible.jpg';}
    $file=file_ima($cover);
    
    //datos del arhivo 
    $repositor='../files/fotos';
    $nombre_archivo = $_FILES['userfile']['name']; 
    $tipo_archivo = $_FILES['userfile']['type']; 
    $tamano_archivo = $_FILES['userfile']['size']; 
    $path_archivo = $repositor."/".$nombre_archivo;
    //compruebo si las características del archivo son las que deseo 
      if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "png")) && ($tamano_archivo < 1000000))) { 
          $file='<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <b>Error:</b> El archivo NO ha sido aceptado.</div>'.$file;
      }else{ 
          if (@move_uploaded_file($_FILES['userfile']['tmp_name'],$path_archivo)){
          $file='<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <b>Correcto:</b> El archivo se subio correctamente.</div>'.file_ima($nombre_archivo);
        }
        else{
          $file='<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <b>Error:</b> Ocurri&oacute; alg&uacute;n error al subir el fichero. No pudo guardarse.</div>'.$file;
        }
      }
    echo $file;    
  	  break;  
  	  case($action=='buscar'):
  		$q=$_POST['q'];
  		if(!empty($q)){
    			$query="SELECT ID,cover,profile,nombre,puesto,empresa,email,visible FROM ".$DBprefix.$tabla." WHERE nombre LIKE '%{$q}%'";
  		}else{$query="SELECT * FROM ".$DBprefix.$tabla."";}
    		ws_query($query,1,0);
  	  break;
  	  case($action=='delete'):
  		if(isset($_POST['id'])){ $id=$_POST['id'];
  			$sql=mysqli_query($mysqli,"DELETE FROM ".$DBprefix.$tabla." WHERE ID='{$id}';") or print mysqli_error($mysqli);
  			echo 'El registro '.$id.' ha sido eliminado';
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
  	echo $aviso;

if($save){
  //$path_f='../../../vcard/files/vcf';
  $path_f='../files/vcf/';
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
  
  	  break;
  	  default:
  	  
  	$modo = (isset($_REQUEST['mode'])&& $_REQUEST['mode']!=NULL)?$_REQUEST['mode']:'';
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
				$id       = $row['ID'];
				$cover    = $row['cover'];
				$logo     = $row['logo'];
				$profile  = $row['profile'];
				$nombre   = $row['nombre'];
				$des      = $row['descripcion'];
				$puesto   = $row['puesto'];
				$empresa  = $row['empresa'];
				$tel      = $row['tel'];
				$tel_ofi  = $row['tel_ofi'];
				$cell     = $row['cell'];
				$email    = $row['email'];
				$web      = $row['web'];
				$fb       = $row['fb'];
				$tw       = $row['tw'];
				$lk       = $row['lk'];
				$ins      = $row['ins'];
				$f_create = $row['f_create'];
				$f_update = $row['f_update'];
				$vcard    = $row['vcard'];
				$user     = $row['user'];
				$visible  = $row['visible'];
  //$cover=($cover!='')?$cover:'nodisponible.jpg';
  $seleccion=($visible==0)?'<span style="color:#e00;"><i class="fa fa-close" title="Desactivado"></i></span>':'<span style="color:#0f0;"><i class="fa fa-check" title="Activo"></i></span>';
  $activo=($visible==1)?'<span class="label label-success">Activo</span>':'<span class="label label-danger">Desactivado</span>';
  				if($action=='listado' && !empty($action)){
  
  $imagen=($cover!='')?'<div class="circle-image2" style="background: url('.$page_url.'modulos/'.$mod.'/files/fotos/'.$cover.');background-repeat: no-repeat; background-position:center; background-size: cover;"></div>':'';
  $listado.='
  	<tr id="'.$id.'">
	  	<td class="text-center">
	 		<!-- btn-group -->
	  		<div class="btn-group">
		  		<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Acciones <span class="fa fa-caret-down"></span></button>
		  		<ul class="dropdown-menu" id="'.$id.'">
			  		<li><a href="'.$page_url.'index.php?mod='.$mod.'&ext=admin/index'.$cond_opc.'&form=1&action=edit&id='.$id.'"><i class="fa fa-edit"></i> Editar</a></li>
			  		<li><a class="btn-delete" alt="Borrar" style="cursor:pointer;"><i class="fa fa-trash"></i> Borrar</a></li>
		  		</ul>
			</div>
	 		<!-- /btn-group -->
  	  	</td>
	  	<td class="text-center">'.$id.'</td>		
  		<td class="text-left">'.$imagen.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$profile.'</td>
  		<td class="text-center">'.$nombre.'</td>
  		<td class="text-center">'.$puesto.'</td>
  		<td class="text-center">'.$empresa.'</td>
  		<td class="text-center">'.$activo.'</td>
  	</tr>';
  					}else{
  $listado.='
  	<div class="col-md-3 col-xs-12">
  		<div class="box box-primary">
  			<div class="box-header with-border">
         		<h6 class="box-title">Perfil: <b>'.$profile.'</b></h6>  				
  			</div>
  			<div class="box-body">
				<div class="ima-size">
					<div class="circle-image" style="background: url('.$page_url.'modulos/'.$mod.'/files/fotos/'.$cover.');background-repeat: no-repeat; background-position:center; background-size: cover;"></div>	
  					<!--img src="'.$page_url.'modulos/'.$mod.'/files/fotos/'.$cover.'" class="img-responsive ima-size img-rounded"-->
  				</div>
  				<div id="title" class="text-center"><strong>'.$nombre.'</strong></div>	
			</div><!-- /.box-body -->
			<div class="box-footer text-right" id="'.$id.'">
				<span class="controles">'.$seleccion.'
  					<a href="'.$page_url.'index.php?mod='.$mod.'&ext=admin/index'.$cond_opc.'&form=1&action=edit&id='.$id.'" title="Editar"><i class="fa fa-edit"></i></a> | <span class="btn-delete" title="Borrar" style="cursor:pointer;"><i class="fa fa-trash"></i></span>
  				</span>
			</div>
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
		  <th class="text-center">Acciones</th>
          <th class="text-center">ID</th>
          <th class="text-center">Id.Profile</th>
          <th class="text-center">Nombre</th>
          <th class="text-center">Puesto</th>
          <th class="text-center">Empresa</th>
          <th class="text-center">Estado</th>
        </tr>
        <?php echo $listado;?>
      </tbody>
    </table>
  </div>
</div>
<!-- /.box-body -->
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