function logout() {
    fetch('/logout.php', {
        method: 'GET',
    })
    .then(response => {
        if (response.ok) {
            // Redirigir a la página de inicio de sesión
            window.location.href = './Login.html';
        } else {
            // Manejar el error
            console.error('Error al cerrar sesión');
        }
    })
    .catch(error => {
        console.error('Error de red:', error);
    });
}