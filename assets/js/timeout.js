 // Obtén una referencia al elemento del mensaje
 const mensaje = document.getElementById('miMensaje');


 // Después de 5 segundos, oculta el mensaje
 setTimeout(() => {
     mensaje.style.display = 'none';
 }, 5000);