<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndirimlerController extends Controller
{
    public function index()
    {
        $indirimler = Indirim::all();
        return view('indirim.index', compact('indirimler'));
    }

    public function show($id)
    {
        $indirim = Indirim::findOrFail($id);
        return view('indirim.show', compact('indirim'));
    }

    public function create()
    {
        return view('indirim.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kod' => 'required|string|max:50|unique:indirimlers',
            'oran' => 'required|numeric|min:1|max:100',
            'gecerlilik_tarihi' => 'nullable|date|after_or_equal:today',
        ]);

        Indirim::create($request->all());
        return redirect()->route('indirim.index')->with('success', 'İndirim kaydedildi.');
    }

    public function edit($id)
    {
        $indirim = Indirim::findOrFail($id);
        return view('indirim.edit', compact('indirim'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kod' => 'required|string|max:50|unique:indirimlers,kod,' . $id,
            'oran' => 'required|numeric|min:1|max:100',
            'gecerlilik_tarihi' => 'nullable|date|after_or_equal:today',
        ]);

        $indirim = Indirim::findOrFail($id);
        $indirim->update($request->all());
        return redirect()->route('indirim.index')->with('success', 'İndirim güncellendi.');
    }

    public function destroy($id)
    {
        $indirim = Indirim::findOrFail($id);
        $indirim->delete();
        return redirect()->route('indirim.index')->with('success', 'İndirim silindi.');
    }
}
