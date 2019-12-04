
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
    <div class="form-group">
        <label for="tel">facebook</label>
        <input type="text" class="form-control @error('facebook') is-invalid @enderror" id="facebook" name="facebook" placeholder="facebook" value="{{ isset($rs->facebook) ? $rs->facebook : old('facebook') }}">
    </div>
    <div class="form-group">
        <label for="tel">twitter</label>
        <input type="text" class="form-control @error('twitter') is-invalid @enderror" id="twitter" name="twitter" placeholder="twitter" value="{{ isset($rs->twitter) ? $rs->twitter : old('twitter') }}">
    </div>
    <div class="form-group">
        <label for="address">โค้ดแผนที่</label>
         <textarea class="form-control" name="map" rows="5">{!! isset($rs->map) ? $rs->map : old('map') !!}</textarea>
    </div>
</div>
<!-- /.card-body -->

<div class="card-footer">
    <button type="submit" class="btn btn-primary">บันทึก</button>
</div>
