
<div class="card-body">
    <div class="form-group">
        <label for="title">หัวข้อ</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="หัวข้อ">
    </div>
    <div class="form-group">
        <label for="url">ลิ้งค์</label>
        <input type="text" class="form-control" id="url" name="url" placeholder="ลิ้งค์">
    </div>
    <div class="form-group">
        <label for="image">รูปไฮไลท์</label>
        <div class="input-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="image" name="image">
                <label class="custom-file-label" for="image">Choose file</label>
            </div>
        </div>
    </div>
</div>
<!-- /.card-body -->

<div class="card-footer">
    <button type="submit" class="btn btn-primary">บันทึก</button>
</div>
