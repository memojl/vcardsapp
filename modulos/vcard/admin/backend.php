<?php 
include '../../../admin/conexion.php';
include '../../../apps/dashboards/functions.php';
include 'functions.php';
//echo $bootstrap;
//echo $font_awesome;
$tabla='vcard';

switch(true){
  case($action=='subir_cover'):
    //if($_POST['Aceptar']){
    if($cover==''){$cover='nodisponible1.jpg';}
    $file=file_ima($cover);
    
    //datos del arhivo 
    $repositor='../fotos';
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
        $query="SELECT ID,profile,logo,nombre,visible FROM ".$DBprefix.$tabla." WHERE nombre LIKE '%{$q}%'";
    }else{$query="SELECT * FROM ".$DBprefix.$tabla."";}
    ws_query($query,1,0);
  break;
  case($action=='delete'):
    if(isset($_POST['id'])){ $id=$_POST['id'];
      $sql=mysqli_query($mysqli,"DELETE FROM ".$DBprefix.$tabla." WHERE ID='{$id}';") or print mysqli_error($mysqli);
      echo 'La tarea ha sido borrada '.$id;  
    }
  break;
  case($action=='edit' || $action=='add'):
    $id=$_POST['ID'];
    $cover=$_POST['cover'];
$logo=$_POST['logo'];
$profile=$_POST['profile'];
$nombre=$_POST['nombre'];
//$des=$_POST['descripcion'];
$puesto=$_POST['puesto'];
$empresa=$_POST['empresa'];
$cell=$_POST['cell'];
$email=$_POST['email'];
$web=$_POST['web'];
$lk=$_POST['lk'];
$ins=$_POST['ins'];
$visible=$_POST['visible'];
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
			$save=mysqli_query($mysqli,"UPDATE ".$DBprefix.$tabla." SET profile='{$profile}', logo='{$logo}', nombre='{$nombre}', puesto='{$puesto}', empresa='{$empresa}', cell='{$cell}', email='{$email}', web='{$web}', lk='{$lk}', ins='{$ins}', visible='{$visible}' WHERE ID='{$id}';") or print mysqli_error($mysqli);
		}else{$edi='agregado';
			$save=mysqli_query($mysqli,"INSERT INTO ".$DBprefix.$tabla." (profile,logo,nombre,puesto,empresa,cell,email,web,lk,ins,visible) VALUES ('{$profile}','{$logo}','{$nombre}','{$puesto}','{$empresa}','{$cell}','{$email}','{$web}','{$lk}','{$ins}','{$visible}')") or print mysqli_error($mysqli);
		}	
		$URL=$page_url.'index.php?mod='.$mod.'&ext='.$ext.$cond_opc;	
		recargar(5,$URL,$target);
	}
	validar_aviso($save,'La Vcard se ha '.$edi.' correctamente','No se puedo guardar intentelo nuevamente',$aviso);

	echo $aviso;

	break;
  case($action=='listado'):
    $th=array(
      'ID',
      'cover',
      'profile',
      'nombre',
      'puesto',
      'email',
      'empresa',
      'visible'
    );
      echo '<div class="box-body">                        
      <div class="table-responsive">
        <table class="table table-hover table-striped ">
          <tbody>';
            query_all_tabla_vcard($index='ID',$th,$tabla,$url_api,$crud=1);
      echo '
          </tbody>
        </table>
      </div>	
    </div><!-- /.box-body -->';
  break;
  default:
  $th=array(
    'ID',
    'cover',
    'profile',
    'nombre',
    'puesto',
    'email',
    'cell',
    'tel_ofi',
    'empresa',
    'web',
    'fb',
    'lk',
    'ins',
    'visible'
  );
    echo '<div class="box-body">                        
    <div class="table-responsive">
      <table class="table table-hover table-striped ">
        <tbody>';
          query_all_tabla_vcard($index='ID',$th,$tabla,$url_api,$crud=1);
    echo '
        </tbody>
      </table>
    </div>	
  </div><!-- /.box-body -->';
  break;
}