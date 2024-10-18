function descargarArchivo() {
    var seleccion = document.getElementById("seleccionarArchivo").value;
    var archivoURL;

    switch (seleccion) {
        case "1A": archivoURL = "../documentos/1A.pdf"; break;
        case "1B": archivoURL = "../documentos/1B.pdf"; break;
        case "1C": archivoURL = "../documentos/1C.pdf"; break;
        case "2A": archivoURL = "../documentos/2A.pdf"; break;
        case "2B": archivoURL = "../documentos/2B.pdf"; break;
        case "2C": archivoURL = "../documentos/2C.pdf"; break;
        case "3A": archivoURL = "../documentos/3A.pdf"; break;
        case "3B": archivoURL = "../documentos/3B.pdf"; break;
        case "3C": archivoURL = "../documentos/3C.pdf"; break;
        case "4P": archivoURL = "../documentos/4P.pdf"; break;
        case "4E": archivoURL = "../documentos/4E.pdf"; break;
        case "4M": archivoURL = "../documentos/4M.pdf"; break;
        case "5P": archivoURL = "../documentos/5P.pdf"; break;
        case "5E": archivoURL = "../documentos/5E.pdf"; break;
        case "5M": archivoURL = "../documentos/5M.pdf"; break;
        case "6P": archivoURL = "../documentos/6P.pdf"; break;
        case "6E": archivoURL = "../documentos/6E.pdf"; break;
        case "6M": archivoURL = "../documentos/6M.pdf"; break;
        case "7P": archivoURL = "../documentos/7P.pdf"; break;
        case "7E": archivoURL = "../documentos/7E.pdf"; break;
        case "7M": archivoURL = "../documentos/7M.pdf"; break;
        default: return;
    }

    var enlace = document.getElementById('horarios-a');
    enlace.setAttribute('href', archivoURL);
    enlace.setAttribute("Horario-" + seleccion + ".pdf");
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