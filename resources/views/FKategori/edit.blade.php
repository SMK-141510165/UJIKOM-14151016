@extends('layouts.penggajian')

@section('content')
 <br><br><br><br><br><br>
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
                    <center><h2>Edit Kategori Lembur</h2></center>
                  <div class="x_content">
                    <br />
    {!! Form::model($data,['method' => 'PATCH','route'=>['Kategori.update',$data->id],'class' => 'form-horizontal form-label-left']) !!}
     <div class="form-group">
    <div class="form-inline">
          <div class="control-label col-md-3 col-sm-3 col-xs-12">
              {!! Form::label('Kode Lembur ', 'Kode Lembur  ') !!}
          </div>
          <div class="col-md-6 col-sm-6 col-xs-12">
              {!! Form::number('Kode_lembur',null,['class'=>'form-control col-md-7 col-xs-12', 'readonly']) !!}&nbsp;&nbsp;
               <a title="Edit Kode Lembur" href="{{route('Kategori2.edit',$data->id)}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
          </div>
      </div>
      </div>
     <div class="form-group">
        <div class="control-label col-md-3 col-sm-3 col-xs-12">
            {!! Form::label('Jabatan', 'Jabatan ') !!}
             <span class="required">*</span>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <select class="form-control col-md-7 col-xs-12" name="jabatan_id">
            <option value="{{ $jselect->id }}" selected>{{ $jselect->Nama_jabatan }}</option>
            @foreach($jabatan as $data)
                <option value="{{$data->id}}">{{$data->Nama_jabatan}}</option>
            @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <div class="control-label col-md-3 col-sm-3 col-xs-12">
            {!! Form::label('Golongan', 'Golongan ') !!}
             <span class="required">*</span>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <select class="form-control col-md-7 col-xs-12" name="golongan_id">
            <option value="{{ $gselect->id }}" selected>{{ $gselect->Nama_golongan }}</option>
            @foreach($gol as $data)
                <option value="{{$data->id}}">{{$data->Nama_golongan}}</option>
            @endforeach
            </select>
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