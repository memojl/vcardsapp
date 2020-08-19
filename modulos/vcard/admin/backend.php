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
      //echo 'La tarea ha sido borrada '.$id;  
    }
  break;
  case($action=='listado'):
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
            query_all_tabla_vcard($th,$tabla,$url_api,'');
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
          query_all_tabla_vcard($th,$tabla,$url_api,'');
    echo '
        </tbody>
      </table>
    </div>	
  </div><!-- /.box-body -->';
  break;
}