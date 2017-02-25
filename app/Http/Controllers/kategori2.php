<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use App\Kategori_lembur;
use App\Golongan;
use App\Jabatan;

class kategori2 extends Controller
{
    public function edit($id)
    {
        $data = kategori_lembur::find($id);

        $jselect = Jabatan::whereIn('id',[$data->jabatan_id])->first();
        $jabatan = Jabatan::whereNotIn('id',[$data->jabatan_id])->get();

        $gselect = Golongan::whereIn('id',[$data->golongan_id])->first();
        $gol = Golongan::whereNotIn('id',[$data->golongan_id])->get();

        return view('FKategori.edit2',compact('data','jabatan','gol','jselect','gselect'));
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
           'Kode_lembur' => 'required',
           'Besaran_uang'  => 'required',
        ]);

        $kategori = kategori_lembur::findOrFail($id);
        $kategori->Kode_lembur = $request->Kode_lembur;
        $kategori->jabatan_id = $request->jabatan_id;
        $kategori->golongan_id = $request->golongan_id;
        $kategori->Besaran_uang = $request->Besaran_uang;
        $kategori->save();
        if($kategori->save()){
            Session::flash('pesan_sukses','Berhasil Mengedit Data Kategori Lembur');
        }
        else{
            Session::flash('pesan_gagal','Gagal Mengedit Data Kategori Lembur');
        }
        return redirect('Kategori');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
}
