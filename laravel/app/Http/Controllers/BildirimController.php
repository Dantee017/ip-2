<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BildirimController extends Controller
{
    public function index()
    {
        $bildirimler = Bildirim::all();
        return view('bildirim.index', compact('bildirimler'));
    }

    public function show($id)
    {
        $bildirim = Bildirim::findOrFail($id);
        return view('bildirim.show', compact('bildirim'));
    }

    public function create()
    {
        return view('bildirim.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kullanici_id' => 'required|exists:kullanicis,id',
            'icerik' => 'required|string',
            'gonderim_tarihi' => 'nullable|date',
        ]);

        Bildirim::create($request->all());
        return redirect()->route('bildirim.index')->with('success', 'Bildirim oluşturuldu.');
    }

    public function edit($id)
    {
        $bildirim = Bildirim::findOrFail($id);
        return view('bildirim.edit', compact('bildirim'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kullanici_id' => 'required|exists:kullanicis,id',
            'icerik' => 'required|string',
            'gonderim_tarihi' => 'nullable|date',
        ]);

        $bildirim = Bildirim::findOrFail($id);
        $bildirim->update($request->all());
        return redirect()->route('bildirim.index')->with('success', 'Bildirim güncellendi.');
    }

    public function destroy($id)
    {
        $bildirim = Bildirim::findOrFail($id);
        $bildirim->delete();
        return redirect()->route('bildirim.index')->with('success', 'Bildirim silindi.');
    }
}
