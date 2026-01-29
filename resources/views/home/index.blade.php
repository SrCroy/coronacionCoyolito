<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votos en Vivo - Gala Real</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700;900&family=Playfair+Display:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/home/index..css') }}">
    <meta http-equiv="refresh" content="30">
</head>
<body>
    <div class="main-container">
        <header class="header">
            <div class="container">
                <div class="crown-icon">
                    <i class="fas fa-crown"></i>
                </div>
                <h1 class="page-title">VOTACIÓN EN VIVO</h1>
            </div>
        </header>

        <div class="content-wrapper">
            <div class="container">
                @if(isset($escrutinio) && count($escrutinio) > 0)
                    @php
                        // Procesar datos para obtener ranking
                        $candidatasVotos = [];
                        
                        foreach($escrutinio as $voto) {
                            if($voto->candidata) {
                                $candidataId = $voto->candidata->id;
                                
                                if(!isset($candidatasVotos[$candidataId])) {
                                    $candidatasVotos[$candidataId] = [
                                        'candidata' => $voto->candidata,
                                        'total_monto' => 0,
                                        'votos' => 0
                                    ];
                                }
                                
                                $candidatasVotos[$candidataId]['total_monto'] += $voto->monto;
                                $candidatasVotos[$candidataId]['votos'] += ($voto->monto / 0.25);
                            }
                        }
                        
                        // Si no hay datos en $candidatasVotos, intentar con datos directos
                        if(empty($candidatasVotos)) {
                            foreach($escrutinio as $voto) {
                                $candidataId = $voto->candidata_id;
                                
                                if(!isset($candidatasVotos[$candidataId])) {
                                    $candidatasVotos[$candidataId] = [
                                        'nombreCandidata' => $voto->nombreCandidata ?? 'Candidata ' . $candidataId,
                                        'apellidoCandidata' => $voto->apellidoCandidata ?? '',
                                        'fotoCandidata' => $voto->fotoCandidata ?? null,
                                        'total_monto' => 0,
                                        'votos' => 0
                                    ];
                                }
                                
                                $candidatasVotos[$candidataId]['total_monto'] += $voto->monto;
                                $candidatasVotos[$candidataId]['votos'] += ($voto->monto / 0.25);
                            }
                        }
                        
                        // Ordenar por votos (mayor a menor)
                        usort($candidatasVotos, function($a, $b) {
                            return $b['votos'] <=> $a['votos'];
                        });
                    @endphp
                    
                    <!-- Grid de candidatas -->
                    <div class="voting-grid">
                        @foreach($candidatasVotos as $index => $data)
                            @php
                                $position = $index + 1;
                            @endphp
                            
                            <div class="voting-card position-{{ $position }}">
                                @if(isset($data['candidata']) && $data['candidata']->fotoCandidata)
                                    <img src="{{ asset('storage/' . $data['candidata']->fotoCandidata) }}" 
                                        alt="{{ $data['candidata']->nombreCandidata }}" 
                                        class="candidate-photo">
                                @elseif(isset($data['fotoCandidata']) && $data['fotoCandidata'])
                                    <img src="{{ asset('storage/' . $data['fotoCandidata']) }}" 
                                        alt="{{ $data['nombreCandidata'] ?? 'Candidata' }}" 
                                        class="candidate-photo">
                                @else
                                    <div class="default-photo">
                                        <i class="fas fa-user-crown"></i>
                                        @if(isset($data['candidata']))
                                            <span>{{ $data['candidata']->nombreCandidata }}</span>
                                        @else
                                            <span>{{ $data['nombreCandidata'] ?? 'Candidata' }}</span>
                                        @endif
                                    </div>
                                @endif
                                
                                <!-- DEJAR POSICIÓN en la esquina -->
                                <div class="candidate-position">
                                    {{ $position }}
                                </div>
                                
                                <div class="candidate-info">
                                    <h3 class="candidate-name">
                                        @if(isset($data['candidata']))
                                            {{ $data['candidata']->nombreCandidata }} {{ $data['candidata']->apellidoCandidata }}
                                        @else
                                            {{ $data['nombreCandidata'] }} {{ $data['apellidoCandidata'] }}
                                        @endif
                                    </h3>
                                    
                                    <div class="votes-display">
                                        <div class="votes-label">VOTOS</div>
                                        <div class="votes-count">{{ number_format($data['votos']) }}</div>
                                    </div>
                                    
                                    <!-- MOSTRAR DINERO aquí -->
                                    <div class="candidate-details"> 
                                        Monto: ${{ number_format($data['total_monto'], 2) }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    
                @else
                    <!-- Estado vacío -->
                    <div class="empty-state">
                        <div class="empty-icon">
                            <i class="fas fa-vote-yea"></i>
                        </div>
                        <h3 class="empty-title">No hay votos registrados</h3>
                        <p class="empty-text">Los votos aparecerán aquí en tiempo real una vez que se registren.</p>
                    </div>
                @endif
            </div>
        </div>
        
        <!-- Temporizador de actualización -->
        <div class="refresh-timer">
            <i class="fas fa-sync-alt"></i> Actualiza en: <span id="countdown">30</span>s
        </div>
    </div>

    <!-- Script para el contador de actualización -->
    <script>
        // Contador para la actualización automática
        let countdown = 30;
        const countdownElement = document.getElementById('countdown');
        
        function updateCountdown() {
            countdown--;
            countdownElement.textContent = countdown;
            
            if (countdown <= 0) {
                countdown = 30;
            }
        }
        
        // Actualizar cada segundo
        setInterval(updateCountdown, 1000);
    </script>
</body>
</html>