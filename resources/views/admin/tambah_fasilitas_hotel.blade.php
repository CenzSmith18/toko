@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Buat Tipe</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="/admin"> Back</a>
        </div>
    </div>
</div>
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif
{!! Form::open(array('url' => 'admin/store_fasilitas_hotel','method'=>'POST')) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nama:</strong>
            {!! Form::text('nama_fasilitas_hotel', null, array('placeholder' => 'Nama Fasilitas Hotel','class' => 'form-control')) !!}
        </div>
        
        <div class="form-group">
            <strong>Keterangan:</strong>
            {!! Form::text('keterangan', null, array('placeholder' => 'Terdapat Di Lantai 1','class' => 'form-control')) !!}
        </div>
        <br>
    
    </div>
    
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
{!! Form::close() !!}

@endsection