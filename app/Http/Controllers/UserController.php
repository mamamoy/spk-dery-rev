<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'User List',
            'subtitle' => '',
            'user' => User::all(),
        ];

        return view('user.index', $data);
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
        $this->validate($request,[
            'name' => 'required',
            'tempat' => 'required',
            'username' => 'required|min:5|unique:users',
            'tanggal' => 'required',
            'kelamin' => 'required',
            'password' => 'required|min:5',
            'role' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'tempat' => $request->tempat,
            'username' => $request->username,
            'tanggal' => $request->tanggal,
            'kelamin' => $request->kelamin,
            'password' => bcrypt($request->password),
            'role' => $request->role
        ]);

        if ($user) {
            //redirect dengan pesan sukses
            return redirect()->route('user-list.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('user-list.index')->with(['error' => 'Data Gagal Disimpan!']);
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
        $user = User::all()->find($id);

        $data = [
            'title' => 'Edit User',
            'subtitle' => 'Data User',
            'user' => $user,
        ];

        return view('user.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // $this->validate($request, [
        //     'name' => 'required',
        //     'tempat' => 'required',
        //     'username' => 'required',
        //     'tanggal' => 'required',
        //     'kelamin' => 'required',
        //     'role' => 'required'
        // ]);

        $user = User::all()->where('id', $request->id)->first();

        // $user->first()->update([
        //     'name' => $request->kode,
        //     'tempat' => $request->nama_user,
        //     'username' => $request->definisi,
        //     'tanggal' => $request->solusi,
        //     'kelamin' => $request->solusi,
        //     'password' => $request->solusi,
        //     'role' => $request->solusi,

        // ]);

        $user['name']= $request->name;
        $user['tempat'] = $request->tempat;
        $user['username'] = $request->username;
        $user['tanggal'] = $request->tanggal;
        $user['kelamin'] = $request->kelamin;
        if(isset($request->password)){

            $user['password'] = bcrypt($request->password);
        }
        $user['role'] = $request->is_role;
        $user->update();

        if ($user) {
            //redirect dengan pesan sukses

            return redirect()->back()->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->back()->with(['error' => 'Data Gagal Disimpan!']);
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

        $user = User::all()->where('id', $id)->first();

        $user->delete();
        if ($user) {
            //redirect dengan pesan sukses

            return redirect()->back()->with(['success' => 'Data Berhasil Dihapus!']);
        } else {
            //redirect dengan pesan error
            return redirect()->back()->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
}
