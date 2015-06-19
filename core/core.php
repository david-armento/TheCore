<?php

session_start();

/* 
	Configuración 
	-------------------------------------------------------------------------
*/

date_default_timezone_set('Europe/Madrid');

/*Titulo */
define( '_TITULO_', '');
define('_FOLDER_','thecore/');


/* Conección a la base de datos */
define( '_BD_NAME_', 'nombrebasedatos');
define( '_BD_HOST_', 'localhost');
define( '_BD_USER_', 'root');
define( '_BD_PASS_', '');


/* Configuracion de correo */
define( '_RECEPTOR_','' ); //Cuenta de correo principal, quien recibira los emails de contacto
define( '_SMTP_SERVER_','' );
define( '_SMTP_USER_','' );
define( '_SMTP_PASSWORD_','' );
define( '_SMTP_PORT_','25' );


/* Seguridad */
define('_SECURITY_TOKEN_','trabajaparami2014'); //Aleatorio, cambiar en cada proyecto pero no volver a cambiarlo porque desestabilizaría las contraseñas del proyecto.
define( '_DEBUG_', true);



/*  --  DON'T TOUCH ANYTHING -- */



define('_DOMINIO_','http://'.$_SERVER['SERVER_NAME'].'/'._FOLDER_);
define( '_ADMIN_',_DOMINIO_.'admin/');
define( '_IMG_',_DOMINIO_.'img/');

define( '_PATH_', str_replace(DIRECTORY_SEPARATOR.'core',DIRECTORY_SEPARATOR,dirname(__FILE__)));

if ( _DEBUG_ ) { ini_set("display_errors", 1); } else { ini_set("display_errors", 0); }

define('system_folder','core_system');
define('module_folder','core_funks');

$directorio = opendir(_PATH_.'core'.DIRECTORY_SEPARATOR.system_folder);
while ( $archivo = readdir($directorio) ) {
	if ( $archivo != '..' ) {
		if (!is_dir($archivo)) {
			require _PATH_.'core'.DIRECTORY_SEPARATOR.system_folder.DIRECTORY_SEPARATOR.$archivo;
		}
	}
}
$directorio = opendir(_PATH_.'core'.DIRECTORY_SEPARATOR.module_folder);
while ( $archivo = readdir($directorio) ) {
	if ( $archivo != '..' ) {
		if (!is_dir($archivo)) {
			require _PATH_.'core'.DIRECTORY_SEPARATOR.module_folder.DIRECTORY_SEPARATOR.$archivo;
		}
	}
}


?>