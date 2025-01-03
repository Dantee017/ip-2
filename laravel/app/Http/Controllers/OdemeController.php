<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OdemeController extends Controller
{
    public function index()
    {
        $odemeler = Odeme::with('kullanici', 'etkinlik')->get();
        return view('odeme.index', compact('odemeler'));
    }

    public function show($id)
    {
        $odeme = Odeme::with('kullanici', 'etkinlik')->findOrFail($id);
        return view('odeme.show', compact('odeme'));
    }

    public function create()
    {
        return view('odeme.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kullanici_id' => 'required|exists:kullanicis,id',
            'etkinlik_id' => 'required|exists:etkinliks,id',
            'tutar' => 'required|numeric|min:1',
            'durum' => 'required|string|max:255',
        ]);

        Odeme::create($request->all());
        return redirect()->route('odeme.index')->with('success', 'Ödeme kaydedildi.');
    }

    public function edit($id)
    {
        $odeme = Odeme::findOrFail($id);
        return view('odeme.edit', compact('odeme'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kullanici_id' => 'required|exists:kullanicis,id',
            'etkinlik_id' => 'required|exists:etkinliks,id',
            'tutar' => 'required|numeric|min:1',
            'durum' => 'required|string|max:255',
        ]);

        $odeme = Odeme::findOrFail($id);
        $odeme->update($request->all());
        return redirect()->route('odeme.index')->with('success', 'Ödeme güncellendi.');
    }

    public function destroy($id)
    {
        $odeme = Odeme::findOrFail($id);
        $odeme->delete();
        return redirect()->route('odeme.index')->with('success', 'Ödeme silindi.');
    }
}llll
