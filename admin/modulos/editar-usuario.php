	
    <?php
		//Variables default
		$mensajeError = "";
		$mensajeConfirm = "";
	
		//Comprobamos si edito los datos.
		if(isset($_REQUEST['btn-editar-usuario'])){
			$error = true;
			$nombre_usuario = $_REQUEST['usuario_nombre'];
			$email_usuario = $_REQUEST['usuario_email'];
			$password = $_REQUEST['usuario_password'];
			$password_repetida = $_REQUEST['usuario_password_repetida'];
			
			if($nombre_usuario != ""){
				if($email_usuario != "" && check_mail($email_usuario)){
					if(comprobar_email_disponible($email_usuario, $id_usuario)){
						if($password != ""){
							if($password == $password_repetida){
								if(strlen($password) >= 6){
									if(editar_usuario($id_usuario)){
										$error = false;
										$mensajeConfirm = "El usuario ha sido actualizado.";
									}
									else
										$mensajeError = "No se actualiz&oacute; el usuario. Verifique haber modificado alg&uacute;n dato.";
								}
								else
									$mensajeError = "Para mayor seguridad, la contrase&ntilde;a ha de tener como m&iacute;nimo 6 caracteres.";
							}
							else
								$mensajeError = "Las contrase&ntilde;as introducidas no coinciden.";
						}
						else{
							if(editar_usuario($id_usuario)){
								$error = false;
								$mensajeConfirm = "El usuario ha sido actualizado.";
							}
							else
								$mensajeError = "No se actualiz&oacute; el usuario. Verifique haber modificado alg&uacute;n dato.";
						}
					}
					else
						$mensajeError = "La direcci&oacute;n de correo <strong>$email_usuario</strong> est&aacute; siendo utilizada.";
				}
				else
					$mensajeError = "Debe indicar una direcci&oacute;n de correo v&aacute;lida.";
			}
			else
				$mensajeError = "Debe indicar el nombre y los apellidos del usuario.";
		}
	
		//Obtenemos el id del usuario y por tanto los datos del usuario.
		$datos_usuario = get_users_by_id($id_usuario); // El id de usuario se obtiene de la pagina gestionar-usuarios.php, antes de incluir.
		$nombre_usuario = $datos_usuario[0]->nombre;
		$email_usuario = $datos_usuario[0]->email;
		$telefono_usuario = $datos_usuario[0]->telefono;
		$password = "";
		$password_repetida = "";
	?>
    
    <ul class="breadcrumb">
        <li><a href="<?=_DOMINIO_?>admin/" class="glyphicons home"> Inicio</a></li>
        <li class="divider"></li>
        <li>Usuarios</li>
        <li class="divider"></li>
        <li><a href="<?=_DOMINIO_?>admin/usuarios/gestionar-usuarios/">Gestionar usuarios</a></li>
        <li class="divider"></li>
        <li>Editando usuario</li>
    </ul>
    
    <div class="separator bottom"></div>

    <div class="heading-buttons">
        <h3 class="glyphicons edit"> Editando usuario</h3>
        <div class="buttons pull-right">
            <a href="javascript:void(0);" onclick="document.form_editar_usuario.submit();" class="btn btn-default btn-icon glyphicons edit"> Guardar</a>
        </div>
        <div class="buttons pull-right">
            <a href="<?=_DOMINIO_?>admin/usuarios/gestionar-usuarios/" class="btn btn-default btn-icon glyphicons left_arrow"> Volver</a>
        </div>
        <div class="clearfix" style="clear: both;"></div>
    </div>
    
    <div class="separator bottom"></div>
    
    <div id="err" class="alert alert-error" style="margin: 0 1% 10px 1%; display: none;" ><img src="<?=_DOMINIO_?>admin/images/warning.png" alt="warning" align="absmiddle" />&nbsp;<span><?=$mensajeError?></span></div>
    <div id="ok" class="alert alert-success" style="margin: 0 1% 10px 1%; display: none;" ><img src="<?=_DOMINIO_?>admin/images/ok.png" alt="ok" align="absmiddle" />&nbsp;<span><?=$mensajeConfirm?></span></div>
    
    <div class="separator bottom"></div>
    
    <div class="widget widget-2 widget-tabs widget-tabs-2">
        <div class="widget-head">
            <ul>
                <li class="active"><a class="glyphicons registration_mark" href="#" data-toggle="tab">Informaci&oacute;n del usuario</a></li>
            </ul>
        </div>
        
        <!-- Bloque que contiene el contenido de insercion -->
        <div class="widget-body">
            <form method="post" action="" name="form_editar_usuario">
                <input type="hidden" name="btn-editar-usuario" value="yes" />
                <input type="hidden" name="editar" value="<?=$id_usuario?>" /><!-- id de usuario para mantenernos en este include -->
                <div class="tab-pane active" id="webtab-information" style="display: block;">
                    <h3>Editando datos de: <?=$nombre_usuario?></h3>
                    
                    <table class="table-default">
                        <tr>
                            <td class="table-tit"><label for="usuario_nombre">Nombre</label></td>
                            <td><input type="text" name="usuario_nombre" id="usuario_nombre" value="<?=$nombre_usuario?>" placeholder="Nombre y apellidos" class="col-md-12 form-control form_text" /></td>
                        </tr>
                        <tr>
                            <td class="table-tit">
                            	<label for="usuario_email">Email</label>
                                <span style="margin: 0;" class="btn-action single glyphicons circle_question_mark" data-toggle="tooltip" data-placement="top" data-original-title="Se utilizar&aacute; el correo electr&oacute;nico como acceso al panel."><i></i></span>
                            </td>
                            <td><input type="text" name="usuario_email" id="usuario_email" value="<?=$email_usuario?>" placeholder="Introduce email" class="col-md-12 form-control form_text" /></td>
                        </tr>
                        <tr>
                            <td class="table-tit">
                            	<label for="usuario_telefono">Tel&eacute;fono</label>
                            </td>
                            <td><input type="text" name="usuario_telefono" id="usuario_telefono" value="<?=$telefono_usuario?>" placeholder="Introduce tel&eacute;fono" class="col-md-12 form-control form_text" /></td>
                        </tr>
                        <tr>
                            <td class="table-tit">
                            	<label for="usuario_password">Contrase&ntilde;a</label>
                                <span style="margin: 0; cursor: pointer;" onclick="changeType('usuario_password', 'usuario_password_repetida', 'icon_btn_mostrar');" id="icon_btn_mostrar" class="btn-action single glyphicons eye_open" data-toggle="tooltip" data-placement="top" data-original-title="Click para mostrar/ocultar contrase&ntilde;as."><i></i></span>
                            </td>
                            <td><input type="password" name="usuario_password" id="usuario_password" value="<?=$password?>" placeholder="Introduce contrase&ntilde;a" class="col-md-12 form-control form_text" /></td>
                        </tr>
                        <tr>
                            <td class="table-tit"><label for="usuario_password_repetida">Repite contrase&ntilde;a</label></td>
                            <td><input type="password" name="usuario_password_repetida" id="usuario_password_repetida" value="<?=$password_repetida?>" placeholder="Repite la contrase&ntilde;a" class="col-md-12 form-control form_text" /></td>
                        </tr>
                    </table>
                    <div class="clearfix" style="clear: both;"></div><!-- Clear both -->
                   	<div id="overview" style="height: 100px;"></div> <!-- Height 40 -->
                </div>
      		</form>
      	</div>
  	</div>
    
    <?php
	//Comprobamos si hay error para mostrar el mensaje
	if(isset($_REQUEST['btn-editar-usuario'])){
		if($error){
			?><script>showWithEffect('err', 'slideDown');</script><?php
		}
		else{
			?><script>showWithEffect('ok', 'slideDown');</script><?php
		}
	}
	?>