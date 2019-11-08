// Funcion que permite abrir y cerrar un pop up con los datos de inicio de sesion

var btnAbrirPopup = document.getElementById('btn-abrir-popup'),
	overlay = document.getElementById('overlay'),
	popup = document.getElementById('popup'),
	btnCerrarPopup = document.getElementById('btn-cerrar-popup');

// Permite abrir la ventana al hacer click en el ícono
btnAbrirPopup.addEventListener('click', function(){
	overlay.classList.add('active');
	popup.classList.add('active');
});

// Permite cerrar la ventana al hacer click en la x
btnCerrarPopup.addEventListener('click', function(e){
	e.preventDefault();
	overlay.classList.remove('active');
	popup.classList.remove('active');
});

