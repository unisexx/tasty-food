<!-- Stylesheets -->
<link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<link rel="stylesheet" href="{{ url('css/template.css') }}" />
<link rel="stylesheet" href="{{ url('css/flexslider.css') }}" type="text/css" media="screen" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.css" />
<!-- fonts google-->
<link href="https://fonts.googleapis.com/css?family=Sarabun&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Athiti&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Prompt&display=swap" rel="stylesheet">
<!-- favicon -->
<link rel="icon" type="image/png" sizes="32x32" href="{{ url('images/favicon.ico') }}">

<!-- Jquery Core Js -->
<script src="{{ url('plugins/jquery/jquery.min.js') }}"></script>
{{-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script> --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}
<!--JS -->
<script src="{{ url('js/bootstrap.min.js') }}"></script>
{{-- SweetAlert --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
{{-- ShareThis --}}
<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5e11ccdc7739ed001293ffb2&product=inline-share-buttons&cms=sop' async='async'></script>
<script>
function archiveFunction() {
    event.preventDefault(); // prevent form submit
    var url = event.target.href; // storing the form
    // console.log(url);
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
            location.href=url;
        }
    });
}
</script>

<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.6/dist/loadingoverlay.min.js"></script>


{{-- jquety thailand --}}
<script type="text/javascript" src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dependencies/JQL.min.js"></script>
<script type="text/javascript" src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dependencies/typeahead.bundle.js"></script>
<link rel="stylesheet" href="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dist/jquery.Thailand.min.css">
<script type="text/javascript" src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dist/jquery.Thailand.min.js"></script>
{{-- <script>
$(document).ready(function(){
    $.Thailand({
        $district: $('#district'), // input ของตำบล
        $amphoe: $('#amphoe'), // input ของอำเภอ
        $province: $('#province'), // input ของจังหวัด
        $zipcode: $('#zipcode'), // input ของรหัสไปรษณีย์
    });
});
</script> --}}

{{-- <script src="{{ url('js/simplecart-js/simpleCart.js') }}"></script> --}}
{{-- <script>
    $(document).ready(function () {
        simpleCart.currency("THB");
        simpleCart({
            // cartStyle: "table", 
            // cartColumns: [
            //         // { attr: "id" , label: "Product ID" } ,
            //         /* Picture (same for every product right now) */
            //         { 
            //                 view: function(item, column) {
            //                         return "<a class=\"thumbnail pull-left\" href=\"#\"> "
            //                         +"<img class=\"media-object\" src=\""+item.get('image')+"\" "
            //                         +"style=\"width: 72px; height: 72px;\"> </a>";
            //                 }, label: "รูปสินค้า" 
            //         },
            //         // { attr: "image" , label: "รูปสินค้า" } ,
            //         { attr: "name" , label: "ชื่อ" } ,
            //         { attr: "price" , label: "ราคา", view: 'currency' } ,
            //         { view: "decrement" , label: false , text: "-" } ,
            //         { attr: "quantity" , label: "จำนวน" } ,
            //         { view: "increment" , label: false , text: "+" } ,
            //         { attr: "total" , label: "ราคา", view: 'currency' } ,
            //         { view: "remove" , text: "ลบ" , label: false }
            // ]

            cartColumns: [{
                view: function (item, column) {
                    return '<div class="cart-header mb-4">'
                                +'<div class="close1 simpleCart_remove"></div>'
                                    +'<div class="cart-sec simpleCart_shelfItem">'
                                        +'<div class="cart-item cyc">'
                                            +'<img src="'+item.get('image')+'" class="img-fluid" alt="">'
                                        +'</div>'
                                        +'<div class="cart-item-info pt-4">'
                                            +'<h5><a href="#">'+item.get('name')+'</a></h5>'
                                            +'<ul class="qty">'
                                                +'<li><p>จำนวน : <a href="javascript:;" class="simpleCart_decrement"><i class="fa fa-minus-circle"></i></a> '+item.get('quantity')+' <a href="javascript:;" class="simpleCart_increment"><i class="fa fa-plus-circle"></i></a></p></li>'
                                                +'<li><p>ราคา : '+item.get('total')+'.-</p></li>'
                                            +'</ul>'
                                        +'</div>'
                                    +'<div class="clearfix"></div>'
                                +'</div>'
                            +'</div>';
                }
            }]
        });
        simpleCart.bind("afterCreate", function () {
            // $cart_table = $(".simpleCart_items table");
            // $cart_table.addClass("table").addClass("table-hover");
            $('.headerRow').parent().remove();
        });
    });
</script> --}}

