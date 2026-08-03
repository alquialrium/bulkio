<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Error') - {{ config('app.name', 'Bulkio') }}</title>
    <style>
        :root {
            color-scheme: dark;
            --bg: #080b14;
            --panel: #171d2a;
            --line: #303846;
            --text: #f7f3e9;
            --muted: #9aa5bb;
            --accent: #f25535;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100dvh;
            font-family: Inter, Segoe UI, Tahoma, Arial, sans-serif;
            color: var(--text);
            background:
                radial-gradient(1200px 800px at -10% -20%, rgba(255, 94, 46, 0.09), transparent 48%),
                radial-gradient(900px 700px at 110% 120%, rgba(0, 212, 216, 0.08), transparent 45%),
                var(--bg);
            display: grid;
            place-items: center;
            padding: 28px;
        }

        .card {
            width: min(100%, 780px);
            background: rgba(23, 29, 42, 0.84);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 28px;
            box-shadow: 0 30px 90px rgba(0, 0, 0, 0.28);
            padding: 28px 24px;
            text-align: center;
        }

        .status {
            display: inline-block;
            font-size: 0.82rem;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: #9bd4dc;
            margin-bottom: 14px;
        }

        h1 {
            margin: 0;
            font-size: clamp(1.9rem, 4.6vw, 3rem);
            line-height: 1.12;
        }

        p {
            margin: 14px auto 0;
            max-width: 62ch;
            line-height: 1.6;
            color: var(--muted);
        }

        .actions {
            margin-top: 24px;
        }

        .home-link {
            display: inline-block;
            text-decoration: none;
            color: #fff;
            background: var(--accent);
            border-radius: 999px;
            padding: 11px 18px;
            font-weight: 600;
        }

        @media (max-width: 640px) {
            body {
                padding: 16px;
            }

            .card {
                border-radius: 20px;
                padding: 22px 16px;
            }
        }
    </style>
</head>
<body>
    <main class="card">
        <div class="status">@yield('status', 'Error')</div>
        @yield('content')
        @hasSection('homeLink')
            <div class="actions">
                @yield('homeLink')
            </div>
        @endif
    </main>
</body>
</html>
