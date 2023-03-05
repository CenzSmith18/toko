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
{!! Form::open(array('url' => 'admin/store_type','method'=>'POST', 'enctype'=>'multipart/form-data')) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nama:</strong>
            {!! Form::text('type_label', null, array('placeholder' => 'Nama Type','class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            <strong>Jumlah Kamar:</strong>
            {!! Form::number('jumlah_kamar', null, array('placeholder' => '1','class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            <strong>Fasilitas:</strong>
            {!! Form::text('fasilitas', null, array('placeholder' => 'AC,TV,Bathub','class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            <strong>Gambar:</strong>
            {!! Form::file('image',array('class' => 'form-control')) !!}
        </div>
        <br>
    
    </div>
    
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
{!! Form::close() !!}

@endsection