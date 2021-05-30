<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isEmpty;

class EditController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile = Profile::with('user');
        return view('layouts.edit', compact('profile'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tgl_lahir',
            'alamat'
        ]);


        $profile = Profile::create([
            "users_id" => auth()->user()->id,
            "tgl_lahir" => $request["tgl_lahir"],
            "alamat" => $request["alamat"]
        ]);


        // Sweet Alert  
        if ($profile) {
            toast('Data Berhasil Ditambahkan', 'success', 'top-right');
            return redirect('/editc');
        } else {
            alert()->error('Pesan Error', 'Data Gagal Ditambahkan');
            return redirect('/editc');
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
        $profile = Profile::where('user_id', $id)->first();
        return view('layouts.showedit', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $profile = Profile::find($id);

        return view('layouts.edit', compact('profile'));
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
        $request->validate([
            'user_profile',
            'tgl_lahir',
            'alamat',
        ]);

        $profile = Profile::find($id);

        $update = Profile::where('id', $id)
            ->update([
                'user_profile' => $request["user_profile"],
                'tgl_lahir' => $request["tgl_lahir"],
                'alamat' => $request["alamat"],
            ]);


        if ($update) {
            toast('Data Berhasil Diupdate', 'success', 'top-right');
            return redirect('/edit');
        } else {
            alert()->error('Pesan Error', 'Data Gagal Diupdate');
            return redirect('/edit');
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
        //
    }
}
