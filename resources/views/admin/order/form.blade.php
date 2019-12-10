<div class="card-body">
    <div class="form-group">
        <label for="title">สถานะ</label>
        <select name="status" id="status" class="form-control">
            <option value="รอการแจ้งโอน" {{ $rs->status == 'รอการแจ้งโอน' ? 'selected' : ''}}>รอการแจ้งโอน</option>
            <option value="แจ้งโอนเงินแล้ว" {{ $rs->status == 'แจ้งโอนเงินแล้ว' ? 'selected' : ''}}>แจ้งโอนเงินแล้ว</option>
            <option value="จัดส่งสินค้าแล้ว" {{ $rs->status == 'จัดส่งสินค้าแล้ว' ? 'selected' : ''}}>จัดส่งสินค้าแล้ว</option>
        </select>
    </div>
    <div class="form-group">
        <label for="url">วันที่จัดส่งสินค้า</label>
        <input type="text" class="form-control" id="tracking_date" name="tracking_date" placeholder="วันที่จัดส่งสินค้า" value="{{ isset($rs->tracking_date) ? $rs->tracking_date : old('tracking_date') }}">
    </div>
    <div class="form-group">
        <label for="url">Tracking Number</label>
        <input type="text" class="form-control" id="tracking_number" name="tracking_number" placeholder="หมายเลขจัดส่ง" value="{{ isset($rs->tracking_number) ? $rs->tracking_number : old('tracking_number') }}">
    </div>
    <div class="form-group">
        <label for="image">สลิปหลักฐานการจัดส่ง</label>
        @if(isset($rs->image))
            <div>
                <img src="{{ url('uploads/order/'.$rs->image) }}" width="200">
            </div>
        @endif
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
    <button type="button" class="btn btn-default float-right" onclick="document.location='{{ url('admin/order') }}'">ย้อนกลับ</button>
</div>
