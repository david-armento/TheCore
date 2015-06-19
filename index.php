<?php

//Incluimos nucleo
include('core/core.php');

//Abrimos base de datos
open_bd();

//Cargamos layout
include(_PATH_.'layout/default.php');

//Cerramos base de datos
close_bd();
?>