
$(document).ready(function () {
    //url_path
    urlPath = window.location.protocol + "//" + window.location.host + "/";

    // Datatable
    $("#data-table").DataTable({
        order: [],
        "columnDefs": [{
            "orderable": false,
            "targets": 'no-sort'
        }],
        // ใช้ตอนกดเปลี่ยนหน้า เพื่อรันคำสั่ง bootstrap-switch อีกรอบ
        rowCallback: function ( row, data ) {
            $("input[data-bootstrap-switch]").each(function(){
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            });
        }
    });

    $("#data-table-report").DataTable({
        order: [],
        "columnDefs": [{
            "orderable": false,
            "targets": 'no-sort'
        }],
        dom: 'Bfrtip',
        buttons: [
            // 'copy', 'csv', 'excel', 'pdf', 'print'
            // 'copy', 'excel', 'pdf', 'print', 'pageLength'
            'copy', 'excel', 'pdf', 'print',
        ],
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
    // var options = {
    //     filebrowserImageBrowseUrl: urlPath+'laravel-filemanager?type=Images',
    //     filebrowserImageUploadUrl: urlPath+'laravel-filemanager/upload?type=Images&_token=',
    //     filebrowserBrowseUrl: urlPath+'laravel-filemanager?type=Files',
    //     filebrowserUploadUrl: urlPath+'laravel-filemanager/upload?type=Files&_token='
    // };
    // CKEDITOR.replace('detail', options);

    //TinyMCE
    // tinymce.init({selector:'textarea'});
    tinymce.init({
        selector: "textarea.tinyMCE",
        height: 400,
        plugins: [
            "advlist autolink link image lists charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
            "table contextmenu directionality emoticons paste textcolor responsivefilemanager code" ],
        toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect | fontsizeselect",
        toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
        image_advtab: true ,
        external_filemanager_path:urlPath+"tinymce_file_manager/filemanager/",
        filemanager_title:"Responsive Filemanager" ,
        external_plugins: { "filemanager" : "../filemanager/plugin.min.js"}
        ,relative_urls:false,
        remove_script_host:false
    });

    $('input.numDecimal').number( true, 2 );

    // Datepicker
    $(function() {
        datepicker_active('.datepicker');
    });

    $('.input-daterange').datepicker({
        inputs: $('.range-date'),
        format: 'dd/mm/yyyy',
        autoclose: true,
        language: 'th-th',
        clearBtn: true,
    });
    $('.range-date').each(function(k, v) {
        $(this).addClass('form-control').css({
            // 'display': 'inline-block',
            // 'width': '120px'
        }); //.attr('readonly',true);
        $(this).attr('placeholder', (!$(this).attr('placeholder') ? 'วัน/เดือน/ปี' : $(this).attr('placeholder')));
        // $(this).after(' <img src="{{url('images/calendar.png')}}" alt="" width="24" height="24" /> ');
    });

});

function datepicker_active(obj) {
    $(obj).datepicker({
        format: 'dd/mm/yyyy',
        autoclose: true,
        language: 'th-th',
        clearBtn: true
    });
    $(obj).each(function(k, v) {
        $(this).addClass('form-control').css({
            // 'display': 'inline-block',
            // 'width': '120px'
        }); //.attr('readonly',true);
        $(this).attr('placeholder', (!$(this).attr('placeholder') ? 'วัน/เดือน/ปี' : $(this).attr('placeholder')));
        // $(this).after(' <img src="{{url('images/calendar.png')}}" alt="" width="24" height="24" /> ');
    });
}

function archiveFunction() {
    event.preventDefault(); // prevent form submit
    var form = event.target.form; // storing the form
    Swal.fire({
    title: 'ยืนยันการลบข้อมูล?',
    text: "หลังจากที่ลบไปแล้วจะไม่สามารถดึงข้อมูลนี้กลับมาได้อีก!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'ลบเลย',
    cancelButtonText: 'ยกเลิก'
    }).then((result) => {
        if (result.value) {
            form.submit();
        }
    });
}
