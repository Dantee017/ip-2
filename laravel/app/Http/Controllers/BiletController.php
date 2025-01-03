<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BiletController extends Controller
{
    public function index()
    {
        $biletler = Bilet::all();
        return view('bilet.index', compact('biletler'));
    }

    public function show($id)
    {
        $bilet = Bilet::findOrFail($id);
        return view('bilet.show', compact('bilet'));
    }

    public function create()
    {
        return view('bilet.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'etkinlik_id' => 'required|exists:etkinliks,id',
            'tur' => 'required|string|max:255',
            'fiyat' => 'required|numeric|min:0',
            'adet' => 'required|integer|min:1',
        ]);

        Bilet::create($request->all());
        return redirect()->route('bilet.index')->with('success', 'Bilet kaydedildi.');
    }

    public function edit($id)
    {
        $bilet = Bilet::findOrFail($id);
        return view('bilet.edit', compact('bilet'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'etkinlik_id' => 'required|exists:etkinliks,id',
            'tur' => 'required|string|max:255',
            'fiyat' => 'required|numeric|min:0',
            'adet' => 'required|integer|min:1',
        ]);

        $bilet = Bilet::findOrFail($id);
        $bilet->update($request->all());
        return redirect()->route('bilet.index')->with('success', 'Bilet güncellendi.');
    }

    public function destroy($id)
    {
        $bilet = Bilet::findOrFail($id);
        $bilet->delete();
        return redirect()->route('bilet.index')->with('success', 'Bilet silindi.');
    }
}
