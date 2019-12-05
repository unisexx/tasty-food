@extends('adminlte::page')

@section('title', 'ข้อความ')

@section('content_header')
<h1>ข้อความ</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Index</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="data-table" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ชื่อ</th>
                    <th>อีเมล์</th>
                    <th>ข้อความ</th>
                    <th>วันที่สร้าง</th>
                    <th class="no-sort">จัดการ</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rs as $row)
                <tr>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->email }}</td>
                    <td>{{ $row->message }}</td>
                    <td>{{ $row->created_at }}</td>
                    <td>
                        <form method="POST" action="{{ url('admin/message/' . $row->id) }}" accept-charset="UTF-8" style="display:inline">
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
                    <th>ชื่อ</th>
                    <th>อีเมล์</th>
                    <th>ข้อความ</th>
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
