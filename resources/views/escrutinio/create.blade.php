<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Escrutinio - Gala Real</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700;900&family=Playfair+Display:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/escrutinio/create.css') }}">
</head>
<body>
    <div class="main-container">
        <header class="header">
            <div class="container">
                <div class="crown-icon">
                    <i class="fas fa-file-invoice-dollar"></i>
                </div>
                <h1 class="page-title">REGISTRAR NUEVO ESCRUTINIO</h1>
            </div>
        </header>

        <div class="content-wrapper">
            <div class="form-container">
                <div class="form-card">
                    <div class="form-header">
                        <h2 class="form-title">
                            <i class="fas fa-plus-circle"></i> NUEVO REGISTRO
                        </h2>
                        <p class="form-subtitle">Complete todos los campos para registrar un nuevo escrutinio</p>
                    </div>

                    <form action="{{ route('escrutinio.store') }}" method="POST" id="escrutinioForm">
                        @csrf
                        
                        <div class="form-body">
                            <div class="form-group">
                                <label for="numeroEscrutinio" class="form-label">Número de Escrutinio *</label>
                                <input type="number" 
                                       class="form-control" 
                                       id="numeroEscrutinio" 
                                       name="numeroEscrutinio" 
                                       value="{{ old('numeroEscrutinio') }}"
                                       required
                                       min="1"
                                       step="1"
                                       placeholder="Ej: 1, 2, 3, etc.">
                                <span class="form-hint">Mismo número para todas las candidatas en este evento de recaudación</span>
                                @error('numeroEscrutinio')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="candidata_id" class="form-label">Candidata *</label>
                                <select class="select-royal" id="candidata_id" name="candidata_id" required onchange="mostrarCandidata()">
                                    <option value="">Seleccione una candidata</option>
                                    @foreach($candidatas as $candidata)
                                    <option value="{{ $candidata->id }}" 
                                            data-nombre="{{ $candidata->nombreCandidata }}"
                                            data-apellido="{{ $candidata->apellidoCandidata }}"
                                            data-foto="{{ $candidata->fotoCandidata }}"
                                            data-id="{{ $candidata->id }}">
                                        {{ $candidata->nombreCandidata }} {{ $candidata->apellidoCandidata }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('candidata_id')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                                
                                <div class="candidate-preview" id="candidatePreview">
                                    <div class="preview-header">
                                        <div class="default-preview">
                                            <i class="fas fa-user"></i>
                                        </div>
                                        <div class="preview-info">
                                            <div class="preview-name" id="previewName">Seleccione una candidata</div>
                                            <div class="preview-id" id="previewId">ID: --</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="monto" class="form-label">Monto ($) *</label>
                                <input type="number" 
                                       class="form-control" 
                                       id="monto" 
                                       name="monto" 
                                       value="{{ old('monto') }}"
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
                                    <i class="fas fa-info-circle"></i> Información Importante
                                </div>
                                <div class="info-content">
                                    <ul class="info-list">
                                        <li><i class="fas fa-asterisk"></i> Campos marcados con * son obligatorios</li>
                                        <li><i class="fas fa-hashtag"></i> Puedes usar el mismo número de escrutinio para diferentes candidatas</li>
                                        <li><i class="fas fa-dollar-sign"></i> Cada $0.25 equivale a 1 voto</li>
                                        <li><i class="fas fa-calculator"></i> El sistema calculará automáticamente los votos</li>
                                        <li><i class="fas fa-check-circle"></i> Verifique los datos antes de guardar</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="calculation-box" id="calculationBox">
                                <div class="calculation-title">
                                    <i class="fas fa-calculator"></i> Cálculo de Votos
                                </div>
                                <div class="calculation-result">
                                    <div>Monto ingresado: <strong id="montoDisplay">$0.00</strong></div>
                                    <div>Votos equivalentes: <span class="votes-count" id="votosCount">0</span> votos</div>
                                </div>
                            </div>
                        </div>

                        <div class="form-footer">
                            <a href="{{ route('escrutinio.index') }}" class="btn-royal btn-secondary">
                                <i class="fas fa-arrow-left"></i> CANCELAR
                            </a>
                            <button type="submit" class="btn-royal btn-success">
                                <i class="fas fa-save"></i> GUARDAR
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        const candidatasData = {
            @foreach($candidatas as $candidata)
            {{ $candidata->id }}: {
                nombre: "{{ $candidata->nombreCandidata }}",
                apellido: "{{ $candidata->apellidoCandidata }}",
                foto: "{{ $candidata->fotoCandidata ? asset('storage/' . $candidata->fotoCandidata) : '' }}",
                id: {{ $candidata->id }}
            },
            @endforeach
        };

        function mostrarCandidata() {
            const select = document.getElementById('candidata_id');
            const preview = document.getElementById('candidatePreview');
            const candidataId = select.value;
            
            if (candidataId && candidatasData[candidataId]) {
                const candidata = candidatasData[candidataId];
                
                // Actualizar información
                document.getElementById('previewName').textContent = `${candidata.nombre} ${candidata.apellido}`;
                document.getElementById('previewId').textContent = `ID: ${candidata.id}`;
                
                // Actualizar foto
                const previewPhoto = preview.querySelector('.preview-photo');
                const defaultPreview = preview.querySelector('.default-preview');
                
                if (candidata.foto) {
                    if (defaultPreview) {
                        // Crear imagen si no existe
                        if (!previewPhoto) {
                            const img = document.createElement('img');
                            img.className = 'preview-photo';
                            img.id = 'previewPhoto';
                            img.src = candidata.foto;
                            img.alt = candidata.nombre;
                            preview.querySelector('.preview-header').prepend(img);
                            defaultPreview.style.display = 'none';
                        } else {
                            previewPhoto.src = candidata.foto;
                            previewPhoto.style.display = 'block';
                            defaultPreview.style.display = 'none';
                        }
                    }
                } else {
                    if (previewPhoto) previewPhoto.style.display = 'none';
                    if (defaultPreview) defaultPreview.style.display = 'flex';
                }
                
                preview.classList.add('show');
            } else {
                preview.classList.remove('show');
            }
        }

        function calcularVotos() {
            const montoInput = document.getElementById('monto');
            const monto = parseFloat(montoInput.value) || 0;
            const calculationBox = document.getElementById('calculationBox');
            
            if (monto > 0) {
                const votos = monto / 0.25;
                document.getElementById('montoDisplay').textContent = `$${monto.toFixed(2)}`;
                document.getElementById('votosCount').textContent = Math.floor(votos);
                calculationBox.classList.add('show');
            } else {
                calculationBox.classList.remove('show');
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
        
        // Mostrar candidata si hay valor en el historial
        document.addEventListener('DOMContentLoaded', function() {
            const candidataId = document.getElementById('candidata_id').value;
            if (candidataId) {
                mostrarCandidata();
            }
            
            // Calcular votos si hay monto en el historial
            const monto = document.getElementById('monto').value;
            if (monto && parseFloat(monto) > 0) {
                calcularVotos();
            }
        });
    </script>
</body>
</html>