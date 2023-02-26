<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gejala;
use App\Models\TKModel;
use App\Models\Relasi;
use App\Models\Diagnosa;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        
        $gejala = Gejala::all();
        $penyakit = TKModel::all();
        $user = User::all();

        $used_ids = Relasi::pluck('penyakit_id')->toArray();
        $penyakits = TKModel::whereIn('id', $used_ids)->get();
        

        

        // dd($penyakitData);

        
        if(Auth()->user()->role == 1){

            $diagnosaAll= Diagnosa::all();

            if(empty($diagnosaAll)){
                $diagnosaAll = [];
            }
            $penyakitData = null;
            foreach ($diagnosaAll as $key => $d) {
                $penyakitData = TKModel::where('id', $d->penyakit_id)->value('nama_penyakit');
            }

            $data = [
                'title' => 'Dashboard',
                'subtitle' => 'Statistik',
                'gejala' => count($gejala),
                'penyakit' => count($penyakit),
                'relasi' => count($penyakits),
                'user' => count($user),
                'diagnosa' => count($diagnosaAll),
            ];
        }
        elseif(Auth()->user()->role == 0){
            $username = Auth::user()->username;
            $diagnosa = Diagnosa::where('username', $username)->get();

            if(empty($diagnosa)){
                $diagnosa = [];
            }
            $penyakitData = null;
            foreach ($diagnosa as $key => $d) {
                $penyakitData = TKModel::where('id', $d->penyakit_id)->value('nama_penyakit');
            }
            $data = [
                'title' => 'Dashboard',
                'subtitle' => 'Statistik',
                'gejala' => count($gejala),
                'penyakit' => count($penyakit),
                'relasi' => count($penyakits),
                'user' => count($user),
                'diagnosa' => count($diagnosa),
            ];
        }
        

        // dd($data);
        return view('auth.dashboard', $data);
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
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
