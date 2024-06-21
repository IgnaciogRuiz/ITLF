function descargarArchivo() {
    var seleccion = document.getElementById("seleccionarArchivo").value;
    var archivoURL;

    switch (seleccion) {
        case "1A": archivoURL = "./assets/documentos/1A.pdf"; break;
        case "1B": archivoURL = "./assets/documentos/1B.pdf"; break;
        case "1C": archivoURL = "./assets/documentos/1C.pdf"; break;
        case "2A": archivoURL = "./assets/documentos/2A.pdf"; break;
        case "2B": archivoURL = "./assets/documentos/2B.pdf"; break;
        case "2C": archivoURL = "./assets/documentos/2C.pdf"; break;
        case "3A": archivoURL = "./assets/documentos/3A.pdf"; break;
        case "3B": archivoURL = "./assets/documentos/3B.pdf"; break;
        case "3C": archivoURL = "./assets/documentos/3C.pdf"; break;
        case "4P": archivoURL = "./assets/documentos/4P.pdf"; break;
        case "4E": archivoURL = "./assets/documentos/4E.pdf"; break;
        case "4M": archivoURL = "./assets/documentos/4M.pdf"; break;
        case "5P": archivoURL = "./assets/documentos/5P.pdf"; break;
        case "5E": archivoURL = "./assets/documentos/5E.pdf"; break;
        case "5M": archivoURL = "./assets/documentos/5M.pdf"; break;
        case "6P": archivoURL = "./assets/documentos/6P.pdf"; break;
        case "6E": archivoURL = "./assets/documentos/6E.pdf"; break;
        case "6M": archivoURL = "./assets/documentos/6M.pdf"; break;
        case "7P": archivoURL = "./assets/documentos/7P.pdf"; break;
        case "7E": archivoURL = "./assets/documentos/7E.pdf"; break;
        case "7M": archivoURL = "./assets/documentos/7M.pdf"; break;
        default: return;
    }

    var enlace = document.getElementById('horarios-a');
    enlace.setAttribute('href', archivoURL);
    enlace.setAttribute('download', "Horario-" + seleccion + ".pdf");
}

document.getElementById("seleccionarArchivo").addEventListener("change", function() {
    var link = document.getElementById('horarios-a');
    if (this.value) {
        link.style.pointerEvents = 'auto';
        link.style.color = '';
    } else {
        link.style.pointerEvents = 'none';
        link.style.color = 'grey';
    }
});

document.getElementById("horarios-a").addEventListener("click", descargarArchivo);