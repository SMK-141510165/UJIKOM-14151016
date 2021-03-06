@extends('layouts.penggajian')

@section('content')
<br><br><br><br><br><br><br>
 <div class="right_col" role="main">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                  @if(!empty($errors->first()))
                      <div class="alert alert-danger">{!! $errors->first() !!}</div>
                    @endif
                  </div>
                  <div class="x_title">
                    <center><h2>Input Data Jabatan</h2></center>
                  </div>
                  <div class="x_content">
                    <br />
                  {!! Form::open(['url' => 'Jabatan', 'class' => 'form-horizontal form-label-left']) !!}
      <div class="form-group">
          <div class="control-label col-md-3 col-sm-3 col-xs-12">
              {!! Form::label('Kode Jabatan', 'Kode Jabatan ') !!}
               <span class="required">*</span>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-12">
              {!! Form::text('Kode_jabatan',null,['class'=>'form-control col-md-7 col-xs-12']) !!}
        
          </div>
      </div>
      <div class="form-group">
          <div class="control-label col-md-3 col-sm-3 col-xs-12">
              {!! Form::label('Nama Jabatan', 'Nama Jabatan') !!}
               <span class="required">*</span>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-12">
              {!! Form::text('Nama_jabatan',null,['class'=>'form-control col-md-7 col-xs-12']) !!}
        
          </div>
      </div>
      <div class="form-group">
          <div class="control-label col-md-3 col-sm-3 col-xs-12">
              {!! Form::label('Besaran Uang', 'Besaran Uang') !!}
               <span class="required">*</span>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-12">
              {!! Form::number('Besaran_uang',null,['class'=>'form-control col-md-7 col-xs-12']) !!}
        
          </div>
      </div>
      <div class="form-group">
          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              {!! Form::submit('Save', ['class' => 'btn btn-success form-control']) !!}
          </div>
      </div>
    </div>
    {!! Form::close() !!}
             
    
@endsection
