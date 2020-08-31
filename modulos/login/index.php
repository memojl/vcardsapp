<!--?php include '../../admin/conexion.php';?-->
<!DOCTYPE html>
<html lang="es-MX">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Login - <?php echo $page_name;?></title>
        <!-- LINK-ICON -->
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo $page_url;?>favicon.ico">
        <link rel="icon" type="image/x-icon" href="<?php echo $page_url;?>favicon.ico">

        <!-- Bootstrap Core CSS -->
        <link href="<?php echo $page_url.'modulos/usuarios/panel/';?>css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="<?php echo $page_url.'modulos/usuarios/panel/';?>css/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?php echo $page_url.'modulos/usuarios/panel/';?>css/startmin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="<?php echo $page_url.'modulos/usuarios/panel/';?>css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Login</h3>
                        </div>
                        <div class="panel-body">
                            <form role="form">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input name="remember" type="checkbox" value="Recordarme">Recordarme
                                        </label>
                                    </div>
                                    <!-- Change this to a button or input when using this as a form -->
                                    <a href="#" class="btn btn-lg btn-success btn-block">Ingrese</a>
                                </fieldset>
                            </form>
                        </div>
                        <div class="panel-footer text-center">
                            <a href="<?php echo $page_url;?>">Inicio</a> | <a href="#">Recuperar Contrase&ntilde;a</a><br>
                            No tiene una cuenta registrese <a href="<?php echo $page_url;?>usuarios/registro/">aqu&iacute;.</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery -->
        <script src="<?php echo $page_url.'modulos/usuarios/panel/';?>js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo $page_url.'modulos/usuarios/panel/';?>js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="<?php echo $page_url.'modulos/usuarios/panel/';?>js/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="<?php echo $page_url.'modulos/usuarios/panel/';?>js/startmin.js"></script>

    </body>
</html>
