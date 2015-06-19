<?php

/*
	SQL Motor || Dudas: david.armento@gmail.com
*/


/* Abrimos conexion */
function open_bd() {
	$GLOBALS['conn'] = c_();	
}

/* Cerramos conexion */
function close_bd() {
	if ( isset($GLOBALS['conn']) ) {
		mysqli_close($GLOBALS['conn']);
		unset($GLOBALS['conn']);	
	}
}

/* Conexion */
function c_() {
	$link = new mysqli(_BD_HOST_, _BD_USER_, _BD_PASS_) or die ("Ups! Error conectando a la base de datos.");
	$link->select_db(_BD_NAME_) or die("Error seleccionando la base de datos.");
	return $link;
}

/* Ejecuta una consulta */
function query($sql) {
	if ( isset($GLOBALS['conn']) ) {
		$l = $GLOBALS['conn'];
		$q = $l->query($sql) or warning(mysqli_error($l));
		return $q;
	}
	else {
		return false;
	}
}

/* Devuelve array con datos encontrados, o bien el dato en concreto, si lo conocemos */
function fetch_array($sql,$query='') {
	$q = query($sql);
	$r = mysqli_fetch_array($q);
	if ( $query != '' ) {
		return $r[$query];
	}
	else {
		return $r;			
	}
}

/* Devuelve un listado con objetos */
function list_object($sql) {
	$q = query($sql);
	$cant = $q->num_rows;
	$lista = array();
	for ( $i=0; $i<$cant; $i++ ) {
		$lista[$i] = $q->fetch_object();	
	}
	return $lista;
}

/* Cuenta filas */
function num_rows($sql) {
	$q = query($sql);
	return $q->num_rows;
}

/* Inserta */
function insert($table,$array) {	
	$names = '';
	$values = '';
	foreach( $array as $key => $val ) {
		$names .= $key.',';	
		$values .= ( $val == 'SYSDATE()' ) ? 'SYSDATE(),' : '"'.$val.'",';	
	}
	$names = substr($names,0,strlen($names)-1);
	$values = substr($values,0,strlen($values)-1);
	$sql = 'INSERT INTO '.$table.' ('.$names.') VALUES ('.$values.')';
	return query($sql);
}

/* Actualiza */
function update($table,$array,$where) {	
	$names = '';
	foreach( $array as $key => $val ) {
		$value = ( $val == 'SYSDATE()' ) ? 'SYSDATE(), ' : '"'.$val.'", ';
		$names .= $key.'='.$value;	
	}
	$names = substr($names,0,strlen($names)-2);
	$sql = 'UPDATE '.$table.' SET '.$names.' WHERE '.$where;
	return query($sql);
}
?>