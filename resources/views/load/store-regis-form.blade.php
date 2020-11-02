<div class="title-page7 mb-4"><i class="fa fa-edit black"></i> ข้อมูลสำหรับเข้าสู่ระบบ
</div>
<div class="form-row">
    <div class="form-group col-md-12">
        <label for="s-email">อีเมล์</label>
        <input id="s-email" name="email" type="email" class="form-control" placeholder="อีเมล์">
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="s-password">รหัสผ่าน</label>
        <input id="s-password" name="password" type="password" class="form-control" placeholder="รหัสผ่าน">
    </div>
    <div class="col-sm-6">
        <label for="s-password-confirmation">ยืนยันรหัสผ่าน</label>
        <input id="s-password-confirmation" name="password_confirmation" type="password" class="form-control form-control-user" placeholder="ยืนยันรหัสผ่าน">
    </div>
</div>

<div class="title-page7 mt-5 mb-4"><i class="fa fa-edit black"></i> ข้อมูลประกอบการค้า</div>
<div class="card col-md-4 pt-2 pl-4">
    <strong>*เอกสารที่ต้องเตรียมก่อนสมัคร</strong>
    <ol>
        <li><strong>รูปใบอนุญาตขายยา</strong></li>
        <li><strong>รูปใบประกอบวิชาชีพ</strong></li>
    </ol>
</div>
<div class="clearfix"></div>
<div class="form-group">
    <div class="custom-file col-md-12 mt-3">
        <input name="sell_license" type="file" class="custom-file-input" id="customFile1">
        <label class="custom-file-label" for="customFile1">*ใบอนุญาตขายยา/ใบอนุญาตสถานพยาบาล</label>
        <div class="text-red">*จำเป็นต้องใส่ โดยภาพและตัวอักษรชัดเจน หากไม่มี ทาง admin ไม่สามารถเปิดใช้งาน user
            ให้ได้*</div>
        <div class="valid-feedback">
            Looks good!
        </div>
    </div>
    <div class="custom-file col-md-12 mt-3">
        <input name="pro_license" type="file" class="custom-file-input" id="customFile2">
        <label class="custom-file-label" for="customFile2">*ใบประกอบวิชาชีพ</label>
        <div class="text-red">*จำเป็นต้องใส่ โดยภาพและตัวอักษรชัดเจน หากไม่มี ทาง admin
            ไม่สามารถเปิดใช้งาน user ให้ได้*</div>
        <div class="valid-feedback">
            Looks good!
        </div>
    </div>
</div>

<div class="title-page7 mt-5 mb-4"><i class="fa fa-edit black"></i> ข้อมูลร้านค้า</div>
<div class="form-row">
    <div class="col-md-8 mb-4">
        <label for="s-shop">ชื่อร้านค้า/คลินิก</label>
        <input id="s-shop" name="shop_name" type="text" class="form-control" placeholder="ชื่อร้านค้า/คลินิก" value="" required>
        <div class="valid-feedback">
            Looks good!
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <label for="s-store-license">เลขใบอนุญาตร้านค้า</label>
        <input id="s-store-license" name="shop_license" type="text" class="form-control" placeholder="เลขใบอนุญาตร้านค้า" value="" required>
        <div class="valid-feedback">
            Looks good!
        </div>
    </div>
</div>
<div class="form-row">
    <div class="col-md-12 mb-3">
        <label for="s-address">ที่อยู่จัดส่ง</label>
        <input id="s-address" name="address" type="text" class="form-control" placeholder="ที่อยู่จัดส่ง" required>
        <div class="invalid-feedback">
            กรุณากรอกที่อยู่จัดส่ง.
        </div>
    </div>
    <div class="form-group col-md-6">
        <label for="tumbon">ตำบล / แขวง</label>
        <input class="form-control" type="text" id="tumbon" placeholder="ตำบล" name="shop_tumbon" value="">
    </div>
    <div class="form-group col-md-6">
        <label for="amphoe">อำเภอ / เขต</label>
        <input class="form-control" type="text" id="amphoe" placeholder="อำเภอ" name="shop_amphoe" value="">
    </div>
    <div class="form-group col-md-6">
        <label for="province">จังหวัด</label>
        <input class="form-control" type="text" id="province" placeholder="จังหวัด" name="shop_province" value="">
    </div>
    <div class="form-group col-md-6">
        <label for="zipcode">รหัสไปรษณีย์</label>
        <input class="form-control" type="text" id="zipcode" placeholder="รหัสไปรษณีย์" name="shop_zipcode" value="">
    </div>
</div>
<div class="form-row mt-2">
    <div class="col-md-12 mb-3">
        <label for="s-name">ชื่อผู้ติดต่อหลัก</label>
        <input name="name" type="text" class="form-control" id="s-name" placeholder="ชื่อผู้ติดต่อหลัก" value="">
        <div class="valid-feedback">
            Looks good!
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <label for="s-tel">เบอร์โทรศัพท์มือถือ</label>
        <input id="s-tel" name="tel" type="text" class="form-control" placeholder="เบอร์โทรศัพท์มือถือ" value="">
        <div class="valid-feedback">
            Looks good!
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <label for="s-tel2">เบอร์โทรศัพท์ร้าน</label>
        <input id="s-tel2" name="shop_tel" type="text" class="form-control" placeholder="เบอร์โทรศัพท์ร้าน">
    </div>
</div>
<input type="hidden" name="type" value="2">
<button type="submit" class="col-6 mt-5 mb-5 btn btn-primary btn-lg pl-4 pr-4 mx-auto d-block mt-4">ลงทะเบียน</button>

<script>
$(document).ready(function(){
    $.Thailand({
        $district: $('#tumbon'), // input ของตำบล
        $amphoe: $('#amphoe'), // input ของอำเภอ
        $province: $('#province'), // input ของจังหวัด
        $zipcode: $('#zipcode'), // input ของรหัสไปรษณีย์
    });

    // file input
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
});
</script>