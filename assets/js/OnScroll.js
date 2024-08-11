let sections = document.querySelectorAll('section');
let navLinks = document.querySelectorAll('header nav a');

window.onscroll = () => {
    let top = window.scrollY;
    let activeFound = false;

    sections.forEach(sec => {
        let offset = sec.offsetTop - 300;
        let height = sec.offsetHeight;
        let id = sec.getAttribute('id');

        if (top >= offset && top < offset + height) {
            navLinks.forEach(links => {
                links.classList.remove('active');
            });
            document.querySelector('header nav a[href*=' + id + ']').classList.add('active');
            activeFound = true;
        }
    });

    // Si no se encontró ninguna sección activa y estás en la parte superior, activa "Inicio"
    if (!activeFound && top === 0) {
        navLinks.forEach(links => {
            links.classList.remove('active');
        });
        document.querySelector('header nav a[href*="#top"]').classList.add('active');
    }
};
