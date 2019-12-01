
@php
    $vdos = App\Models\Vdo::where('status',1)->orderBy('id','desc')->take(3)->get();
@endphp

<p class="title3-about-detail">วีดีโอ</p>
<div class="row">
    @foreach($vdos as $vdo)
    <div class="col-12 col-sm-12 col-md-4">
            <iframe width="100%" height="315" src="{{ $vdo->url }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
    @endforeach
</div>
