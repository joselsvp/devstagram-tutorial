import Dropzonen from "dropzone";

Dropzonen.autoDiscover = false;

const dropzone = new Dropzonen('#dropzone', {
    dictDefaultMessage: 'Sube aquí tu imagen',
    acceptedFiles: ".png, .jpg, .jpeg, .gif",
    addRemoveLinks: true,
    dictRemoveFile: 'Borrar Archivo',
    maxFiles: 1,
    uploadMultiple: false,
})

dropzone.on('sending', function (file, xhr, formData) {
    console.log(file)
});

dropzone.on('success', function (file, xhr, formData) {
    console.log(file)
    console.log(formData)
});
