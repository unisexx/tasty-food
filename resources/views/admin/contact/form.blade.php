
<style>
.ck-editor__editable_inline {
    min-height: 500px !important;
}
</style>

<div class="card-body">
    <div class="form-group">
        <label for="address">ที่อยู่</label>
        <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" placeholder="ที่อยู่" value="{{ isset($rs->address) ? $rs->address : old('address') }}">
    </div>
    <div class="form-group">
        <label for="email">อีเมล์</label>
        <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="หัวข้อ" value="{{ isset($rs->email) ? $rs->email : old('email') }}">
    </div>
    <div class="form-group">
        <label for="tel">เบอร์โทรศัพท์</label>
        <input type="text" class="form-control @error('tel') is-invalid @enderror" id="tel" name="tel" placeholder="หัวข้อ" value="{{ isset($rs->tel) ? $rs->tel : old('tel') }}">
    </div>
</div>
<!-- /.card-body -->

<div class="card-footer">
    <button type="submit" class="btn btn-primary">บันทึก</button>
</div>
