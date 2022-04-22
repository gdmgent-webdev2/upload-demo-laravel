require("./bootstrap");
import axios from "axios";
import Dropzone from "dropzone";
import "dropzone/dist/dropzone.css";

const myDropzone = new Dropzone("#dragndropzone", {
    maxFilesize: 10,
    maxFiles: 10,
    acceptedFiles: ".jpeg,.gif,.png,.bmp,.jpg",
    addRemoveLinks: true,
});

myDropzone.on("success", (file, response) => {
    file._removeLink.dataset.name = response.name;
});

myDropzone.on("error", (file, error) => {
    alert(error.errors.file.join(", "));
    myDropzone.removeFile(file);
});

myDropzone.on("removedfile", (file) => {
    const fileName = file._removeLink.dataset.name;

    // post naar server om bestand te wissen
    axios
        .delete(routeRemove, {
            data: {
                file: fileName,
            },
        })
        .then((res) => {
            console.log(res);
        });
});
