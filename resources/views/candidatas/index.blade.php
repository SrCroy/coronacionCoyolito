<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Candidatas - Gala Real</title>
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
        }
        
        .container {
            max-width: 1400px;
        }
        
        .action-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            flex-wrap: wrap;
            gap: 20px;
        }
        
        .stats-box {
            background: rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            padding: 12px 25px;
            border: 1px solid rgba(255, 215, 0, 0.2);
        }
        
        .stats-text {
            color: var(--color-oro-puro);
            font-family: 'Cinzel', serif;
            font-weight: 500;
            margin: 0;
            font-size: 1.1rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .btn-royal {
            font-family: 'Cinzel', serif;
            font-weight: bold;
            background: linear-gradient(to right, var(--color-púrpura-real), var(--color-azul-real));
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 8px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        }
        
        .btn-royal:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.4);
            color: white;
            background: linear-gradient(to right, var(--color-azul-real), var(--color-púrpura-real));
        }
        
        .candidates-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 30px;
        }
        
        .candidate-card {
            background: linear-gradient(145deg, rgba(75, 0, 130, 0.25), rgba(48, 25, 52, 0.35));
            backdrop-filter: blur(10px);
            border-radius: 15px;
            overflow: hidden;
            border: 2px solid rgba(255, 215, 0, 0.25);
            transition: all 0.3s ease;
            position: relative;
        }
        
        .candidate-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.6);
            border-color: rgba(255, 215, 0, 0.5);
        }
        
        .candidate-photo {
            width: 100%;
            height: 250px;
            object-fit: cover;
            border-bottom: 3px solid var(--color-oro-puro);
        }
        
        .default-photo {
            width: 100%;
            height: 250px;
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
        }
        
        .candidate-name {
            font-family: 'Cinzel', serif;
            color: var(--color-oro-puro);
            font-weight: 700;
            font-size: 1.5rem;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .candidate-details {
            color: #E6D8C9;
            margin-bottom: 20px;
        }
        
        .candidate-detail {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 8px;
            font-size: 0.95rem;
        }
        
        .candidate-actions {
            display: flex;
            gap: 10px;
        }
        
        .btn-action {
            flex: 1;
            padding: 10px 15px;
            border: none;
            border-radius: 6px;
            font-family: 'Cinzel', serif;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }
        
        .btn-edit {
            background: linear-gradient(to right, var(--color-azul-real), #2D46B9);
            color: white;
        }
        
        .btn-delete {
            background: linear-gradient(to right, var(--color-rojo-pasion), #C21807);
            color: white;
        }
        
        .btn-action:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
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
        
        .alert-royal {
            background: linear-gradient(to right, rgba(4, 99, 7, 0.2), rgba(10, 140, 14, 0.2));
            border: 1px solid var(--color-verde-esmeralda);
            color: var(--color-marfil);
            border-radius: 8px;
            backdrop-filter: blur(10px);
            margin-bottom: 25px;
        }
        
        .alert-royal .btn-close {
            filter: brightness(0) invert(1);
        }
        
        .modal-royal {
            background: linear-gradient(135deg, var(--color-terciopelo), var(--color-púrpura-real));
            border: 3px solid var(--color-oro-puro);
            border-radius: 15px;
            color: var(--color-marfil);
        }
        
        .modal-royal .modal-header {
            border-bottom: 2px solid var(--color-oro-puro);
            background: rgba(0, 0, 0, 0.2);
        }
        
        .modal-royal .modal-title {
            font-family: 'Cinzel', serif;
            color: var(--color-oro-puro);
            font-weight: bold;
        }
        
        .modal-royal .modal-body {
            background: rgba(0, 0, 0, 0.1);
        }
        
        .modal-royal .modal-footer {
            border-top: 2px solid var(--color-oro-puro);
            background: rgba(0, 0, 0, 0.2);
        }
        
        @media (max-width: 992px) {
            .candidates-grid {
                grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
                gap: 25px;
            }
        }
        
        @media (max-width: 768px) {
            .candidates-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }
            
            .action-bar {
                flex-direction: column;
                align-items: stretch;
            }
            
            .btn-royal {
                width: 100%;
                justify-content: center;
            }
            
            .stats-box {
                width: 100%;
                text-align: center;
            }
            
            .page-title {
                font-size: 1.8rem;
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
            
            .candidate-info {
                padding: 20px;
            }
            
            .candidate-actions {
                flex-direction: column;
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
                <h1 class="page-title">LISTA DE CANDIDATAS</h1>
                <p class="page-subtitle">GALA DE CORONACIÓN REAL - EL COYOLITO</p>
            </div>
        </header>

        <div class="content-wrapper">
            <div class="container">
                @if(session('success'))
                <div class="alert alert-royal alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-2"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                @endif

                <div class="action-bar">
                    <div class="stats-box">
                        <p class="stats-text">
                            <i class="fas fa-users-crown"></i> Total: {{ count($candidatas) }} Candidatas
                        </p>
                    </div>
                    
                    <a href="{{ route('candidatas.create') }}" class="btn-royal">
                        <i class="fas fa-plus-circle"></i> NUEVA CANDIDATA
                    </a>
                </div>

                @if(count($candidatas) > 0)
                <div class="candidates-grid">
                    @foreach($candidatas as $candidata)
                    <div class="candidate-card">
                        @if($candidata->fotoCandidata)
                        <img src="{{ asset('storage/' . $candidata->fotoCandidata) }}" 
                             alt="{{ $candidata->nombreCandidata }}" 
                             class="candidate-photo">
                        @else
                        <div class="default-photo">
                            <i class="fas fa-user-crown"></i>
                            <span>{{ $candidata->nombreCandidata }}</span>
                        </div>
                        @endif
                        
                        <div class="candidate-info">
                            <h3 class="candidate-name">
                                <i class="fas fa-crown"></i>
                                {{ $candidata->nombreCandidata }} {{ $candidata->apellidoCandidata }}
                            </h3>
                            
                            <div class="candidate-details">
                                <div class="candidate-detail">
                                    <i class="fas fa-id-card"></i>
                                    <span><strong>ID:</strong> #{{ $candidata->id }}</span>
                                </div>
                                <div class="candidate-detail">
                                    <i class="fas fa-calendar-alt"></i>
                                    <span><strong>Registrada:</strong> {{ $candidata->created_at->format('d/m/Y') }}</span>
                                </div>
                                <div class="candidate-detail">
                                    <i class="fas fa-clock"></i>
                                    <span><strong>Actualizada:</strong> {{ $candidata->updated_at->format('d/m/Y') }}</span>
                                </div>
                            </div>
                            
                            <div class="candidate-actions">
                                <a href="{{ route('candidatas.edit', $candidata->id) }}" class="btn-action btn-edit">
                                    <i class="fas fa-edit"></i> EDITAR
                                </a>
                                
                                <button type="button" class="btn-action btn-delete" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#deleteModal"
                                        data-id="{{ $candidata->id }}"
                                        data-nombre="{{ $candidata->nombreCandidata }}">
                                    <i class="fas fa-trash-alt"></i> ELIMINAR
                                </button>
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
                    <p class="empty-text">Comienza agregando la primera candidata para la gala de coronación. Todas las candidatas aparecerán aquí.</p>
                    <a href="{{ route('candidatas.create') }}" class="btn-royal">
                        <i class="fas fa-plus-circle"></i> AGREGAR PRIMERA CANDIDATA
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Modal de Confirmación de Eliminación -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content modal-royal">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-user-times me-2"></i> CONFIRMAR ELIMINACIÓN
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center">
                    <div class="mb-4">
                        <i class="fas fa-exclamation-triangle" style="font-size: 4rem; color: var(--color-rojo-pasion);"></i>
                    </div>
                    <h4 class="mb-3">¿Estás seguro de eliminar esta candidata?</h4>
                    <p class="lead" id="deleteCandidateName"></p>
                    <p class="text-muted">Esta acción no se puede deshacer.</p>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn-royal btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <form id="deleteForm" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-royal btn-delete">
                            <i class="fas fa-trash-alt me-2"></i> ELIMINAR
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const baseDeleteUrl = "{{ url('candidatas') }}";
        const deleteModal = document.getElementById('deleteModal');
        deleteModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const id = button.getAttribute('data-id');
            const nombre = button.getAttribute('data-nombre');
            
            document.getElementById('deleteCandidateName').textContent = nombre;
            document.getElementById('deleteForm').action = `${baseDeleteUrl}/${id}`;
        });
    </script>
</body>
</html>