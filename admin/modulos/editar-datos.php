    
    <?php	
	
		$id_panel = $_SESSION['admin_panel'][0]->id;
		$mensajeError = "";
	
		if(isset($_REQUEST['btn-editar-datos'])){
			$error = true;
			$nombre = $_REQUEST['nombre'];
			$usuario = $_REQUEST['usuario'];
			
			if($nombre != ''){
				if($usuario != ''){
					if(editar_datos_perfil($id_panel))
						$error = false;
					else
						$mensajeError = "No se actualiz&oacute; ning&uacute;n dato. Verifica haber modificado alg&uacute;n dato.";
				}
				else
					$mensajeError = "Debe indicar nombre de usuario";
			}
			else
				$mensajeError = "Debe indicar el nombre.";
		}
		
		//Obtenemos los datos del usuario
		$datos_usuario = get_admin_by_id($id_panel);
		$nombre = $datos_usuario[0]->nombre;
		$usuario = $datos_usuario[0]->user;
	?>
    
    <ul class="breadcrumb">
        <li><a href="<?=_DOMINIO_?>admin/" class="glyphicons home"> Inicio</a></li>
        <li class="divider"></li>
        <li>Perfil</li>
        <li class="divider"></li>
        <li>Editar datos</li>
    </ul>
    
    <div class="separator bottom"></div>

    <div class="heading-buttons">
        <h3 class="glyphicons edit"> Editar Datos</h3>
        <div class="buttons pull-right">
            <a href="javascript:void(0);" onclick="document.form_editar_datos.submit();" class="btn btn-default btn-icon glyphicons edit"> Guardar</a>
        </div>
        <div class="clearfix" style="clear: both;"></div>
    </div>
    
    <div class="separator bottom"></div>
    
    <div id="err" class="warning" style="margin: 10px;" ><img src="<?=_DOMINIO_?>admin/images/warning.png" alt="warning" align="absmiddle" />&nbsp;<span><?=$mensajeError?></span></div>
    <div id="ok" class="confirm" style="margin: 10px;" ><img src="<?=_DOMINIO_?>admin/images/ok.png" alt="ok" align="absmiddle" />&nbsp;<span>Datos editados correctamente.</span></div>
    
    <div class="separator bottom"></div>
    
    <div class="widget widget-2 widget-tabs widget-tabs-2">
        <div class="widget-head">
            <ul>
                <li class="active"><a class="glyphicons registration_mark" href="#" data-toggle="tab">Informaci&oacute;n de la cuenta</a></li>
            </ul>
        </div>
        
        <!-- Bloque que contiene el contenido de insercion -->
        <div class="widget-body">
            <form method="post" action="" name="form_editar_datos">
                <input type="hidden" name="btn-editar-datos" value="yes" />
                <div class="tab-pane active" id="webtab-information" style="display: block;">
                    <h3>Editar datos del panel.</h3>
                    
                    <table class="table-default">
                        <tr>
                            <td class="table-tit"><label for="nombre">Nombre</label></td>
                            <td><input type="text" name="nombre" id="nombre" value="<?=$nombre?>" placeholder="Nombre" class="col-md-12 form-control form_text" /></td>
                        </tr>
                        <tr>
                            <td class="table-tit">
                            	<label for="usuario_email">Usuario</label>
                                <span style="margin: 0;" class="btn-action single glyphicons circle_question_mark" data-toggle="tooltip" data-placement="top" data-original-title="Recordatorio: El usuario se usa para acceso al panel."><i></i></span>
                            </td>
                            <td><input type="text" name="usuario" id="usuario" value="<?=$usuario?>" placeholder="Introduce email" class="col-md-12 form-control form_text" /></td>
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
	if(isset($_REQUEST['btn-editar-datos'])){
		if($error){
			?><script>$('#err').slideDown('slow', function(){$('#err').css('display', 'block')});</script><?php
		}
		else{
			?><script>$('#ok').slideDown('slow', function(){$('#ok').css('display', 'block')});</script><?php
		}
	}
	?>