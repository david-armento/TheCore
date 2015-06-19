<!-- Carga de JS del FOOTER -->
<script src="<?=_DOMINIO_?>common/theme/scripts/plugins/system/jquery-ui-1.9.2.custom/js/jquery-ui-1.9.2.custom.min.js"></script><!-- JQueryUI v1.9.2 -->
<!-- JQueryUI Touch Punch --> <!-- small hack that enables the use of touch events on sites using the jQuery UI user interface library -->
<script src="<?=_DOMINIO_?>common/theme/scripts/plugins/system/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
<script src="<?=_DOMINIO_?>common/theme/scripts/plugins/color/jquery-miniColors/jquery.miniColors.js"></script> <!-- MiniColors -->
<script src="<?=_DOMINIO_?>common/theme/scripts/plugins/forms/select2/select2.js"></script> <!-- Select2 -->
<script src="<?=_DOMINIO_?>common/theme/scripts/plugins/other/jquery-slimScroll/jquery.slimscroll.min.js"></script> <!-- jQuery Slim Scroll Plugin -->
<script src="<?=_DOMINIO_?>common/theme/scripts/demo/common.js?1382104445"></script> <!-- Common Demo Script -->
<script src="<?=_DOMINIO_?>common/theme/scripts/plugins/other/holder/holder.js"></script> <!-- Holder Plugin -->
    <script>Holder.add_theme("dark", {background:"#000", foreground:"#aaa", size:9})</script>
<script src="<?=_DOMINIO_?>common/theme/scripts/demo/twitter.js"></script> <!-- Twitter Feed -->

<script src="<?=_DOMINIO_?>common/theme/scripts/plugins/system/jquery.cookie.js"></script>
<script src="<?=_DOMINIO_?>common/theme/scripts/demo/themer.js"></script>

<!-- Global -->
<script>

	alto_pantalla = $(window).height() - 42; // ¿Por que 42?. Es el tamanyo de la cabecera y al restarlo es lo que ocupa lo demas.
	$('#content').css('min-height', alto_pantalla);
	
	<!-- Colors -->
	var primaryColor = '#4a8bc2',
		dangerColor = '#b55151',
		successColor = '#609450',
		warningColor = '#ab7a4b',
		inverseColor = '#45484d';

	var basePath = '', commonPath = '../common/';
	var themerPrimaryColor = '#DA4C4C';
	
	// charts data
	charts_data = {
		
		// 24 hours
		graph24hours: {
			from: 1381874400000,
			to: 1381960800000			},
	
		// 7 days
		graph7days: {
			from: 1381356000000,
			to: 1381960800000			},
	
		// 14 days
		graph14days: {
			from: 1380751200000,
			to: 1381960800000			},
	
		// main dashboard graph - website traffic
		website_traffic: {
			d1: [[1379455200000, 2960],[1379541600000, 2248],[1379628000000, 2085],[1379714400000, 2132],[1379800800000, 3477],[1379887200000, 2142],[1379973600000, 2326],[1380060000000, 3963],[1380146400000, 2206],[1380232800000, 3920],[1380319200000, 3329],[1380405600000, 2722],[1380492000000, 2741],[1380578400000, 3869],[1380664800000, 3008],[1380751200000, 2190],[1380837600000, 2062],[1380924000000, 3574],[1381010400000, 2177],[1381096800000, 3811],[1381183200000, 2584],[1381269600000, 3984],[1381356000000, 2435],[1381442400000, 2615],[1381528800000, 3727],[1381615200000, 2563],[1381701600000, 3614],[1381788000000, 3502],[1381874400000, 2506],[1381960800000, 3063]],
			d2: [[1379455200000, 647],[1379541600000, 605],[1379628000000, 459],[1379714400000, 435],[1379800800000, 593],[1379887200000, 582],[1379973600000, 533],[1380060000000, 683],[1380146400000, 437],[1380232800000, 471],[1380319200000, 622],[1380405600000, 462],[1380492000000, 651],[1380578400000, 435],[1380664800000, 427],[1380751200000, 692],[1380837600000, 434],[1380924000000, 522],[1381010400000, 470],[1381096800000, 679],[1381183200000, 572],[1381269600000, 652],[1381356000000, 646],[1381442400000, 649],[1381528800000, 470],[1381615200000, 666],[1381701600000, 662],[1381788000000, 565],[1381874400000, 455],[1381960800000, 404]]	
		}
	
	};

</script>

