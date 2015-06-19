/* ==========================================================
 * AdminPlus v3.0
 * index.js
 * 
 * http://www.mosaicpro.biz
 * Copyright MosaicPro
 *
 * Built exclusively for sale @Envato Marketplaces
 * ========================================================== */ 

$(function()
{
	var n = notyfy({
		text: '<h4>Did you know?</h4> <p>This template has <strong>2 layout options</strong> - fixed &amp; fluid - and <strong>2 menu positions</strong> - Left Menu / Right Menu. Feel free to explore the available options bellow. You can click here to close me.</p>',
		type: 'primary',
		layout: 'bottomLeft',
		closeWith: ['click']
	});
	
	// initialize charts
	if (typeof charts != 'undefined') 
		charts.initIndex();
});