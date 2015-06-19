<?php

/* 
	Validate | Validación de formulario en rapidos pasos
*/

/*
$data_ejemplo = array(
	'function_ok' => 'guarda_datos',
	'error' => 'Ha ocurrido un error interno. Intente nuevamente',
	'method' => 'post',
	'data' => array(
		'nombre' => array( 
			'validacion' => 'no_vacio', 
			'mensaje_error' => 'El nombre no debe estar vacío.' 
		),
		'email' => array( 
			'validacion' => 'email', 
			'mensaje_error' => 'El email debe tener un formato correcto.' 
		),
		'numero' => array( 
			'validacion' => 'int', 
			'mensaje_error' => 'El nombre no debe estar vacío.' 
		),
		'telefono' => array( 
			'validacion' => false, 
			'mensaje_error' => '' 
		),
	)
);
*/

//Function que valida el form
function validate_form($data) {
	$function_ok = $data['function_ok'];
	$method =  $data['method'];
	$error_return =  $data['error_return'];
	$data = $data['data'];
	$new_data = array();
	foreach( $data as $k => $v ) {
		if ( ( $method == 'post' && isset($_POST[$k]) ) || ( $method == 'get' && isset($_GET[$k]) ) ) {
			
			//Validamos archivos
			if ( $v['validacion'] == 'archivo' ) {
				$name = $_FILES[$k];
				if ( $name['name'] != '' ) {
					if ( is_uploaded_file($name['tmp_name']) ) {
						$soportados = explode(',',$v['soportados']);
						$extension = extension_($name['name']);
						if ( in_array($extension,$soportados) ) {
							$maximo = $v['tamano_maximo'];
							$tamano = $name['size']*1024;
							if ( $tamano > $maximo ) {
								warning('El tamaño del archivo ['.$k.'] supera al permitido. Máximo '.$maximo.' KBs');
								return $error_return;			
							}
						}
						else {
							warning('Extension incorrecta en archivo ['.$k.']. Soportadas: '.$v['soportados'].'.');
							return $error_return;		
						}
					}
					else {
						warning('El archivo ['.$k.'] no se ha subido correctamente.');
						return $error_return;
					}
				}
			}
			else {
				//Valodamos variables normales
				if ( $method == 'post' ) {
					$valor = is_array($_POST[$k]) ? $_POST[$k] : clean_post($k);
				}
				else if ( $method == 'get' ) {
					$valor = is_array($_GET[$k]) ? $_GET[$k] : clean_get($k);		
				}
				$validacion = $v['validacion'];
				if ( $validacion ) {
					eval('$res = valid_'.$v['validacion'].'(\''.$valor.'\');');
					if ( $res ) {
						$new_data[$k] = $valor;	
					}
					else {
						warning($v['mensaje_error']);
						return $error_return;
					}
				}
				else {
					$new_data[$k] = $valor;	
				}
			}
		}
	}
	return $function_ok($new_data);
}

/*
	Functiones que conforman los tipos de validación
*/

//Comprueba si la cadena esta vacía o no
function valid_no_vacio($data) {
	return $data == '' ? false : true;		
}

//Valida el formato de un email
function valid_email($data) {
	return preg_match('/^[A-Za-z0-9-_.+%]+@[A-Za-z0-9-.]+\.[A-Za-z]{2,4}$/', $data) ? true : false;
}


//Valida si una variable es numerica o no
function valid_numero($data) {
	return is_numeric($data) == 1 ? true : false;			
}

//Valida un porcentaje
function valid_porcentaje($data) {
	return is_numeric($data) == 1 && $data >= 0 && $data <= 100 ? true : false;			
}

//Valida que no sea cero
function valid_no_cero($data) {
	return $data == 0 ? false : true;			
}


//Valida si una variable es int o no
function valid_int($data) {
	return is_numeric($data) == 1 ? true : false;			
}

//Valida si una cadena es amigable o no
function valid_amigable($data) {
	return $data == '' ? false : true;			
}

//Validamos contrasena
function valid_pass($data) {
	if(strlen($data) < 6){
      return false;
   }
   if(strlen($data) > 16){
      return false;
   }
   if (!preg_match('`[a-zA-Z]`',$data)){
      return false;
   }
   if (!preg_match('`[0-9]`',$data)){
      return false;
   }
   	
   return true;
}

function valid_pass2($data) {
	if ( $data == clean_post('pass') ) {
		return true;
	}
	else {
		return false;	
	}
}


/*
	Demas funciones de formulario
*/

function get_value($edit,$name,$data='') {
	if ( isset($_POST[$name]) ) {
		return clean_post($name);	
	}
	else {
		if ( $edit ) {
			return $data->$name;	
		}
		else {
			return '';
		}
	}	
}

function get_selected($edit,$name,$data,$value) {
	if ( isset($_POST[$name]) ) {
		return clean_post($name) == $value ? 'selected="selected"' : '';	
	}
	else {
		if ( $edit ) {
			return $data->$name == $value ? 'selected="selected"' : '';	
		}
		else {
			return '';
		}
	}	
}

function get_checked($edit,$name,$data,$value) {
	if ( isset($_POST[$name]) ) {
		return clean_post($name) == $value ? 'checked="checked"' : '';	
	}
	else {
		if ( $edit ) {
			return $data->$name == $value ? 'checked="checked"' : '';	
		}
		else {
			return '';
		}
	}	
}

?>