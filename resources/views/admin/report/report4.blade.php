@extends('adminlte::page')

@section('title', 'รายงานการเข้าชมสินค้า')

@section('content_header')
<h1>รายงานการเข้าชมสินค้า</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">
        <form action="">
            <label>ค้นหา</label>
            <div class="input-daterange input-group" id="datepicker">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-clock"></i></span>
                </div>
                <input type="text" class="input-sm form-control range-date" name="start_date" value="{{ request('start_date') }}"/>
                <div class="input-group-append">
                    <span class="input-group-text">ถึงวันที่</span>
                </div>
                <input type="text" class="input-sm form-control range-date" name="end_date" value="{{ request('end_date') }}"/>
            </div>
            
            <button type="submit" class="btn btn-sm btn-primary mt-2" title="ค้นหา">ค้นหา</button>
        </form>
    </div>
</div>
<!-- /.card -->


<div class="card">
    <!-- /.card-header -->
    <div class="card-body">
        <table id="data-table-report" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>หมวดหมู่</th>
                    <th>แบรนด์</th>
                    <th>ชื่อสินค้า</th>
                    <th>จำนวนผู้เข้าชม</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rs as $row)
                <tr>
                    <td>{{ $row->productCategory->name }}</td>
                    <td>{{ $row->brand }}</td>
                    <td>{{ $row->name }}</td>
                    <td>{{ number_format($row->product_item_counter_count) }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>หมวดหมู่</th>
                    <th>แบรนด์</th>
                    <th>ชื่อสินค้า</th>
                    <th>จำนวนผู้เข้าชม</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->

@stop