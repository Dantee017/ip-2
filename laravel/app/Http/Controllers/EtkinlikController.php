<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EtkinlikController extends Controller
{
    public function index()
    {
        $etkinlikler = Etkinlik::with('konum', 'organizator')->get();
        return view('etkinlik.index', compact('etkinlikler'));
    }

    public function show($id)
    {
        $etkinlik = Etkinlik::with('konum', 'organizator')->findOrFail($id);
        return view('etkinlik.show', compact('etkinlik'));
    }

    public function create()
    {
        $konumlar = Konum::all();
        $organizatorler = Organizator::all();
        return view('etkinlik.create', compact('konumlar', 'organizatorler'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ad' => 'required|string|max:255',
            'aciklama' => 'nullable|string',
            'tarih' => 'required|date',
            'baslangic_saati' => 'required',
            'bitis_saati' => 'required|after:baslangic_saati',
            'konum_id' => 'required|exists:konums,id',
            'organizator_id' => 'required|exists:organizators,id',
        ]);

        Etkinlik::create($request->all());
        return redirect()->route('etkinlik.index')->with('success', 'Etkinlik oluşturuldu.');
    }

    public function edit($id)
    {
        $etkinlik = Etkinlik::findOrFail($id);
        $konumlar = Konum::all();
        $organizatorler = Organizator::all();
        return view('etkinlik.edit', compact('etkinlik', 'konumlar', 'organizatorler'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'ad' => 'required|string|max:255',
            'aciklama' => 'nullable|string',
            'tarih' => 'required|date',
            'baslangic_saati' => 'required',
            'bitis_saati' => 'required|after:baslangic_saati',
            'konum_id' => 'required|exists:konums,id',
            'organizator_id' => 'required|exists:organizators,id',
        ]);

        $etkinlik = Etkinlik::findOrFail($id);
        $etkinlik->update($request->all());
        return redirect()->route('etkinlik.index')->with('success', 'Etkinlik güncellendi.');
    }

    public function destroy($id)
    {
        $etkinlik = Etkinlik::findOrFail($id);
        $etkinlik->delete();
        return redirect()->route('etkinlik.index')->with('success', 'Etkinlik silindi.');
    }
}
