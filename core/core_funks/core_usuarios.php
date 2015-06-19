<?php

	/* 
		FUNCIONES SOBRE USUARIOS - FUNCTIONS ABOUT USERS	|| Por: Fernando Llopis	||
		--------------------------------------------------------------------------------------
	*/
	
	//Funcion que devuelve los datos de un usuario segun el id
	function get_users_by_id($id_usuario=""){
		if($id_usuario != "")
			return list_object("SELECT * FROM usuarios WHERE id_usuario = '$id_usuario'");
		else
			return list_object("SELECT * FROM usuarios ORDER BY id_usuario ASC");
	}
	
	//Funcion que inserta un usuario
	function insert_usuario(){
	}
	
	//Funcion que edita un usuario
	function editar_usuario($id_usuario){
	}
	
	//Funcion que elimina un usuario
	function eliminar_usuario($id_usuario){
	
		query("DELETE FROM usuarios WHERE id_usuario = '$id_usuario'");
		
		if(mysqli_affected_rows($GLOBALS['conn']) == 1) return true; else return false;
	}
	
	//Funcion que actualiza la contraseña
	function cambiar_password($id_usuario){
		$upd['password'] = secure_md5(clean_post('usuario_password_nueva'));
		
		update('usuarios', $upd, 'id_usuario = "'.$id_usuario.'"');
	}
	
	/* Funcion que genera una password nueva */
	function generar_nueva_password(){
		
		$cad = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
		$password = "";
		$totalCad = strlen($cad);
		
		for($i=0;$i<12;$i++) 
		{
			$password .= substr($cad,rand(0,$totalCad),1);
		}
		
		return $password;
	}
?>