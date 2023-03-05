<br><br><br>
    <div class="container">
    {!! Form::open(array('route' => 'hotel.store','method'=>'POST')) !!}
            <div class="row justify-content-md-center">
                
                <div class="col col-lg-2">
                <strong>Tanggal Check In</strong>
                <br>
                <br>
                {!! Form::date('tanggal_checktin', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
                </div>
                <div class="col col-lg-2">
                <strong>Tanggal Check Out</strong>
                <br>
                <br>
                {!! Form::date('tanggal_checktout', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
                </div>
                <div class="col col-lg-2">
                <strong>Jumlah Kamar</strong>
                <br>
                <br>
                {!! Form::number('jumlah_kamar', '1') !!}
                </div>
                <div class="col col-lg-2">
                    <br>
                    <br>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-light">Pesan</button>
                </div>
                </div>
                
            </div>
            
    {!! Form::close() !!}
  
</div>