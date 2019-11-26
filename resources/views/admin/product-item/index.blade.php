@extends('adminlte::page')

@section('title', 'คลังสินค้า')

@section('content_header')
<h1>คลังสินค้า</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Index</h3>
        <div class="card-tools">
            <a href="{{ url('admin/product-item/create') }}"><button type="button" class="btn btn-block btn-primary">+ เพิ่มรายการ</button></a>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="data-table" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th class="no-sort">เผยแพร่</th>
                    <th class="no-sort">รูป</th>
                    <th>แบรนด์</th>
                    <th>ชื่อสินค้า</th>
                    <th>จำนวนที่มี</th>
                    <th>ราคา</th>
                    <th class="no-sort">จัดการ</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rs as $row)
                <tr>
                    <td>
                        <input class="switch_status" data-id="<?php echo $row->id?>" data-tb="product_items" type="checkbox" @if(@$row->status == 1) checked @endif data-bootstrap-switch>
                    </td>
                    <td><img src="{{ url('uploads/product/'.@$row->productImageFirst->name) }}" width="100"></td>
                    <td>{{ $row->brand }}</td>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->stock }}</td>
                    <td>{{ $row->price }}</td>
                    <td>
                        <a href="{{ url('admin/product-item/' . $row->id . '/edit') }}" title="แก้ไขรายการนี้">
                            <button id="btnFA" class="btn btn-sm btn-warning">แก้ไข</button>
                        </a>

                        <form method="POST" action="{{ url('admin/product-item/' . $row->id) }}" accept-charset="UTF-8" style="display:inline">
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
                    <th>เผยแพร่</th>
                    <th>รูป</th>
                    <th>แบรนด์</th>
                    <th>ชื่อสินค้า</th>
                    <th>จำนวนที่มี</th>
                    <th>ราคา</th>
                    <th>จัดการ</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
@stop
