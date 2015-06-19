<?php
	$mensajeError = "";
	
	if (isset($_REQUEST['btn-login']) ) {
		$usuario = clean_post('usuario');
		$pass = secure_md5(clean_post('pass'));
		$error = true;
		
		//Obtenemos datos de usuario segun el login
		$datos_usuario = list_object("SELECT * FROM admin WHERE user='$usuario' AND pass='$pass'");
		$total = count($datos_usuario);
		
		if($total>0){
			$error = false;
			$_SESSION['admin_panel'] = $datos_usuario;
			
			location(_DOMINIO_."admin/");
		}
		else
			$mensajeError = "Usuario y/o contrase&ntilde;a incorrectos.";
	}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Administraci&oacute;n | <?=_TITULO_?></title>
	
	<!-- Meta -->
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
    
    <?php include('includes/header-js-css.php'); ?>
</head>

<body style="background: #F5F5F5;">
        <!-- Start Content -->
        <div class="login">	
            <div id="login">
                <img src="<?=_DOMINIO_?>admin/images/logo.png" alt="logo-panel"  />
                <br /><br />
                <form class="form-signin" method="post" action="">
                    <div class="widget widget-4">
                        <div class="widget-head">
                            <h4 class="heading">Administraci&oacute;n</h4>
                        </div>
                    </div>
                    <h2 class="glyphicons unlock form-signin-heading" style="text-align: left;"><i></i>Conectarse</h2>
                    <div class="uniformjs">
                        <input type="text" name="usuario" class="form-control input-block-level" placeholder="Usuario"> 
                        <input type="password" name="pass" class="form-control input-block-level" placeholder="Contrase&ntilde;a">
                        <input type="hidden" name="btn-login" value="y" /> 
                    </div>
                    <button class="btn btn-large btn-primary" type="submit">Entrar</button>
                </form>
                
                <div id="login-err" class="alert alert-error" style="max-width: 350px; margin: 0 auto; display: none;">
                    <img src="<?=_DOMINIO_?>admin/images/warning.png" alt="warning" align="absmiddle" />&nbsp;
                    <span><?=$mensajeError?></span>
                </div>
                
            </div>			
        </div>
</body>
</html>

<?php
	if(isset($_REQUEST['btn-login'])){
		if($error){
			?><script>showWithEffect('login-err', 'slideDown');</script><?php
			?><script>//$('#login-err').slideDown('slow');</script><?php
		}
	}
?>