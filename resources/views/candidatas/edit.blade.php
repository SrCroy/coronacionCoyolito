<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Candidata - Gala Real</title>
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
        
        .current-photo {
            margin-top: 20px;
            text-align: center;
        }
        
        .current-photo-title {
            color: var(--color-oro-puro);
            font-family: 'Cinzel', serif;
            margin-bottom: 10px;
            font-size: 1.1rem;
        }
        
        .current-photo-image {
            max-width: 100%;
            max-height: 250px;
            border-radius: 10px;
            border: 3px solid var(--color-oro-puro);
            box-shadow: 0 8px 20px rgba(0,0,0,0.4);
        }
        
        .no-photo {
            background: linear-gradient(45deg, var(--color-púrpura-real), var(--color-terciopelo));
            border: 2px solid var(--color-oro-puro);
            border-radius: 10px;
            padding: 30px;
            text-align: center;
            color: var(--color-oro-puro);
        }
        
        .no-photo-icon {
            font-size: 3rem;
            margin-bottom: 15px;
            opacity: 0.7;
        }
        
        .no-photo-text {
            font-family: 'Cinzel', serif;
            font-size: 1.1rem;
        }
        
        .file-upload {
            position: relative;
            margin-top: 5px;
        }
        
        .file-input {
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }
        
        .file-label {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid var(--color-oro-puro);
            border-radius: 8px;
            padding: 15px;
            display: flex;
            align-items: center;
            gap: 15px;
            color: var(--color-marfil);
            cursor: pointer;
            transition: all 0.3s ease;
            min-height: 60px;
        }
        
        .file-label:hover {
            background: rgba(255, 255, 255, 0.15);
        }
        
        .file-icon {
            font-size: 1.5rem;
            color: var(--color-oro-puro);
        }
        
        .file-info {
            flex: 1;
        }
        
        .file-name {
            display: block;
            font-size: 1rem;
            margin-bottom: 5px;
        }
        
        .file-hint {
            font-size: 0.85rem;
            color: rgba(255, 255, 255, 0.6);
        }
        
        .file-browse {
            background: linear-gradient(to right, var(--color-púrpura-real), var(--color-azul-real));
            color: white;
            padding: 8px 20px;
            border-radius: 6px;
            font-family: 'Cinzel', serif;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .file-label:hover .file-browse {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        }
        
        .preview-container {
            margin-top: 20px;
            text-align: center;
            display: none;
        }
        
        .preview-container.show {
            display: block;
        }
        
        .preview-title {
            color: var(--color-oro-puro);
            font-family: 'Cinzel', serif;
            margin-bottom: 10px;
            font-size: 1.1rem;
        }
        
        .preview-image {
            max-width: 100%;
            max-height: 250px;
            border-radius: 10px;
            border: 3px solid var(--color-oro-puro);
            box-shadow: 0 8px 20px rgba(0,0,0,0.4);
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
            
            .file-label {
                flex-direction: column;
                text-align: center;
                gap: 10px;
            }
            
            .file-info {
                text-align: center;
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
            
            .file-label {
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
                    <i class="fas fa-crown"></i>
                </div>
                <h1 class="page-title">EDITAR CANDIDATA</h1>
                <p class="page-subtitle">GALA DE CORONACIÓN REAL - EL COYOLITO</p>
            </div>
        </header>

        <div class="content-wrapper">
            <div class="form-container">
                <div class="form-card">
                    <div class="form-header">
                        <h2 class="form-title">
                            <i class="fas fa-user-edit"></i> EDITAR REGISTRO
                        </h2>
                        <p class="form-subtitle">Actualice los datos de la candidata</p>
                    </div>

                    <form action="{{ route('candidatas.update', $candidata->id) }}" method="POST" enctype="multipart/form-data" id="editForm">
                        @csrf
                        @method('PUT')
                        
                        <div class="form-body">
                            <div class="form-group">
                                <label for="nombreCandidata" class="form-label">Nombre</label>
                                <input type="text" 
                                       class="form-control" 
                                       id="nombreCandidata" 
                                       name="nombreCandidata" 
                                       value="{{ old('nombreCandidata', $candidata->nombreCandidata) }}"
                                       required
                                       placeholder="Ej: María Fernanda">
                                @error('nombreCandidata')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="apellidoCandidata" class="form-label">Apellido</label>
                                <input type="text" 
                                       class="form-control" 
                                       id="apellidoCandidata" 
                                       name="apellidoCandidata" 
                                       value="{{ old('apellidoCandidata', $candidata->apellidoCandidata) }}"
                                       required
                                       placeholder="Ej: Rodríguez">
                                @error('apellidoCandidata')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                @if($candidata->fotoCandidata)
                                <div class="current-photo">
                                    <div class="current-photo-title">Foto actual:</div>
                                    <img src="{{ asset('storage/' . $candidata->fotoCandidata) }}" 
                                         alt="{{ $candidata->nombreCandidata }}"
                                         class="current-photo-image">
                                </div>
                                @else
                                <div class="no-photo">
                                    <div class="no-photo-icon">
                                        <i class="fas fa-user-slash"></i>
                                    </div>
                                    <div class="no-photo-text">Sin foto registrada</div>
                                </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label class="form-label">Nueva Foto (opcional)</label>
                                <p class="text-muted mb-2">Deje en blanco para mantener la foto actual</p>
                                <div class="file-upload">
                                    <div class="file-label">
                                        <div class="file-icon">
                                            <i class="fas fa-camera"></i>
                                        </div>
                                        <div class="file-info">
                                            <span class="file-name" id="fileName">Seleccionar archivo...</span>
                                            <span class="file-hint">Formatos: JPG, PNG, JPEG | Máx: 2MB</span>
                                        </div>
                                        <div class="file-browse">
                                            Explorar
                                        </div>
                                    </div>
                                    <input type="file" 
                                           class="file-input" 
                                           id="fotoCandidata" 
                                           name="fotoCandidata" 
                                           accept="image/*"
                                           onchange="updateFileName(this)">
                                    @error('fotoCandidata')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                                <div class="preview-container" id="previewContainer">
                                    <div class="preview-title">Previsualización:</div>
                                    <img id="previewImage" class="preview-image">
                                </div>
                            </div>
                        </div>

                        <div class="form-footer">
                            <a href="{{ route('candidatas.index') }}" class="btn-royal btn-secondary">
                                <i class="fas fa-times"></i> CANCELAR
                            </a>
                            <button type="submit" class="btn-royal btn-success">
                                <i class="fas fa-sync-alt"></i> ACTUALIZAR
                            </button>
                        </div>
                    </form>
                </div>
                
                <div class="back-link">
                    <a href="{{ route('candidatas.index') }}" class="back-btn">
                        <i class="fas fa-arrow-left"></i> Volver al listado de candidatas
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        function updateFileName(input) {
            const fileName = input.files[0] ? input.files[0].name : 'Seleccionar archivo...';
            document.getElementById('fileName').textContent = fileName;
            
            // Mostrar previsualización si es una imagen
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const previewContainer = document.getElementById('previewContainer');
                    const previewImage = document.getElementById('previewImage');
                    
                    previewImage.src = e.target.result;
                    previewContainer.classList.add('show');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        
        // Validación del formulario
        document.getElementById('editForm').addEventListener('submit', function(e) {
            const nombre = document.getElementById('nombreCandidata').value.trim();
            const apellido = document.getElementById('apellidoCandidata').value.trim();
            
            if (!nombre || !apellido) {
                e.preventDefault();
                alert('Por favor complete todos los campos requeridos');
                return false;
            }
            
            return true;
        });
    </script>
</body>
</html>