<!-- Custom Script para Elementos de Formulario -->
<script src="<?=_DOMINIO_?>common/theme/scripts/demo/form_elements.js" type="text/javascript"></script>
<script src="<?=_DOMINIO_?>common/theme/scripts/plugins/color/farbtastic/farbtastic.js" type="text/javascript"></script><!-- ColorPicker -->

<!-- Dashboard Custom Script -->
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script src="<?=_DOMINIO_?>common/theme/scripts/plugins/charts/sparkline/jquery.sparkline.js" type="text/javascript"></script><!-- Sparkline -->
<script src="<?=_DOMINIO_?>common/theme/scripts/plugins/charts/flot/jquery.flot.js" type="text/javascript"></script> <!--  Flot (Charts) JS -->
<script src="<?=_DOMINIO_?>common/theme/scripts/plugins/charts/flot/jquery.flot.pie.js" type="text/javascript"></script> <!--  Flot (Charts) JS -->
<script src="<?=_DOMINIO_?>common/theme/scripts/plugins/charts/flot/jquery.flot.tooltip.js" type="text/javascript"></script> <!--  Flot (Charts) JS -->
<script src="<?=_DOMINIO_?>common/theme/scripts/plugins/charts/flot/jquery.flot.selection.js"></script> <!--  Flot (Charts) JS -->
<script src="<?=_DOMINIO_?>common/theme/scripts/plugins/charts/flot/jquery.flot.resize.js" type="text/javascript"></script> <!--  Flot (Charts) JS -->
<script src="<?=_DOMINIO_?>common/theme/scripts/plugins/charts/flot/jquery.flot.orderBars.js" type="text/javascript"></script> <!--  Flot (Charts) JS -->
<script src="<?=_DOMINIO_?>common/theme/scripts/demo/charts.helper.js?1382104445"></script><!-- Charts Helper Demo Script -->
<script src="<?=_DOMINIO_?>common/theme/scripts/plugins/other/jquery.ba-resize.js"></script><!-- Resize Script -->
<script src="<?=_DOMINIO_?>common/theme/scripts/plugins/forms/pixelmatrix-uniform/jquery.uniform.min.js"></script> <!-- Uniform -->
<script src="<?=_DOMINIO_?>common/bootstrap/js/bootstrap.min.js"></script> <!-- Bootstrap Script -->
<script src="<?=_DOMINIO_?>common/bootstrap/extend/bootstrap-select/bootstrap-select.js"></script> <!-- Bootstrap Extended -->
<script src="<?=_DOMINIO_?>common/bootstrap/extend/bootstrap-switch/static/js/bootstrap-switch.min.js"></script>
<script src="<?=_DOMINIO_?>common/bootstrap/extend/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js"></script>
<script src="<?=_DOMINIO_?>common/bootstrap/extend/jasny-bootstrap/js/jasny-bootstrap.min.js" type="text/javascript"></script>
<script src="<?=_DOMINIO_?>common/bootstrap/extend/jasny-bootstrap/js/bootstrap-fileupload.js" type="text/javascript"></script>
<script src="<?=_DOMINIO_?>common/bootstrap/extend/bootbox.js" type="text/javascript"></script>

<script src="<?=_DOMINIO_?>common/bootstrap/extend/bootstrap-wysihtml5/js/wysihtml5-0.3.0_rc2.min.js" type="text/javascript"></script>
<script src=".<?=_DOMINIO_?>common/bootstrap/extend/bootstrap-wysihtml5/js/bootstrap-wysihtml5-0.0.2.js" type="text/javascript"></script>
<script src="<?=_DOMINIO_?>common/theme/scripts/demo/layout.js"></script><!-- Layout Options DEMO Script -->
<script src="<?=_DOMINIO_?>common/theme/scripts/plugins/other/google-code-prettify/prettify.js"></script><!-- google-code-prettify -->
<script src="<?=_DOMINIO_?>common/theme/scripts/plugins/notifications/Gritter/js/jquery.gritter.min.js"></script><!-- Gritter Notifications Plugin -->
<script type="text/javascript" src="<?=_DOMINIO_?>common/theme/scripts/plugins/notifications/notyfy/jquery.notyfy.js"></script><!-- Notyfy -->

<script>
//Load the Visualization API and the piechart package.
//google.load('visualization', '1.0', {'packages':['table', 'corechart']});

// Set a callback to run when the Google Visualization API is loaded.
//google.setOnLoadCallback(charts.traffic_sources_dataTables.init);
</script>