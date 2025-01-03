<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KullaniciController extends Controller
{
    public function index()
    {
        $kullanici = Auth::user();
        return view('kullanici.profil', compact('kullanici'));
    }

    public function register(Request $request)
    {
        $request->validate([
            'ad' => 'required|string|max:255',
            'email' => 'required|email|unique:kullanicis',
            'sifre' => 'required|min:6|confirmed',
        ]);

        Kullanici::create([
            'ad' => $request->ad,
            'email' => $request->email,
            'sifre' => Hash::make($request->sifre),
        ]);

        return redirect()->route('login')->with('success', 'Kayıt başarılı!');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'sifre' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->sifre])) {
            return redirect()->route('home');
        }

        return back()->with('error', 'Geçersiz giriş bilgileri!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Çıkış yapıldı.');
    }

    public function edit()
    {
        $kullanici = Auth::user();
        return view('kullanici.edit', compact('kullanici'));
    }

    public function update(Request $request)
    {
        $kullanici = Auth::user();

        $request->validate([
            'ad' => 'required|string|max:255',
            'email' => 'required|email|unique:kullanicis,email,' . $kullanici->id,
        ]);

        $kullanici->update([
            'ad' => $request->ad,
            'email' => $request->email,
        ]);

        return redirect()->route('kullanici.profil')->with('success', 'Profil güncellendi.');
    }
}
