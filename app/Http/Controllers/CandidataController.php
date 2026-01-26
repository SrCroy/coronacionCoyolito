<?php

namespace App\Http\Controllers;

use App\Models\Candidatas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CandidataController extends Controller
{
    public function index()
    {
        $candidatas = Candidatas::all();
        return view('candidatas.index', compact('candidatas'));
    }

    public function create()
    {
        return view('candidatas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombreCandidata' => 'required',
            'apellidoCandidata' => 'required',
            'fotoCandidata' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $fotoPath = null;
        if ($request->hasFile('fotoCandidata')) {
            $fotoPath = $request->file('fotoCandidata')->store('candidatas', 'public');
        }

        Candidatas::create([
            'nombreCandidata' => $request->nombreCandidata,
            'apellidoCandidata' => $request->apellidoCandidata,
            'fotoCandidata' => $fotoPath,
        ]);

        return redirect()->route('candidatas.index')
                         ->with('succes', 'Candidata Registrada');
    }

    public function edit(string $id)
    {
        $candidata = Candidatas::findOrFail($id);
        return view('candidatas.edit', compact('candidata'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombreCandidata' => 'required',
            'apellidoCandidata' => 'required',
            'fotoCandidata' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $candidata = Candidatas::findOrFail($id);
        
        $data = [
            'nombreCandidata' => $request->nombreCandidata,
            'apellidoCandidata' => $request->apellidoCandidata,
        ];

        if ($request->hasFile('fotoCandidata')) {
            if ($candidata->fotoCandidata) {
                Storage::disk('public')->delete($candidata->fotoCandidata);
            }
            $data['fotoCandidata'] = $request->file('fotoCandidata')->store('candidatas', 'public');
        }

        $candidata->update($data);

        return redirect()->route('candidatas.index')
                         ->with('succes', 'Candidata actualizada');
    }

    public function destroy(string $id)
    {
        $candidata = Candidatas::findOrFail($id);

        if ($candidata->fotoCandidata) {
            Storage::disk('public')->delete($candidata->fotoCandidata);
        }

        $candidata->delete();

        return back()->with('success', 'Candidata Eliminada');
    }
}