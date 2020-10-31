
@php
    $product_category = App\Models\ProductCategory::whereNotNull('parent_id')->orderBy('_lft')->get();
@endphp

<div class="card-body">
    <div class="form-group">
        <label>หมวดหมู่สินค้า</label>
        <select name="product_category_id" class="custom-select @error('product_category_id') is-invalid @enderror">
            <option value="">-- เลือก --</option>
            @foreach($product_category as $row)
            <option value="{{ $row->id }}" @if(@$rs->product_category_id == $row->id) selected @endif @if(@old('product_category_id') == $row->id) selected @endif>{{ $row->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="image">รูปสินค้า (เลือกได้หลายภาพ)</label>
        @if(isset($rs->productImageFirst))
            <input type="hidden" name="old_image" value="hasImage">
        @endif
        <div class="input-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="image" name="image[]" multiple>
                <label class="custom-file-label" for="image">Choose file</label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="brand">แบรนด์</label>
        <input type="text" class="form-control @error('brand') is-invalid @enderror" id="brand" name="brand" placeholder="แบรนด์" value="{{ isset($rs->brand) ? $rs->brand : old('brand') }}">
    </div>
    <div class="form-group">
        <label for="name">ชื่อสินค้า</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="ชื่อสินค้า" value="{{ isset($rs->name) ? $rs->name : old('name') }}">
    </div>
    <div class="form-group">
        <label for="detail">รายละเอียดสินค้า</label>
        <textarea class="form-control tinyMCE" name="description">{!! isset($rs->description) ? $rs->description : old('description') !!}</textarea>
    </div>
    <div class="form-group">
        <div class="custom-control custom-checkbox">
            <input type="hidden" name="is_new" value="">
            <input class="custom-control-input" type="checkbox" id="isNew" name="is_new" value="1" {{ @$rs->is_new == 1 ? 'checked' : '' }}>
            <label for="isNew" class="custom-control-label">ตั้งเป็นสินค้ามาใหม่</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="hidden" name="is_bestseller" value="">
            <input class="custom-control-input" type="checkbox" id="isBestseller" name="is_bestseller" value="1" {{ @$rs->is_bestseller == 1 ? 'checked' : '' }}>
            <label for="isBestseller" class="custom-control-label">ตั้งเป็นสินค้าขายดี</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="hidden" name="is_vip_view_only" value="">
            <input class="custom-control-input" type="checkbox" id="isVip" name="is_vip_view_only" value="1" {{ @$rs->is_vip_view_only == 1 ? 'checked' : '' }}>
            <label for="isVip" class="custom-control-label">เห็นได้เฉพาะลูกค้า VIP</label>
        </div>
    </div>

    <div class="form-group">
        <label for="status">เผยแพร่</label>
        <div>
            <input type="hidden" name="status" value="0" checked>
            <input type="checkbox" name="status" value="1" @if(@$rs->status == 1 || @$rs->status === null) checked @endif data-bootstrap-switch>
        </div>
    </div>

    @if(@count($rs->productImage))
        <hr>
        <div class="form-group">
            <label for="status">จัดการรูปภาพสินค้า <small class="text-muted">***ภาพลำดับที่ 1 จะถูกตั้งเป็นภาพหน้าปก</small></label>
            <table class="table table-hover table-bordered" id="sortable-list">
                <thead class="thead-light">
                    <tr>
                        <th>ลำดับ</th>
                        <th>รูป</th>
                        <th>จัดการ</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($rs->productImage as $key => $image)
                    <tr id="id-{{ $image->id }}" >
                        <td class="index">
                            {{ $key+1 }}
                        </td>
                        <td><img src="{{ url('uploads/product-item/'.$image->name) }}" width="50"></td>
                        <td>
                            <button type="button" class="btn btn-sm btn-danger delImage" title="ลบรายการนี้" data-id="{{ $image->id }}">
                                ลบ
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif


    <hr>
    <div class="form-group">
        <label for="status">ยิ่งซื้อยิ่งลด</label>
        <span style="float:right; margin-bottom:10px;">
            <button type="button" class="btn btn-block btn-primary addPrice">+ เพิ่มรายการ</button>
        </span>
        <table id="tbPrice" class="table table-hover table-bordered" id="sortable-list">
            <thead class="thead-light">
                <tr>
                    <th>ชื่อชุด</th>
                    <th>น้ำหนักสินค้า (กรัม)</th>
                    <th>ราคา</th>
                    <th>ราคา <span class="badge bg-warning"><i class="fas fa-crown"></i> VIP</span></th>
                    <th>จัดการ</th>
                </tr>
            </thead>
            <tbody>
                @if(@$rs->productItemPrice)
                    @foreach(@$rs->productItemPrice as $item)
                        <tr>
                            <td><input class='form-control' type='text' name='title[]' value="{{ $item->title }}"></td>
                            <td><input class='form-control' type='number' min="1" name='weight[]' value="{{ $item->weight }}"></td>
                            <td><input class='form-control numDecimal' type='text' name='price[]' value="{{ $item->price }}"></td>
                            <td><input class='form-control numDecimal' type='text' name='price_vip[]' value="{{ $item->price_vip }}"></td>
                            <td>
                                <input type='hidden' name='product_item_price_id[]' value="{{ $item->id }}">
                                <button class='btn btn-sm btn-danger delPrice' value='ลบ'>ลบ</button>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
<!-- /.card-body -->

<div class="card-footer">
    <button type="submit" class="btn btn-primary">บันทึก</button>
    <button type="button" class="btn btn-default float-right" onclick="document.location='{{ url('admin/product-item') }}'">ย้อนกลับ</button>
</div>

@section('css')
<style>
td:hover{
    cursor:move;
}
</style>
@stop

@section('js')
<script src="{{ url('js/jquery-ui-1.12.1/jquery-ui.min.js') }}"></script>
<script type="text/javascript">
$(function () {

    var fixHelperModified = function(e, tr) {
		var $originals = tr.children();
		var $helper = tr.clone();
		$helper.children().each(function(index) {
			$(this).width($originals.eq(index).width())
		});
		return $helper;
	},
		updateIndex = function(e, ui) {
			$(this).children().each(function(index) {
                $(this).find('td.index').html(index + 1);
                // $(this).find('td.index').append('<input type="hidden" name="order" value="'+(index+1)+'">');
            });
		};

	$("#sortable-list tbody").sortable({
		helper: fixHelperModified,
		stop: updateIndex
	}).disableSelection();

    $("tbody").sortable({
        axis: 'y',
        distance: 5,
        delay: 100,
        opacity: 0.6,
        cursor: 'move',
        update: function (event, ui) {
            var sort = $(this).sortable('serialize');
            // console.log(sort);
            $.ajax({
                data: sort,
                type: 'GET',
                url: "{{ url('ajaxUpdateOrderProductImage') }}",
                success: function(data) {
                    Swal.fire({
                        toast: true,
                        position: "top-end",
                        type: "success",
                        title: "บันทึกข้อมูลสำเร็จ",
                        showConfirmButton: false,
                        timerProgressBar: true,
                        timer: 1500
                    });
                }
            });
        }
    });

    $("body").on( "click", ".delImage", function() {
        $this = $(this);
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
                $.ajax({
                    data: {
                        'id' : $this.data('id'),
                    },
                    type: 'GET',
                    url: "{{ url('ajaxDeleteProductImage') }}",
                    success: function(data) {
                        $this.closest('tr').fadeOut(300, function(){
                            $(this).remove();
                        });
                    }
                });
            }
        });
    });

});
</script>

<script>
$(document).ready(function(){
    $('.addPrice').click(function(){
        var html = "";
        html += "<tr>";
        html += "<td><input class='form-control' type='text' name='title[]'></td>";
        html += "<td><input class='form-control numDecimal' type='text' name='price[]'></td>";
        html += "<td><input class='form-control numDecimal' type='text' name='price_vip[]'></td>";
        html += "<td>";
            html += "<input type='hidden' name='product_item_price_id[]'>";
            html += "<button class='btn btn-sm btn-danger delPrice' value='ลบ'>ลบ</button>";
        html += "</td>";
        html += "</tr>";
        $('#tbPrice tbody').append(html);
    });

    $('body').on('click', '.delPrice', function(){
        $(this).closest('tr').remove();
    });
});
</script>
@stop
