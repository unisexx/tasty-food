@extends('adminlte::page')

@section('title', 'ข้อมูลการสั่งซื้อ')

@section('content_header')
<h1>ข้อมูลการสั่งซื้อ</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Index</h3>
        {{-- <div class="card-tools">
            <a href="{{ url('admin/order/create') }}"><button type="button" class="btn btn-block btn-primary">+ เพิ่มรายการ</button></a>
        </div> --}}
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="data-table" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>หมายเลขคำสั่งซื้อ</th>
                    <th>สถานะ</th>
                    <th>วันที่สร้าง</th>
                    <th class="no-sort">จัดการ</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rs as $row)
                <tr>
                    <td>{{ sprintf('%08d', $row->id) }}</td>
                    <td><span class="badge badge-{{ @order_status($row->status) }}">{{ $row->status }}</span></td>
                    <td>{{ $row->created_at }}</td>
                    <td>
                        <a href="{{ url('admin/order/' . $row->id . '/edit') }}" title="แก้ไขรายการนี้">
                            <button id="btnFA" class="btn btn-sm btn-warning">แก้ไข</button>
                        </a>

                        <form method="POST" action="{{ url('admin/order/' . $row->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-sm btn-danger" title="ลบรายการนี้" onclick="archiveFunction()">
                                ลบ
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>หมายเลขคำสั่งซื้อ</th>
                    <th>สถานะ</th>
                    <th>วันที่สร้าง</th>
                    <th>จัดการ</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
@stop
