<div class="card-body">
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <label>น้ำหนักเริ่มต้น (กรัม)</label>
                <input name="start_weight" value="{{ @$rs->start_weight ?? old('start_weight') }}" type="text" class="form-control">
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label>น้ำหนักสิ้นสุด (กรัม)</label>
                <input name="end_weight" value="{{ @$rs->end_weight ?? old('end_weight') }}" type="text" class="form-control">
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label>ค่าจัดส่ง (บาท)</label>
                <input name="cost" value="{{ @$rs->cost ?? old('cost') }}" type="text" class="form-control">
            </div>
        </div>
    </div>
</div>
<!-- /.card-body -->

<div class="card-footer">
    <button type="submit" class="btn btn-primary">บันทึก</button>
    <button type="button" class="btn btn-default float-right" onclick="document.location='{{ url('admin/shipping-rate') }}'">ย้อนกลับ</button>
</div>
