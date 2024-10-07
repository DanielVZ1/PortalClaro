document.addEventListener('DOMContentLoaded', function () {
    const video = document.getElementById('video');
    const btnCapture = document.getElementById('btnCapture');
    const canvas = document.getElementById('canvas');
    const fotoInput = document.getElementById('fotoInput');
    const capturedImage = document.getElementById('capturedImage');

    // Acceder a la cámara
    navigator.mediaDevices.getUserMedia({ video: true })
        .then(stream => {
            video.srcObject = stream;
        })
        .catch(err => {
            console.error('Error al acceder a la cámara:', err);
            alert('No se pudo acceder a la cámara. Asegúrate de que esté conectada y que tengas los permisos necesarios.');
        });

    // Capturar la imagen
    btnCapture.addEventListener('click', function () {
        const context = canvas.getContext('2d');
        canvas.width = video.videoWidth;
        canvas.height = video.videoHeight;
        context.drawImage(video, 0, 0, canvas.width, canvas.height);

        // Convertir la imagen a base64 y almacenarla en el input oculto
        const dataURL = canvas.toDataURL('image/png');
        fotoInput.value = dataURL; // Almacenar la imagen en formato base64 en el input oculto
        
        // Mostrar la imagen capturada en el elemento img
        capturedImage.src = dataURL;
        capturedImage.style.display = 'block'; // Mostrar la imagen
    });
});
