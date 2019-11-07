
$(document).ready(function () {
    //url_path
    urlPath = window.location.protocol + "//" + window.location.host + "/";

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

    // switch ปิด-เปิดสถานะ
    $("input[data-bootstrap-switch]").each(function(){
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

    // ajax ปิด-เปิดสถานะ
    $(document).on('switchChange.bootstrapSwitch', ".switch_status", function () {
        $.ajax({
            url: urlPath+"ajaxSwitchStatus",
            data:{ table : $(this).data('tb'), id : $(this).data('id'), status : $(this).prop('checked') },
            dataType: "json",
        });
    });

    //CKEditor4
    var options = {
        filebrowserImageBrowseUrl: urlPath+'laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: urlPath+'laravel-filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: urlPath+'laravel-filemanager?type=Files',
        filebrowserUploadUrl: urlPath+'laravel-filemanager/upload?type=Files&_token='
    };
    CKEDITOR.replace('detail', options);
});
