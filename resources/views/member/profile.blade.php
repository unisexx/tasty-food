@extends('layouts.front')

@push('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bread">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">หน้าแรก</a></li>
        <li class="breadcrumb-item active" aria-current="page">ข้อมูลส่วนตัว</li>
    </ol>
</nav>
@endpush

@section('content')
@include('member.menu')

<a href="{{ url('member/profile_form') }}"><button type="button" class="btn btn-block btn-primary float-right mt-3 mb-3" style="width:150px;">+ เพิ่มที่อยู่จัดส่ง</button></a>

<table class="table table-striped mt-3">
<thead>
    <tr>
        <td>ชื่อสถานที่</td>
        <td>ที่อยู่</td>
        <td style="width:110px;">จัดการ</td>
    </tr>
</thead>
<tbody>
    @foreach ($rs as $item)
        <tr>
            <td>{{ @$item->title }}</td>
            <td>
                {{ @$item->name }}<br>
                โทรศัพท์ {{ @$item->tel }}<br>
                {{ @$item->address }}
                {{ @$item->tumbon }}
                {{ @$item->amphoe }}
                {{ @$item->province }}
                {{ @$item->zipcode }}
            </td>
            <td>
                <a href="{{ url('member/profile_form?id=' . $item->id) }}" title="แก้ไขรายการนี้">
                    <button class="btn btn-sm btn-warning">แก้ไข</button>
                </a>

                <button class="btn btn-sm btn-danger" title="ลบรายการนี้" onclick="deleteAlert({{$item->id}})">ลบ</button>
            </td>
        </tr>
    @endforeach
</tbody>
</table>
@endsection

@push('js')
<script>
function deleteAlert($id) {
    Swal.fire({
    title: 'ยืนยันการลบข้อมูล?',
    text: "หลังจากที่ลบไปแล้วจะไม่สามารถดึงข้อมูลนี้กลับมาได้อีก!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'ลบเลย',
    cancelButtonText: 'ยกเลิก'
    }).then((result) => {
        if (result.value) {
            $(location).attr('href', '{{ url("member/profile_delete") }}/'+$id)
        }
    });
}
</script>
@endpush
