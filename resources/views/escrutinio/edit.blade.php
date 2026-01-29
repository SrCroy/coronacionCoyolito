<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Escrutinio - Gala Real</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700;900&family=Playfair+Display:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/escrutinio/edit.css') }}">
</head>
<body>
    <div class="main-container">
        <header class="header">
            <div class="container">
                <div class="crown-icon">
                    <i class="fas fa-file-invoice-dollar"></i>
                </div>
                <h1 class="page-title">EDITAR ESCRUTINIO</h1>
            </div>
        </header>

        <div class="content-wrapper">
            <div class="form-container">
                <div class="form-card">
                    <div class="form-header">
                        <h2 class="form-title">
                            <i class="fas fa-edit"></i> EDITAR REGISTRO
                        </h2>
                        <p class="form-subtitle">Actualice los datos del escrutinio</p>
                    </div>

                    <form action="{{ route('escrutinio.update', $escrutinio->id) }}" method="POST" id="escrutinioForm">
                        @csrf
                        @method('PUT')
                        
                        <div class="form-body">
                            <div class="form-group">
                                <label for="numeroEscrutinio" class="form-label">Número de Escrutinio *</label>
                                <input type="number" 
                                       class="form-control" 
                                       id="numeroEscrutinio" 
                                       name="numeroEscrutinio" 
                                       value="{{ old('numeroEscrutinio', $escrutinio->numeroEscrutinio) }}"
                                       required
                                       min="1"
                                       step="1"
                                       placeholder="Ej: 1, 2, 3, etc."
                                       onchange="calcularVotos()">
                                <span class="form-hint">Mismo número para todas las candidatas en este evento de recaudación</span>
                                @error('numeroEscrutinio')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="candidata_id" class="form-label">Candidata *</label>
                                <select class="select-royal" id="candidata_id" name="candidata_id" required onchange="calcularVotos()">
                                    <option value="">Seleccione una candidata</option>
                                    @foreach($candidatas as $candidata)
                                    <option value="{{ $candidata->id }}" 
                                            {{ old('candidata_id', $escrutinio->candidata_id) == $candidata->id ? 'selected' : '' }}>
                                        {{ $candidata->nombreCandidata }} {{ $candidata->apellidoCandidata }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('candidata_id')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                                
                                <div class="current-info">
                                    <div class="current-info-title">
                                        <i class="fas fa-info-circle"></i> Información Actual
                                    </div>
                                    <div class="current-info-content">
                                        @if($escrutinio->candidata)
                                            <p><strong>Candidata:</strong> {{ $escrutinio->candidata->nombreCandidata }} {{ $escrutinio->candidata->apellidoCandidata }}</p>
                                            <p><strong>ID:</strong> {{ $escrutinio->candidata->id }}</p>
                                            @if($escrutinio->candidata->fotoCandidata)
                                                <p><strong>Foto:</strong> Disponible</p>
                                            @else
                                                <p><strong>Foto:</strong> No disponible</p>
                                            @endif
                                        @else
                                            <p><strong>Candidata:</strong> No asignada</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="monto" class="form-label">Monto ($) *</label>
                                <input type="number" 
                                       class="form-control" 
                                       id="monto" 
                                       name="monto" 
                                       value="{{ old('monto', $escrutinio->monto) }}"
                                       required
                                       step="0.01"
                                       min="0.01"
                                       placeholder="Ej: 25.00"
                                       oninput="calcularVotos()">
                                <span class="form-hint">Ingrese el monto recaudado en este escrutinio</span>
                                @error('monto')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="info-box">
                                <div class="info-title">
                                    <i class="fas fa-info-circle"></i> Información del Registro
                                </div>
                                <div class="info-content">
                                    <ul class="info-list">
                                        <li><i class="fas fa-calendar-alt"></i> <strong>Creado:</strong> {{ $escrutinio->created_at->format('d/m/Y H:i') }}</li>
                                        <li><i class="fas fa-sync-alt"></i> <strong>Última actualización:</strong> {{ $escrutinio->updated_at->format('d/m/Y H:i') }}</li>
                                        <li><i class="fas fa-hashtag"></i> <strong>ID del registro:</strong> {{ $escrutinio->id }}</li>
                                        <li><i class="fas fa-dollar-sign"></i> Cada $0.25 equivale a 1 voto</li>
                                        <li><i class="fas fa-exclamation-circle"></i> Los cambios se reflejarán inmediatamente</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="calculation-box">
                                <div class="calculation-title">
                                    <i class="fas fa-calculator"></i> Cálculo de Votos
                                </div>
                                <div class="calculation-result">
                                    <div>Monto actual: <strong id="montoDisplay">${{ number_format($escrutinio->monto, 2) }}</strong></div>
                                    <div>Votos equivalentes: <span class="votes-count" id="votosCount">{{ number_format($escrutinio->monto / 0.25) }}</span> votos</div>
                                </div>
                            </div>
                        </div>

                        <div class="form-footer">
                            <a href="{{ route('escrutinio.index') }}" class="btn-royal btn-secondary">
                                <i class="fas fa-times"></i> CANCELAR
                            </a>
                            <button type="submit" class="btn-royal btn-success">
                                <i class="fas fa-sync-alt"></i> ACTUALIZAR
                            </button>
                        </div>
                    </form>
                </div>
                
                <div class="back-link">
                    <a href="{{ route('escrutinio.index') }}" class="back-btn">
                        <i class="fas fa-arrow-left"></i> Volver al listado de escrutinios
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        function calcularVotos() {
            const montoInput = document.getElementById('monto');
            const monto = parseFloat(montoInput.value) || {{ $escrutinio->monto }};
            
            if (monto > 0) {
                const votos = monto / 0.25;
                document.getElementById('montoDisplay').textContent = `$${monto.toFixed(2)}`;
                document.getElementById('votosCount').textContent = Math.floor(votos);
            }
        }
        
        // Validación del formulario
        document.getElementById('escrutinioForm').addEventListener('submit', function(e) {
            const numeroEscrutinio = document.getElementById('numeroEscrutinio').value.trim();
            const candidata = document.getElementById('candidata_id').value;
            const monto = document.getElementById('monto').value;
            
            let errores = [];
            
            if (!numeroEscrutinio || parseInt(numeroEscrutinio) < 1) {
                errores.push('El número de escrutinio es obligatorio (mínimo 1)');
                document.getElementById('numeroEscrutinio').focus();
            }
            
            if (!candidata) {
                errores.push('Debe seleccionar una candidata');
                if (!numeroEscrutinio) document.getElementById('candidata_id').focus();
            }
            
            if (!monto || parseFloat(monto) <= 0) {
                errores.push('Debe ingresar un monto válido (mayor a 0)');
                if (!numeroEscrutinio && !candidata) document.getElementById('monto').focus();
            }
            
            if (errores.length > 0) {
                e.preventDefault();
                alert('Por favor corrija los siguientes errores:\n\n' + errores.join('\n'));
                return false;
            }
            
            return true;
        });
        
        // Calcular votos cuando se carga la página
        document.addEventListener('DOMContentLoaded', function() {
            calcularVotos();
        });
    </script>
</body>
</html>