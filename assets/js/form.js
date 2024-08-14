  // Obtener los elementos del DOM
const radioSi = document.getElementById('hermanossi');
const radioNo = document.getElementById('hermanosno');
const dnihermano = document.querySelector('.dni-hermano');

  // Función para mostrar/ocultar el campo de DNI
function toggleDniCampo() {
    if (radioSi.checked) {
        dnihermano.style.display = 'block';
    } else {
        dnihermano.style.display = 'none';
    }
}

 // Obtener referencias a los elementos
 const checkboxes = document.querySelectorAll('.chk-tutores input[type="checkbox"]');
 const tutorDataDivs = document.querySelectorAll('.tutor-data');

 // Función para mostrar u ocultar los campos de datos
 function toggleTutorData() {
     checkboxes.forEach((checkbox) => {
         const dataDiv = document.getElementById(`${checkbox.id}-data`);
         if (dataDiv) { // Verifica que el div de datos existe
             if (checkbox.checked) {
                 dataDiv.style.display = 'block';
             } else {
                 dataDiv.style.display = 'none';
             }
         }
     });
 }

 // Agregar eventos a los checkboxes
 checkboxes.forEach((checkbox) => {
     checkbox.addEventListener('change', toggleTutorData);
 });

 // Llamar a la función para establecer el estado inicial
 toggleTutorData();