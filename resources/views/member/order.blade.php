@extends('layouts.front')

@push('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bread">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">หน้าแรก</a></li>
                <li class="breadcrumb-item active" aria-current="page">สถานะการสั่งซื้อ</li>
    </ol>
</nav>
@endpush

@section('content')
<div class="mb-5 about bg-white">
    @include('member.menu')
    <table class="table table-striped mt-3">
        <thead>
            <th>วันที่</th>
            <th>หมายเลขการสั่งซื้อ</th>
            <th>สถานะ</th>
            <th>จัดการ</th>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ DB2Date($order->created_at) }}</td>
                    <td>{{ sprintf('%08d', $order->id) }}</td>
                    <td><span class="badge badge-{{ @order_status($order->status) }}">{{ $order->status }}</span></td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="{{ url('member/order/view/'.$order->id) }}" role="button">ดูรายละเอียด</a>
                        @if($order->status == 'รอการแจ้งโอน')
                            <a class="btn btn-danger btn-sm" href="{{ url('member/order/delete/'.$order->id) }}" role="button" onclick="archiveFunction()">ลบ</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
