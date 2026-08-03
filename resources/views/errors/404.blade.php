@extends('errors.layout')

@section('title', '404 Not Found')
@section('status', 'Error 404')

@section('content')
    <style>
        .logo-wrap {
            width: 144px;
            height: 144px;
            margin: 4px auto 24px;
            border-radius: 999px;
            background: #1b212c;
            display: grid;
            place-items: center;
            animation: logo-bounce 3.8s cubic-bezier(0.28, 0.84, 0.42, 1) infinite;
            box-shadow: 0 16px 34px rgba(0, 0, 0, 0.45);
        }

        .logo-shadow {
            width: 104px;
            height: 14px;
            border-radius: 999px;
            margin: -10px auto 18px;
            background: rgba(0, 0, 0, 0.28);
            filter: blur(1.5px);
            animation: logo-shadow 3.8s cubic-bezier(0.28, 0.84, 0.42, 1) infinite;
        }

        @keyframes logo-bounce {
            0%,
            100% {
                transform: translateY(0);
            }
            35% {
                transform: translateY(-46px);
            }
            55% {
                transform: translateY(-22px);
            }
            75% {
                transform: translateY(-34px);
            }
        }

        @keyframes logo-shadow {
            0%,
            100% {
                transform: scaleX(1);
                opacity: 0.45;
            }
            35% {
                transform: scaleX(0.72);
                opacity: 0.24;
            }
            75% {
                transform: scaleX(0.82);
                opacity: 0.3;
            }
        }
    </style>

    <div class="logo-wrap" aria-hidden="true">
        <svg viewBox="0 0 200 200" width="94" height="94" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g transform="rotate(0 100 100)">
                <rect x="65" y="18" width="70" height="98" rx="16" fill="#f25535"/>
                <circle cx="81" cy="34" r="5.5" fill="#f8f1de"/>
            </g>
            <g transform="rotate(120 100 100)">
                <rect x="65" y="18" width="70" height="98" rx="16" fill="#f5c846"/>
                <circle cx="81" cy="34" r="5.5" fill="#f8f1de"/>
            </g>
            <g transform="rotate(240 100 100)">
                <rect x="65" y="18" width="70" height="98" rx="16" fill="#12b9be"/>
                <circle cx="81" cy="34" r="5.5" fill="#d5efe9"/>
            </g>
        </svg>
    </div>
    <div class="logo-shadow" aria-hidden="true"></div>

    <h1>Pagina no encontrada</h1>
    <p>La ruta que intentaste abrir no existe o fue movida.</p>
@endsection

@section('homeLink')
    <a class="home-link" href="{{ url('/') }}">Volver al inicio</a>
@endsection
