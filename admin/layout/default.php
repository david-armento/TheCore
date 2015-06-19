<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Administraci&oacute;n | <?=_TITULO_?></title>
	
	<!-- Meta -->
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	
	<?php include('includes/header-js-css.php'); ?>
</head>

<body>
	
<!-- Empieza el contenido -->
<div class="first-container container fluid">
    
    <?php include('includes/header.php'); ?>
		
	<div id="wrapper">
		<div id="menu" class="hidden-sm hidden-print">
			<div id="menuInner">
				<!-- Scrollable menu wrapper with Maximum height -->
				<div class="slim-scroll" >
                    <ul>
                    	<li class="heading"><span>General</span></li>
                        
							<!--Ejemplo Menu Simple-->
							<li class="glyphicons show_big_thumbnails <?=(!isset($_REQUEST['m'])) ? 'active' : ''?>"><a href="<?=_DOMINIO_?>admin/"><span>Inicio</span></a></li>
							
							<!--Ejemplo Menu Submenu-->
							<li class="hasSubmenu <?=($_REQUEST['m'] == 'usuarios') ? 'active' : ''?>">
								<a data-toggle="collapse" class="glyphicons group" href="#menu_usuarios"><span>Usuarios</span></a>
								<ul class="menuCollapse" id="menu_usuarios">
									<li><a href="<?=_DOMINIO_?>admin/usuarios/gestionar-usuarios/"><span>Gestionar usuarios</span></a></li>
									<li><a href="<?=_DOMINIO_?>admin/usuarios/insertar-usuario/"><span>Crear usuarios</span></a></li>
								</ul>
							</li>
							
							<!--Otro Ejemplo Menu Submenu-->
							<li class="hasSubmenu <?=($_REQUEST['m'] == 'administracion') ? 'active' : ''?>">
								<a data-toggle="collapse" class="glyphicons cogwheels" href="#menu_administracion"><span>Administraci&oacute;n</span></a>
								<ul class="menuCollapse" id="menu_administracion">
									<li><a href="<?=_DOMINIO_?>admin/administracion/validar-actualizaciones/"><span>Opciones generales</span></a></li>
									<li><a href="<?=_DOMINIO_?>admin/administracion/listado-permisos/"><span>Redes sociales</span></a></li>
								</ul>
							</li>
                        
                    </ul>
                </div>
        	</div> <!-- // Nice Scroll Wrapper END -->	
   		</div>
        
		<div id="content">
            <?=_get_module_()?>		
        </div><!-- End Content -->
    </div><!-- End Wrapper -->
		
    <?php include('includes/footer.php'); ?>
    			
</div>
    
    <?php include('includes/footer-js-css.php'); ?>
    
</body>
</html>