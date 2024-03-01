document.addEventListener("DOMContentLoaded", function() {
    eventListeners();
    darkMode();
});
function darkMode() {
    const prefieraDarkMode = window.matchMedia('(prefer-color-sheme: dark)');
    // console.log(prefieraDarkMode.matches);
    if(prefieraDarkMode.matches) {
        document.body.classList.add('dark-mode');
    } else {
        document.body.classList.remove('dark-mode');
    }
    prefieraDarkMode.addEventListener('change', function(){
        if(prefieraDarkMode.matches) {
            document.body.classList.add('dark-mode');
        } else {
            document.body.classList.remove('dark-mode');
        }
    });
    const botonDarkMode = document.querySelector('.dark-mode-boton');
    botonDarkMode.addEventListener('click', function(){
        document.body.classList.toggle('dark-mode');
    });
}
function eventListeners() {
    const mobileMenu = document.querySelector('.mobile-menu');
    mobileMenu.addEventListener('click', navegacionResponsive);
}
function navegacionResponsive() {
    const navegacion = document.querySelector('.navegacion');
   navegacion.classList.toggle('mostrar');   //Lo de abajo es lo mismo con mas pasos y mas seguro para comenzar-
    // if(navegacion.classList.contains('mostrar')) {
    //     navegacion.classList.remove('mostrar');
    // } else {
    //     navegacion.classList.add('mostrar');
    // }
}