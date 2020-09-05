<?php
//Poner condicional IF
include '../../admin/conexion.php';
open_page_form2($formh,$formf);
echo $formh;//open_page_form();
$username='';
$mod='forget';
log_visitas($username);


if($_POST['email']){
$email=$_POST['email'];
$sql=mysqli_query($mysqli,"SELECT * FROM ".$DBprefix."signup WHERE email='{$email}';") or print mysqli_error($mysqli);
$num_log=mysqli_num_rows($sql);
	if($num_log!=0){
		if($row=mysqli_fetch_array($sql)){
			$username=$row['username'];
			//$password=$row['password'];
			$email=$row['email'];
			$actualizacion=$row["actualizacion"];
		}
		$num_u = strlen($username);
		$n=$num_u+5;
		$password = substr($actualizacion,$n);
			/*Configuraciones de envio*
			ini_set('sendmail_from', 'webmaster@fibremex.com.mx');
			ini_set('SMTP','mail.fibremex.com.mx');
			ini_set('smtp_port',26);
			/*---*/
			$para=$email;
			$titulo=$page_name.' - Cambio de Password';
			$message = "<html><body style='font-family:Verdana, Geneva, sans-serif; font-size: 13px;'>".
						"<p>Recuperaci&oacute;n de Contrase&ntilde;a - Sistema PHPonix</p>".
						"<table style='font-family:Verdana, Geneva, sans-serif; font-size:13px;'>";
    		$message .= "<tr><td align='right' style='background-color: #eee;'>Usuario:</td><td style='background-color: #eee;'>".$username."</td></tr>";
    		$message .= "<tr><td align='right' style='background-color: #fff;'>Correo:</td><td style='background-color: #fff;'>".$email."</td></tr>";
    		$message .= "<tr><td align='right' style='background-color: #eee;'>Password:</td><td style='background-color: #eee;'>".$password."</td></tr>";
    		$message .="</table></body></html>";
			$header = "From: Sistema PHPONIX" . "\n";
  			$header .= 'MIME-Version: 1.0' . "\r\n";
    		$header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";		 
			
			mail($para,$titulo,$message,$header);
			
			echo '			
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<div class="login-panel panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Recuparaci&oacute;n de Contrase&ntilde;a</h3>
						</div>
						<div class="panel-body">
							Su contrase&ntilde;a se ha enviado a la cuenta de correo que nos proporciono. !Gracias!<br>
							<img src="'.$page_url.$path_tema.'images/loading.gif" width="50" height="50"><br>
							Redireccionando, espere por favor.<br>
						</div>
					</div>
				</div>
			</div>
		</div>			
			';
			$URL=$page_url.'login/';
			recargar($seg=5,$URL,$target);
			exit();
	}
	else{
		echo '<div class="alert alert-danger">El correo no se encuentra registrado.</div>';
	}
}
echo '
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Recuparaci&oacute;n de Contrase&ntilde;a</h3>
				</div>
				<div class="panel-body">
					<form name="form1" role="form" method="POST" action="'.$URL.'">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="*Ingrese su email" name="email" type="email" required autocomplete="off" autofocus>
							</div>
							<input type="submit" class="btn btn-lg btn-success btn-block" id="enviar" name="enviar" value="Enviar">
						</fieldset>
					</form>
				</div>
				<div class="panel-footer text-center">
					<a href="javascript:window.history.go(-1);">Regresar</a><br>
				</div>
			</div>
		</div>
	</div>
</div>
';
echo $formf;//close_page();
?>
