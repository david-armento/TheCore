// Documento JavaScript creado por David Armento

function createBox() {

  
  var xScroll, yScroll;
	
	if (window.innerHeight && window.scrollMaxY) {	
		xScroll = document.body.scrollWidth;
		yScroll = window.innerHeight + window.scrollMaxY;
	} else if (document.body.scrollHeight > document.body.offsetHeight){ // all but Explorer Mac
		xScroll = document.body.scrollWidth;
		yScroll = document.body.scrollHeight;
	} else { // Explorer Mac...would also work in Explorer 6 Strict, Mozilla and Safari
		xScroll = document.body.offsetWidth;
		yScroll = document.body.offsetHeight;
	}
	
	var windowWidth, windowHeight;
	if (self.innerHeight) {	// all except Explorer
		windowWidth = self.innerWidth;
		windowHeight = self.innerHeight;
	} else if (document.documentElement && document.documentElement.clientHeight) { // Explorer 6 Strict Mode
		windowWidth = document.documentElement.clientWidth;
		windowHeight = document.documentElement.clientHeight;
	} else if (document.body) { // other Explorers
		windowWidth = document.body.clientWidth;
		windowHeight = document.body.clientHeight;
	}	
	
	// for small pages with total height less then height of the viewport
	if(yScroll < windowHeight){
		pageHeight = windowHeight;
	} else { 
		pageHeight = yScroll;
	}

	// for small pages with total width less then width of the viewport
	if(xScroll < windowWidth){	
		pageWidth = windowWidth;
	} else {
		pageWidth = xScroll;
	}


  // create a shadow on top of the page
  var shadow = document.body.appendChild(document.createElement("div"));
  shadow.setAttribute("id", "sombra");
  $(shadow).css("width", pageWidth);
  $(shadow).css("height", pageHeight);
  $(shadow).css("position", "fixed");
  $(shadow).css("display", "block");
  $(shadow).css("top", "0px");
  $(shadow).css("left", "0px");
  $(shadow).css("backgroundColor", "#000");
  $(shadow).css("z-index", "3000");

  // make shadow transparent
  shadow.style.MozOpacity = ".5";
  shadow.style.opacity = ".5";
  shadow.style.filter = "Alpha(opacity=50)";
  
}

function eraseBox() {
	
   var miSombra = document.getElementById('sombra'); 
	
   document.body.removeChild(miSombra);
	
}