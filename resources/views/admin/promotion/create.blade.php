@extends('adminlte::page')

@section('title', 'โปรโมชั่น (เพิ่ม/แก้ไข)')

@section('content_header')
<h1>โปรโมชั่น (เพิ่ม/แก้ไข)</h1>
@stop


@section('content')

@if ($errors->any())
<ul class="alert alert-danger list-unstyled">
    <li><b>ไม่สามารถบันทึกได้เนื่องจาก</b></li>
    @foreach ($errors->all() as $error)
    <li>- {{ $error }}</li>
    @endforeach
</ul>
@endif

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Form</h3>
    </div>

    <form method="POST" action="{{ url('admin/promotion') }}" accept-charset="UTF-8" enctype="multipart/form-data">
    {{ csrf_field() }}
        @include ('admin.promotion.form', ['formMode' => 'create'])
    </form>
</div>
<!-- /.card -->

@stop
