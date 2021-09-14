window.addEventListener('DOMContentLoaded', function() {
    //lettering para el nombre del sitio
    $('.nombre-sitio h1').lettering()

    //menu fijo
    var windowHeight = $(window).height()
    var barraAltura = $('.barra').height()
    $(window).on('scroll', function() {
        var scroll = $(window).scrollTop()
        if (scroll > windowHeight) {
            $('.barra').addClass('fixed')
            $('body').css({ 'margin-top': barraAltura + 'px' })
        } else {
            $('.barra').removeClass('fixed')
            $('body').css({ 'margin-top': '0' })
        }
    })

    //menu responsive
    $('.hamburger').on('click', function(e) {
        e.preventDefault()
        $('.navegacion').slideToggle()
    })

    //agregar apuntador de la pagina actual en la barra de navegacion
    $('body.conferencia .navegacion a:contains("Conferencia")').addClass('activo')
    $('body.calendario .navegacion a:contains("Calendario")').addClass('activo')
    $('body.invitados .navegacion a:contains("Invitados")').addClass('activo')
    $('body.registro .navegacion a:contains("Reservaciones")').addClass('activo')
})
