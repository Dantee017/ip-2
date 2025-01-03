<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GonulluController extends Controller
{
    public function index()
    {
        $gonulluler = Gonullu::all();
        return view('gonullu.index', compact('gonulluler'));
    }

    public function show($id)
    {
        $gonullu = Gonullu::findOrFail($id);
        return view('gonullu.show', compact('gonullu'));
    }

    public function create()
    {
        return view('gonullu.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ad' => 'required|string|max:255',
            'iletisim_bilgisi' => 'nullable|string',
            'yetenekler' => 'nullable|string',
        ]);

        Gonullu::create($request->all());
        return redirect()->route('gonullu.index')->with('success', 'Gönüllü kaydedildi.');
    }

    public function edit($id)
    {
        $gonullu = Gonullu::findOrFail($id);
        return view('gonullu.edit', compact('gonullu'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'ad' => 'required|string|max:255',
            'iletisim_bilgisi' => 'nullable|string',
            'yetenekler' => 'nullable|string',
        ]);

        $gonullu = Gonullu::findOrFail($id);
        $gonullu->update($request->all());
        return redirect()->route('gonullu.index')->with('success', 'Gönüllü güncellendi.');
    }

    public function destroy($id)
    {
        $gonullu = Gonullu::findOrFail($id);
        $gonullu->delete();
        return redirect()->route('gonullu.index')->with('success', 'Gönüllü silindi.');
    }
}
