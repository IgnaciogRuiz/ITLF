const  sideMenu = document.querySelector('aside');
const menuBtn = document.querySelector('#menu_bar');
const closeBtn = document.querySelector('#close_btn');


const themeToggler = document.querySelector('.theme-toggler');



menuBtn.addEventListener('click',()=>{
    sideMenu.style.display = "block"
})
closeBtn.addEventListener('click',()=>{
    sideMenu.style.display = "none"
})

themeToggler.addEventListener('click',()=>{
    document.body.classList.toggle('dark-theme-variables')
    themeToggler.querySelector('span:nth-child(1').classList.toggle('active')
    themeToggler.querySelector('span:nth-child(2').classList.toggle('active')
})

function setFechaActual() {
    var hoy = new Date();
    var año = hoy.getFullYear();
    var mes = ('0' + (hoy.getMonth() + 1)).slice(-2); // Meses empiezan en 0
    var dia = ('0' + hoy.getDate()).slice(-2);
    var fechaActual = `${año}-${mes}-${dia}`;
    document.getElementById('fechaInput').value = fechaActual;
}