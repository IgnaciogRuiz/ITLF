const radioSi = document.getElementById('hermanossi');
const radioNo = document.getElementById('hermanosno');
const dnihermano = document.querySelector('.dni-hermano');
const preguntaJuntos = document.querySelector('.pregunta-juntos');
const dniInput = document.getElementById('dniHermano');
const radioJuntosSi = document.getElementById('sijuntos');
const radioJuntosNo = document.getElementById('nojuntos');
const domicilioPadre = document.querySelector('.domicilio-padre');
const checkboxes = document.querySelectorAll('.chk-tutores input[type="checkbox"]');
const tutorDataDivs = document.querySelectorAll('.tutor-data');
const checkboxmadre = document.getElementById('madre');

// Función para mostrar/ocultar el campo de DNI HERMANO 
function toggleDniCampo() {
    if (radioSi.checked) {
        dnihermano.style.display = 'block';
    } else {
        dnihermano.style.display = 'none';
        dniInput.value = "";
    }
}

// Función para mostrar/ocultar la pregunta de juntos y el domicilio del padre
function togglePreguntaJuntosYDomicilioPadre() {
    if (checkboxmadre.checked) {
        preguntaJuntos.style.display = 'block';
        // Si checkboxmadre está marcado, ocultar domicilioPadre
        domicilioPadre.style.display = 'none';
    } else {
        preguntaJuntos.style.display = 'none';
        // Si checkboxmadre no está marcado, mostrar domicilioPadre
        domicilioPadre.style.display = 'block';
    }
}

// Función para mostrar/ocultar el div del domicilio del padre basado en la selección de radio buttons
function toggleDomicilioPadre() {
    if (radioJuntosNo.checked) {
        domicilioPadre.style.display = 'block';
    } else {
        domicilioPadre.style.display = 'none';
    }
}

// TUTORES FUNCION
function toggleTutorData() {
    checkboxes.forEach((checkbox) => {
        const dataDiv = document.getElementById(`${checkbox.id}-data`);
        if (dataDiv) { // Verifica que el div de datos existe
            if (checkbox.checked) {
                dataDiv.style.display = 'block';
            } else {
                dataDiv.style.display = 'none';
                const inputs = dataDiv.querySelectorAll('input');
                inputs.forEach(input => {
                    input.value = '';
                });
                const select = dataDiv.querySelector('select');
                if (select) {
                    select.value = 'selecione';
                }
            }
        }
    });
}

radioSi.addEventListener('change', toggleDniCampo);
radioNo.addEventListener('change', toggleDniCampo);
document.addEventListener('DOMContentLoaded', () => {
    toggleDniCampo();
    togglePreguntaJuntosYDomicilioPadre(); // Llamar a la función para establecer el estado inicial
});
radioJuntosSi.addEventListener('change', toggleDomicilioPadre);
radioJuntosNo.addEventListener('change', toggleDomicilioPadre);
checkboxmadre.addEventListener('change', togglePreguntaJuntosYDomicilioPadre);
checkboxes.forEach((checkbox) => {
    checkbox.addEventListener('change', toggleTutorData);
});

// Llamar a la función para establecer el estado inicial
toggleTutorData();
togglePreguntaJuntosYDomicilioPadre();
