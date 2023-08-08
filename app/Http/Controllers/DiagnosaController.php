<?php

namespace App\Http\Controllers;

use App\Models\Diagnosa;
use App\Models\Gejala;
use App\Models\Relasi;
use App\Models\TKModel;
use App\Models\DetailKonsul;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SplStack;



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

    // DFS function to find diseases based on symptoms
    private function dfsDiagnosis($gejala_id, $visited, &$result, &$gejala_importance)
    {
        $visited[$gejala_id] = true;

        // Find the diseases associated with the current symptom
        $relasi = Relasi::where('gejala_id', $gejala_id)->get();

        foreach ($relasi as $r) {
            $penyakit_id = $r->penyakit_id;
            if (!isset($result[$penyakit_id])) {
                $result[$penyakit_id] = [
                    'penyakit' => TKModel::find($penyakit_id)->toArray(),
                    'count' => 0,
                    'penting' => 0,
                ];
            }
            $result[$penyakit_id]['count']++;
            $result[$penyakit_id]['penting'] += $gejala_importance[$gejala_id];
        }

        // Recursively visit all connected symptoms
        foreach ($relasi as $r) {
            $next_gejala_id = $r->gejala_id;
            if (!$visited[$next_gejala_id]) {
                $this->dfsDiagnosis($next_gejala_id, $visited, $result, $gejala_importance);
            }
        }
    }

    public function hasil(Request $request)
    {
        $diagnosa = $this->validate($request, [
            'nama_pasien' => 'required|string',
            'tLahir' => 'required',
            'alamat' => 'required|string',
            'telp' => 'required|numeric',
        ]);

        // Ambil semua data relasi gejala dan penyakit
        $gejala_input = $request->input('gejala');
        $gejala_ids = Gejala::whereIn('id', $gejala_input)->pluck('id')->toArray();
        $penyakit = TKModel::all();

        // Calculate the importance count of each symptom
        $gejala_importance = array_fill_keys($gejala_ids, 0);
        foreach ($gejala_ids as $gejala_id) {
            
            // Here, you can define the method to calculate the importance count
            // For example, you might have a table to store the importance score of each symptom
            // Replace 'importance' with the correct field name in your setup
            $gejala_importance[$gejala_id] = Gejala::find($gejala_id)->penting;
        }

        // Perform DFS to find diseases based on symptoms
        $visited = array_fill_keys($gejala_ids, false);
        $hasil = [];
        foreach ($gejala_ids as $gejala_id) {
            $this->dfsDiagnosis($gejala_id, $visited, $hasil, $gejala_importance);
        }

        // Sort the diseases based on both symptom count and symptom importance
        usort($hasil, function ($a, $b) {
            if ($a['penting'] !== $b['penting']) {
                return $b['penting'] - $a['penting'];
            }
            return $b['count'] - $a['count'];
        });

        $penyakit_hasil = array_column($hasil, 'penyakit');

        $data = [
            'title' => 'Hasil Diagnosa',
            'pasien' => $request->input('nama_pasien'),
            'telp' => $request->input('telp'),
            'tLahir' => $request->input('tLahir'),
            'alamat' => $request->input('alamat'),
            'gejala' => $request->input('gejala'),
            'hasil' => $penyakit_hasil,
        ];

        // dd($data);

        return view('diagnosa/hasil', $data)->with('success', 'Penyakit berhasil ditemukan!');
        
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
        // dd($id);
        $diagnosa = Diagnosa::create([
            'nama_pasien' => $request->nama_pasien,
            'tLahir' => $request->tLahir,
            'alamat' => $request->alamat,
            'telp' => $request->telp,
            'penyakit_id' => $id,
            'username' => Auth::user()->username,
        ]);

        $gejala_id = $request->input('gejala_id');

        foreach ($gejala_id as $itemId) {
            $detailKonsul = DetailKonsul::create([
                'gejala_id' => $itemId,
                'konsul_id' => $diagnosa->id,
            ]);
        }
        // dd($detailKonsul);

        if ($diagnosa) {
            //redirect dengan pesan sukses
            return redirect()->route('diagnosa.showDiagnosa')->with('success', 'Data Berhasil Disimpan!');
        } else {
            //redirect dengan pesan error
            return redirect()->route('diagnosa.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
        // dd($hasil);
    }

    public function showDiagnosa()
    {
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
            $penyakitData = TKModel::where('id', $d->penyakit_id)->get();
        }



        if (Auth()->user()->role == 1) {
            $data = [
                'title' => 'History Diagnosa',
                'subtitle' => 'Daftar Diagnosa',
                'diagnosa' => $diagnosa,
                // 'penyakitData' => TKModel::all(),
            ];
        } elseif (Auth()->user()->role == 0) {
            $data = [
                'title' => 'History Diagnosa',
                'subtitle' => 'Daftar Diagnosa',
                'diagnosa' => $diagnosa,
                // 'penyakitData' => $penyakitData,
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
    public function show($id)
    {
        $diagnosa = Diagnosa::find($id);
        $detail = DetailKonsul::where('konsul_id', $id)->with('dataGejala')->get();

        $penyakits = $diagnosa->penyakit_id;
        //    dd($penyakits);
        $penyakit_array = [];
        $penyakit = str_replace('[', '', $diagnosa->penyakit_id);
        $penyakit_array = array_merge($penyakit_array, explode(',', $penyakit));
        $penyakit_data = [];
        foreach ($penyakit_array as $key => $value) {
            $penyakit = TKModel::where('id', $value)->first();
            $penyakit_data[] = $penyakit;
        }

        $tLahir = Carbon::parse($diagnosa->tLahir);
        $age = $tLahir->diffForHumans(null, true, false, 2);


        $data = [
            'title' => 'Hasil',
            'subtitle' => 'Laporan Hasil Diagnosa',
            'isi' => $diagnosa,
            'usia' => $age,
            'detail' => $detail,
            'penyakit' => $penyakit_data,
            'tanggal_cetak' => Carbon::now()->format('Y-m-d H:i'),
        ];

        // dd($data);

        return view('diagnosa.laporan', $data);
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
    public function destroy($id)
    {
        $diagnosa = Diagnosa::find($id);
        $diagnosa->delete();
        $detail = DetailKonsul::where('konsul_id', $id)->get();
        foreach ($detail as $key => $value) {
            $value->delete();
        }
        return redirect()->route('diagnosa.showDiagnosa')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
}
