@extends('adminlte::page')

@section('title', 'ค่าขนส่ง')

@section('content_header')
<h1>ค่าขนส่ง</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Index</h3>
        <div class="card-tools">
            <a href="{{ url('admin/shipping-rate/create') }}"><button type="button" class="btn btn-block btn-primary">+ เพิ่มรายการ</button></a>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="data-table" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>น้ำหนักพัสดุ (กรัม)</th>
                    <th>ค่าขนส่ง (บาท)</th>
                    <th class="no-sort">จัดการ</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rs as $row)
                <tr>
                    <td>{{ number_format($row->start_weight) }} - {{ number_format($row->end_weight) }}</td>
                    <td>{{ number_format($row->cost, 2) }}</td>
                    <td>
                        <a href="{{ url('admin/shipping-rate/' . $row->id . '/edit') }}" title="แก้ไขรายการนี้">
                            <button id="btnFA" class="btn btn-sm btn-warning">แก้ไข</button>
                        </a>

                        <form method="POST" action="{{ url('admin/shipping-rate/' . $row->id) }}" accept-charset="UTF-8" style="display:inline">
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
                    <th>น้ำหนักพัสดุ</th>
                    <th>ค่าขนส่ง</th>
                    <th>จัดการ</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
@stop
