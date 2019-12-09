@extends('layouts.front')

@section('content')

<!--########################## START CONTENT ##########################-->
<div class="row wrap-content">
    <div class="container">
        <hr class="line2">
        </hr>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bread justify-content-end">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">หน้าแรก</a></li>
                <li class="breadcrumb-item active" aria-current="page">สถานะการสั่งซื้อ</li>
            </ol>
        </nav>

        <!-- END Breadcrump -->
        <div class="title-page">สถานะการสั่งซื้อ</div>
        <div class="mt-4 mb-5 p-5 about bg-white">
            <table class="table table-striped">
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
                            <td>{{ $order->status }}</td>
                            <td>
                                <a class="btn btn-warning btn-sm" href="{{ url('member/order/view/'.$order->id) }}" role="button">ดูรายละเอียด</a>
                                @if($order->status == 'รอการแจ้งโอน')
                                    <a class="btn btn-danger btn-sm" href="{{ url('member/order/delete/'.$order->id) }}" role="button" onclick="archiveFunction()">ลบ</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!--########################## END CONTENT ##########################-->

@endsection
