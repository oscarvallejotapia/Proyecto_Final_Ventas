document.addEventListener('DOMContentLoaded', () => {
    let formulario = document.querySelector('#miformulario');
    formulario.addEventListener('submit', function(e) {
        e.preventDefault();

        let checkBox = document.querySelector('#cerrar');
        if(checkBox.checked) {
            formulario.submit();
        }
    });
});