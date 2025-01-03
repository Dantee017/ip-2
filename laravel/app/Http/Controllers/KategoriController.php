<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoriler = Kategori::all();
        return view('kategori.index', compact('kategoriler'));
    }

    public function show($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('kategori.show', compact('kategori'));
    }

    public function create()
    {
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ad' => 'required|string|max:255',
            'aciklama' => 'nullable|string',
        ]);

        Kategori::create($request->all());
        return redirect()->route('kategori.index')->with('success', 'Kategori kaydedildi.');
    }

    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'ad' => 'required|string|max:255',
            'aciklama' => 'nullable|string',
        ]);

        $kategori = Kategori::findOrFail($id);
        $kategori->update($request->all());
        return redirect()->route('kategori.index')->with('success', 'Kategori güncellendi.');
    }

    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();
        return redirect()->route('kategori.index')->with('success', 'Kategori silindi.');
    }
}
