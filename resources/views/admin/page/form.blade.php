
<style>
.ck-editor__editable_inline {
    min-height: 500px !important;
}
</style>

<div class="card-body">
    <div class="form-group">
        <label for="title">หัวข้อ</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="หัวข้อ" value="{{ isset($rs->title) ? $rs->title : old('title') }}">
    </div>
    <div class="form-group">
        <label for="detail">เนื้อหา</label>
        <textarea id="editor" class="form-control" name="detail"></textarea>
    </div>
</div>
<!-- /.card-body -->

<div class="card-footer">
    <button type="submit" class="btn btn-primary">บันทึก</button>
</div>