<!-- Product detail Slider -->
<script>
    jQuery(document).ready(function ($) {
        $('#myCarousel3').carousel({
            interval: 1000000
        });

        $('#myCarousel').carousel({
            interval: 3000
        });
        $('#myCarousel2').carousel({
            interval: 2000
        });

        $('#carousel-text').html($('#slide-content-0').html());

        //Handles the carousel thumbnails
        $('[id^=carousel-selector-]').click(function () {
            var id_selector = $(this).attr("id");
            var id = id_selector.substr(id_selector.length - 1);
            var id = parseInt(id);
            $('#myCarousel').carousel(id);
        });


        // When the carousel slides, auto update the text
        $('#myCarousel').on('slid', function (e) {
            var id = $('.item.active').data('slide-number');
            $('#carousel-text').html($('#slide-content-' + id).html());
        });
    });
</script>
<!-- //Product detail Slider -->

{{-- Cart ProCess --}}
<script>
$(document).ready(function(){
    updateCartNumber();

    // เพิ่มสินค้าลงในตระกร้า
    $(document).on('click','.item_add',function(){
        $.ajax({
            method: "GET",
            url: "{{ url('ajaxAddItems') }}",
            data: {
                product_item_price_id : $(this).data('id'),
                product_item_qty : $(this).data('qty'),
            }
        }).done(function(data) {
            updateCartNumber();
        });

        itemAddAlert();
    });

    $(document).on('click keyup blur change','.item_product_qty',function(){
        var qty = $(this).val();
        console.log(qty);
        $(this).closest('div').next('.item_add').attr('data-qty', qty);
    });

    // กดปุ่มล้างตระกร้า empty cart
    $(document).on('click','.simpleCart_empty',function(){
        Swal.fire({
            title: 'ยืนยันการล้างตระกร้าสินค้า',
            // text: "หลังจากที่ลบไปแล้วจะไม่สามารถดึงข้อมูลนี้กลับมาได้อีก!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ตกลง',
            cancelButtonText: 'ยกเลิก'
            }).then((result) => {
                if (result.value) {
                    
                    // ลบสินค้าในตระกร้า
                    $.ajax({
                        method: "GET",
                        url: "{{ url('ajaxEmptyCart') }}"
                    }).done(function(data) {
                        $('#simpleCart_quantity').html('0');
                        $('.simpleCart_total').html('฿0.00');
                        $('.close1').trigger('click');
                    });

                }
            });
    });

});

function updateCartNumber(){
    $.ajax({
        method: "GET",
        url: "{{ url('updateCartNumber') }}"
    }).done(function(data) {
        $('#simpleCart_quantity').html(data.count);
        $('.simpleCart_total').html(data.total)
    });
}

function itemAddAlert(){
    Swal.fire({
            title: 'เพิ่มสินค้าลงในตระกร้าเรียบร้อย',
            // text: "test!",
            icon: 'success',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ไปที่ตระกร้าสินค้าของฉัน',
            cancelButtonText: 'ดูสินค้าอื่นๆต่อ'
            }).then((result) => {
                if (result.value) {
                    $(location).attr('href', '{{ url("checkout") }}')
                }else{
                    $(location).attr('href', '{{ url("product") }}')
                }
            });
}
</script>