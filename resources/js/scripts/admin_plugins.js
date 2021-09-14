window.addEventListener('DOMContentLoaded', function() {
    if (document.querySelector('#tabla')) {
        $('#tabla').DataTable({
            paging: true,
            lengthChange: true,
            searching: true,
            ordering: true,
            info: true,
            autoWidth: false,
            responsive: true,
            pageLength: 5,
            language: {
                paginate: {
                    next: 'Siguiente',
                    previous: 'Anterior',
                    last: 'Último',
                    first: 'Primero',
                },
                info: 'Mostrando _START_ - _END_ de _TOTAL_ resultados',
                search: 'Buscar',
                zeroRecords: 'No hay registros',
                infoEmpty: '0 registros',
                lengthMenu: 'Mostrar _MENU_ registros por página'
            },
        })
    }
})
