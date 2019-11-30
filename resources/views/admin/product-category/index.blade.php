@extends('adminlte::page')

@section('title', 'หมวดหมู่สินค้า')

@section('content_header')
<h1>หมวดหมู่สินค้า</h1>
@stop

@section('content')

@if ($errors->any())
<ul class="alert alert-danger list-unstyled">
    <li><b>ไม่สามารถบันทึกได้เนื่องจาก</b></li>
    @foreach ($errors->all() as $error)
    <li>- {{ $error }}</li>
    @endforeach
</ul>
@endif

<div class="row">

    <div class="col-md-5">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">หมวดหมู่สินค้า</h3>
            </div>

            <div class="card-body">
                <ol class="sortable">

                    @foreach($category as $parent_cat)
                    <li id="menuItem_{{ $parent_cat->id }}">
                        <div class="menuDiv">
                            <span data-id="{{ $parent_cat->id }}" class="itemTitle">{{ $parent_cat->name }}</span>
                            <span class="float-right">
                                {!! $parent_cat->status === 1 ? '<i class="fas fa-check-circle text-success"></i>' : '<i class="fas fa-times-circle text-danger"></i>' !!}
                                <button class="btn btn-xs btn-warning editBtn" data-id="{{ $parent_cat->id }}"
                                    data-name="{{ $parent_cat->name }}"
                                    data-parent="{{ $parent_cat->parent_id }}">แก้ไข</button>

                                <form method="POST" action="{{ url('admin/product-category/' . $parent_cat->id) }}"
                                    accept-charset="UTF-8" style="display:inline">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-xs btn-danger" title="ลบรายการนี้"
                                        onclick="archiveFunction()">
                                        ลบ
                                    </button>
                                </form>
                            </span>
                        </div>
                        <ol>

                            @foreach($parent_cat->children as $cat)
                            <li id="menuItem_{{ $cat->id }}">
                                <div class="menuDiv">
                                    <span data-id="{{ $cat->id }}" class="itemTitle">{{ $cat->name }}</span>
                                    <span class="float-right">
                                        {!! $cat->status === 1 ? '<i class="fas fa-check-circle text-success"></i>' : '<i class="fas fa-times-circle text-danger"></i>' !!}
                                        <button class="btn btn-xs btn-warning editBtn" data-id="{{ $cat->id }}"
                                            data-name="{{ $cat->name }}"
                                            data-parent="{{ $cat->parent_id }}">แก้ไข</button>

                                        <form method="POST" action="{{ url('admin/product-category/' . $cat->id) }}"
                                            accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-xs btn-danger" title="ลบรายการนี้"
                                                onclick="archiveFunction()">
                                                ลบ
                                            </button>
                                        </form>
                                    </span>
                                </div>
                            </li>
                            @endforeach

                        </ol>
                    </li>
                    @endforeach

                </ol>
            </div>
        </div>
    </div>


    <div class="col-md-7">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Form</h3>
            </div>

            <form method="POST" action="{{ url('admin/product-category') }}" accept-charset="UTF-8"
                enctype="multipart/form-data">
                {{ csrf_field() }}

                    <div id="category-frm">
                        @include('admin.product-category.form')
                    </div>
                    <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">บันทึก</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>

</div>

@stop

@section('css')
<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" />
<style type="text/css">
		.placeholder {
			outline: 1px dashed #4183C4;
		}

		.mjs-nestedSortable-error {
			background: #fbe3e4;
			border-color: transparent;
		}

		ol {
			/* max-width: 500px; */
			padding-left: 25px;
		}

		ol.sortable,ol.sortable ol {
			list-style-type: none;
		}

		.sortable li div {
			border: 1px solid #d4d4d4;
			/* -webkit-border-radius: 3px;
			-moz-border-radius: 3px;
			border-radius: 3px; */
			cursor: move;
			/* border-color: #D4D4D4 #D4D4D4 #BCBCBC; */
			margin: 5px 0;
			padding: 5px;
		}

		li.mjs-nestedSortable-collapsed.mjs-nestedSortable-hovering div {
			border-color: #999;
		}

		.disclose, .expandEditor {
			cursor: pointer;
			width: 20px;
			display: none;
		}

		.sortable li.mjs-nestedSortable-collapsed > ol {
			display: none;
		}

		.sortable li.mjs-nestedSortable-branch > div > .disclose {
			display: inline-block;
		}

		.sortable span.ui-icon {
			display: inline-block;
			margin: 0;
			padding: 0;
		}

		.menuDiv {
			background: rgba(0,0,0,.03);
		}

		.menuEdit {
			background: #FFF;
		}

		.itemTitle {
			vertical-align: middle;
			cursor: pointer;
		}

		.deleteMenu {
			float: right;
			cursor: pointer;
		}
    </style>
