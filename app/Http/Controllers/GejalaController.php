<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gejala;

class GejalaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'Data Gejala',
            'subtitle' => 'Halaman yang berisikan daftar data gejala',
            'isi' => Gejala::all(),
        ];
        return view('gejala.index', $data);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function daftar()
    {
        $data = [
            'title' => 'Daftar Gejala',
            'subtitle' => 'Halaman yang berisikan daftar data gejala yang tersimpan',
            'isi' => Gejala::all(),
        ];
        return view('daftarGejala', $data);
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
            'kode_gejala' => 'required|string|unique:gejalas,kode_gejala',
            'nama_gejala' => 'required|string',
            'gejala_penting' => 'required',
        ], [
            'kode_gejala.unique' => 'Kode gejala sudah digunakan!',
        ]);

        $gejala = Gejala::create([
            'kode_gejala' => $request->kode_gejala,
            'nama_gejala' => $request->nama_gejala,
            'penting' => $request->gejala_penting,
        ]);


        if ($gejala) {
            // Data stored successfully
            return redirect()->route('gejala.index')->with('success', 'Data Berhasil Disimpan!');
        } else {
            // Data storage failed
            return redirect()->route('gejala.index')->with('danger', 'Data Gagal Disimpan!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gejala = Gejala::all()->find($id);

        $data = [
            'title' => 'Edit Gejala',
            'subtitle' => 'Data Gejala',
            'isi' => $gejala,
        ];

        return view('gejala.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gejala $gejala)
    {
        $this->validate($request, [
            'kode_gejala' => 'required|string',
            'nama_gejala' => 'required|string',
        ]);

        // dd($data);

        $gejala = Gejala::all()->where('id', $request->id)->firstOrFail();

        // dd($gejala);

        $gejala->update([
            'kode_gejala' => $request->kode_gejala,
            'nama_gejala' => $request->nama_gejala,
        ]);


        if ($gejala) {
            //redirect dengan pesan sukses\
            return redirect()->route('gejala.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('gejala.edit')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gejala = Gejala::find($id);

        $gejala->delete();

        return redirect()->route('gejala.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
