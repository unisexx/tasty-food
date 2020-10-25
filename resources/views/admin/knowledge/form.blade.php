@php
    $knowledge_categories = App\Models\KnowledgeCategory::where('status', 1)->get();
    $banners = App\Models\Banner::where('status', 1)->whereIn('position', [2, 3])->get();
    $product_items = App\Models\ProductItem::where('status', 1)->get();
@endphp

<div class="card-body">
    <div class="form-group">
        <label for="knowledge-category">หมวดหมู่ข้อมูลสุขภาพ</label>
        <select name="knowledge_category_id" id="knowledge-category" class="form-control">
            @foreach ($knowledge_categories as $item)
                <option value="{{ $item->id }}" {{ $item->id == @$rs->knowledge_category_id ? 'selected' : '' }}>{{ $item->title }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="image">รูปประกอบข่าว</label>
        @if(isset($rs->image))
            <div><img src="{{ url('uploads/knowledge/'.$rs->image) }}" width="200"></div>
        @endif
        <div class="input-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="image" name="image">
                <label class="custom-file-label" for="image">Choose file</label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="title">หัวข้อ</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="หัวข้อ" value="{{ isset($rs->title) ? $rs->title : old('title') }}">
    </div>
    <div class="form-group">
        <label for="detail">เนื้อหา</label>
        <textarea class="form-control tinyMCE" name="detail">{!! isset($rs->detail) ? $rs->detail : old('detail') !!}</textarea>
    </div>
    <div class="form-group">
        <label for="status">แท็กที่เกี่ยวข้อง</label>
        <div>
            <input type="text" class="form-control @error('tags') is-invalid @enderror" id="tags" name="tags" value="{{ isset($rs->tags) ? $rs->tags : old('tags') }}" data-role="tagsinput">
        </div>
    </div>
    <div class="form-group">
        <label for="status">เผยแพร่</label>
        <div>
            <input type="hidden" name="status" value="0" checked>
            <input type="checkbox" name="status" value="1" @if(@$rs->status == 1 || @$rs->status === null) checked @endif data-bootstrap-switch>
        </div>
    </div>

    <hr>
    <div class="form-group">
        <label for="status">แบนเนอร์</label>
        <span style="float:right; margin-bottom:10px;">
            <button type="button" class="btn btn-block btn-primary addBanner">+ เพิ่มรายการ</button>
        </span>
        <table id="tbBanner" class="table table-hover table-bordered" id="sortable-list">
            <thead class="thead-light">
                <tr>
                    <th>แบนเนอร์</th>
                    <th>จัดการ</th>
                </tr>
            </thead>
            <tbody>
                @if(@$rs->knowledgeBanner)
                    @foreach(@$rs->knowledgeBanner as $item)
                        <tr>
                            <td>
                                <select name='banner[banner_id][]' class='form-control'>
                                @foreach($banners as $banner)
                                    <option value='{{ $banner->id }}' {{ $item->banner_id == $banner->id ? 'selected' : '' }}>{{ $banner->title }} [{{ $banner->getPositionTxt() }}]</option>
                                @endforeach
                                </select>
                            </td>
                            <td>
                                <input type='hidden' name='banner[id][]' value="{{ $item->id }}">
                                <button type="button" class='btn btn-sm btn-danger delBanner' value='ลบ' data-id="{{ $item->id }}">ลบ</button>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>

    <hr>
    <div class="form-group">
        <label for="status">สินค้าแนะนำ</label>
        <span style="float:right; margin-bottom:10px;">
            <button type="button" class="btn btn-block btn-primary addProduct">+ เพิ่มรายการ</button>
        </span>
        <table id="tbProduct" class="table table-hover table-bordered" id="sortable-list">
            <thead class="thead-light">
                <tr>
                    <th>ชื่อสินค้า</th>
                    <th>จัดการ</th>
                </tr>
            </thead>
            <tbody>
                @if(@$rs->knowledgeProductItem)
                    @foreach(@$rs->knowledgeProductItem as $item)
                        <tr>
                            <td>
                                <select name='product[product_item_id][]' class='form-control'>
                                @foreach($product_items as $product_item)
                                    <option value='{{ $product_item->id }}' {{ $item->product_item_id == $product_item->id ? 'selected' : '' }}>{{ $product_item->name }}</option>
                                @endforeach
                                </select>
                            </td>
                            <td>
                                <input type='hidden' name='product[id][]' value="{{ $item->id }}">
                                <button type="button" class='btn btn-sm btn-danger delProduct' value='ลบ' data-id="{{ $item->id }}">ลบ</button>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">บันทึก</button>
        <button type="button" class="btn btn-default float-right" onclick="document.location='{{ url('admin/hilight') }}'">ย้อนกลับ</button>
    </div>
</div>
<!-- /.card-body -->

@push('js')
<script>
$(document).ready(function(){
    $('.addBanner').click(function(){
        var html = "";
        html += "<tr>";
        html += "<td>";
            html += "<select name='banner[banner_id][]' class='form-control'>";
            html += "@foreach($banners as $banner)";
                html += "<option value='{{ $banner->id }}'>{{ $banner->title }}  [{{ $banner->getPositionTxt() }}]</option>";
            html += "@endforeach";
            html += "</select>";
        html += "</td>";
        html += "<td>";
            html += "<input type='hidden' name='banner[id][]'>";
            html += "<button class='btn btn-sm btn-danger delBanner' value='ลบ'>ลบ</button>";
        html += "</td>";
        html += "</tr>";
        $('#tbBanner tbody').append(html);
    });

    // กดปุ่มลบแบนเนอร์
    $('body').on('click', '.delBanner', function(){
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
                // create remove input
                if($(this).attr('data-id').length){
                    $("<input type='hidden' name='removeBanner[id][]' value='"+$(this).attr('data-id')+"'>").appendTo("form");
                }
                // remove item
                $(this).closest('tr').remove();
            }
        });
    });

    // กดปุ่มเพิ่มสินค้า
    $('.addProduct').click(function(){
        var html = "";
        html += "<tr>";
        html += "<td>";
            html += "<select name='product[product_item_id][]' class='form-control'>";
            html += "@foreach($product_items as $product_item)";
                html += "<option value='{{ $product_item->id }}'>{{ $product_item->name }}</option>";
            html += "@endforeach";
            html += "</select>";
        html += "</td>";
        html += "<td>";
            html += "<input type='hidden' name='product[id][]'>";
            html += "<button class='btn btn-sm btn-danger delProduct' value='ลบ'>ลบ</button>";
        html += "</td>";
        html += "</tr>";
        $('#tbProduct tbody').append(html);
    });

    // กดปุ่มลบสินค้า
    $('body').on('click', '.delProduct', function(){
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
                // create remove input
                if($(this).attr('data-id').length){
                    $("<input type='hidden' name='removeProduct[id][]' value='"+$(this).attr('data-id')+"'>").appendTo("form");
                }
                // remove item
                $(this).closest('tr').remove();
            }
        });
    });

});
</script>
@endpush