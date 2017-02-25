<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use App\Jabatan;
use App\Golongan;
use App\Tunjangans;

class tunjangans2 extends Controller
{
    public function edit($id)
    {
        $data = Tunjangans::find($id);

        $jselect = Jabatan::whereIn('id',[$data->jabatan_id])->first();
        $jabatan = Jabatan::whereNotIn('id',[$data->jabatan_id])->get();

        $gselect = Golongan::whereIn('id',[$data->golongan_id])->first();
        $golongan = Golongan::whereNotIn('id',[$data->golongan_id])->get();

        return view('FTunjangan.edit2',compact('data','jabatan','golongan','jselect','gselect'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
           'Kode_tunjangan' => 'required',
            'Status' => 'required',
            'Jumlah_anak' => 'required',
            'Besaran_uang' => 'required',
        ]);

        $lembur = Tunjangans::findOrFail($id);
        $lembur->Kode_tunjangan = $request->get('Kode_tunjangan');
        $lembur->jabatan_id = $request->get('jabatan_id');
        $lembur->golongan_id = $request->get('golongan_id');
        $lembur->Status = $request->get('Status');
        $lembur->Jumlah_anak = $request->get('Jumlah_anak');
        $lembur->Besaran_uang = $request->get('Besaran_uang');
        $lembur->save();
        if($lembur->save()){
            Session::flash('pesan_sukses','Berhasil Mengedit Data Lembur Pegawai');
        }
        else{
            Session::flash('pesan_gagal','Gagal Mengedit Data Lembur Pegawai');
        }
        return redirect('Tunjangan');
    }

}
