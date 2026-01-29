<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escrutinios - Gala Real</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700;900&family=Playfair+Display:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/escrutinio/index.css') }}">
</head>
<body>
    <div class="main-container">
        <header class="header">
            <div class="container">
                <div class="crown-icon">
                    <i class="fas fa-file-invoice-dollar"></i>
                </div>
                <h1 class="page-title">REGISTRO DE ESCRUTINIOS</h1>
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

                <!-- Resumen Estadístico -->
                @php
                    $totalEscrutinios = count($escrutinio);
                    $totalMonto = $escrutinio->sum('monto');
                    $totalVotos = $totalMonto / 0.25;
                    
                    // Agrupar por número de escrutinio
                    $escrutiniosAgrupados = $escrutinio->groupBy('numeroEscrutinio');
                    
                    // Contar escrutinios únicos
                    $escrutiniosUnicos = $escrutiniosAgrupados->count();
                @endphp
                
                <div class="summary-card">
                    <div class="summary-header">
                        <i class="fas fa-chart-bar" style="color: var(--color-oro-puro); font-size: 1.5rem;"></i>
                        <h3 class="summary-title">RESUMEN ESTADÍSTICO</h3>
                    </div>
                    <div class="summary-stats">
                        <div class="stat-item">
                            <div class="stat-value">{{ $escrutiniosUnicos }}</div>
                            <div class="stat-label">Escrutinios</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-value">{{ $totalEscrutinios }}</div>
                            <div class="stat-label">Total Registros</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-value">${{ number_format($totalMonto, 2) }}</div>
                            <div class="stat-label">Total Recaudado</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-value">{{ number_format($totalVotos) }}</div>
                            <div class="stat-label">Total Votos</div>
                        </div>
                    </div>
                </div>

                <div class="action-bar">
                    <div class="stats-box">
                        <p class="stats-text">
                            <i class="fas fa-list-ol"></i> Escrutinios: {{ $escrutiniosUnicos }} | Registros: {{ $totalEscrutinios }}
                        </p>
                    </div>
                    
                    <a href="{{ route('escrutinio.create') }}" class="btn-royal">
                        <i class="fas fa-plus-circle"></i> NUEVO ESCRUTINIO
                    </a>
                </div>

                @if(count($escrutinio) > 0)
                    @foreach($escrutiniosAgrupados->sortByDesc('numeroEscrutinio') as $numero => $registros)
                        @php
                            $totalEscrutinio = $registros->sum('monto');
                            $totalVotosEscrutinio = $totalEscrutinio / 0.25;
                            $candidatasCount = $registros->count();
                        @endphp
                        
                        <div class="escrutinio-section">
                            <div class="escrutinio-header">
                                <div class="escrutinio-title">
                                    <span>ESCRUTINIO #{{ $numero }}</span>
                                </div>
                                
                                <div class="escrutinio-stats">
                                    <div class="escrutinio-stat">
                                        <span class="escrutinio-stat-value">{{ $candidatasCount }}</span>
                                        <span class="escrutinio-stat-label">Candidatas</span>
                                    </div>
                                    <div class="escrutinio-stat">
                                        <span class="escrutinio-stat-value">${{ number_format($totalEscrutinio, 2) }}</span>
                                        <span class="escrutinio-stat-label">Total</span>
                                    </div>
                                    <div class="escrutinio-stat">
                                        <span class="escrutinio-stat-value">{{ number_format($totalVotosEscrutinio) }}</span>
                                        <span class="escrutinio-stat-label">Votos</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="table-container">
                                <table class="table-royal">
                                    <thead>
                                        <tr>
                                            <th>CANDIDATA</th>
                                            <th>MONTO ($)</th>
                                            <th>VOTOS</th>
                                            <th>FECHA REGISTRO</th>
                                            <th>ACCIONES</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($registros as $escrutinioItem)
                                        <tr>
                                            <td>
                                                <div class="candidate-info">
                                                    @if($escrutinioItem->candidata && $escrutinioItem->candidata->fotoCandidata)
                                                    <img src="{{ asset('storage/' . $escrutinioItem->candidata->fotoCandidata) }}" 
                                                         alt="{{ $escrutinioItem->candidata->nombreCandidata }}"
                                                         class="candidate-photo">
                                                    @else
                                                    <div class="default-photo-small">
                                                        <i class="fas fa-user"></i>
                                                    </div>
                                                    @endif
                                                    <div class="candidate-name">
                                                        {{ $escrutinioItem->candidata ? $escrutinioItem->candidata->nombreCandidata . ' ' . $escrutinioItem->candidata->apellidoCandidata : 'N/A' }}
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="monto-badge">
                                                    ${{ number_format($escrutinioItem->monto, 2) }}
                                                </span>
                                            </td>
                                            <td>
                                                <span class="votos-count">
                                                    {{ number_format($escrutinioItem->monto / 0.25) }}
                                                </span>
                                            </td>
                                            <td>
                                                {{ $escrutinioItem->created_at->format('d/m/Y H:i') }}
                                            </td>
                                            <td>
                                                <div class="table-actions">
                                                    <a href="{{ route('escrutinio.edit', $escrutinioItem->id) }}" class="btn-action btn-edit">
                                                        <i class="fas fa-edit"></i> EDITAR
                                                    </a>
                                                    
                                                    <button type="button" class="btn-action btn-delete" 
                                                            data-bs-toggle="modal" 
                                                            data-bs-target="#deleteModal"
                                                            data-id="{{ $escrutinioItem->id }}"
                                                            data-escrutinio="{{ $escrutinioItem->numeroEscrutinio }}"
                                                            data-candidata="{{ $escrutinioItem->candidata ? $escrutinioItem->candidata->nombreCandidata : 'N/A' }}">
                                                        <i class="fas fa-trash-alt"></i> ELIMINAR
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endforeach
                @else
                <div class="empty-state">
                    <div class="empty-icon">
                        <i class="fas fa-file-excel"></i>
                    </div>
                    <h3 class="empty-title">No hay escrutinios registrados</h3>
                    <p class="empty-text">Comienza registrando el primer escrutinio para llevar el control de votos y montos recaudados.</p>
                    <a href="{{ route('escrutinio.create') }}" class="btn-royal">
                        <i class="fas fa-plus-circle"></i> REGISTRAR PRIMER ESCRUTINIO
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
                        <i class="fas fa-trash-alt me-2"></i> CONFIRMAR ELIMINACIÓN
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center">
                    <div class="mb-4">
                        <i class="fas fa-exclamation-triangle" style="font-size: 4rem; color: var(--color-rojo-pasion);"></i>
                    </div>
                    <h4 class="mb-3">¿Estás seguro de eliminar este escrutinio?</h4>
                    <p class="lead">Escrutinio: <strong id="deleteEscrutinioNumero"></strong></p>
                    <p class="lead">Candidata: <strong id="deleteCandidataName"></strong></p>
                    <p class="text-muted">Esta acción no se puede deshacer y afectará el conteo total.</p>
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
        const baseDeleteUrl = "{{ url('escrutinio') }}";
        const deleteModal = document.getElementById('deleteModal');
        deleteModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const id = button.getAttribute('data-id');
            const escrutinio = button.getAttribute('data-escrutinio');
            const candidata = button.getAttribute('data-candidata');
            
            document.getElementById('deleteEscrutinioNumero').textContent = escrutinio;
            document.getElementById('deleteCandidataName').textContent = candidata;
            document.getElementById('deleteForm').action = `${baseDeleteUrl}/${id}`;
        });
    </script>
</body>
</html>