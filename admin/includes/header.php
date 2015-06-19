<?php
	$user_nombre = $_SESSION['admin_panel'][0]->nombre;
?>

<!-- HEADER -->
<div class="navbar main hidden-print">
    <a href="<?=_DOMINIO_?>admin/" class="appbrand"><span>TRABAJAPARAMI<span>Administraci&oacute;n</span></span></a>
    
    <button type="button" class="btn btn-navbar">
        <span class="glyphicons show_lines toggle"></span>
    </button>
    
    <!-- HEADER DERECHA -->
    <ul class="topnav pull-right">
    
    	<!-- Actualizaciones -->
        <li class="visible-lg">
            <ul class="notif">
            	<li><a href="#" class="glyphicons envelope" data-toggle="tooltip" data-placement="bottom" data-original-title="5 nuevos mensajes"> 5</a></li>
                <li><a href="#" class="glyphicons refresh" data-toggle="tooltip" data-placement="bottom" data-original-title="0 nuevas actualizaciones">0</a></li>
            </ul>
        </li>
        
        <!-- Acceso a la web directamente -->
        <li>
        	<a href="<?=_DOMINIO_?>" class="glyphicons link" data-toggle="tooltip" data-placement="bottom" data-original-title="Ir a <?=_TITULO_?>" target="_blank"><?=_TITULO_?></a>
        </li>
        
        <li class="account">
            <a data-toggle="dropdown" href="#" class="glyphicons logout lock"><span class="hidden-sm text"><?=$user_nombre?></span></a>
            <ul class="dropdown-menu pull-right">
                <li class="<?=($_REQUEST['mod'] == 'editar-datos') ? 'active' : '' ?>"><a href="<?=_DOMINIO_?>admin/perfil/editar-datos/" class="glyphicons edit">Editar datos</a></li>
                <li class="<?=($_REQUEST['mod'] == 'cambiar-password') ? 'active' : '' ?>"><a href="<?=_DOMINIO_?>admin/perfil/cambiar-password/" class="glyphicons lock">Cambiar contrase&ntilde;a</a></li>
                <li class="highlight profile"><a href="<?=_DOMINIO_?>admin/?logoff=true" style="text-align: center;" title="Desconectar de la Intranet">Desconectar</a></li>
            </ul>
        </li>
    </ul>					
</div>