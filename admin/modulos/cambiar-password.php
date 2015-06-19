    
    <?php	
		$id_panel = $_SESSION['admin_panel'][0]->id;
	
		if(isset($_REQUEST['btn-cambiar-password'])){
			
			//Datos del usuario para comprara la contrasenya actual
			$datos = get_admin_by_id($id_panel);
			$pass_almacenada = $datos[0]->pass;
		
			$error = true;
			$pass_actual = secure_md5($_REQUEST['usuario_password_actual']);
			$pass_nueva = $_REQUEST['usuario_password_nueva'];
			$pass_rep = $_REQUEST['usuario_password_repetida'];
			
			if($pass_actual == $pass_almacenada){
				if($pass_nueva == $pass_rep){
					if($pass_nueva != ""){
						if(strlen($pass_nueva) >= 6){
							$error = false;
							cambiar_adminPass($id_panel);
						}
						else
							$mensajeError = "Para mayor seguridad, la contrase&ntilde;a ha de tener como m&iacute;nimo 6 caracteres.";
					}
					else
						$mensajeError = "La contrase&ntilde;a nueva no puede estar vacia";
				}
				else
					$mensajeError = "Las contrase&ntilde;as introducidas no coinciden.";
			}
			else
				$mensajeError = "La contrase&ntilde;a actual no coincide con la almacenada en el sistema.";
		}
	?>
    
    <ul class="breadcrumb">
        <li><a href="<?=_DOMINIO_?>admin/" class="glyphicons home"> Inicio</a></li>
        <li class="divider"></li>
        <li>Perfil</li>
        <li class="divider"></li>
        <li>Cambiar contrase&ntilde;a</li>
    </ul>
    
    <div class="separator bottom"></div>

    <div class="heading-buttons">
        <h3 class="glyphicons rotation_lock"> Cambiar Contrase&ntilde;a</h3>
        <div class="buttons pull-right">
            <a href="javascript:void(0);" onclick="document.form_cambiar_password.submit();" class="btn btn-default btn-icon glyphicons edit"> Guardar</a>
        </div>
        <div class="clearfix" style="clear: both;"></div>
    </div>
    
    <div class="separator bottom"></div>
    
    <div id="err" class="warning" style="margin: 10px;" ><img src="<?=_DOMINIO_?>admin/images/warning.png" alt="warning" align="absmiddle" />&nbsp;<span><?=(isset($_REQUEST['btn-cambiar-password'])) ? $mensajeError : ''?></span></div>
    <div id="ok" class="confirm" style="margin: 10px;" ><img src="<?=_DOMINIO_?>admin/images/ok.png" alt="ok" align="absmiddle" />&nbsp;<span>Contrase&ntilde;a actualizada. El cambio se ver&aacute; reflejado en su pr&oacute;ximo inicio de sesi&oacute;n</span></div>
    
    <div class="separator bottom"></div>
    
    <div class="widget widget-2 widget-tabs widget-tabs-2">
        <div class="widget-head">
            <ul>
                <li class="active"><a class="glyphicons registration_mark" href="#" data-toggle="tab">Cambiar contrase&ntilde;a de la cuenta</a></li>
            </ul>
        </div>
        
        <!-- Bloque que contiene el contenido de insercion -->
        <div class="widget-body">
            <form method="post" action="" name="form_cambiar_password">
                <input type="hidden" name="btn-cambiar-password" value="yes" />
                <div class="tab-pane active" id="webtab-information" style="display: block;">
                    <h3>Actualiza la contrase&ntilde;a</h3>
                    
                    <table class="table-default">
                        <tr>
                            <td class="table-tit"><label for="usuario_password_actual">Contrase&ntilde;a actual</label></td>
                            <td><input type="password" name="usuario_password_actual" id="usuario_password_actual" value="" placeholder="Introduce la contrase&ntilde;a actual" class="col-md-12 form-control form_text" /></td>
                        </tr>
                        <tr>
                            <td class="table-tit">
                            	<label for="usuario_password_nueva">Contrase&ntilde;a nueva</label>
                                <span style="margin: 0; cursor: pointer;" onclick="changeType('usuario_password_nueva', 'usuario_password_repetida', 'icon_btn_mostrar');" id="icon_btn_mostrar" class="btn-action single glyphicons eye_open" data-toggle="tooltip" data-placement="top" data-original-title="Click para mostrar/ocultar contrase&ntilde;as."><i></i></span>
                            </td>
                            <td><input type="password" name="usuario_password_nueva" id="usuario_password_nueva" value="" placeholder="Introduce la nueva contrase&ntilde;a" class="col-md-12 form-control form_text" /></td>
                        </tr>
                        <tr>
                            <td class="table-tit">
                            	<label for="usuario_password_repetida">Repite contrase&ntilde;a</label>
                            </td>
                            <td><input type="password" name="usuario_password_repetida" id="usuario_password_repetida" value="" placeholder="Repite la nueva contrase&ntilde;a" class="col-md-12 form-control form_text" /></td>
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
	if(isset($_REQUEST['btn-cambiar-password'])){
		if($error){
			?><script>showWithEffect('err', 'slideDown');</script><?php
		}
		else{
			?><script>showWithEffect('ok', 'slideDown');</script><?php
		}
	}
	?>