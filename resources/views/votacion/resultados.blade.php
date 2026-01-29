<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados - Gala Real</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700;900&family=Playfair+Display:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/votacion/resultado.css') }}">
</head>
<body>
    <div class="main-container">
        <header class="header">
            <div class="container">
                <div class="crown-icon">
                    <i class="fas fa-crown"></i>
                </div>
                <h1 class="page-title">RESULTADOS DE LA VOTACIÓN MISS SIMPATIA</h1>
            </div>
        </header>

        <div class="content-wrapper">
            <div class="container">

                @if(count($candidatas) > 0)
                    @php
                        $topCandidata = $candidatas->first();
                        $maxVotos = $candidatas->max('votos_count');
                    @endphp

                    @if($topCandidata->votos_count > 0)
                    <div class="winner-section">
                        <div class="winner-card">
                            <div class="winner-badge">
                                <i class="fas fa-trophy"></i> GANADORA MISS SIMPATIA
                            </div>
                            
                            @if($topCandidata->fotoCandidata)
                            <img src="{{ asset('storage/' . $topCandidata->fotoCandidata) }}" 
                                 alt="{{ $topCandidata->nombreCandidata }}" 
                                 class="winner-photo">
                            @else
                            <div class="default-winner-photo">
                                <i class="fas fa-user-crown"></i>
                            </div>
                            @endif
                            
                            <h2 class="winner-name">
                                {{ $topCandidata->nombreCandidata }} {{ $topCandidata->apellidoCandidata }}
                            </h2>
                            
                            <div class="winner-votes">
                                <i class="fas fa-heart"></i>
                                <span>{{ $topCandidata->votos_count }} VOTOS</span>
                            </div>
                            
                            @if($totalVotos > 0)
                            @php
                                $porcentaje = round(($topCandidata->votos_count / $totalVotos) * 100, 1);
                            @endphp
                            <div class="progress-bar-container">
                                <div class="progress-bar-royal">
                                    <div class="progress-fill" style="width: {{ $porcentaje }}%"></div>
                                </div>
                                <div class="mt-2">
                                    <span class="percentage">{{ $porcentaje }}%</span>
                                    <span> del total de votos</span>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endif

                    <h3 class="text-center mb-4" style="color: var(--color-oro-puro); font-family: 'Cinzel';">
                        <i class="fas fa-list-ol me-2"></i> CLASIFICACIÓN COMPLETA
                    </h3>
                    
                    <div class="results-grid">
                        @foreach($candidatas as $index => $candidata)
                            @php
                                $rank = $index + 1;
                                $porcentaje = $totalVotos > 0 ? round(($candidata->votos_count / $totalVotos) * 100, 1) : 0;
                            @endphp
                            
                            <div class="result-card {{ $rank <= 3 ? 'top3' : '' }}">
                                <div class="result-rank">
                                    <span class="rank-{{ $rank }}">#{{ $rank }}</span>
                                </div>
                                
                                @if($candidata->fotoCandidata)
                                <img src="{{ asset('storage/' . $candidata->fotoCandidata) }}" 
                                     alt="{{ $candidata->nombreCandidata }}" 
                                     class="result-photo">
                                @else
                                <div class="default-result-photo">
                                    <i class="fas fa-user"></i>
                                </div>
                                @endif
                                
                                <div class="result-info">
                                    <h4 class="result-name">
                                        {{ $candidata->nombreCandidata }} {{ $candidata->apellidoCandidata }}
                                    </h4>
                                    
                                    <div class="result-votes">
                                        <i class="fas fa-heart"></i>
                                        <span>{{ $candidata->votos_count }} votos</span>
                                    </div>
                                    
                                    <div class="progress-bar-container">
                                        <div class="progress-bar-royal">
                                            <div class="progress-fill" style="width: {{ $porcentaje }}%"></div>
                                        </div>
                                        <div class="mt-1">
                                            <small class="percentage">{{ $porcentaje }}%</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                <div class="empty-state">
                    <div class="empty-icon">
                        <i class="fas fa-user-slash"></i>
                    </div>
                    <h3 class="empty-title">No hay candidatas registradas</h3>
                    <p class="empty-text">Aún no se han registrado candidatas para la gala de coronación.</p>
                    <a href="{{ route('votacion.index') }}" class="btn-royal">
                        <i class="fas fa-home"></i> VOLVER AL INICIO
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Animación de las barras de progreso
        document.addEventListener('DOMContentLoaded', function() {
            const progressBars = document.querySelectorAll('.progress-fill');
            progressBars.forEach(bar => {
                const width = bar.style.width;
                bar.style.width = '0%';
                setTimeout(() => {
                    bar.style.width = width;
                }, 300);
            });
        });
    </script>
</body>
</html>