@stop

@section('js')
<script src="{{ url('js/jquery-ui-1.12.1/jquery-ui.min.js') }}"></script>
<script src="{{ url('js/nestedSortable/jquery.mjs.nestedSortable.js') }}"></script>
<script>
$(document).ready(function(){
    $('body').on('click', '.editBtn', function(){
        var editID = $(this).data('id');
		$.ajax({
			url: "{{ url('ajaxLoadProductCategoryForm') }}",
			method: "GET",
			data: {id: editID},
			success: function(data) {
				$('#category-frm').html(data);
			}
		});
    });
});
</script>

<script>
    $().ready(function(){
        var ns = $('ol.sortable').nestedSortable({
            excludeRoot: true,
            forcePlaceholderSize: true,
            handle: 'div',
            helper:	'clone',
            items: 'li',
            opacity: .6,
            placeholder: 'placeholder',
            revert: 250,
            tabSize: 25,
            tolerance: 'pointer',
            toleranceElement: '> div',
            maxLevels: 2,
            isTree: true,
            expandOnHover: 700,
            startCollapsed: false,
            relocate: function(){
                console.log('Relocated item');

                arraied = $('ol.sortable').nestedSortable('toArray', {startDepthCount: 0});
                $.ajax({
                    url: "{{ url('ajaxRebuildTree') }}",
                    method: "GET",
                    data: {sort: arraied},
                    success: function(data) {
                        Swal.fire({
                            toast: true,
                            position: "top-end",
                            type: "success",
                            title: "บันทึกข้อมูลสำเร็จ",
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                });
            }
        });

        $('#serialize').click(function(){
            serialized = $('ol.sortable').nestedSortable('serialize');
            $('#serializeOutput').text(serialized+'\n\n');
        })

        $('#toHierarchy').click(function(e){
            hiered = $('ol.sortable').nestedSortable('toHierarchy', {startDepthCount: 0});
            hiered = dump(hiered);
            (typeof($('#toHierarchyOutput')[0].textContent) != 'undefined') ?
            $('#toHierarchyOutput')[0].textContent = hiered : $('#toHierarchyOutput')[0].innerText = hiered;

        })

        $('#toArray').click(function(e){
            arraied = $('ol.sortable').nestedSortable('toArray', {startDepthCount: 0});
            arraied = dump(arraied);
            (typeof($('#toArrayOutput')[0].textContent) != 'undefined') ?
            $('#toArrayOutput')[0].textContent = arraied : $('#toArrayOutput')[0].innerText = arraied;

        });
    });

    function dump(arr,level) {
        var dumped_text = "";
        if(!level) level = 0;

        //The padding given at the beginning of the line.
        var level_padding = "";
        for(var j=0;j<level+1;j++) level_padding += "    ";

        if(typeof(arr) == 'object') { //Array/Hashes/Objects
            for(var item in arr) {
                var value = arr[item];

                if(typeof(value) == 'object') { //If it is an array,
                    dumped_text += level_padding + "'" + item + "' ...\n";
                    dumped_text += dump(value,level+1);
                } else {
                    dumped_text += level_padding + "'" + item + "' => \"" + value + "\"\n";
                }
            }
        } else { //Strings/Chars/Numbers etc.
            dumped_text = "===>"+arr+"<===("+typeof(arr)+")";
        }
        return dumped_text;
    }
</script>
@stop
