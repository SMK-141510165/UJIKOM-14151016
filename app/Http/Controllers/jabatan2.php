<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use App\Jabatan;

class jabatan2 extends Controller
{
    public function edit($id)
    {
        $data = Jabatan::find($id);
        return view('FJabatan.edit2',compact('data'));
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
            'Kode_jabatan' => 'required',
            'Nama_jabatan' => 'required',
            'Besaran_uang'  => 'required',
        ]);

        $jabatan = Jabatan::findOrFail($id);
        $jabatan->Kode_jabatan = $request->Kode_jabatan;
        $jabatan->Nama_jabatan = $request->Nama_jabatan;
        $jabatan->Besaran_uang = $request->Besaran_uang;
        $jabatan->save();
        if($jabatan->save()){
            Session::flash('pesan_sukses','Berhasil Mengedit Data Jabatan');
        }
        else{
            Session::flash('pesan_gagal','Gagal Mengedit Data Jabatan');
        }
        return redirect('Jabatan');
    }

}
