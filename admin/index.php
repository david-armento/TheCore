<?php

include('../core/core.php');

open_bd();

// Comprobamos desconexión antes de redirigir.
if(isset($_REQUEST['logoff']) && $_REQUEST['logoff']){
	logout_panel();
	
	?>
		<script>
            window.location ="<?=_DOMINIO_?>admin/";
        </script>
    <?php
}

if ( isset($_SESSION['admin_panel']) ) {
	include(_PATH_.'admin/layout/default.php');
}
else {
	include(_PATH_.'admin/layout/login.php');
}

close_bd();
?>