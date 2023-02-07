<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TKModel;
use App\Models\Gejala;
use App\Models\Relasi;

class RelasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//         $relasi = Relasi::all();
// $data = [];
// foreach($relasi as $r){
//     $penyakit = TKModel::where('id', $r->penyakit_id)->first();
//     $gejala = Gejala::where('id', $r->gejala_id)->first();
//     $hasil[] = [
//         'id' => $penyakit->id,
//         'kode' => $penyakit->kode,
//         'nama_penyakit' => $penyakit->nama_penyakit,
//         'gejala_id' => $gejala->id,
//         'nama_gejala' => $gejala->nama_gejala,
//     ];
// }
// $data=[
//     'title' => 'Basis Pengetahuan',
//     'subtitle' => 'Halaman berisikan pengetahuan hubungan antara tumbuh kembang dan gejala',
//     'data' => $hasil,
//     'penyakit' => TKModel::all(),
//     'gejala' => Gejala::all(),
// ];

$relasi = Relasi::all();
$data = [];
foreach($relasi as $r){
    $penyakit = TKModel::where('id', $r->penyakit_id)->first();
    $gejala = Gejala::where('id', $r->gejala_id)->first();
    if(!isset($hasil[$penyakit->id])){
        $hasil[$penyakit->id] = [
            'id' => $penyakit->id,
            'kode' => $penyakit->kode,
            'nama_penyakit' => $penyakit->nama_penyakit,
            'gejala' => [],
        ];
    }
    $hasil[$penyakit->id]['gejala'][] = $gejala->nama_gejala;
}

$used_ids = Relasi::pluck('penyakit_id')->toArray();
$penyakits = TKModel::whereNotIn('id', $used_ids)->get();

if(empty($hasil)){
    $hasil = [];
    }

$data=[
    'title' => 'Basis Pengetahuan',
    'subtitle' => 'Halaman berisikan pengetahuan hubungan antara tumbuh kembang dan gejala',
    'data' => array_values($hasil),
    'penyakit' => TKModel::all(),
    'gejala' => Gejala::all(),
    'daftar' => $penyakits,
];
        // dd($data);
        return view('relasi.index', $data);
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
            'relasi_penyakit' => 'required',
            'relasi_gejala' => 'required',
        ]);

        // dd($request);
        $countGejala = count($request->relasi_gejala);

        for ($i = 0; $i < $countGejala; $i++) {
            $relasi = new Relasi();
            $relasi->gejala_id = $request->relasi_gejala[$i];
            $relasi->penyakit_id = $request->relasi_penyakit;
            $relasi->save();
        }


        if ($relasi) {
            //redirect dengan pesan sukses
            return redirect()->route('relasi.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('relasi.index')->with(['error' => 'Data Gagal Disimpan!']);
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
        $relasiID = Relasi::all()->find($id);
    // mengambil data penyakit berdasarkan id
    $penyakit = TKModel::find($id);
    // mengambil seluruh data gejala
    $gejala = Gejala::all();
    // mengambil data relasi berdasarkan penyakit_id
    $relasi = Relasi::where('penyakit_id', $id)->get();
    // menampung id gejala yang terpilih
    $hasil = array();
    foreach ($relasi as $r) {
        array_push($hasil, $r->gejala_id);
    }

    $data = [
        'title' => 'Edit Basis Pengetahuan',
        'subtitle' => 'Data Basis Pengetahuan',
        'penyakit' =>$penyakit,
        'gejala' => $gejala,
        'relasi' => $relasi,
        'hasil' => $hasil,
        'id' => $relasiID,
        'all' => TKModel::all(),
    ];

    // dd($data);
    return view('relasi.edit', $data);
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
            'relasi_penyakit' => 'required|string',
            'relasi_gejala' => 'required|string',
        ]);
        
        $penyakit_id = $request->relasi_penyakit;
        $gejala_id = $request->relasi_gejala;
        
        $relasi = Relasi::all()->where('penyakit_id', $request->id);

        foreach($gejala_id as $g){
            $relasi->update([
                'penyakit_id' => $penyakit_id,
                'gejala_id' => $g
            ]);
        }


        if ($relasi) {
            //redirect dengan pesan sukses

            return redirect()->route('relasi.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('relasi.edit')->with(['error' => 'Data Gagal Disimpan!']);
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
        $relasi = Relasi::all()->where('penyakit_id', $id);
        foreach ($relasi as $r) {
            # code...
            $r->delete();
        }


        return redirect()->route('relasi.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
