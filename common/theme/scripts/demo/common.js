/* ==========================================================
 * AdminPlus v3.0
 * common.js
 * 
 * http://www.mosaicpro.biz
 * Copyright MosaicPro
 *
 * Built exclusively for sale @Envato Marketplaces
 * ========================================================== */ 

function genSparklines()
{
	if ($('.sparkline').length)
	{
		$.each($('.sparkline'), function(k,v) 
		{
			var data = [[1, 3+charts.utility.randNum()], [2, 5+charts.utility.randNum()], [3, 8+charts.utility.randNum()], [4, 11+charts.utility.randNum()],[5, 14+charts.utility.randNum()],[6, 17+charts.utility.randNum()],[7, 20+charts.utility.randNum()], [8, 15+charts.utility.randNum()], [9, 18+charts.utility.randNum()], [10, 22+charts.utility.randNum()]];
		 	$(v).sparkline(data, 
			{ 
				width: 100,
				height: 28,
				lineColor: themerPrimaryColor,
				fillColor: '#fafafa',
				spotColor: '#467e8c',
				maxSpotColor: '#9FC569',
				minSpotColor: '#ED7A53',
				spotRadius: 3,
				lineWidth: 2
			});
		});
	}
}

$(function()
{
	// menu slim scroll max height
	setTimeout(function()
	{
		var menu_max_height = parseInt($('#menu .slim-scroll').attr('data-scroll-height'));
		var menu_real_max_height = parseInt($('#wrapper').height());
		$('#menu .slim-scroll').slimScroll({
			height: (menu_max_height < menu_real_max_height ? (menu_real_max_height - 40) : menu_max_height) + "px",
			allowPageScroll : true,
			railDraggable: ($.fn.draggable ? true : false)
	    });
		
		if (Modernizr.touch)
			return; 
		
		// fixes weird bug when page loads and mouse over the sidebar (can't scroll)
		$('#menu .slim-scroll').trigger('mouseenter').trigger('mouseleave');
	}, 200);
	
	/* Slim Scroll Widgets */
	$('.widget-scroll').each(function(){
		$(this).find('.widget-body > div').slimScroll({
			height: $(this).attr('data-scroll-height')
	    });
	});
	
	/* Other Slim Scroll areas */
	$('#content .slim-scroll').each(function(){
		$(this).slimScroll({
			height: $(this).attr('data-scroll-height'),
			allowPageScroll : false,
			railDraggable: ($.fn.draggable ? true : false)
	    });
	});
	
	// print
	$('[data-toggle="print"]').click(function(e)
	{
		e.preventDefault();
		window.print();
	});
	
	// main menu -> submenus	
	$('#menu .menuCollapse').on('show.bs.collapse', function()
	{
		console.log('yeah');
		$(this).parents('.hasSubmenu:first').addClass('active');
	})
	.on('hidden.bs.collapse', function()
	{
		console.log('bla');
		$(this).parents('.hasSubmenu:first').removeClass('active');
	});
	
	// main menu visibility toggle
	$('.navbar.main .btn-navbar').click(function()
	{
		$('.first-container:first').toggleClass('menu-hidden');
		$('#menu').toggleClass('hidden-sm');
		
		if (typeof masonryGallery != 'undefined') 
			masonryGallery();
	});
	
	// tooltips
	$('[data-toggle="tooltip"]').tooltip();
	
	// Google Code Prettify
	if ($('.prettyprint').length)
		prettyPrint();
	
	// sparklinescontainer
	genSparklines();
	
	if ($('.widget-activity').length)
		$('.widget-activity .filters .glyphicons').click(function()
		{
			$('.widget-activity .filters .active').toggleClass('active');
			$(this).toggleClass('active');
		});
	
	$(window).resize(function()
	{
		if (!$('#menu').is(':visible') && !$('.first-container:first').is('menu-hidden'))
			$('.first-container:first').addClass('menu-hidden');
	});
	
	$(window).resize();
	
	// collapsible widgets
	$('.widget[data-toggle="collapse-widget"] .widget-body')
		.on('show.bs.collapse', function(){
			$(this).parents('.widget:first').attr('data-collapse-closed', "false");
		})
		.on('shown.bs.collapse', function(){
			setTimeout(function(){ $(window).resize(); }, 500);
		})
		.on('hidden.bs.collapse', function(){
			$(this).parents('.widget:first').attr('data-collapse-closed', "true");
		});
	
	$('.widget[data-toggle="collapse-widget"]').each(function()
	{
		// append toggle button
		$(this).find('.widget-head').append('<span class="collapse-toggle"></span>');
		
		// make the widget body collapsible
		$(this).find('.widget-body').addClass('collapse');
		
		// verify if the widget should be opened
		if ($(this).attr('data-collapse-closed') !== "true")
			$(this).find('.widget-body').addClass('in');
		
		// bind the toggle button
		$(this).find('.collapse-toggle').on('click', function(){
			$(this).parents('.widget:first').find('.widget-body').collapse('toggle');
		});
	});
	
	// view source toggle buttons
	$('.btn-source-toggle').click(function(e){
		e.preventDefault();
		$('.code:not(.show)').toggleClass('hide');
	});
	
	// show/hide toggle buttons
	$('[data-toggle="hide"]').click(function(){
		$($(this).attr('data-target')).toggleClass('hide');
		if ($(this).is('.scrollTarget') && !$($(this).attr('data-target')).is('.hide'))
			scrollTo($(this).attr('data-target'));
	});
	
	/* wysihtml5 */
	if ($('textarea.wysihtml5').size() > 0)
		$('textarea.wysihtml5').wysihtml5();
	
	/* DataTables */
	// if ($('.dynamicTable').size() > 0)
	// {
	// 	$('.dynamicTable:not(.tableTools)').dataTable({
	// 		"sPaginationType": "bootstrap",
	// 		"sDom": "<'row'<'col-md-6'l><'col-md-6'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
	// 		"oLanguage": {
	// 			"sLengthMenu": "_MENU_ records per page"
	// 		}
	// 	});
	// 	$('.dynamicTable.tableTools').dataTable({
	// 		"sPaginationType": "bootstrap",
	// 		"sDom": "<'row'<'col-md-5'T><'col-md-3'l><'col-md-4'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
	// 		"oLanguage": {
	// 			"sLengthMenu": "_MENU_ per page"
	// 		},
	// 		"oTableTools": {
	// 	        "sSwfPath": "../common/theme/scripts/plugins/tables/DataTables/extras/TableTools/media/swf/copy_csv_xls_pdf.swf"
	// 	    }
	// 	});
	// }

	// gridalicious
	$('[data-toggle*="gridalicious"]').each(function(){
		var $that = $(this);
		$(this).removeClass('hide2').gridalicious({
			gutter: $that.attr('data-gridalicious-gutter') || 13, 
			width: $that.attr('data-gridalicious-width') ? parseInt($that.attr('data-gridalicious-width')) : 200,
			animate: true,
			selector: '.widget'
		});
	});
	
	/*
	 * Helper function for JQueryUI Sliders Create event
	 */
	function JQSliderCreate()
	{
		$(this)
			.removeClass('ui-corner-all ui-widget-content')
			.wrap('<span class="ui-slider-wrap"></span>')
			.find('.ui-slider-handle')
			.removeClass('ui-corner-all ui-state-default');
	}
	
	/*
	 * JQueryUI Slider: Default slider
	 */
	if ($('.slider-single').size() > 0)
	{
		$( ".slider-single" ).slider({
			create: JQSliderCreate,
			value: 10,
	        animate: true,
	        start: function() { if (typeof mainYScroller != 'undefined') mainYScroller.disable(); },
	        stop: function() { if (typeof mainYScroller != 'undefined') mainYScroller.enable(); }
	    });
	}
	
	/*
	 * JQueryUI Slider: Multiple Vertical Sliders
	 */
	$( ".sliders-vertical > span" ).each(function() 
	{
        var value = parseInt( $( this ).text(), 10 );
        $( this ).empty().slider({
        	create: JQSliderCreate,
            value: value,
            range: "min",
            animate: true,
            orientation: "vertical",
            start: function() { if (typeof mainYScroller != 'undefined') mainYScroller.disable(); },
	        stop: function() { if (typeof mainYScroller != 'undefined') mainYScroller.enable(); }
        });
    });
	
	/*
	 * JQueryUI Slider: Range Slider
	 */
	if ($('.range-slider').size() > 0)
    {
		$( ".range-slider .slider" ).slider({
			create: JQSliderCreate,
	        range: true,
	        min: 0,
	        max: 500,
	        values: [ 75, 300 ],
	        slide: function( event, ui ) {
	            $( ".range-slider .amount" ).val( ui.values[ 0 ] + " - " + ui.values[ 1 ] );
	        },
	        start: function() { if (typeof mainYScroller != 'undefined') mainYScroller.disable(); },
	        stop: function() { if (typeof mainYScroller != 'undefined') mainYScroller.enable(); }
	    });
    	$( ".range-slider .amount" ).val( $( ".range-slider .slider" ).slider( "values", 0 ) +
    			" - " + $( ".range-slider .slider" ).slider( "values", 1 ) );
    }
	
	/*
	 * JQueryUI Slider: Snap to Increments
	 */
	if ($('.increments-slider').size() > 0)
    {
		$( ".increments-slider .slider" ).slider({
			create: JQSliderCreate,
			value:100,
	        min: 0,
	        max: 500,
	        step: 0.5,
	        slide: function( event, ui ) {
	            $( ".increments-slider .amount" ).val( ui.value );
	        },
	        start: function() { if (typeof mainYScroller != 'undefined') mainYScroller.disable(); },
	        stop: function() { if (typeof mainYScroller != 'undefined') mainYScroller.enable(); }
	    });
		$( ".increments-slider .amount" ).val( $( ".increments-slider .slider" ).slider( "value" ) );
    }
	
	/*
	 * JQueryUI Slider: Vertical Range Slider
	 */
	if ($('.vertical-range-slider').size() > 0)
    {
		$( ".vertical-range-slider .slider" ).slider({
			create: JQSliderCreate,
			orientation: "vertical",
	        range: true,
	        min: 0.5,
	        max: 100,
	        values: [ 100, 400 ],
	        slide: function( event, ui ) {
	            $( ".vertical-range-slider .amount" ).val( ui.values[ 0 ] + " - " + ui.values[ 1 ] );
	        },
	        start: function() { if (typeof mainYScroller != 'undefined') mainYScroller.disable(); },
	        stop: function() { if (typeof mainYScroller != 'undefined') mainYScroller.enable(); }
	    });
    	$( ".vertical-range-slider .amount" ).val( $( ".vertical-range-slider .slider" ).slider( "values", 0 ) +
    			" - " + $( ".vertical-range-slider .slider" ).slider( "values", 1 ) );
    }
	
	/*
	 * JQueryUI Slider: Range fixed minimum - ANELIS NETWORK - RANGOS DE PRECIOS MINIMO
	 */
	if ($('.slider-range-min').size() > 0)
	{
		$( ".slider-range-min .slider" ).slider({
			create: JQSliderCreate,
            range: "min",
            value: 5,
            min: 0.5,
            max: 50,
			step: 0.5,
            slide: function( event, ui ) {
                $( ".slider-range-min .amount" ).val( ui.value );
            },
            start: function() { if (typeof mainYScroller != 'undefined') mainYScroller.disable(); },
	        stop: function() { if (typeof mainYScroller != 'undefined') mainYScroller.enable(); }
        });
        $( ".slider-range-min .amount" ).val( $( ".slider-range-min .slider" ).slider( "value" ) );
	}
	
	/*
	 * JQueryUI Slider: Range fixed maximum - ANELIS NETWORK - RANGOS DE PRECIOS MAXIMO
	 */
	if ($('.slider-range-max').size() > 0)
	{
		$( ".slider-range-max .slider" ).slider({
			create: JQSliderCreate,
            range: "max",
            min: 0.5,
            max: 50,
            value: 15,
			step: 0.5,
            slide: function( event, ui ) {
                $( ".slider-range-max .amount" ).val( ui.value );
            },
            start: function() { if (typeof mainYScroller != 'undefined') mainYScroller.disable(); },
	        stop: function() { if (typeof mainYScroller != 'undefined') mainYScroller.enable(); }
        });
        $( ".slider-range-max .amount" ).val( $( ".slider-range-max .slider" ).slider( "value" ) );
	}
	
	/*
	 * Boostrap Extended
	 */
	// custom select for Boostrap using dropdowns
	$('.selectpicker').selectpicker();
	
	// bootstrap-toggle-buttons
	//$('.make-switch').bootstrapSwitch();
	
	/*
	 * UniformJS: Sexy form elements
	 */
	$('.uniformjs').find("select, input, button, textarea").uniform();
	
	// colorpicker
	if ($('#colorpicker').size() > 0)
	{
		$('#colorpicker').farbtastic('#colorpickerColor');
	}
	// datepicker
	if ($('#datepicker').length) 
	{
		$("#datepicker").datepicker({
			showOtherMonths:true
		});
	}
	if ($('#datepicker2').length) 
	{
		$("#datepicker2").datepicker({
			showOtherMonths:true
		});
	}
	if ($('#datepicker-inline').length)
	{
		$('#datepicker-inline').datepicker({
	        inline: true,
			showOtherMonths:true
	    });
	}
	
	// bookings daterange
	if ($('#dateRangeFrom').length && $('#dateRangeTo').length)
	{
		$( "#dateRangeFrom" ).datepicker({
			defaultDate: "+1w",
			changeMonth: false,
			numberOfMonths: 2,
			onClose: function( selectedDate ) {
				$( "#dateRangeTo" ).datepicker( "option", "minDate", selectedDate );
			}
		}).datepicker( "option", "maxDate", $('#dateRangeTo').val() );

		$( "#dateRangeTo" ).datepicker({
			defaultDate: "+1w",
			changeMonth: false,
			numberOfMonths: 2,
			onClose: function( selectedDate ) {
				$( "#dateRangeFrom" ).datepicker( "option", "maxDate", selectedDate );
			}
		}).datepicker( "option", "minDate", $('#dateRangeFrom').val() );
	}
	
	$('.checkboxs thead :checkbox').change(function(){
		if ($(this).is(':checked'))
		{
			$('.checkboxs tbody :checkbox').prop('checked', true).parent().addClass('checked');
			$('.checkboxs tbody tr.selectable').addClass('selected');
			$('.checkboxs_actions').show();
		}
		else
		{
			$('.checkboxs tbody :checkbox').prop('checked', false).parent().removeClass('checked');
			$('.checkboxs tbody tr.selectable').removeClass('selected');
			$('.checkboxs_actions').hide();
		}
	});
	
	$('.checkboxs tbody').on('click', 'tr.selectable', function(e){
		var c = $(this).find(':checkbox');
		var s = $(e.srcElement);
		
		if (e.srcElement.nodeName == 'INPUT')
		{
			if (c.is(':checked'))
				$(this).addClass('selected');
			else
				$(this).removeClass('selected');
		}
		else if (e.srcElement.nodeName != 'TD' && e.srcElement.nodeName != 'TR' && e.srcElement.nodeName != 'DIV')
		{
			return true;
		}
		else
		{
			if (c.is(':checked'))
			{
				c.prop('checked', false).parent().removeClass('checked');
				$(this).removeClass('selected');
			}
			else
			{
				c.prop('checked', true).parent().addClass('checked');
				$(this).addClass('selected');
			}
		}
		if ($('.checkboxs tr.selectable :checked').size() == $('.checkboxs tr.selectable :checkbox').size())
			$('.checkboxs thead :checkbox').prop('checked', true).parent().addClass('checked');
		else
			$('.checkboxs thead :checkbox').prop('checked', false).parent().removeClass('checked');

		if ($('.checkboxs tr.selectable :checked').size() >= 1)
			$('.checkboxs_actions').show();
		else
			$('.checkboxs_actions').hide();
	});
	
	if ($('.checkboxs tbody :checked').size() == $('.checkboxs tbody :checkbox').size() && $('.checkboxs tbody :checked').length)
		$('.checkboxs thead :checkbox').prop('checked', true).parent().addClass('checked');
	
	if ($('.checkboxs tbody :checked').length)
		$('.checkboxs_actions').show();
	
	$('.radioboxs tbody tr.selectable').click(function(e){
		var c = $(this).find(':radio');
		if (e.srcElement.nodeName == 'INPUT')
		{
			if (c.is(':checked'))
				$(this).addClass('selected');
			else
				$(this).removeClass('selected');
		}
		else if (e.srcElement.nodeName != 'TD' && e.srcElement.nodeName != 'TR')
		{
			return true;
		}
		else
		{
			if (c.is(':checked'))
			{
				c.attr('checked', false);
				$(this).removeClass('selected');				
			}
			else
			{
				c.attr('checked', true);
				$('.radioboxs tbody tr.selectable').removeClass('selected');
				$(this).addClass('selected');
			}
		}
	});
	
	// sortable tables
	if ($( ".js-table-sortable" ).length)
	{
		//DUPLICADO PARA GESTIONAR EL ORDEN DE LAS CATEGORIAS
		$( "#sortable-table" ).sortable(
		{	
			placeholder: "ui-state-highlight",
			items: "tbody tr",
			handle: ".js-sortable-handle",
			forcePlaceholderSize: true,
			helper: function(e, ui) 
			{
				ui.children().each(function() {
					$(this).width($(this).width());
				});
				return ui;
			},
			//Empezando a mover
			start: function(event, ui) 
			{
				if (typeof mainYScroller != 'undefined') mainYScroller.disable();
				ui.placeholder.html('<td colspan="' + $(this).find('tbody tr:first td').size() + '">&nbsp;</td>');
			},
			
			//Parando
		    stop: function() { if (typeof mainYScroller != 'undefined') mainYScroller.enable(); },
			
			//Cuando termina de actualizar el movimiento de sortable
			update: function(event, ui) {
				
				var orden = $('#sortable-table').sortable('toArray').toString();
				$.ajax({
					 type: "POST",
					 url: "../../../ajax/reordenar-categorias.php",
					 data: 'ordenCategoriasArray='+orden,
					 success: function(data){
						showWithEffect('ok', 'slideDown');
					}
				});
			}
		});
		
		//DUPLICADO PARA GESTIONAR EL ORDEN DE LAS SUBCATEGORIAS
		$( "#sortable-table-subcats" ).sortable(
		{			
			placeholder: "ui-state-highlight",
			items: "tbody tr",
			handle: ".js-sortable-handle",
			forcePlaceholderSize: true,
			helper: function(e, ui) 
			{
				ui.children().each(function() {
					$(this).width($(this).width());
				});
				return ui;
			},
			//Empezando a mover
			start: function(event, ui) 
			{
				if (typeof mainYScroller != 'undefined') mainYScroller.disable();
				ui.placeholder.html('<td colspan="' + $(this).find('tbody tr:first td').size() + '">&nbsp;</td>');
			},
			
			//Parando
		    stop: function() { if (typeof mainYScroller != 'undefined') mainYScroller.enable(); },
			
			//Cuando termina de actualizar el movimiento de sortable
			update: function(event, ui) {
				
				var orden = $('#sortable-table-subcats').sortable('toArray').toString();
				$.ajax({
					 type: "POST",
					 url: "../../../../ajax/reordenar-categorias.php",
					 data: 'ordenCategoriasArray='+orden,
					 success: function(data){
						showWithEffect('ok_orden', 'slideDown');
					}
				});
				
				//alert(orden);
			}
		});
		
		//DUPLICADO PARA GESTIONAR EL ORDEN DE LAS IMAGENES
		$( "#sortable-table-imagenes" ).sortable(
		{			
			placeholder: "ui-state-highlight",
			items: "tbody tr",
			handle: ".js-sortable-handle",
			forcePlaceholderSize: true,
			helper: function(e, ui) 
			{
				ui.children().each(function() {
					$(this).width($(this).width());
				});
				return ui;
			},
			//Empezando a mover
			start: function(event, ui) 
			{
				if (typeof mainYScroller != 'undefined') mainYScroller.disable();
				ui.placeholder.html('<td colspan="' + $(this).find('tbody tr:first td').size() + '">&nbsp;</td>');
			},
			
			//Parando
		    stop: function() { if (typeof mainYScroller != 'undefined') mainYScroller.enable(); },
			
			//Cuando termina de actualizar el movimiento de sortable
			update: function(event, ui) {
				
				var orden = $('#sortable-table-imagenes').sortable('toArray').toString();
				$.ajax({
					 type: "POST",
					 url: "../../../../../ajax/reordenar-imagenes.php",
					 data: 'ordenImagenesArray='+orden,
					 success: function(data){
						showWithEffect('ok-orden', 'slideDown');
					}
				});
				
				//alert(orden);
			}
		});
	}
});