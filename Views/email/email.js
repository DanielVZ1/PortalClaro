if (!('Notification' in window)) {
  alert('Tu navegador no admite la API de Notificaciones :(');
}

if (Notification.permission === 'granted') {
  // Ya tienes permiso para enviar notificaciones
  // Puedes crear y mostrar notificaciones aquí
} else if (Notification.permission !== 'denied') {
  Notification.requestPermission().then(function(permission) {
      if (permission === 'granted') {
          // Permiso concedido, puedes enviar notificaciones
      }
  });
}

function mostrarNotificacion() {
  const opciones = {
      body: 'Aquí va el mensaje de tu notificación.',
      icon: 'url_de_un_icono.png' // URL de una imagen para usar como icono
  };
  const notificacion = new Notification('Título de Notificación', opciones);

  notificacion.onclick = function() {
      // Acción al hacer clic en la notificación
  };
}
