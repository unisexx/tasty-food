
<div class="card-body">
    <div class="form-group">
        <label for="title">หัวข้อ</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="หัวข้อ" value="{{ isset($rs->title) ? $rs->title : old('title') }}">
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
    <button type="button" class="btn btn-default float-right" onclick="document.location='{{ url('admin/knowledge-category') }}'">ย้อนกลับ</button>
</div>
