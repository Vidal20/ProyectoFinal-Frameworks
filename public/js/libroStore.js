function mostrarForm(){
	var LibroFormBox = document.getElementById("LibroForm");
	var puede = document.getElementById("x");
	var boton = document.getElementById("aproveEnv");
	if(LibroFormBox.style.visibility == "hidden" || LibroFormBox.style.visibility == ""){
		LibroFormBox.style.visibility = "visible";
		if(puede.value == "x" && puede !== null){
			boton.setAttribute("disabled",true);
		}
	}else{
		LibroFormBox.style.visibility = "hidden";
	}
	
}

function mostrarEditForm(){

}