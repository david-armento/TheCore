
/****************************************************************************************
*								FUNCIONES VARIAS GENERAL								*
*****************************************************************************************/ 

//Funcion que cambia el bloque
function changeBloque(id){
	$('.tab-pane').attr('class', 'tab-pane');
	$('.tab-pane').css('display', 'none');
	
	$('#'+id).attr('class', 'tab-pane active');
	$('#'+id).css('display', 'block');
}

//Funcion que cambia el subBloque
function changeSubBloque(idTabSup, id){
	$('#'+idTabSup+' .subtab-pane').attr('class', 'subtab-pane');
	$('#'+idTabSup+' .subtab-pane').css('display', 'none');
	
	$('#'+id).attr('class', 'subtab-pane active');
	$('#'+id).css('display', 'block');
}

//Funcion que cambia el tipo de un input a password.
function changeType(idPass, idPassRep, idBoton){
	type = $('#'+idPass).attr('type');
	
	if(type == 'text'){
		$('#'+idPass).prop('type', 'password');
		$('#'+idPassRep).prop('type', 'password');
		$('#'+idBoton).attr('class', 'btn-action single glyphicons eye_open');
	}
	else{
		$('#'+idPass).prop('type', 'text');
		$('#'+idPassRep).prop('type', 'text');
		$('#'+idBoton).attr('class', 'btn-action single glyphicons eye_close');
	}
}

/****************************************************************************************
*							FUNCIONES DE SHOW & HIDDEN									*
*****************************************************************************************/

//Funcion que muestra u oculta un id
function showHiddeWithEffect(id, effect){
	
	display = $('#'+id).css('display');
	
	if(effect == 'slideDown'){
		if(display == 'none'){
			$('#'+id).slideDown('slow', function(){
				$('#'+id).css('display', 'block');
			});
		}
		else{
			$('#'+id).slideUp('slow', function(){
				$('#'+id).css('display', 'none');
			});
		}
	}
	if(effect == 'fadeIn'){
		if(display == 'none'){
			$('#'+id).fadeIn('slow', function(){
				$('#'+id).css('display', 'block');
			});
		}
		else{
			$('#'+id).fadeOut('slow', function(){
				$('#'+id).css('display', 'none');
			});
		}
	}
	if(effect == 'none'){
		if(display == 'none')
			$('#'+id).css('display', 'block');
		else
			$('#'+id).css('display', 'none');
	}
}

//Funcion que se encarga de mostrar y ocultar un id a los 5 segundos
function showWithEffect(id, effect){
	
	if(effect == 'slideDown'){
		$('#'+id).slideDown('slow', function(){
			$('#'+id).css('display', 'block');
		});
	}
	if(effect == 'fadeIn'){
		$('#'+id).fadeIn('slow', function(){
			$('#'+id).css('display', 'block');
		});
	}
	if(effect == 'none'){
		$('#'+id).css('display', 'block');
	}
	
	
	setTimeout('hiddeWithEffect("'+id+'", "'+effect+'")', 5000);
}

//Funcion que se encarga de mostrar y ocultar un id a los 5 segundos
function hiddeWithEffect(id, effect){
	
	if(effect == 'slideDown'){
		$('#'+id).slideUp('slow', function(){
			$('#'+id).css('display', 'none');
		});
	}
	if(effect == 'fadeIn'){
		$('#'+id).fadeOut('slow', function(){
			$('#'+id).css('display', 'none');
		});
	}
	if(effect == 'none'){
		$('#'+id).css('display', 'none');
	}
}

//Funcion que muestra un alert de confirmacion de accion
function confirmarAccion(texto, idFormulario){
	
	//Muestra un mensaje en forma de caja elegante.
	bootbox.confirm(""+texto+"", function(result){
		if(result)
			$('#'+idFormulario).submit();
	});
}

//Funcion que recibe 2 clases y muestra la primera y oculta la segunda
function muestraOcultaClases(clase1, clase2){
	
	//Ocultamos primero la clase 2
	$('.'+clase2).css('display', 'none');
	
	//Mostramos ahora la clase 1
	$('.'+clase1).css('display', 'block');
}

//Funcion que muestra calendario para un id
function showCalendarForId(id){
	
	//if ($('#'+id).length) 
	//{
		$("#"+id).datepicker({
			showOtherMonths:true
		});
	//}
		
}

/****************************************************************************************
*							FUNCIONES DE CONTROL DE HORAS								*
*****************************************************************************************/

//Funcion que permite solo numeros
function soloNumeros(e) {	
	tecla=(document.all) ? e.keyCode : e.which;
	
	//Comprueba numeros del 1 al 9 y 0 - MAS -> Tecla 8 = RETROCESO & Tecla 0 = SUP Y FLECHAS.
	if (tecla==48 || tecla==49 || tecla==50 || tecla==51 || tecla==52 || tecla==53 || tecla==54 || tecla==55 || tecla==56 || tecla==57 || tecla==59 ||  tecla==8 || tecla==0) {
		return true;
	}
	else
		return false;
}

//Funcion que controla las horas add :
function controlar_horas(evt, id){
	var content = $('#'+id).val();
	var longitud = $('#'+id).val().length;
	
	var charCode = (evt.which) ? evt.which : event.keyCode
	
	if(longitud == '2' && charCode != 8){
		//alert(content);
		nuevoContenido = content + ":";
		//alert(nuevoContenido);
		
		$('#'+id).val(nuevoContenido);
		$('#'+id).focus();
	}
}

/****************************************************************************************
*							FUNCIONES SLIDER Y GALLERY									*
*****************************************************************************************/

function slideShow() {

	//Set the opacity of all images to 0
	$('#slider a').css({opacity: 0.0});
	
	//Get the first image and display it (set it to full opacity)
	$('#slider a:first').css({opacity: 1.0});
	
	//Call the gallery function to run the slideshow, 6000 = change to next image after 6 seconds
	setInterval('gallery()',7000);
	
}

function gallery() {

	//if no IMGs have the show class, grab the first image
	var current = ($('#slider a.show')?  $('#slider a.show') : $('#slider a:first'));

	//Get next image, if it reached the end of the slideshow, rotate it back to the first image
	var next = ((current.next().length) ? ((current.next().hasClass('caption'))? $('#slider a:first') :current.next()) : $('#slider a:first'));	
	
	//Get next image caption
	var caption = next.find('img').attr('rel');	
	
	//Set the fade in effect for the next image, show class has higher z-index
	next.css({opacity: 0.0})
	.addClass('show')
	.animate({opacity: 1.0}, 1000);

	//Hide the current image
	current.animate({opacity: 0.0}, 1000)
	.removeClass('show');

}