<!DOCTYPE html>
<html lang="{{ $lang }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $copy['title'] }} - Bulkio</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=fredoka:500,600,700|inter:400,500,600,700&display=swap" rel="stylesheet" />
    <style>
        :root {
            color-scheme: dark;
            --bg: #080b14;
            --panel: #171d2a;
            --line: #303846;
            --text: #f7f3e9;
            --muted: #9aa5bb;
            --accent: #f25535;
            --teal: #00d4d8;
        }

        * { box-sizing: border-box; }
        body {
            margin: 0;
            min-height: 100dvh;
            font-family: 'Inter', sans-serif;
            color: var(--text);
            background: radial-gradient(1200px 800px at -10% -20%, rgba(255, 94, 46, 0.09), transparent 48%),
                        radial-gradient(900px 700px at 110% 120%, rgba(0, 212, 216, 0.08), transparent 45%),
                        var(--bg);
        }

        .shell {
            width: min(100%, 980px);
            margin: 0 auto;
            padding: 32px 20px 40px;
        }

        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            margin-bottom: 28px;
        }

        .brand {
            font-family: 'Fredoka', sans-serif;
            font-size: 1.8rem;
            font-weight: 700;
        }

        .back-link {
            color: #dbe3f2;
            text-decoration: none;
            border: 1px solid var(--line);
            border-radius: 999px;
            padding: 10px 14px;
            background: rgba(23, 29, 42, 0.72);
        }

        .panel {
            background: rgba(23, 29, 42, 0.85);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 28px;
            padding: 28px;
            box-shadow: 0 30px 90px rgba(0, 0, 0, 0.28);
        }

        .eyebrow {
            color: var(--teal);
            text-transform: uppercase;
            letter-spacing: 0.22em;
            font-size: 0.8rem;
            font-weight: 700;
        }

        h1 {
            margin: 12px 0 10px;
            font-family: 'Fredoka', sans-serif;
            font-size: clamp(2rem, 4vw, 3.4rem);
        }

        .subtitle {
            margin: 0 0 24px;
            color: var(--muted);
        }

        .section {
            padding: 18px 0;
            border-top: 1px solid rgba(255, 255, 255, 0.06);
        }

        .section:first-of-type {
            border-top: 0;
            padding-top: 0;
        }

        h2 {
            margin: 0 0 10px;
            font-size: 1.25rem;
        }

        p {
            margin: 0 0 10px;
            color: #d7deea;
            line-height: 1.7;
        }

        ul {
            margin: 10px 0 0;
            padding-left: 20px;
            color: #d7deea;
            line-height: 1.7;
        }

        li + li {
            margin-top: 8px;
        }

        @media (max-width: 640px) {
            .panel { padding: 20px 18px; }
            .topbar { align-items: flex-start; flex-direction: column; }
        }
    </style>
</head>
<body>
    <div class="shell">
        <div class="topbar">
            <div class="brand">Bulkio</div>
            <a class="back-link" href="{{ route('coming-soon') }}">{{ $homeLabel }}</a>
        </div>

        <main class="panel">
            <div class="eyebrow">{{ $documentsLabel }}</div>
            <h1>{{ $copy['title'] }}</h1>
            <p class="subtitle">{{ $copy['subtitle'] }}</p>

            @foreach ($copy['sections'] as $section)
                <section class="section">
                    <h2>{{ $section['heading'] }}</h2>
                    @foreach ($section['content'] as $paragraph)
                        <p>{{ $paragraph }}</p>
                    @endforeach
                    @if (! empty($section['list']))
                        <ul>
                            @foreach ($section['list'] as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    @endif
                </section>
            @endforeach
        </main>
    </div>
</body>
</html>
