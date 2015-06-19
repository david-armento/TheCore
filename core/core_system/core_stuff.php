<?php

/*
	Utilidades
*/

/* Encode UTF-8 */
function u8_($var) {
	return utf8_encode($var);
}

/* Decode UTF-8 */
function u8d_($var) {
	return utf8_decode($var);
}

/* Formatea fecha */
function fecha($input) {
	$input = explode(' ',$input);
	$input = explode('-',$input[0]);
	$input = $input[2].'/'.$input[1].'/'.$input[0];
	return $input;
}

/* Devuelve la extension de un archivo */
function extension_($file) {
	$ext = explode('.',$file);
	$ext = $ext[count($ext)-1];
	return strtolower($ext);	
}

function comemelaaaaaaaaaa(){
	echo "comemelaaaaaaaaaa";
}

/* URLs amigables */

function amigable($var) {  	  
    $wrong = array('á', 'é', 'í', 'ó', 'ú', 'ñ', 'Á', 'É', 'Í', 'Ó', 'Ú', 'Ñ', 'ç', 'ü');  
    $right = array('a', 'e' ,'i', 'o', 'u', 'n', 'A', 'E', 'I', 'O', 'U', 'N', 'c', 'u');  
    $var = str_replace($wrong, $right, $var);  
    $var = strtolower($var);  
    $var = preg_replace("/[^a-z0-9]+/", "-", $var);
    $var = trim($var, '-'); 
	return $var;  
}  

//Limita caracteres y añade puntos suspensivos
function limita($c,$v) {
	echo strlen($v) > $c ? substr($v,0,$c).'...' : $v;	
}

//Redireccion javascript
function location($url) {
	?>
    <script language="javascript">
		document.location='<?=$url?>';
	</script>
    <?php	
}

//Cargamos Facebox
function load_facebox($element) {
	?>
    <link rel="stylesheet" href="<?=_DOMINIO_?>js/facebox/facebox.css" />
    <script language="javascript" src="<?=_DOMINIO_?>js/facebox/facebox.js"></script>
    <script language="javascript" src="<?=_DOMINIO_?>js/facebox/sombraNegra.js"></script>
    <script>
		$(document).ready(function() {
        	$('<?=$element?>').facebox({
				loadingImage : '<?=_DOMINIO_?>js/facebox/img/loading.gif',
      			closeImage   : '<?=_DOMINIO_?>js/facebox/img/closelabel.gif',		
			});  
        });
	</script>
    <?php
}

//Cargamos Lightbox
function load_lightbox($element) {
	?>
    <link rel="stylesheet" href="<?=_DOMINIO_?>js/lightbox/lightbox.css" />
    <script language="javascript" src="<?=_DOMINIO_?>js/lightbox/lightbox.js"></script>
    <script>
		$(document).ready(function() {
        	$('<?=$element?>').lightBox({
				imageLoading:  '<?=_DOMINIO_?>js/lightbox/images/loading.gif',		
				imageBtnPrev:  '<?=_DOMINIO_?>js/lightbox/images/prevlabel.gif',	
				imageBtnNext:  '<?=_DOMINIO_?>js/lightbox/images/nextlabel.gif',			
				imageBtnClose: '<?=_DOMINIO_?>js/lightbox/images/closelabel.gif',
				imageBlank:    '<?=_DOMINIO_?>js/lightbox/images/bullet.gif',
			});  
        });
	</script>
    <?php
}	

?>