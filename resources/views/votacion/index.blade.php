<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votación - Gala Real</title>
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
            border-radius: 10px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s ease;
            box-shadow: 0 5px 20px rgba(0,0,0,0.4);
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }
        
        .btn-royal::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: 0.5s;
        }
        
        .btn-royal:hover::before {
            left: 100%;
        }
        
        .btn-royal:hover {
            transform: translateY(-5px) scale(1.05);
            box-shadow: 0 15px 30px rgba(0,0,0,0.6);
            color: white;
            background: linear-gradient(to right, var(--color-azul-real), var(--color-púrpura-real));
        }
        
        .btn-royal:disabled {
            opacity: 0.5;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }
        
        .btn-royal:disabled:hover::before {
            left: -100%;
        }
        
        .btn-success-royal {
            background: linear-gradient(135deg, var(--color-verde-esmeralda), #0A8C0E);
        }
        
        .btn-success-royal:hover {
            background: linear-gradient(135deg, #0A8C0E, var(--color-verde-esmeralda));
        }
        
        .candidates-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 30px;
        }
        
        .candidate-card {
            background: linear-gradient(145deg, rgba(75, 0, 130, 0.25), rgba(48, 25, 52, 0.35));
            backdrop-filter: blur(15px);
            border-radius: 20px;
            overflow: hidden;
            border: 2px solid rgba(255, 215, 0, 0.25);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            transform-style: preserve-3d;
            perspective: 1000px;
        }
        
        .candidate-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, transparent 30%, rgba(255,215,0,0.05) 50%, transparent 70%);
            z-index: 1;
            opacity: 0;
            transition: opacity 0.6s;
        }
        
        .candidate-card:hover::before {
            opacity: 1;
        }
        
        .candidate-card.voted {
            border: 3px solid var(--color-verde-esmeralda);
            box-shadow: 0 0 40px rgba(4, 99, 7, 0.5);
            transform: translateY(-5px);
        }
        
        .candidate-card.my-vote {
            border: 3px solid var(--color-oro-puro);
            box-shadow: 0 0 50px rgba(255, 215, 0, 0.7);
            transform: translateY(-10px) scale(1.02);
            animation: pulse-gold 2s infinite;
        }
        
        @keyframes pulse-gold {
            0% { box-shadow: 0 0 50px rgba(255, 215, 0, 0.7); }
            50% { box-shadow: 0 0 70px rgba(255, 215, 0, 0.9); }
            100% { box-shadow: 0 0 50px rgba(255, 215, 0, 0.7); }
        }
        
        .candidate-card:hover:not(.voted) {
            transform: translateY(-15px) rotateX(5deg);
            box-shadow: 0 25px 50px rgba(0,0,0,0.8);
            border-color: rgba(255, 215, 0, 0.6);
        }
        
        .candidate-photo {
            width: 100%;
            height: 280px;
            object-fit: cover;
            border-bottom: 3px solid var(--color-oro-puro);
            transition: transform 0.5s ease;
            position: relative;
            z-index: 2;
        }
        
        .candidate-card:hover .candidate-photo {
            transform: scale(1.05);
        }
        
        .default-photo {
            width: 100%;
            height: 280px;
            background: linear-gradient(135deg, var(--color-púrpura-real), var(--color-terciopelo));
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: var(--color-oro-puro);
            border-bottom: 3px solid var(--color-oro-puro);
            position: relative;
            overflow: hidden;
        }
        
        .default-photo::before {
            content: '';
            position: absolute;
            width: 200%;
            height: 200%;
            background: conic-gradient(transparent, var(--color-oro-puro), transparent 30%);
            animation: rotate 4s linear infinite;
        }
        
        .default-photo i, .default-photo span {
            position: relative;
            z-index: 2;
        }
        
        @keyframes rotate {
            100% { transform: rotate(360deg); }
        }
        
        .default-photo i {
            font-size: 4rem;
            margin-bottom: 15px;
            opacity: 0.9;
            filter: drop-shadow(0 0 10px rgba(255,215,0,0.5));
        }
        
        .candidate-info {
            padding: 30px;
            position: relative;
            z-index: 2;
        }
        
        .candidate-name {
            font-family: 'Cinzel', serif;
            color: var(--color-oro-puro);
            font-weight: 900;
            font-size: 1.6rem;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 15px;
            text-shadow: 0 2px 4px rgba(0,0,0,0.5);
        }
        
        .vote-count {
            background: linear-gradient(135deg, rgba(255, 215, 0, 0.15), rgba(184, 134, 11, 0.1));
            padding: 12px 20px;
            border-radius: 25px;
            border: 2px solid var(--color-oro-puro);
            display: inline-flex;
            align-items: center;
            gap: 12px;
            margin-top: 15px;
            backdrop-filter: blur(10px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
            transition: all 0.3s ease;
        }
        
        .candidate-card:hover .vote-count {
            transform: scale(1.05);
            box-shadow: 0 8px 20px rgba(0,0,0,0.4);
        }
        
        .candidate-actions {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }
        
        .btn-vote {
            flex: 1;
            padding: 15px 20px;
            border: none;
            border-radius: 12px;
            font-family: 'Cinzel', serif;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            background: linear-gradient(135deg, var(--color-púrpura-real), var(--color-azul-real));
            color: white;
            position: relative;
            overflow: hidden;
            font-size: 1.1rem;
            box-shadow: 0 5px 15px rgba(0,0,0,0.4);
        }
        
        .btn-vote::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: 0.5s;
        }
        
        .btn-vote:hover::before {
            left: 100%;
        }
        
        .btn-vote:hover:not(:disabled) {
            transform: translateY(-5px) scale(1.05);
            box-shadow: 0 15px 30px rgba(0,0,0,0.6);
            background: linear-gradient(135deg, var(--color-azul-real), var(--color-púrpura-real));
        }
        
        .btn-vote:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            background: linear-gradient(135deg, #666, #888);
            transform: none;
            box-shadow: none;
        }
        
        .btn-vote:disabled:hover::before {
            left: -100%;
        }
        
        .voted-badge {
            position: absolute;
            top: 20px;
            right: 20px;
            background: linear-gradient(135deg, var(--color-verde-esmeralda), #0A8C0E);
            color: white;
            padding: 8px 20px;
            border-radius: 25px;
            font-size: 0.9rem;
            font-weight: bold;
            display: flex;
            align-items: center;
            gap: 8px;
            z-index: 10;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
            animation: float 3s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-5px); }
        }
        
        .my-vote-badge {
            position: absolute;
            top: 20px;
            left: 20px;
            background: linear-gradient(135deg, var(--color-oro-puro), var(--color-oro-oscuro));
            color: var(--color-terciopelo);
            padding: 10px 25px;
            border-radius: 25px;
            font-size: 0.9rem;
            font-weight: bold;
            display: flex;
            align-items: center;
            gap: 10px;
            z-index: 10;
            box-shadow: 0 5px 20px rgba(255, 215, 0, 0.4);
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
        
        .empty-state {
            text-align: center;
            padding: 100px 20px;
            grid-column: 1 / -1;
            background: linear-gradient(135deg, rgba(75, 0, 130, 0.2), rgba(48, 25, 52, 0.3));
            border-radius: 20px;
            backdrop-filter: blur(15px);
            border: 2px solid rgba(255, 215, 0, 0.3);
        }
        
        .empty-icon {
            font-size: 6rem;
            color: var(--color-oro-puro);
            margin-bottom: 30px;
            opacity: 0.8;
            filter: drop-shadow(0 0 20px rgba(255,215,0,0.3));
            animation: float-icon 4s ease-in-out infinite;
        }
        
        @keyframes float-icon {
            0%, 100% { transform: translateY(0) rotate(0); }
            33% { transform: translateY(-10px) rotate(5deg); }
            66% { transform: translateY(-5px) rotate(-5deg); }
        }
        
        .empty-title {
            font-family: 'Cinzel', serif;
            font-size: 2.5rem;
            color: var(--color-oro-puro);
            margin-bottom: 20px;
            text-shadow: 0 2px 10px rgba(0,0,0,0.5);
        }
        
        .empty-text {
            font-size: 1.2rem;
            color: #E6D8C9;
            margin-bottom: 40px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
            line-height: 1.6;
        }
        
        #alerta {
            margin-bottom: 30px;
        }
        
        .alert-royal {
            background: linear-gradient(135deg, rgba(4, 99, 7, 0.25), rgba(10, 140, 14, 0.2));
            border: 2px solid var(--color-verde-esmeralda);
            color: var(--color-marfil);
            border-radius: 15px;
            backdrop-filter: blur(15px);
            padding: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        }
        
        .alert-error {
            background: linear-gradient(135deg, rgba(154, 3, 30, 0.25), rgba(194, 24, 7, 0.2));
            border: 2px solid var(--color-rojo-pasion);
        }
        
        .alert-success {
            background: linear-gradient(135deg, rgba(255, 215, 0, 0.25), rgba(184, 134, 11, 0.2));
            border: 2px solid var(--color-oro-puro);
        }
        
        .alert-royal .btn-close {
            filter: brightness(0) invert(1);
            opacity: 0.8;
            transition: opacity 0.3s;
        }
        
        .alert-royal .btn-close:hover {
            opacity: 1;
        }
        
        .my-vote-message {
            background: linear-gradient(135deg, rgba(255, 215, 0, 0.2), rgba(184, 134, 11, 0.15));
            border: 3px solid var(--color-oro-puro);
            border-radius: 20px;
            padding: 25px;
            margin-bottom: 40px;
            text-align: center;
            backdrop-filter: blur(15px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.4);
            position: relative;
            overflow: hidden;
            animation: slideIn 0.8s ease-out;
        }
        
        @keyframes slideIn {
            from { transform: translateY(-30px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        
        .my-vote-message::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100"><path fill="%23FFD700" fill-opacity="0.1" d="M50,0 L60,40 L100,50 L60,60 L50,100 L40,60 L0,50 L40,40 Z"/></svg>');
            background-size: 60px;
            opacity: 0.5;
        }
        
        .my-vote-message h4 {
            color: var(--color-oro-puro);
            font-family: 'Cinzel', serif;
            font-size: 1.8rem;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
            position: relative;
            z-index: 2;
        }
        
        .my-vote-message p {
            color: var(--color-marfil);
            margin-bottom: 15px;
            font-size: 1.1rem;
            position: relative;
            z-index: 2;
            line-height: 1.6;
        }
        
        /* MODALES MODERNOS */
        .modal-royal {
            background: linear-gradient(135deg, var(--color-terciopelo), var(--color-púrpura-real));
            border: 3px solid var(--color-oro-puro);
            border-radius: 25px;
            color: var(--color-marfil);
            box-shadow: 0 30px 80px rgba(0,0,0,0.6);
            overflow: hidden;
            backdrop-filter: blur(20px);
        }
        
        .modal-royal::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 200 200"><path fill="%23FFD700" fill-opacity="0.1" d="M100,0 L120,80 L200,100 L120,120 L100,200 L80,120 L0,100 L80,80 Z"/></svg>');
            background-size: 100px;
            opacity: 0.3;
        }
        
        .modal-royal .modal-header {
            border-bottom: 3px solid var(--color-oro-puro);
            background: linear-gradient(135deg, rgba(0,0,0,0.3), rgba(48,25,52,0.4));
            padding: 25px 30px;
            position: relative;
            z-index: 2;
        }
        
        .modal-royal .modal-title {
            font-family: 'Cinzel', serif;
            color: var(--color-oro-puro);
            font-weight: 900;
            font-size: 1.8rem;
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .modal-royal .modal-body {
            background: rgba(0, 0, 0, 0.2);
            padding: 30px;
            position: relative;
            z-index: 2;
        }
        
        .modal-royal .modal-footer {
            border-top: 3px solid var(--color-oro-puro);
            background: linear-gradient(135deg, rgba(0,0,0,0.3), rgba(48,25,52,0.4));
            padding: 20px 30px;
            position: relative;
            z-index: 2;
        }
        
        .modal-icon {
            font-size: 4rem;
            margin-bottom: 20px;
            color: var(--color-oro-puro);
            filter: drop-shadow(0 0 10px rgba(255,215,0,0.5));
            animation: pulse-icon 2s infinite;
        }
        
        @keyframes pulse-icon {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }
        
        .modal-confirm-text {
            font-size: 1.2rem;
            color: var(--color-marfil);
            margin-bottom: 25px;
            line-height: 1.6;
        }
        
        .candidate-preview {
            background: linear-gradient(135deg, rgba(255,215,0,0.1), rgba(184,134,11,0.05));
            border: 2px solid var(--color-oro-puro);
            border-radius: 15px;
            padding: 20px;
            margin: 20px 0;
            display: flex;
            align-items: center;
            gap: 20px;
        }
        
        .candidate-preview-photo {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid var(--color-oro-puro);
        }
        
        .candidate-preview-info h5 {
            color: var(--color-oro-puro);
            font-family: 'Cinzel', serif;
            margin-bottom: 5px;
        }
        
        .candidate-preview-info p {
            color: var(--color-marfil);
            margin: 0;
            opacity: 0.9;
        }
        
        @media (max-width: 1200px) {
            .candidates-grid {
                grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            }
        }
        
        @media (max-width: 992px) {
            .candidates-grid {
                grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
                gap: 25px;
            }
            
            .candidate-photo {
                height: 250px;
            }
            
            .default-photo {
                height: 250px;
            }
        }
        
        @media (max-width: 768px) {
            .candidates-grid {
                grid-template-columns: 1fr;
                gap: 25px;
            }
            
            .action-bar {
                flex-direction: column;
                align-items: stretch;
                gap: 15px;
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
            
            .candidate-info {
                padding: 25px;
            }
            
            .candidate-actions {
                flex-direction: column;
                gap: 12px;
            }
            
            .modal-royal .modal-header,
            .modal-royal .modal-body,
            .modal-royal .modal-footer {
                padding: 20px;
            }
        }
        
        @media (max-width: 576px) {
            .header {
                padding: 20px 0 15px;
            }
            
            .page-title {
                font-size: 1.6rem;
            }
            
            .crown-icon {
                font-size: 2rem;
            }
            
            .content-wrapper {
                padding: 20px 15px;
            }
            
            .candidate-card {
                border-radius: 15px;
            }
            
            .candidate-name {
                font-size: 1.4rem;
            }
            
            .empty-title {
                font-size: 2rem;
            }
            
            .empty-text {
                font-size: 1.1rem;
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
                <h1 class="page-title">VOTACIÓN REAL</h1>
                <p class="page-subtitle">ELIGE A TU REINA FAVORITA - GALA DE CORONACIÓN</p>
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