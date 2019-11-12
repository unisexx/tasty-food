@extends('adminlte::page')

@section('title', 'ความรู้น่ารู้')

@section('content_header')
<h1>ความรู้น่ารู้</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Index</h3>
        <div class="card-tools">
            <a href="{{ url('admin/knowledge/create') }}"><button type="button" class="btn btn-block btn-primary">+ เพิ่มรายการ</button></a>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="data-table" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th class="no-sort">เผยแพร่</th>
                    <th class="no-sort">รูป</th>
                    <th>หัวข้อ</th>
                    <th>วันที่สร้าง</th>
                    <th class="no-sort">จัดการ</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rs as $row)
                <tr>
                    <td>
                        <input class="switch_status" data-id="<?php echo $row->id?>" data-tb="knowledges" type="checkbox" @if(@$row->status == 1) checked @endif data-bootstrap-switch>
                    </td>
                    <td><img src="{{ url('uploads/knowledge/'.$row->image) }}" width="100"></td>
                    <td>{{ $row->title }}</td>
                    <td>{{ $row->created_at }}</td>
                    <td>
                        <a href="{{ url('admin/knowledge/' . $row->id . '/edit') }}" title="แก้ไขรายการนี้">
                            <button id="btnFA" class="btn btn-sm btn-warning">แก้ไข</button>
                        </a>

                        <form method="POST" action="{{ url('admin/knowledge/' . $row->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-sm btn-danger" title="ลบรายการนี้" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                ลบ
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>เผยแพร่</th>
                    <th>รูป</th>
                    <th>หัวข้อ</th>
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
