@php
    $product_items = App\Models\ProductItem::orderBy('name', 'asc')->get();
@endphp

<div class="card-body">
    <div class="form-group">
        <label for="image">รูปภาพ ขนาด (335x330 px)</label>
        @if(isset($rs->image))
            <div><img src="{{ url('uploads/promotion/'.$rs->image) }}" width="200"></div>
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
        <label for="product_item_id">เลือกสินค้าโปรโมชั่น</label>
        <select name="product_item_id" id="product_item_id" class="form-control @error('product_item_id') is-invalid @enderror">
            <option value="">--- เลือกสินค้า ---</option>
            @foreach ($product_items as $product_item)
                <option value="{{ $product_item->id }}">{{ $product_item->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="status">เผยแพร่</label>
        <div>
            <input type="hidden" name="status" value="0" checked>
            <input type="checkbox" name="status" value="1" @if(@$rs->status == 1 || @$rs->status === null) checked @endif data-bootstrap-switch>
        </div>
    </div>
</div>
<!-- /.card-body -->

<div class="card-footer">
    <button type="submit" class="btn btn-primary">บันทึก</button>
    <button type="button" class="btn btn-default float-right" onclick="document.location='{{ url('admin/hilight') }}'">ย้อนกลับ</button>
</div>
