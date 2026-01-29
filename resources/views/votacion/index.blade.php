<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votación - Gala Real</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700;900&family=Playfair+Display:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/votacion/index.css') }}">
</head>
<body>
    <div class="main-container">
        <header class="header">
            <div class="container">
                <div class="crown-icon">
                    <i class="fas fa-crown"></i>
                </div>
                <h1 class="page-title">VOTACIÓN MISS SIMPATIA</h1>
            </div>
        </header>

        <div class="content-wrapper">
            <div class="container">
                <div id="alerta"></div>

                <div id="myVoteMessage"></div>

                <div class="action-bar">
                    <div class="stats-box">
                        <p class="stats-text">
                            <i class="fas fa-users-crown"></i> Total Candidatas: {{ count($candidatas) }}
                        </p>
                    </div>
                </div>

                @if(count($candidatas) > 0)
                <div class="candidates-grid">
                    @foreach($candidatas as $candidata)
                    <div class="candidate-card" id="candidata-{{ $candidata->id }}">
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
                            
                            <div class="vote-count">
                                <i class="fas fa-heart"></i>
                                <span><strong>VOTOS:</strong> <span class="vote-number">{{ $candidata->votos_count }}</span></span>
                            </div>
                            
                            <div class="candidate-actions">
                                <button class="btn-vote votar-btn" 
                                        data-id="{{ $candidata->id }}"
                                        data-nombre="{{ $candidata->nombreCandidata }}"
                                        data-apellido="{{ $candidata->apellidoCandidata }}"
                                        data-foto="{{ $candidata->fotoCandidata ? asset('storage/' . $candidata->fotoCandidata) : '' }}">
                                    <i class="fas fa-vote-yea"></i> VOTAR POR ESTA REINA
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
                    <h3 class="empty-title">No hay candidatas para votar</h3>
                    <p class="empty-text">Aún no se han registrado candidatas para la gala de coronación.</p>
                </div>
                @endif
            </div>
        </div>
    </div>

    <div class="modal fade" id="confirmVoteModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content modal-royal">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-vote-yea me-2"></i> CONFIRMAR TU VOTO
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center">
                    <div class="modal-icon">
                        <i class="fas fa-question-circle"></i>
                    </div>
                    
                    <h4 class="mb-4" style="color: var(--color-oro-puro);">¿Estás seguro de tu elección?</h4>
                    
                    <div class="candidate-preview">
                        <img id="modalCandidatePhoto" src="" alt="" class="candidate-preview-photo">
                        <div class="candidate-preview-info">
                            <h5 id="modalCandidateName"></h5>
                            <p id="modalCandidateDetails">Tu voto será registrado permanentemente</p>
                        </div>
                    </div>
                    
                    <p class="modal-confirm-text">
                        <i class="fas fa-exclamation-triangle me-2" style="color: var(--color-oro-puro);"></i>
                        Esta acción <strong>no se puede deshacer</strong>. Solo puedes votar una vez.
                    </p>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn-royal" data-bs-dismiss="modal">
                        <i class="fas fa-times me-2"></i> CANCELAR
                    </button>
                    <button type="button" class="btn-royal btn-success-royal" id="confirmVoteBtn">
                        <i class="fas fa-check-circle me-2"></i> SÍ, CONFIRMAR VOTO
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="successVoteModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content modal-royal">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-check-circle me-2"></i> ¡VOTO REGISTRADO!
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center">
                    <div class="modal-icon">
                        <i class="fas fa-heart" style="color: #ff6b6b;"></i>
                    </div>
                    
                    <h4 class="mb-4" style="color: var(--color-oro-puro);" id="successTitle"></h4>
                    
                    <div class="candidate-preview">
                        <img id="successCandidatePhoto" src="" alt="" class="candidate-preview-photo">
                        <div class="candidate-preview-info">
                            <h5 id="successCandidateName"></h5>
                            <p id="successCandidateMessage"></p>
                        </div>
                    </div>
                    
                    <p class="modal-confirm-text">
                        <i class="fas fa-star me-2" style="color: var(--color-oro-puro);"></i>
                        ¡Gracias por participar en la Gala de Coronación Real!
                    </p>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn-royal" data-bs-dismiss="modal">
                        <i class="fas fa-eye me-2"></i> CONTINUAR VIENDO CANDIDATAS
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="errorVoteModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content modal-royal">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-exclamation-triangle me-2"></i> ERROR AL VOTAR
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center">
                    <div class="modal-icon">
                        <i class="fas fa-times-circle" style="color: var(--color-rojo-pasion);"></i>
                    </div>
                    
                    <h4 class="mb-4" style="color: var(--color-oro-puro);">No se pudo procesar tu voto</h4>
                    
                    <p class="modal-confirm-text" id="errorMessage">
                        Ha ocurrido un error al intentar registrar tu voto.
                    </p>
                    
                    <p class="mt-3">
                        <i class="fas fa-info-circle me-2" style="color: var(--color-oro-puro);"></i>
                        Por favor, intenta nuevamente o contacta con el administrador.
                    </p>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn-royal" data-bs-dismiss="modal">
                        <i class="fas fa-redo me-2"></i> INTENTAR NUEVAMENTE
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="alreadyVotedModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content modal-royal">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-info-circle me-2"></i> YA VOTASTE
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center">
                    <div class="modal-icon">
                        <i class="fas fa-user-check"></i>
                    </div>
                    
                    <h4 class="mb-4" style="color: var(--color-oro-puro);">Ya has ejercido tu voto</h4>
                    
                    <p class="modal-confirm-text" id="alreadyVotedMessage">
                        Ya votaste anteriormente en esta votación.
                    </p>
                    
                    <div class="candidate-preview">
                        <img id="alreadyVotedPhoto" src="" alt="" class="candidate-preview-photo">
                        <div class="candidate-preview-info">
                            <h5 id="alreadyVotedName"></h5>
                            <p id="alreadyVotedDate"></p>
                        </div>
                    </div>
                    
                    <p class="mt-4">
                        <i class="fas fa-eye me-2" style="color: var(--color-oro-puro);"></i>
                        Puedes ver los resultados en tiempo real haciendo clic en "VER RESULTADOS".
                    </p>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn-royal" data-bs-dismiss="modal">
                        <i class="fas fa-times me-2"></i> CERRAR
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            let currentCandidateId = null;
            let currentCandidateData = null;
            let yaVoto = false;
            let miVoto = null;
            
            function setCookie(name, value, days) {
                let expires = "";
                if (days) {
                    let date = new Date();
                    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                    expires = "; expires=" + date.toUTCString();
                }
                document.cookie = name + "=" + (value || "") + expires + "; path=/; SameSite=Strict";
            }
            
            function getCookie(name) {
                let nameEQ = name + "=";
                let ca = document.cookie.split(';');
                for(let i = 0; i < ca.length; i++) {
                    let c = ca[i];
                    while (c.charAt(0) === ' ') c = c.substring(1, c.length);
                    if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
                }
                return null;
            }
            
            function eraseCookie(name) {
                document.cookie = name + '=; Max-Age=-99999999; path=/; SameSite=Strict';
            }
            
            function verificarVotoAnterior() {
                const votoGuardado = getCookie('voto_gala_real');
                
                if (votoGuardado) {
                    try {
                        miVoto = JSON.parse(votoGuardado);
                        yaVoto = true;
                        
                        mostrarMensajeYaVoto(miVoto);
                        
                        deshabilitarBotonesVotar(miVoto.candidata_id);
                        
                        return true;
                    } catch (e) {
                        console.error('Error al parsear voto guardado:', e);
                        eraseCookie('voto_gala_real');
                    }
                }
                return false;
            }
            
            function mostrarMensajeYaVoto(miVoto) {
                const nombreCompleto = `${miVoto.nombre} ${miVoto.apellido}`;
                const fecha = new Date(miVoto.fecha).toLocaleDateString('es-ES', {
                    day: 'numeric',
                    month: 'long',
                    year: 'numeric',
                    hour: '2-digit',
                    minute: '2-digit'
                });
                
                $('#myVoteMessage').html(`
                    <div class="my-vote-message">
                        <h4><i class="fas fa-user-check me-2"></i>YA VOTASTE</h4>
                        <p>Tu voto está registrado para <strong>${nombreCompleto}</strong>.</p>
                        <p>Fecha de votación: <strong>${fecha}</strong></p>
                        <p class="mb-0"><i class="fas fa-eye me-2" style="color: var(--color-oro-puro);"></i>Puedes ver los resultados en tiempo real.</p>
                    </div>
                `).show();
            }
            
            function deshabilitarBotonesVotar(candidataId) {
                $('.votar-btn').prop('disabled', true);
                $('.votar-btn').html('<i class="fas fa-check-circle"></i> YA VOTASTE');
                
                $('.candidate-card').addClass('voted');
                
                $(`#candidata-${candidataId}`).addClass('my-vote');
                
                $('.candidate-card').each(function() {
                    if ($(this).find('.voted-badge').length === 0) {
                        $(this).append(`
                            <div class="voted-badge">
                                <i class="fas fa-check"></i> YA VOTASTE
                            </div>
                        `);
                    }
                });
                
                $(`#candidata-${candidataId}`).prepend(`
                    <div class="my-vote-badge">
                        <i class="fas fa-heart"></i> TU ELECCIÓN
                    </div>
                `);
            }
            
            function guardarVoto(candidataId, nombre, apellido, foto) {
                const votoData = {
                    candidata_id: candidataId,
                    nombre: nombre,
                    apellido: apellido,
                    foto: foto,
                    fecha: new Date().toISOString(),
                    timestamp: Date.now()
                };
                
                setCookie('voto_gala_real', JSON.stringify(votoData), 30);
                
                try {
                    localStorage.setItem('voto_gala_real_backup', JSON.stringify(votoData));
                } catch (e) {
                    console.log('No se pudo guardar en localStorage:', e);
                }
                
                miVoto = votoData;
                yaVoto = true;
                
                return votoData;
            }
            
            function mostrarModalYaVoto() {
                if (!miVoto) return;
                
                const nombreCompleto = `${miVoto.nombre} ${miVoto.apellido}`;
                const fecha = new Date(miVoto.fecha).toLocaleDateString('es-ES', {
                    day: 'numeric',
                    month: 'long',
                    year: 'numeric',
                    hour: '2-digit',
                    minute: '2-digit'
                });
                
                $('#alreadyVotedName').text(nombreCompleto);
                $('#alreadyVotedDate').text(`Votaste el ${fecha}`);
                
                if (miVoto.foto) {
                    $('#alreadyVotedPhoto').attr('src', miVoto.foto).show();
                } else {
                    $('#alreadyVotedPhoto').hide();
                }
                
                const modal = new bootstrap.Modal(document.getElementById('alreadyVotedModal'));
                modal.show();
            }
            
            $('.votar-btn').click(function() {
                if (yaVoto) {
                    mostrarModalYaVoto();
                    return;
                }
                
                currentCandidateId = $(this).data('id');
                currentCandidateData = {
                    id: currentCandidateId,
                    nombre: $(this).data('nombre'),
                    apellido: $(this).data('apellido'),
                    foto: $(this).data('foto')
                };
                
                const nombreCompleto = `${currentCandidateData.nombre} ${currentCandidateData.apellido}`;
                $('#modalCandidateName').text(nombreCompleto);
                
                if (currentCandidateData.foto) {
                    $('#modalCandidatePhoto').attr('src', currentCandidateData.foto).show();
                } else {
                    $('#modalCandidatePhoto').hide();
                    $('.candidate-preview').addClass('no-photo');
                }
                
                const confirmModal = new bootstrap.Modal(document.getElementById('confirmVoteModal'));
                confirmModal.show();
            });
            
            $('#confirmVoteBtn').click(function() {
                registrarVoto();
            });
            
            function registrarVoto() {
                if (!currentCandidateId) return;
                
                $('.votar-btn').prop('disabled', true);
                
                const confirmModal = bootstrap.Modal.getInstance(document.getElementById('confirmVoteModal'));
                confirmModal.hide();
                
                $.ajax({
                    url: "{{ route('votar') }}",
                    type: "POST",
                    data: { candidata_id: currentCandidateId },
                    success: function(response) {
                        const votoGuardado = guardarVoto(
                            currentCandidateId,
                            currentCandidateData.nombre,
                            currentCandidateData.apellido,
                            currentCandidateData.foto
                        );
                        
                        mostrarModalExito(votoGuardado);
                        
                        deshabilitarBotonesVotar(currentCandidateId);
                        actualizarContadorVotos(currentCandidateId);
                    },
                    error: function(xhr) {
                        let mensaje = 'Error al procesar tu voto';
                        
                        if (xhr.responseJSON && xhr.responseJSON.mensaje) {
                            mensaje = xhr.responseJSON.mensaje;
                            
                            if (xhr.status === 403) {
                                setCookie('voto_gala_real_blocked', 'true', 30);
                                yaVoto = true;
                                
                                mostrarModalError(mensaje, true);
                                return;
                            }
                        }
                        
                        mostrarModalError(mensaje);
                        
                        if (!yaVoto) {
                            $('.votar-btn').prop('disabled', false);
                        }
                    }
                });
            }
            
            function mostrarModalExito(votoData) {
                const nombreCompleto = `${votoData.nombre} ${votoData.apellido}`;
                
                $('#successTitle').text(`¡VOTO REGISTRADO PARA ${votoData.nombre.toUpperCase()}!`);
                $('#successCandidateName').text(nombreCompleto);
                $('#successCandidateMessage').html('¡Has demostrado tu apoyo!');
                
                if (votoData.foto) {
                    $('#successCandidatePhoto').attr('src', votoData.foto).show();
                } else {
                    $('#successCandidatePhoto').hide();
                }
                
                const successModal = new bootstrap.Modal(document.getElementById('successVoteModal'));
                successModal.show();
            }
            
            function mostrarModalError(mensaje, esBloqueo = false) {
                $('#errorMessage').text(mensaje);
                
                if (esBloqueo) {
                    $('#errorMessage').after(`
                        <p class="mt-3">
                            <i class="fas fa-user-check me-2" style="color: var(--color-oro-puro);"></i>
                            Ya has votado anteriormente desde este dispositivo.
                        </p>
                    `);
                }
                
                const errorModal = new bootstrap.Modal(document.getElementById('errorVoteModal'));
                errorModal.show();
            }
            
            function actualizarContadorVotos(candidataId) {
                const card = $(`#candidata-${candidataId}`);
                const voteCount = card.find('.vote-number');
                const currentVotes = parseInt(voteCount.text()) || 0;
                
                voteCount.css({
                    'color': 'var(--color-oro-puro)',
                    'transform': 'scale(1.2)',
                    'transition': 'all 0.5s ease'
                });
                
                setTimeout(() => {
                    voteCount.text(currentVotes + 1);
                }, 300);
                
                setTimeout(() => {
                    voteCount.css({
                        'transform': 'scale(1)',
                        'color': ''
                    });
                }, 800);
            }
            
            function inicializarVotacion() {
                if (!verificarVotoAnterior()) {
                    try {
                        const backupVoto = localStorage.getItem('voto_gala_real_backup');
                        if (backupVoto) {
                            miVoto = JSON.parse(backupVoto);
                            yaVoto = true;
                            
                            setCookie('voto_gala_real', backupVoto, 30);
                            
                            mostrarMensajeYaVoto(miVoto);
                            deshabilitarBotonesVotar(miVoto.candidata_id);
                        }
                    } catch (e) {
                        console.log('No hay voto en localStorage:', e);
                    }
                }
            }
            
            inicializarVotacion();
        });
    </script>
</body>
</html>