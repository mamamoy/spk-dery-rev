<?php

namespace App\Http\Controllers;

use App\Models\Diagnosa;
use App\Models\Gejala;
use App\Models\Relasi;
use App\Models\TKModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DiagnosaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'Diagnosa',
            'subtitle' => 'Halaman yang berisikan input data diagnosa',
            'isi' => Gejala::all(),
            'comment' => 'Silahkan centang gejala yang anda alami dibawah ini',
        ];
        return view('diagnosa.index', $data);
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

    public function hasil(Request $request){

        $diagnosa = $this->validate($request, [
            'nama_pasien' => 'required|string',
        ]);

        //ambil semua data relasi gejala dan penyakit
         
        $gejala = $request->input('gejala');
        $penyakit = TKModel::all();
        $count = 0;
        $penyakit_terbanyak = [];

        foreach ($penyakit as $p) {
            $count_gejala = count(array_intersect($gejala, $p->gejala->pluck('id')->toArray()));
            if ($count_gejala > $count) {
                $count = $count_gejala;
                $penyakit_terbanyak = [$p];
            } elseif ($count_gejala == $count) {
                $penyakit_terbanyak[] = $p;
            }
        }

        $hasil = [];
        $cek=[];
        foreach($penyakit_terbanyak as $p){
            $hasil[] = $p->id;
            
        }
        foreach ($hasil as $key => $value) {
            $cek[] = TKModel::where('id', $value)->get();
        }


        $data = [
            'title' => 'Hasil Diagnosa',
            'pasien' => $request->input('nama_pasien'),
            'hasil' => $cek,
        ];

        // dd($data);

        if ($diagnosa) {
            //redirect dengan pesan sukses
            return view('diagnosa/hasil', $data)->with(['success => Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('diagnosa.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $id = implode(',', $request->penyakit_id);
        $diagnosa = Diagnosa::create([
            'nama_pasien' => $request->nama_pasien,
            'penyakit_id' => $id,
            'username' => Auth::user()->username,
        ]);

        // dd($diagnosa);

    if ($diagnosa) {
        //redirect dengan pesan sukses
        return redirect()->route('dashboard.index')->with(['success' => 'Data Berhasil Disimpan!']);
    } else {
        //redirect dengan pesan error
        return redirect()->route('diagnosa.index')->with(['error' => 'Data Gagal Disimpan!']);
    }
// dd($hasil);
    }

    public function showDiagnosa()
    {
        // dd('wdwwwd');
        $used_ids = Relasi::pluck('penyakit_id')->toArray();
        $penyakits = TKModel::whereIn('id', $used_ids)->get();
        
        $username = Auth::user()->username;
        if (Auth()->user()->role == 0) {
            $diagnosa = Diagnosa::where('username', $username)->get();
        } else {
            $diagnosa = Diagnosa::get();
        }

        if (empty($diagnosa)) {
            $diagnosa = [];
        }
        $penyakitData = null;
        foreach ($diagnosa as $key => $d) {
            $penyakitData = TKModel::where('id', $d->penyakit_id)->value('nama_penyakit');
        }

        // dd($penyakitData);



        if (Auth()->user()->role == 1) 
        {
            $data = [
                'title' => 'History Diagnosa',
                'subtitle' => 'Daftar Diagnosa',
                'diagnosa' => $diagnosa,
                'penyakitData' => $penyakitData,
            ];
        } elseif (Auth()->user()->role == 0) {
            $data = [
                'title' => 'History Diagnosa',
                'subtitle' => 'Daftar Diagnosa',
                'diagnosa' => $diagnosa,
                'penyakitData' => $penyakitData,
            ];
        }


        // dd($data);
        return view('diagnosa.showDiagnosa', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Diagnosa  $diagnosa
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Diagnosa  $diagnosa
     * @return \Illuminate\Http\Response
     */
    public function edit(Diagnosa $diagnosa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Diagnosa  $diagnosa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Diagnosa $diagnosa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Diagnosa  $diagnosa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Diagnosa $diagnosa)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
       
}
