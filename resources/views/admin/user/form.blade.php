
<div class="card-body">
    <div class="form-group">
        <label for="title">ชื่อ</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="ชื่อ" value="{{ isset($rs->name) ? $rs->name : old('name') }}">
    </div>
    <div class="form-group">
        <label for="title">อีเมล์</label>
        <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="อีเมล์" value="{{ isset($rs->email) ? $rs->email : old('email') }}">
    </div>
    <div class="form-group">
        <label for="title">เบอร์โทรศัพท์</label>
        <input type="text" class="form-control @error('tel') is-invalid @enderror" id="tel" name="tel" placeholder="เบอร์โทรศัพท์" value="{{ isset($rs->tel) ? $rs->tel : old('tel') }}">
    </div>
    <div class="form-group">
        <label for="title">ที่อยู่จัดส่ง</label>
        <textarea name="address" id="address" class="form-control @error('address') is-invalid @enderror" cols="30" rows="5" placeholder="ที่อยู่จัดส่ง">{{ isset($rs->address) ? $rs->address : old('address') }}</textarea>
    </div>
</div>
<!-- /.card-body -->

<div class="card-footer">
    <button type="submit" class="btn btn-primary">บันทึก</button>
    <button type="button" class="btn btn-default float-right" onclick="document.location='{{ url('admin/user') }}'">ย้อนกลับ</button>
</div>
