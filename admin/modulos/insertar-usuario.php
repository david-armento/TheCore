    
    <?php
		$nombre_usuario = "";
		$usuario_usuario = "";
		$password = "";
		$password_repetida = "";
		$mensajeError = "";
	
		if(isset($_REQUEST['btn-crear-usuario'])){
			$error = true;
			$nombre_usuario = $_REQUEST['usuario_nombre'];
			$usuario_usuario = $_REQUEST['usuario_usuario'];
			$password = $_REQUEST['usuario_password'];
			$password_repetida = $_REQUEST['usuario_password_repetida'];
			
			if($nombre_usuario != ""){
				if($usuario_usuario != ""){
					if(($password == $password_repetida) && $password != ""){
						$error = false;
						//insert_usuario();
						
						//Reseteamos variables
						$nombre_usuario = "";
						$usuario_usuario = "";
						$password = "";
						$password_repetida = "";
					}
					else
						$mensajeError = "Las contrase&ntilde;as no coinciden. Y no pueden estar vacias";
				}
				else
					$mensajeError = "Debe indicar nombre de usuario";
			}
			else
				$mensajeError = "Debe indicar el nombre y los apellidos del usuario.";
		}
	?>
    
    <ul class="breadcrumb">
        <li><a href="<?=_DOMINIO_?>admin/" class="glyphicons home"> Inicio</a></li>
        <li class="divider"></li>
        <li>Usuarios</li>
        <li class="divider"></li>
        <li>Crear usuario</li>
    </ul>
    
    <div class="separator bottom"></div>

    <div class="heading-buttons">
        <h3 class="glyphicons user_add"> Crear Usuario</h3>
        <div class="buttons pull-right">
            <a href="javascript:void(0);" onclick="document.form_crear_usuario.submit();" class="btn btn-default btn-icon glyphicons plus"> Crear usuario</a>
        </div>
        <div class="clearfix" style="clear: both;"></div>
    </div>
    
    <div class="separator bottom"></div>
    
    <div id="err-add" class="warning" style="margin: 10px;" ><img src="<?=_DOMINIO_?>admin/images/warning.png" alt="warning" align="absmiddle" />&nbsp;<span><?=$mensajeError?></span></div>
    <div id="ok-add" class="confirm" style="margin: 10px;" ><img src="<?=_DOMINIO_?>admin/images/ok.png" alt="ok" align="absmiddle" />&nbsp;<span>Usuario creado correctamente.</span></div>
    
    <div class="separator bottom"></div>
    
    <div class="widget widget-2 widget-tabs widget-tabs-2">
        <div class="widget-head">
            <ul>
                <li class="active"><a class="glyphicons registration_mark" href="#" data-toggle="tab">Informaci&oacute;n del usuario</a></li>
            </ul>
        </div>
        
        <!-- Bloque que contiene el contenido de insercion -->
        <div class="widget-body">
            <form method="post" action="" name="form_crear_usuario">
                <input type="hidden" name="btn-crear-usuario" value="yes" />
                <div class="tab-pane active" id="webtab-information" style="display: block;">
                    <h3>Creando nuevo usuario</h3>
                    
                    <table class="table-default">
                        <tr>
                            <td class="table-tit"><label for="usuario_nombre">Nombre</label></td>
                            <td><input type="text" name="usuario_nombre" id="usuario_nombre" value="<?=$nombre_usuario?>" placeholder="Nombre y apellidos" class="col-md-12 form-control form_text" /></td>
                        </tr>
                        <tr>
                            <td class="table-tit">
                            	<label for="usuario_email">Usuario</label>
                                <span style="margin: 0;" class="btn-action single glyphicons circle_question_mark" data-toggle="tooltip" data-placement="top" data-original-title="Se utilizar&aacute; el usuario como acceso."><i></i></span>
                            </td>
                            <td><input type="text" name="usuario_usuario" id="usuario_usuario" value="<?=$usuario_usuario?>" placeholder="Introduce nombre usuario" class="col-md-12 form-control form_text" /></td>
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
                        <tr>
                            <td class="table-tit"><label for="propietario">Selecciona provincia</label></td>
                            <td>
                                <select style="width: 100%;" id="select2_4" name="usuario_local">
                                    <option value="0" selected="selected">Selecciona provincia</option>
                                    <option value='2'>Álava</option>
                                    <option value='3'>Albacete</option>
                                    <option value='4'>Alicante/Alacant</option>
                                    <option value='5'>Almería</option>
                                    <option value='6'>Asturias</option>
                                    <option value='7'>Ávila</option>
                                    <option value='8'>Badajoz</option>
                                    <option value='9'>Barcelona</option>
                                    <option value='10'>Burgos</option>
                                    <option value='11'>Cáceres</option>
                                    <option value='12'>Cádiz</option>
                                    <option value='13'>Cantabria</option>
                                    <option value='14'>Castellón/Castelló</option>
                                    <option value='15'>Ceuta</option>
                                    <option value='16'>Ciudad Real</option>
                                    <option value='17'>Córdoba</option>
                                    <option value='18'>Cuenca</option>
                                    <option value='19'>Girona</option>
                                    <option value='20'>Las Palmas</option>
                                    <option value='21'>Granada</option>
                                    <option value='22'>Guadalajara</option>
                                    <option value='23'>Guipúzcoa</option>
                                    <option value='24'>Huelva</option>
                                    <option value='25'>Huesca</option>
                                    <option value='26'>Illes Balears</option>
                                    <option value='27'>Jaén</option>
                                    <option value='28'>A Coruña</option>
                                    <option value='29'>La Rioja</option>
                                    <option value='30'>León</option>
                                    <option value='31'>Lleida</option>
                                    <option value='32'>Lugo</option>
                                    <option value='33'>Madrid</option>
                                    <option value='34'>Málaga</option>
                                    <option value='35'>Melilla</option>
                                    <option value='36'>Murcia</option>
                                    <option value='37'>Navarra</option>
                                    <option value='38'>Ourense</option>
                                    <option value='39'>Palencia</option>
                                    <option value='40'>Pontevedra</option>
                                    <option value='41'>Salamanca</option>
                                    <option value='42'>Segovia</option>
                                    <option value='43'>Sevilla</option>
                                    <option value='44'>Soria</option>
                                    <option value='45'>Tarragona</option>
                                    <option value='46'>Santa Cruz de Tenerife</option>
                                    <option value='47'>Teruel</option>
                                    <option value='48'>Toledo</option>
                                    <option value='49'>Valencia/Valéncia</option>
                                    <option value='50'>Valladolid</option>
                                    <option value='51'>Vizcaya</option>
                                    <option value='52'>Zamora</option>
                                    <option value='53'>Zaragoza</option>
                            	</select>
                            </td>
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
	if(isset($_REQUEST['btn-crear-usuario'])){
		if($error){
			?><script>showWithEffect('err-add', 'slideDown');</script><?php
		}
		else{
			?><script>showWithEffect('ok-add', 'slideDown');</script><?php
		}
	}
	?>