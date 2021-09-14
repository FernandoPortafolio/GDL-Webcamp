window.addEventListener('DOMContentLoaded', function() {
    if (document.querySelector('.lista-invitados')) {
        //media queries en JavaScript
        var x = window.matchMedia('(min-width: 768px)')
        x.addEventListener('change', cambiar)

        function cambiar(x) {
            var width = x.matches ? '50%' : '90%'
            $('.lista-invitados .descripcion').colorbox({
                inline: true,
                width: width,
            })
        }

        cambiar(x)
    }
})
