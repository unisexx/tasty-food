@extends('adminlte::page')

@section('title', 'วิดีโอ (เพิ่ม/แก้ไข)')

@section('content_header')
<h1>วิดีโอ (เพิ่ม/แก้ไข)</h1>
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

    <form method="POST" action="{{ url('admin/vdo/' . $rs->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}
        @include ('admin.vdo.form', ['formMode' => 'edit'])
    </form>
</div>
<!-- /.card -->

@stop
