@extends('adminlte::page')

@section('title', 'สมาชิกร้านค้า')

@section('content_header')
<h1>สมาชิกร้านค้า</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Index</h3>
        {{-- <div class="card-tools">
            <a href="{{ url('admin/user/create') }}"><button type="button" class="btn btn-block btn-primary">+ เพิ่มรายการ</button></a>
        </div> --}}
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="data-table" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th class="no-sort">สถานะ</th>
                    <th>ชื่อร้านค้า</th>
                    <th>เลขใบอนุญาตร้านค้า</th>
                    <th>ใบอนุญาตขายยา</th>
                    <th>ใบประกอบวิชาชีพ</th>
                    <th>โทรศัพท์</th>
                    <th>ประเภท</th>
                    <th class="no-sort">จัดการ</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rs as $row)
                <tr>
                    <td>
                        <input class="switch_status" data-id="<?php echo $row->id?>" data-tb="users" type="checkbox" @if(@$row->status == 1) checked @endif data-bootstrap-switch>
                    </td>
                    <td>{{ $row->shop_name }}</td>
                    <td>{{ $row->shop_license }}</td>
                    <td><a href=""><img src="{{ asset('uploads/user/sell_license/'.$row->sell_license) }}" width="90"></a></td>
                    <td><img src="{{ asset('uploads/user/pro_license/'.$row->pro_license) }}" width="90"></td>
                    <td>{{ $row->tel }}</td>
                    <td>{!! $row->is_vip == 1 ? '<span class="badge bg-warning"><i class="fas fa-crown"></i> VIP</span>' : '<span class="badge bg-info">normal</span>' !!}</td>
                    <td>
                        <a href="{{ url('admin/store/' . $row->id . '/edit') }}" title="แก้ไขรายการนี้">
                            <button id="btnFA" class="btn btn-sm btn-warning">แก้ไข</button>
                        </a>

                        <form method="POST" action="{{ url('admin/store/' . $row->id) }}" accept-charset="UTF-8" style="display:inline">
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
                    <th>สถานะ</th>
                    <th>ชื่อร้านค้า</th>
                    <th>เลขใบอนุญาตร้านค้า</th>
                    <th>ใบอนุญาตขายยา</th>
                    <th>ใบประกอบวิชาชีพ</th>
                    <th>โทรศัพท์</th>
                    <th>ประเภท</th>
                    <th>จัดการ</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
@stop
