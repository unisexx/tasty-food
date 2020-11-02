
<div class="card-body">
    <div class="form-group">
        <label for="knowledge-category">ตำแหน่งของแบนเนอร์</label>
        <select name="position" class="form-control">
            <option value="1" {{ @$rs->position == 1 ? "selected" : "" }}>หน้าแรก (ข้างไฮไลท์)</option>
        </select>
    </div>
    <div class="form-group">
        <label for="title">หัวข้อ</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="หัวข้อ" value="{{ isset($rs->title) ? $rs->title : old('title') }}">
    </div>
    <div class="form-group">
        <label for="title">ลิ้งค์ embed youtube</label>
        <input type="text" class="form-control @error('url') is-invalid @enderror" id="url" name="url" placeholder="https://www.youtube.com/embed/V7TrAVE3iJs" value="{{ isset($rs->url) ? $rs->url : old('url') }}">
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
    <button type="button" class="btn btn-default float-right" onclick="document.location='{{ url('admin/vdo') }}'">ย้อนกลับ</button>
</div>
