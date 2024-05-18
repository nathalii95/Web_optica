$(document).ready(function() {
    var table = $('#table_id').DataTable({
        orderCellsTop: true,
        fixedHeader: true,
        /*  "order": [
             [1, 'desc']
         ], */
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        },

        pagingType: "full_numbers",
        pageLength: 10,
        search: true,
        paging: true,

        dom: "frtip",

    });

    //Creamos una fila en el head de la tabla y lo clonamos para cada columna
    $('#table_id thead tr').clone(true).appendTo('#table_id thead');

    $('#table_id thead tr:eq(1) th').each(function(i) {
        var title = $(this).text();
        $(this).html('<input type="text" placeholder="Buscar...' + title + '" />');

        $('input', this).on('keyup change', function() {
            if (table.column(i).search() !== this.value) {
                table
                /*   .order([1, 'asc'], [2, 'asc']) */
                    .column(i)
                    .search(this.value)
                    .draw();
            }
        });
    });

});