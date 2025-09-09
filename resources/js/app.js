import Dropzone from 'dropzone';

Dropzone.autoDiscover = false;

const dropzone = new Dropzone("#dropzone", {
    dictDefaultMessage: "Sube aquí tu imagen",
    acceptedFiles: ".png,.jpg,.jpeg,.gif,.bmp",
    addRemoveLinks: true,
    dictRemoveFile: "Borrar archivo",
    dictMaxFilesExceeded: "Solo puedes subir una imagen",
    maxFilesize: 2, // MB
    maxFiles: 1,
    uploadMultiple: false,
});

// Eventos de Dropzone
// dropzone.on('sending', function (file, xhr, formData) {
//     console.log(formData);
// });

dropzone.on('success', function (file, response) {
    // console.log(response);
    // console.log(response.imagen);

    document.querySelector('[name="imagen"]').value = response.imagen;
});

// dropzone.on('error', function (file, message) {
//     console.log(message);
// });

dropzone.on('removedfile', function () {
    console.log('Archivo eliminado');
});
