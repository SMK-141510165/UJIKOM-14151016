<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use App\Pegawai;
use App\Golongan;
use App\Jabatan;

class Pegawai2 extends Controller
{
     public function edit( $id)
    {
        
        $pegawai = Pegawai::find($id);

        $jselect = Jabatan::whereIn('id',[$pegawai->jabatan_id])->first();
        $jabatan = Jabatan::whereNotIn('id',[$pegawai->jabatan_id])->get();

        $gselect = Golongan::whereIn('id',[$pegawai->golongan_id])->first();
        $golongan = Golongan::whereNotIn('id',[$pegawai->golongan_id])->get();

        return view('FPegawai.edit2',compact('pegawai','golongan','jabatan','jselect','gselect'));
    }

    public function update(Request $request, $id)
    {

        
        
        $pegawai = Pegawai::find($id);
        $pegawai->Nip = $request->get('Nip');
        $pegawai->jabatan_id = $request->get('jabatan_id');
        $pegawai->golongan_id = $request->get('golongan_id');

        if($request->hasFile('Photo')){

        $filename = null;
        $file = $request->file('Photo');
        $extension = $file->getClientOriginalExtension();
        $filename = md5(time()).'.'.$extension;
        $destinationPath = public_path().DIRECTORY_SEPARATOR.'/image/';
        $file->move($destinationPath,$filename); 
       //hapus cover lama , jika

        if ($pegawai->Photo) {
            $old_photo = $pegawai->Photo;
            $filepath = public_path().DIRECTORY_SEPARATOR.'/image/'.DIRECTORY_SEPARATOR.$pegawai->Photo;
            try {
                File::delete($filepath);
                    } 
                    catch (FileNotFoundExpetion $e) {
                        
                    }        
                }
        $pegawai->Photo = $filename;
        
    }
        $pegawai->update();
        if($pegawai->update()){
            Session::flash('pesan_sukses','Berhasil Mengedit Data Pegawai & NIP');
        }
        else{
            Session::flash('pesan_gagal','Gagal Mengedit Data Pegawai & NIP');
        } 
        
        return redirect('Pegawai');
}
}
