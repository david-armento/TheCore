<?php

//Configuracion de metatags

function metatags() {
	
	//Default
	$title = _TITULO_;
	$keywords = _TITULO_;
	$description = _TITULO_;
	
	if ( isset($_GET['mod']) ) {
		
		$mod = ucfirst(str_replace('-',' ',clean_get('mod')));
		
		$title = $mod.' - '.$title;
		$keywords = $mod.' - '.$keywords;
		$description = $mod.' - '.$description;
	}
	
	?>
    <title><?=$title?></title>
    <meta http-equiv="keywords" content="<?=$keywords?>" />
    <meta http-equiv="description" content="<?=$description?>" />
    <?php	
}

?>
