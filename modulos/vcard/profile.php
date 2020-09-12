<?php
$perfil=$idp;
if($perfil!='' && $perfil!=NULL){
    $row=query_row($tabla='vcard',$campo='profile',$idp);
    $ID=$row['ID'];
    $cover=$row['cover'];
    $profile=$row['profile'];
    $nombre=$row['nombre'];
    $des=$row['descripcion'];
    $puesto=$row['puesto'];
    $empresa=$row['empresa'];
    $tel=$row['tel'];
    $tel_ofi=$row['tel_ofi'];
    $cell=$row['cell'];
    $email=$row['email'];
    $web=$row['web'];
    $fb=$row['fb'];
    $tw=$row['tw'];
    $lk=$row['lk'];
    $ins=$row['ins'];
    $visible=$row['visible'];
    include 'profile.html';
}else{
    echo $bootstrap;
    echo '<div class="alert alert-danger"><b>Error 404:</b> Perfil No encontrado</div>';
}