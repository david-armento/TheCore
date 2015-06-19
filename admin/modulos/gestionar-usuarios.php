	<?php
	
	$mensajeError = "";
	$mensajeConfirm = "";
	
	if(isset($_REQUEST['eliminar'])){
		$id_usuario = $_REQUEST['eliminar'];
		$error = false;
		$mensajeConfirm = "Usuario eliminado correctamente.";
	}
	?>
    
    <ul class="breadcrumb">
        <li><a href="<?=_DOMINIO_?>admin/" class="glyphicons home"> Inicio</a></li>
        <li class="divider"></li>
        <li>Usuarios</li>
        <li class="divider"></li>
        <li>Gestionar usuarios</li>
    </ul>
    
    <div class="separator bottom"></div>

    <div class="heading-buttons">
        <h3 class="glyphicons group"> Gesti&oacute;n de usuarios</h3>
        <div class="clearfix" style="clear: both;"></div>
    </div>
    
    <div class="separator bottom"></div>
    
    <div id="err" class="warning" style="margin: 10px;" ><img src="<?=_DOMINIO_?>admin/images/warning.png" alt="warning" align="absmiddle" />&nbsp;<span><?=$mensajeError?></span></div>
    <div id="ok" class="confirm" style="margin: 10px;" ><img src="<?=_DOMINIO_?>admin/images/ok.png" alt="ok" align="absmiddle" />&nbsp;<span><?=$mensajeConfirm?></span></div>
    
    <div class="separator bottom"></div>
    
    <?php
	
        //Nuevo listado
        $list = new listado;
        
        //Configuramos ordenes
        $list->default_order_by = 'id_usuario';
        $list->default_order_type = 'ASC';
        
        //Sentencia SQL
        $list->sql = "SELECT * FROM usuarios";
        
        //Limite
        $list->limit = 15;
        
        //Datos del listado
        $list->data = array(
            'id' => array(
                'data' => '{id_usuario}',
                'css' => 'width: 5%; float: left; text-align:center; overflow: hidden;',
                'css_header' => 'width: 5%; float: left; overflow: hidden;',
                'order_by' => 'id_usuario',
            ),
            'Nombre' => array(
                'data' => '{nombre}',
                'css' => 'width:25%; float: left; overflow: hidden;',
                'css_header' => 'width: 25%; float: left; overflow: hidden;',
                'order_by' => 'nombre',
            ),
            'Email' => array(
                'data' => '{email}',
                'css' => 'width:20%; float: left; overflow: hidden;',
                'css_header' => 'width: 20%; float: left; overflow: hidden;',
                'order_by' => 'email',
            ),
            'Opciones' => array(
                'data' => '
                            <form name="form_edit_{id_usuario}" method="post"><input type="hidden" name="editar" value="{id_usuario}" /></form>
                            <form name="form_del_{id_usuario}" id="form_del_{id_usuario}" method="post"><input type="hidden" name="eliminar" value="{id_usuario}" /></form>
                            <a class="btn-action glyphicons pencil btn-success" href="javascript:document.form_edit_{id_usuario}.submit();" title="Editar datos del usuario"></a>
                            <a class="btn-action glyphicons remove_2 btn-danger" href="javascript:void(0)" onclick="confirmarAccion(\'\u00BFDesea eliminar al usuario?\', \'form_del_{id_usuario}\');" title="Eliminar usuario"></a>
                            ',
                'css' => 'width: 50%; float: right; text-align: right; overflow:hidde;',
                'css_header' => 'width: 50%; float: left; overflow: hidden; text-align: right;',
            ),
        );
        
        //Configuramos buscador
        $list->search_fields = array(
            'Nombre' => 'nombre',
            'Email' => 'email',
        );
        
        //Configuramos filtros
        $list->filters = array(
            'Estado:' => array(
                'Activada' => " AND cuenta_activa = 1 ",
                'Desactivada' => " AND cuenta_activa = 0",
            ),
        );
        
        //Estilos y configuraciones del listado
        $list->even_row = '#fff';
        $list->odd_row = '#EFEFEF';
        $list->found_text = 'usuarios encontrados';
        $list->not_found_text = 'No se han encontrado usuarios';
        $list->info_class = 'info_class';
        $list->header_css_class = 'header_list';
        $list->body_css_class = 'body_list';
        $list->search_css_class = 'search_list';
        $list->filter_css_class = 'filter_list';
        $list->paginator_css_class = 'paginator_list';
        
        //Mostramos buscador
        $list->searchBox();
        
        //Mostramos filtros
        $list->filters();
        
        echo '<br clear="all" />';
        
        //Generamos el listado
        $list->listener();
    ?>
    
    <div class="separator bottom"></div>
    <div class="separator bottom"></div>
    
    <?php
		if(isset($_REQUEST['eliminar'])){
			if($error){
                ?><script>showWithEffect('err', 'slideDown');</script><?php
            }
            else{
                ?><script>showWithEffect('ok', 'slideDown');</script><?php
            }
		}
	?>