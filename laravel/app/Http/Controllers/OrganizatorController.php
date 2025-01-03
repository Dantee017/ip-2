<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrganizatorController extends Controller
{
    public function index()
    {
        $organizatorler = Organizator::all();
        return view('organizator.index', compact('organizatorler'));
    }

    public function show($id)
    {
        $organizator = Organizator::findOrFail($id);
        return view('organizator.show', compact('organizator'));
    }

    public function create()
    {
        return view('organizator.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ad' => 'required|string|max:255',
            'iletisim_bilgisi' => 'nullable|string',
        ]);

        Organizator::create($request->all());
        return redirect()->route('organizator.index')->with('success', 'Organizatör oluşturuldu.');
    }

    public function edit($id)
    {
        $organizator = Organizator::findOrFail($id);
        return view('organizator.edit', compact('organizator'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'ad' => 'required|string|max:255',
            'iletisim_bilgisi' => 'nullable|string',
        ]);

        $organizator = Organizator::findOrFail($id);
        $organizator->update($request->all());
        return redirect()->route('organizator.index')->with('success', 'Organizatör güncellendi.');
    }

    public function destroy($id)
    {
        $organizator = Organizator::findOrFail($id);
        $organizator->delete();
        return redirect()->route('organizator.index')->with('success', 'Organizatör silindi.');
    }
}
