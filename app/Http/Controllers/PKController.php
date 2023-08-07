<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Gejala;
use App\Models\TKModel;
use App\Models\Node;
use Illuminate\Support\Facades\Response;

class PKController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nodes = Node::all();
        $gejala = Gejala::all();
        $penyakit = TKModel::all();

        $nodeDataArray = [];

        $nodeDataArray = $nodes->map(function ($node) {
            $data = [
                'key' => $node->id,
                'text' => $node->text,
                'fill' => $node->fill,
                'stroke' => '#000',
            ];
        
            if ($node->parent_id !== null) {
                $data['parent'] = $node->parent_id;
            }
        
            return $data;
        });


        $data = [
            'title' => 'Pohon Keputusan',
            'subtitle' => 'Halaman yang berisikan alur Pohon Keputusan',
            'nodeDataArray' => $nodeDataArray,
            'gejala' => $gejala,
            'penyakit' => $penyakit,
            'node' => $nodes,
        ];

        

        return view('pk.index', $data);
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
            'text' => 'required',
        ]);

        $node = Node::create([
            'text' => $request->text,
            'parent_id' => $request->parent,
            'fill' => $request->fill,
        ]);

        if ($node) {
            //redirect dengan pesan sukses
            return redirect()->route('pohon-keputusan.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('pohon-keputusan.index')->with(['error' => 'Data Gagal Disimpan!']);
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
        // Temukan node berdasarkan ID
        $node = Node::findOrFail($id);

        // Cek apakah node dengan id 1 (root)
        if ($node->id == 1) {
            return redirect()->back()->with('error', 'Node root tidak dapat dihapus.');
        }

        // Hapus node
        $node->delete();

        return redirect()->back()->with('success', 'Node berhasil dihapus.');
    }
}
