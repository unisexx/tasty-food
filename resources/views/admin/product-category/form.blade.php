@php
    $product_category = App\Models\ProductCategory::whereNull('parent_id')->orderBy('_lft')->get();
@endphp

<div class="card-body">
    <div class="form-group">
        <label>หมวดหมู่หลัก</label>
        <select name="parent_id" class="custom-select">
            <option value="">-- ตั้งเป็นหมวดหมู่หลัก --</option>
            @foreach($product_category as $row)
            <option value="{{ $row->id }}" @if(@$rs->parent_id == $row->id) selected @endif>{{ $row->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="title">ชื่อหมวดหมู่</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
            name="name" placeholder="ชื่อหมวดหมู่"
            value="{{ isset($rs->name) ? $rs->name : old('name') }}">
    </div>
    <div class="form-group">
        <label for="image">รูปขนาด (1168x236 px)</label>
        @if(isset($rs->image))
            <div><img src="{{ url('uploads/product-category/'.$rs->image) }}" width="200"></div>
        @endif
        <div class="input-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="image" name="image">
                <label class="custom-file-label" for="image">Choose file</label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="status">เผยแพร่</label>
        <div>
            <input type="hidden" name="status" value="0" checked>
            <input type="checkbox" name="status" value="1" @if(@$rs->status == 1 || @$rs->status === null) checked @endif data-bootstrap-switch>
        </div>
    </div>
</div>

<input type="hidden" name="id" value="{{ @$rs->id }}">

<script>
$(document).ready(function(){
    // Input File
    bsCustomFileInput.init();

    $("input[data-bootstrap-switch]").each(function(){
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });
});
</script>
