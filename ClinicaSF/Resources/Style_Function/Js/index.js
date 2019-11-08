// Funcion que verifica que se haya ingresado un correo para la información de contacto
function Correo() {
    let correo = document.getElementById('correo').value
    if(correo != '')
    {
        alert('Gracias, pronto te enviaremos un correo con información.');
    } else {
        alert('Por favor verifique que el campo contenga la información solicitada');
    }
}
