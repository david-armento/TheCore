<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php metatags() ?>
        <link type="text/css" rel="stylesheet" href="<?=_DOMINIO_?>css/style.css" />
        <link type="text/css" rel="stylesheet" href="<?=_DOMINIO_?>js/facebox.css" />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js" type="text/javascript"></script>
        <script language="javascript" src="<?=_DOMINIO_?>js/funks.js"></script>
    	<?php //load_facebox('.facebox'); ?>
        <?php //load_lightbox('.lightbox'); ?>

        <!-- Bootstrap core CSS -->
        <link href="<?=_DOMINIO_?>common/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Bootstrap theme -->
        <link href="<?=_DOMINIO_?>common/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
    	<!-- Header -->
    	<header>
        	<div id="header">
                <div class="wrapper">
                    
                </div>
            </div>
        </header>
        
        <!-- Nav -->
        <nav>
        	<div id="nav">
            	<div class="wrapper">
                
                </div>
            </div>
        </nav>
        
        <!-- Section -->
        <section>
        	<div id="section">
            	<div class="wrapper">
                	<?php get_front_module() ?>
                </div>
            </div>
        </section>
        
        <!-- Footer -->
        <footer>
        	<div id="footer">
            	<div class="wrapper">
                
                </div>
            </div>
        </footer>
    </body>
</html>