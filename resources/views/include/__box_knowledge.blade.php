<article class="search-result row">
    <div class="col-xs-12 col-sm-12 col-md-3">
        <a href="{{ url('knowledge/view/'.$knowledge->id) }}" title="{{ $knowledge->title }}"><img src="{{ asset('uploads/knowledge/thumb/'.$knowledge->image) }}" alt="{{ $knowledge->title }}" class="img-fluid img-thumbnail img-km" /></a>
        <i class="fa fa-calendar"></i> <span>{{ DB2Date($knowledge->created_at) }}</span>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-9">
        <h4><a href="{{ url('knowledge/view/'.$knowledge->id) }}" title="">{{ $knowledge->title }}</a></h4>
        {!! get_first_paragraph($knowledge->detail) !!}
        <span class="plus"><a href="#" title="Lorem ipsum"><i class="glyphicon glyphicon-plus"></i></a></span>
    </div>
</article>