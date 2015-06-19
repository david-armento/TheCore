<?php

	/* 
		FUNCIONES SOBRE PANEL ADMIN - FUNCTIONS ABOUT ADMIN AREA	|| Por: Fernando Llopis	||
		--------------------------------------------------------------------------------------
	*/
	
	/*  ===============================================================================================	  */
	/* |							ADMINISTRAR USUARIOS ADMIN & MODULOS								| */
	/*  ===============================================================================================	  */
	
	/* Funcion que realiza un logout SOLO ADMIN. */
	function logout_panel(){
		unset($_SESSION['admin_panel']);
	}
	
	/* Funcion para gestionar los distintos MODULOS del panel de administracion */
	function _get_module_()
	{
	
		if(isset($_REQUEST['mod']))
			$modulo =  clean_get('mod');
		else
			$modulo = "";
			
		$array_modulos = array(
			'dashboard',
			'gestionar-usuarios',
			'insertar-usuario',
			'editar-datos',
			'cambiar-password'
		);	
		
		$default_module = $array_modulos[0];
		
		$load_module = ( in_array($modulo,$array_modulos) ) ? $modulo : $default_module ;
		
		include(_PATH_.'admin/modulos/'.$load_module.'.php');
	}
	
	//Incluye modulo actual en el fron end
	function get_front_module() {
		$m = isset($_GET['mod']) ? clean_get('mod') : 'inicio';
		if ( file_exists(_PATH_.'pages/'.$m.'.php') ) {
			require(_PATH_.'pages/'.$m.'.php');
		}
		else {
			require(_PATH_.'pages/404.php');		
		}
	}
	
	//Funcion login (sin inspeccionar FERNANDO)
	function login() {
		$user = clean_post($_SESSION['user_input']);
		$pass = secure_md5(clean_post($_SESSION['pass_input']));
		$sql = 'SELECT * FROM admin WHERE user="'.$user.'" AND pass="'.$pass.'"';
		if ( num_rows($sql) == 0 ) {
			echo 'Error';
		}
		else {
			$_SESSION['admid_panel'] = fetch_array($sql,'id');
			location(_ADMIN_);
		}	
	}
	
	function logoff_() {
		unset($_SESSION['admid_panel']);
		location(_ADMIN_);	
	}
	
	//Mensaje de error
	function warning($texto) {
		echo '<div class="warning"><img src="'._DOMINIO_.'img/warning.png" align="absmiddle"> '.$texto.'</div>';	
	}
	
	//Mensaje de confirmacion
	function confirm($texto) {
		echo '<div class="confirm"><img src="'._DOMINIO_.'img/ok.png" align="absmiddle"> '.$texto.'</div>';		
	}
	
	//Funcion que devuelve los datos de un usuario de panel
	function get_admin_by_id($id){
		return list_object("SELECT * FROM admin WHERE id = '$id'");
	}
	
	//Funcion que edita los datos del perfil de usuario
	function editar_datos_perfil($id){
		$upd['nombre'] = clean_post('nombre');
		$upd['user'] = clean_post('usuario');
		
		update('admin', $upd, 'id = "'.$id.'"');
		
		if(mysqli_affected_rows($GLOBALS['conn']) == 1) return true; else return false;
	}
	
	//Funcion que actualiza la contraseña
	function cambiar_adminPass($id){
		$upd['pass'] = secure_md5(clean_post('usuario_password_nueva'));
		
		update('admin', $upd, 'id = "'.$id.'"');
	}
	
?>