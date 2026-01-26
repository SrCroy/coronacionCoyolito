<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Escrutinio - Gala Real</title>
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
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px 20px;
        }
        
        .form-container {
            max-width: 700px;
            width: 100%;
        }
        
        .form-card {
            background: linear-gradient(145deg, rgba(75, 0, 130, 0.25), rgba(48, 25, 52, 0.35));
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 30px;
            border: 2px solid rgba(255, 215, 0, 0.25);
            box-shadow: 0 15px 35px rgba(0,0,0,0.5);
        }
        
        .form-header {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 2px solid rgba(255, 215, 0, 0.2);
        }
        
        .form-title {
            font-family: 'Cinzel', serif;
            color: var(--color-oro-puro);
            font-size: 1.8rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
            margin-bottom: 10px;
        }
        
        .form-subtitle {
            color: #E6D8C9;
            font-size: 0.95rem;
        }
        
        .form-body {
            margin-bottom: 30px;
        }
        
        .form-group {
            margin-bottom: 25px;
        }
        
        .form-label {
            color: var(--color-oro-puro);
            font-family: 'Cinzel', serif;
            font-weight: 500;
            margin-bottom: 8px;
            display: block;
            font-size: 1.1rem;
        }
        
        .form-control {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid var(--color-oro-puro);
            color: var(--color-marfil);
            border-radius: 8px;
            padding: 15px;
            width: 100%;
            transition: all 0.3s ease;
            font-size: 1rem;
        }
        
        .form-control:focus {
            background: rgba(255, 255, 255, 0.15);
            border-color: var(--color-oro-puro);
            box-shadow: 0 0 0 0.3rem rgba(255, 215, 0, 0.2);
            color: var(--color-marfil);
            outline: none;
        }
        
        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.4);
            font-style: italic;
        }
        
        .form-hint {
            color: #E6D8C9;
            font-size: 0.9rem;
            margin-top: 5px;
            display: block;
        }
        
        .select-royal {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid var(--color-oro-puro);
            color: var(--color-marfil);
            border-radius: 8px;
            padding: 15px;
            width: 100%;
            cursor: pointer;
            transition: all 0.3s ease;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%23FFD700' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 15px center;
            background-size: 16px;
        }
        
        .select-royal:focus {
            background: rgba(255, 255, 255, 0.15);
            border-color: var(--color-oro-puro);
            box-shadow: 0 0 0 0.3rem rgba(255, 215, 0, 0.2);
            outline: none;
        }
        
        .select-royal option {
            background: var(--color-terciopelo);
            color: var(--color-marfil);
        }
        
        .candidate-preview {
            margin-top: 15px;
            padding: 15px;
            background: rgba(0, 0, 0, 0.2);
            border-radius: 8px;
            border: 1px solid rgba(255, 215, 0, 0.2);
            display: none;
        }
        
        .candidate-preview.show {
            display: block;
        }
        
        .preview-header {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 10px;
        }
        
        .preview-photo {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--color-oro-puro);
        }
        
        .default-preview {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: linear-gradient(45deg, var(--color-púrpura-real), var(--color-terciopelo));
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--color-oro-puro);
            border: 2px solid var(--color-oro-puro);
        }
        
        .preview-info {
            flex: 1;
        }
        
        .preview-name {
            font-family: 'Cinzel', serif;
            color: var(--color-oro-puro);
            font-weight: 500;
            font-size: 1.1rem;
        }
        
        .preview-id {
            color: #E6D8C9;
            font-size: 0.9rem;
        }
        
        .info-box {
            background: rgba(255, 215, 0, 0.1);
            border: 1px solid var(--color-oro-puro);
            border-radius: 8px;
            padding: 15px;
            margin-top: 20px;
        }
        
        .info-title {
            color: var(--color-oro-puro);
            font-family: 'Cinzel', serif;
            font-weight: 500;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .info-content {
            color: #E6D8C9;
            font-size: 0.9rem;
            line-height: 1.4;
        }
        
        .info-list {
            list-style: none;
            padding-left: 0;
            margin-bottom: 0;
        }
        
        .info-list li {
            margin-bottom: 8px;
            display: flex;
            align-items: flex-start;
            gap: 8px;
        }
        
        .info-list li i {
            color: var(--color-oro-puro);
            margin-top: 3px;
        }
        
        .calculation-box {
            background: rgba(4, 99, 7, 0.1);
            border: 1px solid var(--color-verde-esmeralda);
            border-radius: 8px;
            padding: 15px;
            margin-top: 20px;
            display: none;
        }
        
        .calculation-box.show {
            display: block;
        }
        
        .calculation-title {
            color: var(--color-oro-puro);
            font-family: 'Cinzel', serif;
            font-weight: 500;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .calculation-result {
            text-align: center;
            padding: 10px;
            background: rgba(0, 0, 0, 0.2);
            border-radius: 6px;
            margin-top: 10px;
        }
        
        .votes-count {
            font-family: 'Cinzel', serif;
            font-size: 1.5rem;
            color: var(--color-oro-puro);
            font-weight: bold;
        }
        
        .form-footer {
            display: flex;
            gap: 15px;
            justify-content: center;
        }
        
        .btn-royal {
            font-family: 'Cinzel', serif;
            font-weight: bold;
            background: linear-gradient(to right, var(--color-púrpura-real), var(--color-azul-real));
            color: white;
            border: none;
            padding: 15px 40px;
            border-radius: 8px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
            cursor: pointer;
            font-size: 1.1rem;
            min-width: 180px;
            justify-content: center;
        }
        
        .btn-royal:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.4);
            color: white;
            background: linear-gradient(to right, var(--color-azul-real), var(--color-púrpura-real));
        }
        
        .btn-secondary {
            background: linear-gradient(to right, #444, #666);
            color: white;
        }
        
        .btn-success {
            background: linear-gradient(to right, var(--color-verde-esmeralda), #0A8C0E);
            color: white;
        }
        
        .btn-success:hover {
            background: linear-gradient(to right, #0A8C0E, var(--color-verde-esmeralda));
        }
        
        .back-link {
            text-align: center;
            margin-top: 30px;
        }
        
        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            color: var(--color-oro-puro);
            text-decoration: none;
            font-family: 'Cinzel', serif;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .back-btn:hover {
            color: var(--color-oro-puro);
            gap: 15px;
        }
        
        .error-message {
            color: #ff6b6b;
            font-size: 0.9rem;
            margin-top: 5px;
            display: block;
        }
        
        @media (max-width: 768px) {
            .form-container {
                max-width: 100%;
            }
            
            .form-card {
                padding: 25px 20px;
            }
            
            .page-title {
                font-size: 1.8rem;
            }
            
            .form-title {
                font-size: 1.5rem;
                flex-direction: column;
                gap: 10px;
            }
            
            .form-footer {
                flex-direction: column;
            }
            
            .btn-royal {
                width: 100%;
                min-width: auto;
            }
        }
        
        @media (max-width: 480px) {
            .header {
                padding: 20px 0 15px;
            }
            
            .page-title {
                font-size: 1.5rem;
            }
            
            .crown-icon {
                font-size: 2rem;
            }
            
            .content-wrapper {
                padding: 20px 15px;
            }
            
            .form-card {
                padding: 20px 15px;
            }
            
            .form-control {
                padding: 12px;
            }
        }
    </style>
</head>
<body>
    <div class="main-container">
        <header class="header">
            <div class="container">
                <div class="crown-icon">
                    <i class="fas fa-file-invoice-dollar"></i>
                </div>
                <h1 class="page-title">REGISTRAR NUEVO ESCRUTINIO</h1>
                <p class="page-subtitle">GALA DE CORONACIÓN REAL - EL COYOLITO</p>
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
                
                <div class="back-link">
                    <a href="{{ route('escrutinio.index') }}" class="back-btn">
                        <i class="fas fa-arrow-left"></i> Volver al listado de escrutinios
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Variables globales para datos de candidatas
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