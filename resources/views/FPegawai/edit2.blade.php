@extends('layouts.penggajian')

@section('content')
 <br><br><br><br><br><br>
 <div class="col-md-12 col-sm-12 col-xs-12">
                  @if(!empty($errors->first()))
                      <div class="alert alert-danger">{!! $errors->first() !!}</div>
                    @endif
                  </div>
                    <center><h2>Edit Data Pegawai</h2></center>
                    <br />
    {!! Form::model($pegawai,['method' => 'PATCH','route'=>['Pegawai.update',$pegawai->id],'class' => 'form-horizontal form-label-left','files'=>'true']) !!}
    <div class="form-group">
          <div class="control-label col-md-3 col-sm-3 col-xs-12">
              {!! Form::label('NIP ', 'NIP  ') !!}
               <span class="required">*</span>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-12">
              {!! Form::number('Nip',null,['class'=>'form-control col-md-7 col-xs-12']) !!}
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
              {!! Form::label('Golongan ', 'Golongan ') !!}
               <span class="required">*</span>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <select class="form-control col-md-7 col-xs-12" name="golongan_id">
            <option value="{{ $gselect->id }}" selected>{{ $gselect->Nama_golongan }}</option>
            @foreach($golongan as $data)
                <option value="{{$data->id}}">{{$data->Nama_golongan}}</option>
            @endforeach
            </select>
        </div>
      </div>
      <div class="form-group">
          <div class="control-label col-md-3 col-sm-3 col-xs-12">
              {!! Form::label('Photo :', 'Photo : ') !!}
               <span class="required">*</span>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-12">
          <img src="{{asset('/image/'.$pegawai->Photo)}}" height="120px" width="100px">
              {!! Form::file('Photo',null,['class'=>'form-control col-md-7 col-xs-12']) !!}
          </div>
      </div>
      <div class="form-group">
          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              {!! Form::submit('Save', ['class' => 'btn btn-success form-control']) !!}
          </div>
      </div>
    {!! Form::close() !!}

@endsection