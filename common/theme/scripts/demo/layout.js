/* ==========================================================
 * AdminPlus v3.0
 * layout.js
 * 
 * http://www.mosaicpro.biz
 * Copyright MosaicPro
 *
 * Built exclusively for sale @Envato Marketplaces
 * ========================================================== */ 

$(function()
{
	/* Layout Options */
	var layout = $.cookie('layout') ? $.cookie('layout') : 'fluid';
	console.log(layout);
	
	if (layout == 'fixed' && !$('.first-container:first').is('.fixed') && $('#menu').is(':visible'))
		$('.first-container:first').addClass('fixed').removeClass('container');
	
	if (layout == 'fluid' && $('.first-container:first').is('.fixed'))
		$('.first-container:first').removeClass('fixed').addClass('container fluid');
	
	$('#footer [data-toggle="layout"]').not('[data-layout="'+layout+'"]').parent().removeClass('active');
	$('#footer [data-toggle="layout"][data-layout="'+layout+'"]').parent().addClass('active');
	
	$('#footer [data-toggle="layout"]').click(function()
	{
		if ($(this).parent().is('.active'))
			return;
		
		$('#footer [data-toggle="layout"]').not(this).parent().removeClass('active');
		$(this).parent().addClass('active');
		
		if ($(this).attr('data-layout') == 'fixed')
			$('.first-container:first').addClass('fixed');
		else
			$('.first-container:first').removeClass('fixed');
			
		$.cookie('layout', $(this).attr('data-layout'));
		
		if (typeof masonryGallery != 'undefined') 
			masonryGallery();
			
	});
	
	/* Menu Options */
	var menuPosition = $.cookie('menuPosition') ? $.cookie('menuPosition') : 'left-menu';
	
	if (menuPosition == 'right-menu' && !$('.first-container:first').is('.right-menu'))
		$('.first-container:first').addClass('right-menu');
	
	if (menuPosition == 'right-menu' && $('.first-container:first').is('.left-menu'))
		$('.first-container:first').removeClass('left-menu');
	
	$('#footer [data-toggle="menuPosition"]').not('[data-menuPosition="'+menuPosition+'"]').parent().removeClass('active');
	$('#footer [data-toggle="menuPosition"][data-menuPosition="'+menuPosition+'"]').parent().addClass('active');
	
	$('#footer [data-toggle="menuPosition"]').click(function()
	{
		if ($(this).parent().is('.active'))
			return;
		
		$('#footer [data-toggle="menuPosition"]').not(this).parent().removeClass('active');
		$(this).parent().addClass('active');
		
		if ($(this).attr('data-menuPosition') == 'right-menu')
			$('.first-container:first').addClass('right-menu');
		
		if ($(this).attr('data-menuPosition') == 'right-menu' && $('.first-container:first').is('.left-menu'))
			$('.first-container:first').removeClass('left-menu');
		
		if ($(this).attr('data-menuPosition') == 'left-menu' && $('.first-container:first').is('.right-menu'))
			$('.first-container:first').removeClass('right-menu');
			
		$.cookie('menuPosition', $(this).attr('data-menuPosition'));
	});
});