<?php open_page_form2($formh,$formf);?>
<?php echo $formh;?>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Login</h3>
                        </div>
                        <div class="panel-body">
                            <form name="login" role="form" method="POST" action="<?php echo $page_url;?>admin/">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Usuario" name="username" type="text" required autocomplete="off" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" name="password" type="password" required autocomplete="off">
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input name="remember" type="checkbox" value="Recordarme">Recordarme
                                        </label>
                                    </div>
                                    <!-- Change this to a button or input when using this as a form -->
                                    <input type="submit" class="btn btn-lg btn-success btn-block" id="sesion" name="sesion" value="Ingresar">
                                    <!--a href="#" class="btn btn-lg btn-success btn-block">Ingrese</a-->
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
<?php echo $formf;?>