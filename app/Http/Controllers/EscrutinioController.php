<?php

namespace App\Http\Controllers;

use App\Models\Candidatas;
use App\Models\Escrutinios;
use Illuminate\Http\Request;

class EscrutinioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $escrutinio = Escrutinios::with('candidata')->orderBy('numeroEscrutinio', 'desc')->get();
        return view('escrutinio.index', compact('escrutinio'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $candidatas = Candidatas::all();
        return view('escrutinio.create', compact('candidatas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'candidata_id' => 'required|exists:candidatas,id',
            'numeroEscrutinio' => 'required|integer|min:1',
            'monto' => 'required|numeric|min:0',
        ]);

        Escrutinios::create($request->all());

        return redirect()->route('escrutinio.index')
            ->with('success', 'Escrutinio creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $escrutinio = Escrutinios::with('candidata')->findOrFail($id);
        return view('escrutinio.show', compact('escrutinio'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $candidatas = Candidatas::all();
        $escrutinio = Escrutinios::findOrFail($id);
        return view('escrutinio.edit', compact('escrutinio', 'candidatas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'candidata_id' => 'required|exists:candidatas,id',
            'numeroEscrutinio' => 'required|integer|min:1',
            'monto' => 'required|numeric|min:0',
        ]);

        $escrutinio = Escrutinios::findOrFail($id);
        $escrutinio->update($request->all());

        return redirect()->route('escrutinio.index')
            ->with('success', 'Escrutinio actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $escrutinio = Escrutinios::findOrFail($id);
        $escrutinio->delete();

        return redirect()->route('escrutinio.index')
            ->with('success', 'Escrutinio eliminado correctamente');
    }
}