@extends('layouts.penggajian')

@section('content')
<!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                @if (Auth::guest())
                    <img class="img-responsive" alt="" src="{{url('penggajian/img/lock.png')}}">
                    <div class="intro-text">
                        <span class="name">SELAMAT DATANG</span>
                        <hr class="star-light">
                        <span class="skills">Anda Tidak Meiliki Hak Akses , Anda Harus Login/Registrasi Terlebih Dahulu!</span>
                    </div>
                    @else
                    <img class="img-responsive" alt="" src="{{url('penggajian/img/profile.png')}}">
                    <div class="intro-text">
                        <span class="name">PENGGAJIAN</span>
                        <hr class="star-light">
                        <span class="skills"> <b>{{ Auth::user()->name }}</b> , Anda Memilih Penggajian</span>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </header>
<br>
	 <div class="right_col" role="main">
          <div class="col-md-12 col-sm-12 col-xs-12">
            @if(Session::has('pesan_sukses'))
                  <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{Session::get('pesan_sukses')}}
                  </div>
                @elseif(Session::has('pesan_gagal'))
                  <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{Session::get('pesan_gagal')}}
                  </div>
                @endif
              </div>
      <div class="container">
 &nbsp;&nbsp;&nbsp;<a href="{{url('Penggajians/create')}}" class="btn btn-primary">Input Data Penggajian&nbsp;&nbsp;&nbsp;<i class="fa fa-pencil"></i></a>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                   <center> <h2>Daftar Penggajian</h2></center>
                  <hr>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th><p class="center"><center>No.</center></p></th>
                          <th><p class="center"><center>Pegawai</center></p></th>
                          <th><p class="center"><center>Jumlah Jam Lembur</center></p></th>
                          <th><p class="center"><center>Jumlah Uang Lembur</center></p></p></th>
                          <th><p class="center"><center>Gaji Pokok</center></p></p></th>
                          <th><p class="center"><center>Total Gaji</center></p></p></th>
                          <th><p class="center"><center>Tanggal Pengambilan</center></p></p></th>
                          <th><p class="center"><center>Status Pengambilan</center></p></p></th>
                          <th><p class="center"><center>Petuga Penerima</center></p></p></th>
                          <th colspan="3"><p class="center"><center>Tindakan</center></p></th>
                        </tr>
                      </thead>
                            @php
                            $no = 1;
                            @endphp
                            @foreach($gajian as $data)
                            <tbody>
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$data->Tunjangan_pegawai->Pegawai->User->name}}</td>
                                    <td>{{$data->Jumlah_jam_lembur}} </td>
                                    <td>{{$data->Jumlah_uang_lembur}} </td>
                                    <td>{{$data->Gaji_pokok}} </td>
                                    <td>{{$data->Total_gaji}} </td>
                                    <td>{{$data->updated_at}} </td>
                                    
                                    @if($data->Status_pengambilan == 0)
                                    
                                        <td>Belum Diambil </td>
                                    
                                    @endif
                                    @if($data->Status_pengambilan == 1)
                                    
                                        <td>Sudah Diambil</td>
                                    
                                    @endif
                                  <td>{{$data->Petugas_penerima}} </td>

                                 <th><center><a title="Detail" href="{{url('Penggajians',$data->id)}}" class="btn btn-primary"><i class="fa fa-eye"></i></a></center></th>
                                 <th><center><a title="Edit" href="{{route('Penggajians.edit',$data->id)}}" class="btn btn-warning"><i class="fa fa-edit"></i></a></center></th>
                                 <th><center>
                                   <a data-toggle="modal" href="#delete{{ $data->id }}" class="btn btn-danger" title="Delete" data-toggle="tooltip"><i class="fa fa-trash"></i></a>
                                  @include('modals.del', [
                                    'url' => route('Penggajians.destroy', $data->id),
                                    'model' => $data
                                  ])</center>
                                 </th>
                             </tr>
                         @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
@endsection