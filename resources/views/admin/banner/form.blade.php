
<div class="card-body">
    <div class="form-group">
        <label for="title">หัวข้อ</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="หัวข้อ" value="{{ isset($rs->title) ? $rs->title : old('title') }}">
    </div>
    <div class="form-group">
        <label for="url">ลิ้งค์</label>
        <input type="text" class="form-control" id="url" name="url" placeholder="ลิ้งค์" value="{{ isset($rs->url) ? $rs->url : old('url') }}">
    </div>
    <div class="form-group">
        <label for="image">รูปไฮไลท์ ขนาด (1110x150 px)</label>
        @if(isset($rs->image))
            <div>
                <img src="{{ url('uploads/banner/'.$rs->image) }}" width="200">
                <input type="hidden" name="old_image" value="{{ $rs->image }}">
            </div>
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
<!-- /.card-body -->

<div class="card-footer">
    <button type="submit" class="btn btn-primary">บันทึก</button>
    <button type="button" class="btn btn-default float-right" onclick="document.location='{{ url('admin/banner') }}'">ย้อนกลับ</button>
</div>
