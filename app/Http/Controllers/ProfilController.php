<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    public function index()
    {
        return view('profil.index');
    }

    public function ubah()
    {
        return view('profil.ubah');
    }

    public function update(User $user, Request $request)
    {
        $user = $user->find(Auth::user()->id);
        if (!$user) {
            return route('logout');
        }

        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $user->id],
        ]);

        $user->name = $request->nama;
        $user->email = $request->email;
        $user->save();

        return redirect()->route('profil')->with('success', 'Berhasil mengubah data profil');
    }

    public function ubah_password()
    {
        return view('profil.ubah_password');
    }

    public function update_password(User $user, Request $request)
    {
        $user = $user->find(Auth::user()->id);
        if (!$user) {
            return route('logout');
        }

        $request->validate([
            'password_lama' => ['required', 'string', 'min:8'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        // if (!Hash::check($request->password_lama, $user->password)) {
        //     return redirect()->back()->withErrors(['password_lama' => 'Password lama yang dimasukkan salah.'])->withInput();
        // }

        $user->password = $request->password;
        $user->save();

        return redirect()->route('profil')->with('success', 'Berhasil mengubah password');
    }
}
