// Define una función para actualizar la hora mostrada en la página web.
function actualizarHora() {
    // Obtiene el elemento HTML con el ID 'reloj'.
    const reloj = document.getElementById('reloj');
    
    // Crea un nuevo objeto Date que contiene la fecha y hora actual.
    const ahora = new Date();
    
    // Obtiene las horas de la fecha actual y agrega un cero al principio si es necesario.
    const horas = agregarCero(ahora.getHours());
    
    // Obtiene los minutos de la fecha actual y agrega un cero al principio si es necesario.
    const minutos = agregarCero(ahora.getMinutes());
    
    // Obtiene los segundos de la fecha actual y agrega un cero al principio si es necesario.
    const segundos = agregarCero(ahora.getSeconds());
    
    // Actualiza el contenido del elemento 'reloj' con la hora actual en formato HH:MM:SS.
    reloj.textContent = `${horas}:${minutos}:${segundos}`;
}

// Define una función para agregar un cero al principio de los números menores a 10.
function agregarCero(numero) {
    // Si el número es menor que 10, devuelve el número con un '0' al principio.
    // De lo contrario, devuelve el número tal cual.
    return numero < 10 ? '0' + numero : numero;
}

// Establece un temporizador que llama a la función `actualizarHora` cada 1000 milisegundos (1 segundo),
// para actualizar la hora mostrada en la página web de manera continua.
setInterval(actualizarHora, 1000);

// Llama a la función `actualizarHora` inmediatamente al cargar la página para mostrar la hora actual sin esperar el primer intervalo de 1 segundo.
actualizarHora();

