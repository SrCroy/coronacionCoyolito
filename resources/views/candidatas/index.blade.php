<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Candidatas - Gala Real</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700;900&family=Playfair+Display:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/candidatas/index.css') }}">
</head>
<body>
    <div class="main-container">
        <header class="header">
            <div class="container">
                <div class="crown-icon">
                    <i class="fas fa-crown"></i>
                </div>
                <h1 class="page-title">LISTA DE CANDIDATAS</h1>
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