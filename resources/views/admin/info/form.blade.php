
<div class="card-body">
    <div class="form-group">
        <label for="image">รูปประกอบข่าว</label>
        @if(isset($rs->image))
            <div><img src="{{ url('uploads/info/'.$rs->image) }}" width="200"></div>
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
</div>
