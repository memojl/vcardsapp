<?php
$perfil=$idp;
echo $bootstrap;
if($perfil!='' && $perfil!=NULL){
    
    include 'profile.html';
}else{
    echo '<div class="alert alert-danger"><b>Error 404:</b> Perfil No encontrado</div>';
}