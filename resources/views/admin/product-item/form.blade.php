
<div class="card-body">
    <div class="form-group">
        <label for="image">รูปสินค้า (เลือกได้หลายภาพ)</label>
        @if(isset($rs->image))
            <div><img src="{{ url('uploads/product/'.$rs->image) }}" width="200"></div>
        @endif
        <div class="input-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="image" name="image[]" multiple>
                <label class="custom-file-label" for="image">Choose file</label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="title">แบรนด์</label>
        <input type="text" class="form-control @error('brand') is-invalid @enderror" id="brand" name="brand" placeholder="แบรนด์" value="{{ isset($rs->brand) ? $rs->brand : old('brand') }}">
    </div>
    <div class="form-group">
        <label for="title">ชื่อสินค้า</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="ชื่อสินค้า" value="{{ isset($rs->name) ? $rs->name : old('name') }}">
    </div>
    <div class="form-group">
        <label for="detail">รายละเอียดสินค้า</label>
        <textarea class="form-control tinyMCE" name="description">{!! isset($rs->description) ? $rs->description : old('description') !!}</textarea>
    </div>
    <div class="form-group">
        <label for="title">ราคา</label>
        <input type="text" class="form-control numDecimal @error('price') is-invalid @enderror" id="price" name="price" placeholder="ราคา" value="{{ isset($rs->price) ? $rs->price : old('price') }}"  style="width:150px;">
    </div>
    <div class="form-group">
        <label for="title">จำนวนที่มีในสต็อก</label>
        <input type="number" step="1" class="form-control @error('stock') is-invalid @enderror" id="stock" name="stock" placeholder="จำนวนที่มีในสต็อก" value="{{ isset($rs->stock) ? $rs->stock : old('stock') }}"  style="width:150px;">
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
