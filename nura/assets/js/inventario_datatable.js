$(document).ready(function() {
    var table = $('#table_id').DataTable({
        orderCellsTop: true,
        fixedHeader: true,
        "order": [
            [1, 'asc']
        ],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        },

        pagingType: "full_numbers",
        pageLength: 8,
        search: true,
        paging: true,

        dom: "Bfrtip",

        buttons: [

            {
                extend: "excel",
                footer: true,
                title: "Reporte Inventario",
                filename: "Reporte_inventario",
                text: 'EXCEL <i class="fa fa-file-excel-o" aria-hidden="true" style="font-size: 15px;margin-right: 10px; margin-top: 4px; margin:6px;color:green;"> </i>',
            },
            {
                extend: "print",
                footer: true,
                title: "Reporte Inventario",
                filename: "Reporte_inventario",
                text: 'IMPRIMIR<i class="fa fa-print" aria-hidden="true" style="font-size: 15px; margin-right: 10px; margin-top: 4px; margin:6px;color:blue;" ></i>',
                /* orientation: 'landscape', */
                exportOptions: {
                    columns: [1, 2, 3, 4, 5],
                }

            },
            {
                extend: "pdf",
                footer: true,
                title: "Reporte Inventario",
                filename: "Reporte_inventario",
                text: 'PDF <i class="fa fa-file-pdf-o" aria-hidden="true" style="font-size: 15px; margin-right: 10px; margin-top: 4px; margin:6px;color:red;"></i>',
                /* orientation: 'landscape', */
                exportOptions: {
                    columns: [1, 2, 3, 4, 5],
                }


            },

        ]


    });

    //Creamos una fila en el head de la tabla y lo clonamos para cada columna
    $('#table_id thead tr').clone(true).appendTo('#table_id thead');

    $('#table_id thead tr:eq(1) th').each(function(i) {
        var title = $(this).text(); //es el nombre de la columna
        $(this).html('<input type="text" placeholder="Buscar...' + title + '" />');

        $('input', this).on('keyup change', function() {
            if (table.column(i).search() !== this.value) {
                table
                    .order([1, 'asc'], [2, 'asc'])
                    .column(i)
                    .search(this.value)
                    .draw();
            }
        });
    });

});