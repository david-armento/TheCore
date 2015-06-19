<?php

/*
	Utilidades de seguridad
*/

/* Encriptación segura */
function secure_md5($val)
{
	$val = md5($val);
	$val = $val._SECURITY_TOKEN_.$val._SECURITY_TOKEN_.$val;
	$val = md5($val);
	$val = md5($val);
	return $val;
}

/* Encripta */
function en__($v)
{
	return base64_encode( base64_encode( base64_encode($v) ) );	
}

/* Desencripta */
function de__($v)
{
	return base64_decode( base64_decode( base64_decode($v) ) );			
}

function clean_int($var) {
	return (int)$var;		
}

function clean_post($var) {
	if ( isset($_POST[$var]) ) {
		return trim( addslashes( strip_tags( $_POST[$var] )));	
	}
	else { 
		return false;
	}
}

function clean_session($var) {
	return trim( addslashes( strip_tags( $_SESSION[$var] )));		
}

function clean_get($var) {
	if ( isset($_GET[$var]) ) {
		return trim( addslashes( strip_tags( $_GET[$var] )));
	}
	else { 
		return false;
	}		
}

function is_home() {
	if ( isset($_GET['mod']) )
		return false;	
	else
		return true;	
}

?>