@extends('layouts.front')

@push('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bread">
        <li class="breadcrumb-item"><a href="{{ url('') }}">หน้าแรก</a></li>
        <li class="breadcrumb-item active" aria-current="page">ข้อมูลสุขภาพ</li>
    </ol>
</nav>
@endpush

@section('content')
<!--########################### START content-about ###########################-->
<div class="row mt-4">
    <div class="col-12 col-sm-12 col-md-12">
        <div class="w-100 title6-km pl-3 bg-lightgreen mb-2">ข้อมูลสุขภาพ
            <div class="row float-right">
                <div class="col-md-6">
                    <a href="{{ $contact->line }}"><img src="images/line-add-friend.png" alt=""></a>
                </div>
                <div class="col-md-6">
                    <a href="{{ $contact->facebook }}"><img src="images/facebook-add-friend.png" alt=""></a>
                </div>
            </div>
        </div>

        <section class="col-xs-12 col-sm-12 col-md-12 mt-5">
            <!-- Categories ข้อมูลสุขภาพ-->

            <select id="selectKnowledgeCategory" class="form-control col-md-4 mb-4" style="font-size: 1em; color: #000;">
                <option value="{{ url('knowledge') }}">ทุกหมวดข้อมูลสุขภาพ</option>
                @foreach ($knowledge_category_menu as $item)
                    <option value="{{ url('knowledge?category='.$item->id) }}" @if(request('category') == $item->id ) selected @endif>{{ $item->title }}</option>
                @endforeach
            </select>

            @foreach($knowledges as $knowledge)
                @include('include.__box_knowledge', ['knowledge' => $knowledge])
            @endforeach
        </section>
    </div>
</div>
<!--########################### END content-about ###########################-->
@endsection

@push('js')
<script>
    $(function(){
      // bind change event to select
        $('#selectKnowledgeCategory').on('change', function () {
            var url = $(this).val(); // get selected value
            if (url) { // require a URL
                window.location = url; // redirect
            }
            return false;
        });
    });
</script>
@endpush
