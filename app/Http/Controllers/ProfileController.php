<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Alert;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('layouts.profile');
    }

    public function editprofile(Request $request)
    {
        $data = User::where('email', auth()->user()->email)->first();
        $password_lama = $request->password_lama;
        $new_password = $request->kata_sandi_baru;

        $request->validate([
            'password_lama' => 'required',
            'kata_sandi_baru' => 'required',
            'konfirmasi_kata_sandi_baru' => 'required|same:kata_sandi_baru',
        ]);

        if ($data) {
            if (Hash::check($password_lama, $data->password)) {
                User::where('email', auth()->user()->email)
                    ->update([
                        'password' => bcrypt($new_password)
                    ]);
                // return redirect()->back()->with('alert-success', 'Congratulation,You have successfully Changed Password!');
                Alert::success('Selamat, Anda berhasil mengganti password!');
                return redirect()->back();
            } else {
                // return redirect()->back()->with('alert', 'Wrong Password!');
                Alert::error('Wrong Password!');
                return redirect()->back();
            }
        }
    }
}
