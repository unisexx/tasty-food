
$(document).ready(function () {
    // Datatable
    $("#data-table").DataTable({
        order: [],
        "columnDefs": [{
            "orderable": false,
            "targets": 'no-sort'
        }]
    });

    // Input File
    bsCustomFileInput.init();
});
