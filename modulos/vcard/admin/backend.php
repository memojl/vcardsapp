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
        $query="SELECT ID,profile,cover,logo,nombre,visible FROM ".$DBprefix.$tabla." WHERE nombre LIKE '%{$q}%'";
    }else{$query="SELECT * FROM ".$DBprefix.$tabla."";}
    ws_query($query,1,0);
  break;
  case($action=='form_id'):
    if(isset($_POST['id'])){ $id=$_POST['id'];
      $query="SELECT * FROM ".$DBprefix.$tabla." WHERE ID='{$id}';";
      ws_query($query,1,0);
    }
  break;
  case($action=='delete'):
    if(isset($_POST['id'])){ $id=$_POST['id'];
      $sql=mysqli_query($mysqli,"DELETE FROM ".$DBprefix.$tabla." WHERE ID='{$id}';") or print mysqli_error($mysqli);
      echo 'El registro '.$id.' ha sido eliminado';  
    }
  break;
  case($action=='edit' || $action=='add'):
    $id=$_POST['ID'];
    $cover=$_POST['cover'];
    $logo=$_POST['logo'];
    $profile=$_POST['profile'];
    $nombre=$_POST['nombre'];
    $des=$_POST['des'];
    $puesto=$_POST['puesto'];
    $empresa=$_POST['empresa'];
    $tel=$_POST['tel'];
    $tel_ofi=$_POST['tel_ofi'];
    $cell=$_POST['cell'];
    $email=$_POST['email'];
    $web=$_POST['web'];
    $fb=$_POST['fb'];
    $tw=$_POST['tw'];
    $lk=$_POST['lk'];
    $ins=$_POST['ins'];
    $f_create=$_POST['f_create'];
    $f_update=$_POST['f_update'];
    $vcard=$_POST['vcard'];
    $user=$_POST['user'];
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
			$save=mysqli_query($mysqli,"UPDATE ".$DBprefix.$tabla." SET cover='{$cover}', profile='{$profile}', logo='{$logo}', nombre='{$nombre}', descripcion='{$des}', puesto='{$puesto}', empresa='{$empresa}', tel='{$tel}', tel_ofi='{$tel_ofi}', cell='{$cell}', email='{$email}', web='{$web}', fb='{$fb}', tw='{$tw}', lk='{$lk}', ins='{$ins}', f_update='{$f_update}', vcard='{$vcard}', user='{$user}', visible='{$visible}' WHERE ID='{$id}';") or print mysqli_error($mysqli);
		}else{$edi='agregado';
			$save=mysqli_query($mysqli,"INSERT INTO ".$DBprefix.$tabla." (cover,profile,logo,nombre,descripcion,puesto,empresa,tel,tel_ofi,cell,email,web,fb,tw,lk,ins,f_create,f_update,vcard,user,visible) VALUES ('{$cover}','{$profile}','{$logo}','{$nombre}','{$des}','{$puesto}','{$empresa}','{$tel}','{$tel_ofi}','{$cell}','{$email}','{$web}','{$fb}','{$tw}','{$lk}','{$ins}','{$f_create}','{$f_update}','{$vcard}','{$user}','{$visible}')") or print mysqli_error($mysqli);
		}	
	}
	validar_aviso($save,'La Vcard se ha '.$edi.' correctamente.','No se puedo guardar intentelo nuevamente.',$aviso);
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