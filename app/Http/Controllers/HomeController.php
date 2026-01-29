<?php

namespace App\Http\Controllers;

use App\Models\Escrutinios;
use App\Models\Candidatas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        
        $escrutinio = Escrutinios::with('candidata')->get();
        
        return view('home.index', compact('escrutinio'));
    }

    public function getRanking() {
        // Verificamos primero si hay datos
        $hasData = Escrutinios::count() > 0;
        
        if (!$hasData) {
            return response()->json([
                'message' => 'No hay datos de votación aún',
                'data' => []
            ]);
        }
        
        try {
            // Método seguro usando query builder
            $rankingData = DB::table('escrutinios')
                ->join('candidatas', 'escrutinios.candidata_id', '=', 'candidatas.id')
                ->select(
                    'candidatas.id as candidata_id',
                    'candidatas.nombreCandidata',
                    'candidatas.apellidoCandidata',
                    'candidatas.fotoCandidata',
                    DB::raw('SUM(escrutinios.monto) as total_monto')
                )
                ->groupBy(
                    'candidatas.id',
                    'candidatas.nombreCandidata',
                    'candidatas.apellidoCandidata',
                    'candidatas.fotoCandidata'
                )
                ->orderByDesc('total_monto')
                ->get()
                ->map(function($item, $index) {
                    return [
                        'posicion' => $index + 1,
                        'candidata_id' => $item->candidata_id,
                        'nombre' => $item->nombreCandidata . ' ' . $item->apellidoCandidata,
                        'foto' => $item->fotoCandidata ? asset('storage/' . $item->fotoCandidata) : null,
                        'total_monto' => (float) $item->total_monto,
                        'votos' => ((float) $item->total_monto) / 0.25
                    ];
                });
            
            return response()->json($rankingData);
            
        } catch (\Exception $e) {
            \Log::error('Error al obtener ranking: ' . $e->getMessage());
            
            return response()->json([
                'error' => 'Error al procesar los datos',
                'message' => $e->getMessage(),
                'data' => []
            ], 500);
        }
    }
}