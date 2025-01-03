<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KonumController extends Controller
{
    public function index()
    {
        $konumlar = Konum::all();
        return view('konum.index', compact('konumlar'));
    }

    public function show($id)
    {
        $konum = Konum::findOrFail($id);
        return view('konum.show', compact('konum'));
    }

    public function create()
    {
        return view('konum.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ad' => 'required|string|max:255',
            'adres' => 'nullable|string',
            'kapasite' => 'nullable|integer|min:1',
        ]);

        Konum::create($request->all());
        return redirect()->route('konum.index')->with('success', 'Konum kaydedildi.');
    }

    public function edit($id)
    {
        $konum = Konum::findOrFail($id);
        return view('konum.edit', compact('konum'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'ad' => 'required|string|max:255',
            'adres' => 'nullable|string',
            'kapasite' => 'nullable|integer|min:1',
        ]);

        $konum = Konum::findOrFail($id);
        $konum->update($request->all());
        return redirect()->route('konum.index')->with('success', 'Konum güncellendi.');
    }

    public function destroy($id)
    {
        $konum = Konum::findOrFail($id);
        $konum->delete();
        return redirect()->route('konum.index')->with('success', 'Konum silindi.');
    }
}
