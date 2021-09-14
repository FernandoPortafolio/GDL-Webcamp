window.addEventListener('DOMContentLoaded', function() {
    //animaciones para los numeros del parallax
    if (document.querySelector('.resumen-evento')) {
        $('.resumen-evento li:nth-child(1) .numero').animateNumber({ number: 6 }, 1200)
        $('.resumen-evento li:nth-child(2) .numero').animateNumber({ number: 40 }, 2000)
        $('.resumen-evento li:nth-child(3) .numero').animateNumber({ number: 3 }, 1200)
        $('.resumen-evento li:nth-child(4) .numero').animateNumber({ number: 17 }, 1200)
    }

    if (document.querySelector('.map')) {
        var map = L.map('map').setView([20.482314, -100.961799], 16)

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
        }).addTo(map)

        L.marker([20.482314, -100.961799])
            .addTo(map)
            .bindPopup('GDLWebcam 2021 <br> Boletos ya disponibles')
            .openPopup()
    }

    if (document.querySelector('.cuenta-regresiva')) {
        $('.cuenta-regresiva').countdown('2022/09/21 07:00:00', function(event) {
            $('#dias').html(event.strftime('%D'))
            $('#horas').html(event.strftime('%H'))
            $('#minutos').html(event.strftime('%M'))
            $('#segundos').html(event.strftime('%S'))
        })
    }

    //Colorbox
    // $('.btn-newsletter').colorbox({
    //     inline: true,
    //     width: '50%',
    // })
})
