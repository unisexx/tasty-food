<!-- Stylesheets -->
<link rel="stylesheet" href="{{ url('chc/css/bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{ url('css/fontawesome/css/all.css') }}" />
<link rel="stylesheet" href="{{ url('chc/css/template.css') }}" />
<!-- fonts google-->
<link href="https://fonts.googleapis.com/css?family=Sarabun&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Athiti&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Prompt&display=swap" rel="stylesheet">
<!-- favicon -->
<link rel="icon" type="image/png" sizes="32x32" href="{{ url('chc/images/favicon.ico') }}">
<!-- Jquery Core Js -->
<script src="{{ url('chc/plugins/jquery/jquery.min.js') }}"></script>
<!--JS -->
<script src="{{ url('chc/js/bootstrap.min.js') }}"></script>
{{-- SweetAlert --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
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
                product_item_id : $(this).data('id'),
            }
        }).done(function(data) {
            updateCartNumber();
        });
    });

    // กดปุ่มล้างตระกร้า empty cart
    $(document).on('click','.simpleCart_empty',function(){
        $.ajax({
            method: "GET",
            url: "{{ url('ajaxEmptyCart') }}"
        }).done(function(data) {
            $('#simpleCart_quantity').html('0');
            $('.close1').trigger('click');
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

</script>