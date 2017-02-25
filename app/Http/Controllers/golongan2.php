<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use App\Golongan;

class golongan2 extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Golongan::find($id);
        return view('FGolongan.edit2',compact('data'));
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
            'Kode_golongan' => 'required',
            'Nama_golongan' => 'required',
            'Besaran_uang'  => 'required',
        ]);

        $gol = Golongan::findOrFail($id);
        $gol->Kode_golongan = $request->Kode_golongan;
        $gol->Nama_golongan = $request->Nama_golongan;
        $gol->Besaran_uang = $request->Besaran_uang;
        $gol->save();
        if($gol->save()){
            Session::flash('pesan_sukses','Berhasil Mengedit Data Golongan');
        }
        else{
            Session::flash('pesan_gagal','Gagal Mengedit Data Golongan');
        }
        return redirect('Golongan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
}
