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
