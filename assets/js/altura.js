        // Función para obtener la altura de la pantalla del dispositivo
        function obtenerAlturaPantalla() {
            return window.screen.height;
        }

        // Obtener la altura y establecer la variable CSS
        function establecerAlturaPantallaEnCSS() {
            const altura = obtenerAlturaPantalla();
            document.documentElement.style.setProperty('--altura', `${altura}px`);
        }

        // Llamar a la función para establecer la variable CSS al cargar la página
        establecerAlturaPantallaEnCSS();