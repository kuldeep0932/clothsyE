$(document).ready(function () {
        $('#DataTables_Table_0').DataTable({
            autoWidth: false,
            responsive: true,
            columnDefs: [
                {width: '5%', targets: 0},
                {width: '20%', targets: 1},
                {width: '20%', targets: 2},
                {width: '20%', targets: 3},
                {width: '15%', targets: 4},
                {width: '20%', targets: 5}
            ]
        });
    });