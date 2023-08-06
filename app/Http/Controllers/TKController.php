<?php

namespace App\Http\Controllers;

use App\Models\TKModel;
use Illuminate\Http\Request;

class TKController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'Tumbuh Kembang',
            'subtitle' => 'Halaman yang berisikan daftar data tumbuh kembang',
            'isi' => TKModel::all(),
        ];
        return view('t-k.index', $data);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function daftar()
    {
        $data = [
            'title' => 'Daftar Tumbuh Kembang',
            'subtitle' => 'Halaman yang berisikan daftar data tumbuh kembang yang tersimpan',
            'isi' => TKModel::all(),
        ];
        return view('daftarPenyakit', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'kode' => 'required|string|unique:penyakits,kode',
            'nama_penyakit' => 'required|string',
        ]);

        $penyakit = TKModel::create([
            'kode' => $request->kode,
            'nama_penyakit' => $request->nama_penyakit,
            'definisi' => $request->definisi,
            'solusi' => $request->solusi,

        ]);

        if ($penyakit) {
            //redirect dengan pesan sukses
            return redirect()->route('tumbuh-kembang.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('tumbuh-kembang.create')->with('error',  'Data Gagal Disimpan!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TKModel  $tKModel
     * @return \Illuminate\Http\Response
     */
    public function show(TKModel $tKModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TKModel  $tKModel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $penyakit = TKModel::all()->find($id);

        $data = [
            'title' => 'Edit Tumbuh Kembang',
            'subtitle' => 'Data Tumbuh Kembang',
            'isi' => $penyakit,
        ];

        return view('t-k.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TKModel  $tKModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TKModel $penyakit)
    {
        $this->validate($request, [
            'kode' => 'required|string',
            'nama_penyakit' => 'required|string',
        ]);

        $penyakit = TKModel::all()->where('id', $request->id);


        $penyakit->first()->update([
            'kode' => $request->kode,
            'nama_penyakit' => $request->nama_penyakit,
            'definisi' => $request->definisi,
            'solusi' => $request->solusi,
        ]);


        if ($penyakit) {
            //redirect dengan pesan sukses

            return redirect()->route('tumbuh-kembang.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('tumbuh-kembang.edit')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }   

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TKModel  $tKModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(TKModel $tKModel,$id)
    {
        $penyakit = TKModel::find($id);

        $penyakit->delete();

        return redirect()->route('tumbuh-kembang.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
