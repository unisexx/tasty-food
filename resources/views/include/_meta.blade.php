<!-- Stylesheets -->
<link rel="stylesheet" href="{{ url('chc/css/bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{ url('chc/css/font-awesome.min.css') }}" />
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

<script src="{{ url('chc/js/simpleCart.min.js') }}"></script>
<!-- Product detail Slider -->
<script>
jQuery(document).ready(function($) {
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
    $('[id^=carousel-selector-]').click( function(){
            var id_selector = $(this).attr("id");
            var id = id_selector.substr(id_selector.length -1);
            var id = parseInt(id);
            $('#myCarousel').carousel(id);
    });


    // When the carousel slides, auto update the text
    $('#myCarousel').on('slid', function (e) {
            var id = $('.item.active').data('slide-number');
            $('#carousel-text').html($('#slide-content-'+id).html());
    });
});
</script>
<!-- //Product detail Slider -->
