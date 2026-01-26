<?php

namespace App\Http\Controllers;

use App\Models\Candidatas;
use App\Models\Votos;
use Illuminate\Http\Request;

class VotosController extends Controller
{
    public function index(){
        $candidatas = Candidatas::withCount('votos')->get();
        return view('votacion.index', compact('candidatas'));
    }

    public function votar(Request $request){
        $request->validate([
            'candidata_id' => 'required|exists:candidatas,id'
        ]);

        $ip = $request->ip();
        $device = $request->header('User-Agent');

        // Evitar doble voto por IP (puedes ajustar esto)
        $yaVoto = Votos::where('ip', $ip)->exists();

        if ($yaVoto) {
            return response()->json([
                'mensaje' => 'Este dispositivo ya votó'
            ], 403);
        }

        // Registrar el voto
        Votos::create([
            'candidata_id' => $request->candidata_id,
            'ip' => $ip,
            'device_id' => $device
        ]);

        return response()->json([
            'mensaje' => 'Voto registrado correctamente'
        ]);
    }

    public function resultados(){
        $candidatas = Candidatas::withCount('votos')
                        ->orderBy('votos_count', 'desc')
                        ->get();
        
        $totalVotos = Votos::count();
        
        return view('votacion.resultados', compact('candidatas', 'totalVotos'));
    }
}