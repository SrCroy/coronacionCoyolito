<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Candidata - Gala Real</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700;900&family=Playfair+Display:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/candidatas/create.css') }}">
</head>
<body>
    <div class="main-container">
        <header class="header">
            <div class="container">
                <div class="crown-icon">
                    <i class="fas fa-crown"></i>
                </div>
                <h1 class="page-title">CREAR NUEVA CANDIDATA</h1>
            </div>
        </header>

        <div class="content-wrapper">
            <div class="form-container">
                <div class="form-card">
                    <div class="form-header">
                        <h2 class="form-title">
                            <i class="fas fa-user-plus"></i> REGISTRO DE CANDIDATA
                        </h2>
                        <p class="form-subtitle">Complete todos los campos para registrar una nueva candidata</p>
                    </div>

                    <form action="{{ route('candidatas.store') }}" method="POST" enctype="multipart/form-data" id="createForm">
                        @csrf
                        
                        <div class="form-body">
                            <div class="form-group">
                                <label for="nombreCandidata" class="form-label">Nombre</label>
                                <input type="text" 
                                       class="form-control" 
                                       id="nombreCandidata" 
                                       name="nombreCandidata" 
                                       value="{{ old('nombreCandidata') }}"
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
                                       value="{{ old('apellidoCandidata') }}"
                                       required
                                       placeholder="Ej: Rodríguez">
                                @error('apellidoCandidata')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label">Foto de la Candidata</label>
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
        document.getElementById('createForm').addEventListener('submit', function(e) {
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