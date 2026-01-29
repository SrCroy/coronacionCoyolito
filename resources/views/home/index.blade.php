<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votos en Vivo - Gala Real</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700;900&family=Playfair+Display:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --color-oro-puro: #FFD700;
            --color-oro-oscuro: #B8860B;
            --color-púrpura-real: #4B0082;
            --color-burdeos: #800020;
            --color-terciopelo: #301934;
            --color-marfil: #FFFFF0;
            --color-verde-esmeralda: #046307;
            --color-rojo-pasion: #9A031E;
            --color-azul-real: #1E3A8A;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Playfair Display', serif;
            background: linear-gradient(135deg, #0f0c29 0%, #302b63 50%, #24243e 100%);
            color: var(--color-marfil);
            min-height: 100vh;
            background-attachment: fixed;
        }
        
        .main-container {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        .header {
            background: linear-gradient(to right, var(--color-terciopelo), var(--color-púrpura-real));
            color: var(--color-oro-puro);
            padding: 25px 0 20px;
            text-align: center;
            border-bottom: 6px solid var(--color-oro-puro);
            box-shadow: 0 5px 20px rgba(0,0,0,0.5);
            position: relative;
            overflow: hidden;
            flex-shrink: 0;
        }
        
        .header::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100"><path fill="%23FFD700" fill-opacity="0.05" d="M50,0 L60,40 L100,50 L60,60 L50,100 L40,60 L0,50 L40,40 Z"/></svg>');
            background-size: 80px;
            opacity: 0.3;
        }
        
        .crown-icon {
            color: var(--color-oro-puro);
            font-size: 2.5rem;
            margin-bottom: 15px;
            text-shadow: 0 0 15px rgba(255, 215, 0, 0.5);
            position: relative;
            z-index: 1;
        }
        
        .page-title {
            font-family: 'Cinzel', serif;
            font-weight: 900;
            font-size: 2.2rem;
            text-shadow: 2px 2px 6px rgba(0,0,0,0.7);
            margin-bottom: 10px;
            letter-spacing: 1.5px;
            position: relative;
            z-index: 1;
        }
        
        .page-subtitle {
            font-family: 'Cinzel', serif;
            font-weight: 400;
            font-size: 1rem;
            max-width: 700px;
            margin: 0 auto;
            color: #E6D8C9;
            position: relative;
            z-index: 1;
            letter-spacing: 0.8px;
        }
        
        .content-wrapper {
            flex: 1;
            padding: 30px 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .container {
            max-width: 1400px;
        }
        
        .voting-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 30px;
            width: 100%;
        }
        
        .voting-card {
            background: linear-gradient(145deg, rgba(75, 0, 130, 0.25), rgba(48, 25, 52, 0.35));
            backdrop-filter: blur(10px);
            border-radius: 15px;
            overflow: hidden;
            border: 2px solid rgba(255, 215, 0, 0.25);
            transition: transform 0.3s ease;
        }
        
        .voting-card:hover {
            transform: translateY(-5px);
        }
        
        .candidate-position {
            position: absolute;
            top: 15px;
            left: 15px;
            background: linear-gradient(45deg, var(--color-oro-puro), var(--color-oro-oscuro));
            color: var(--color-púrpura-real);
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Cinzel', serif;
            font-weight: 900;
            font-size: 1.5rem;
            z-index: 10;
            border: 3px solid white;
        }
        
        /* Estilos específicos para cada posición */
        .position-1 .candidate-position {
            background: linear-gradient(45deg, #FFD700, #FFA500);
            color: #000;
        }
        
        .position-2 .candidate-position {
            background: linear-gradient(45deg, #C0C0C0, #A0A0A0);
            color: #000;
        }
        
        .position-3 .candidate-position {
            background: linear-gradient(45deg, #CD7F32, #8B4513);
            color: #000;
        }
        
        .candidate-photo {
            width: 100%;
            height: 300px;
            object-fit: cover;
            border-bottom: 3px solid var(--color-oro-puro);
        }
        
        .default-photo {
            width: 100%;
            height: 300px;
            background: linear-gradient(45deg, var(--color-púrpura-real), var(--color-terciopelo));
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: var(--color-oro-puro);
            border-bottom: 3px solid var(--color-oro-puro);
        }
        
        .default-photo i {
            font-size: 4rem;
            margin-bottom: 15px;
            opacity: 0.7;
        }
        
        .candidate-info {
            padding: 25px;
            text-align: center;
        }
        
        .candidate-name {
            font-family: 'Cinzel', serif;
            color: var(--color-oro-puro);
            font-weight: 700;
            font-size: 1.5rem;
            margin-bottom: 15px;
        }
        
        .votes-display {
            margin: 15px 0;
        }
        
        .votes-count {
            font-family: 'Cinzel', serif;
            font-size: 3rem;
            font-weight: 900;
            color: var(--color-oro-puro);
            text-shadow: 0 0 10px rgba(255, 215, 0, 0.3);
        }
        
        .votes-label {
            color: #E6D8C9;
            font-size: 1rem;
            margin-bottom: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .candidate-details {
            color: #E6D8C9;
            font-size: 0.9rem;
            margin-top: 15px;
            border-top: 1px solid rgba(255, 215, 0, 0.1);
            padding-top: 10px;
        }
        
        .empty-state {
            text-align: center;
            padding: 80px 20px;
            grid-column: 1 / -1;
        }
        
        .empty-icon {
            font-size: 5rem;
            color: var(--color-oro-puro);
            margin-bottom: 25px;
            opacity: 0.7;
        }
        
        .empty-title {
            font-family: 'Cinzel', serif;
            font-size: 2rem;
            color: var(--color-oro-puro);
            margin-bottom: 15px;
        }
        
        .empty-text {
            font-size: 1.1rem;
            color: #E6D8C9;
            margin-bottom: 30px;
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .refresh-timer {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: rgba(0, 0, 0, 0.5);
            border: 1px solid var(--color-oro-puro);
            border-radius: 10px;
            padding: 10px 15px;
            color: var(--color-oro-puro);
            font-family: 'Cinzel', serif;
            font-size: 0.9rem;
            z-index: 1000;
        }
        
        @media (max-width: 768px) {
            .voting-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }
            
            .content-wrapper {
                padding: 20px 15px;
            }
            
            .candidate-photo, .default-photo {
                height: 250px;
            }
        }
    </style>
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
                <p class="page-subtitle">GALA DE CORONACIÓN REAL - EL COYOLITO</p>
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