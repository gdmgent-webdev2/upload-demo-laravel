require("./bootstrap");
import Dropzone from "dropzone";
import "dropzone/dist/dropzone.css";

const myDropzone = new Dropzone("#dragndropzone", {
    maxFilesize: 2,
    maxFiles: 10,
    acceptedFiles: ".jpeg,.gif,.png,.bmp,.jpg",
    addRemoveLinks: true,
});
