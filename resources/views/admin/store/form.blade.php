
<div class="card-body">
    <div class="form-group">
        <label for="title">รูปใบอนุญาตขายยา</label>
        <div><a href="{{ url('uploads/user/sell_license/'.$rs->sell_license) }}" target="_blank"><img src="{{ asset('uploads/user/sell_license/'.$rs->sell_license) }}" width="150"></a></div>
    </div>
    <div class="form-group">
        <label for="title">รูปใบประกอบวิชาชีพ</label>
        <div><a href="{{ url('uploads/user/pro_license/'.$rs->pro_license) }}" target="_blank"><img src="{{ asset('uploads/user/pro_license/'.$rs->pro_license) }}" width="150"></a></div>
    </div>
    <div class="form-group">
        <label for="title">ชื่อร้านค้า/คลินิก</label>
        <input type="text" class="form-control @error('shop_name') is-invalid @enderror" id="name" name="name" placeholder="ชื่อร้านค้า/คลินิก" value="{{ isset($rs->shop_name) ? $rs->shop_name : old('shop_name') }}">
    </div>
    <div class="form-group">
        <label for="title">เลขใบอนุญาตร้านค้า</label>
        <input type="text" class="form-control @error('shop_license') is-invalid @enderror" id="name" name="name" placeholder="ชื่อร้านค้า/คลินิก" value="{{ isset($rs->shop_license) ? $rs->shop_license : old('shop_license') }}">
    </div>
    <div class="form-group">
        <label for="title">ที่อยู่จัดส่ง</label>
        <textarea name="address" id="address" class="form-control @error('address') is-invalid @enderror" cols="30" rows="5" placeholder="ที่อยู่จัดส่ง">{{ isset($rs->address) ? $rs->address : old('address') }}</textarea>
    </div>
    <div class="form-group">
        <label for="title">ตำบล / แขวง</label>
        <input type="text" class="form-control @error('shop_tumbon') is-invalid @enderror" id="shop_tumbon" name="shop_tumbon" placeholder="ตำบล / แขวง" value="{{ isset($rs->shop_tumbon) ? $rs->shop_tumbon : old('shop_tumbon') }}">
    </div>
    <div class="form-group">
        <label for="title">อำเภอ / เขต</label>
        <input type="text" class="form-control @error('shop_amphoe') is-invalid @enderror" id="shop_amphoe" name="shop_amphoe" placeholder="อำเภอ / เขต" value="{{ isset($rs->shop_amphoe) ? $rs->shop_amphoe : old('shop_amphoe') }}">
    </div>
    <div class="form-group">
        <label for="title">จังหวัด</label>
        <input type="text" class="form-control @error('shop_province') is-invalid @enderror" id="shop_province" name="shop_province" placeholder="จังหวัด" value="{{ isset($rs->shop_province) ? $rs->shop_province : old('shop_province') }}">
    </div>
    <div class="form-group">
        <label for="title">รหัสไปรษณีย์</label>
        <input type="text" class="form-control @error('shop_zipcode') is-invalid @enderror" id="shop_zipcode" name="shop_zipcode" placeholder="รหัสไปรษณีย์" value="{{ isset($rs->shop_zipcode) ? $rs->shop_zipcode : old('shop_zipcode') }}">
    </div>
    <div class="form-group">
        <label for="title">ชื่อผู้ติดต่อหลัก</label>
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
        <label for="title">เบอร์โทรศัพท์ร้าน</label>
        <input type="text" class="form-control @error('shop_tel') is-invalid @enderror" id="shop_tel" name="shop_tel" placeholder="เบอร์โทรศัพท์ร้าน" value="{{ isset($rs->shop_tel) ? $rs->shop_tel : old('shop_tel') }}">
    </div>
    <div class="form-group">
        <label for="is_vip">ลูกค้า VIP</label>
        <div>
            <input type="hidden" name="is_vip" value="0" checked>
            <input id="is_vip" type="checkbox" name="is_vip" value="1" @if(@$rs->is_vip == 1) checked @endif data-bootstrap-switch>
        </div>
    </div>
</div>
<!-- /.card-body -->

<div class="card-footer">
    <button type="submit" class="btn btn-primary">บันทึก</button>
    <button type="button" class="btn btn-default float-right" onclick="document.location='{{ url('admin/store') }}'">ย้อนกลับ</button>
</div>
