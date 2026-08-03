<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Bulkio - Coming Soon</title>
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
            --chip: #1a2331;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100dvh;
            font-family: 'Inter', sans-serif;
            color: var(--text);
            background: radial-gradient(1200px 800px at -10% -20%, rgba(255, 94, 46, 0.09), transparent 48%),
                        radial-gradient(900px 700px at 110% 120%, rgba(0, 212, 216, 0.08), transparent 45%),
                        var(--bg);
            position: relative;
            overflow: hidden;
            padding-bottom: 92px;
        }

        .shape {
            position: fixed;
            width: 140px;
            height: 280px;
            border-radius: 36px;
            opacity: 0.14;
            pointer-events: none;
            filter: blur(0.2px);
        }

        .shape-top {
            top: -60px;
            left: 14px;
            background: #4b1f2a;
            transform: rotate(17deg);
        }

        .shape-bottom {
            bottom: 30px;
            right: 70px;
            background: #0f5961;
            transform: rotate(-24deg);
        }

        .lang-toggle {
            position: fixed;
            top: 20px;
            right: 28px;
            border: 1px solid var(--line);
            border-radius: 999px;
            background: rgba(23, 29, 42, 0.72);
            color: #d6dbe6;
            font-weight: 700;
            font-size: 0.9rem;
            letter-spacing: 0.08em;
            padding: 8px 13px;
            cursor: pointer;
            backdrop-filter: blur(8px);
        }

        .wrap {
            min-height: 100dvh;
            display: grid;
            place-items: center;
            padding: clamp(18px, 4vh, 40px) 24px clamp(14px, 3vh, 30px);
            text-align: center;
        }

        .hero {
            width: min(100%, 920px);
            max-height: 100%;
        }

        .brand {
            display: inline-flex;
            align-items: center;
            gap: 16px;
        }

        .brand-word {
            font-family: 'Fredoka', sans-serif;
            font-size: clamp(2.2rem, 4.6vw, 3.4rem);
            font-weight: 700;
            line-height: 1;
        }

        .eyebrow {
            margin-top: clamp(14px, 2.2vh, 26px);
            color: var(--teal);
            text-transform: uppercase;
            letter-spacing: 0.24em;
            font-weight: 700;
            font-size: 1.1rem;
        }

        .title {
            margin: clamp(14px, 2.3vh, 24px) auto 0;
            max-width: 960px;
            font-family: 'Fredoka', sans-serif;
            font-size: clamp(2rem, 5.2vw, 3.8rem);
            line-height: 1.08;
            letter-spacing: -0.01em;
        }

        .lead {
            margin: clamp(12px, 2vh, 20px) auto 0;
            max-width: 900px;
            color: var(--muted);
            font-size: clamp(1rem, 1.8vw, 1.3rem);
            line-height: 1.45;
            font-weight: 500;
        }

        .notify-form {
            margin: clamp(16px, 2.8vh, 28px) auto 0;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 16px;
            flex-wrap: wrap;
        }

        .email {
            width: min(100%, 560px);
            height: 60px;
            border-radius: 999px;
            border: 1px solid var(--line);
            background: rgba(255, 255, 255, 0.03);
            color: #eff2f8;
            padding: 0 24px;
            font-size: 1.15rem;
            outline: none;
        }

        .email::placeholder {
            color: #6d7688;
        }

        .cta {
            height: 60px;
            border: none;
            border-radius: 999px;
            background: var(--accent);
            color: #fff;
            padding: 0 38px;
            font-size: 1.15rem;
            font-weight: 700;
            cursor: pointer;
        }

        .message {
            min-height: 32px;
            margin-top: 12px;
            font-size: 1rem;
            font-weight: 600;
            color: #f8c66c;
        }

        .message.error {
            color: #ff8f8f;
        }

        .message.success {
            color: #8de8b1;
        }

        .socials {
            margin-top: clamp(14px, 2.6vh, 24px);
            margin-bottom: clamp(48px, 10vh, 120px);
            display: flex;
            gap: 12px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .social-link {
            min-width: 220px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            border-radius: 999px;
            border: 1px solid var(--line);
            background: var(--chip);
            color: #dbe3f2;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.98rem;
            padding: 12px 18px;
            transition: border-color 0.2s ease, transform 0.2s ease;
        }

        .social-link:hover {
            border-color: #4a5a74;
            transform: translateY(-1px);
        }

        .social-icon {
            width: 18px;
            height: 18px;
            color: #ffc845;
        }

        .footer {
            margin-top: clamp(16px, 3vh, 30px);
            color: #778197;
            font-size: 0.95rem;
        }

        .footer-links {
            margin-top: 22px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
            gap: 12px 36px;
        }

        .footer-links a {
            color: #dbe3f2;
            text-decoration: none;
            font-size: 0.9rem;
            border-bottom: 1px solid transparent;
            padding: 2px 0;
        }

        .footer-links a:hover {
            border-bottom-color: #dbe3f2;
        }

        .legal-notice {
            position: fixed;
            left: 12px;
            right: 12px;
            bottom: 10px;
            margin: 0 auto;
            max-width: 1200px;
            color: #bdc8d9;
            font-size: 0.72rem;
            line-height: 1.35;
            text-align: center;
            background: rgba(8, 11, 20, 0.78);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 12px;
            padding: 8px 12px;
            backdrop-filter: blur(6px);
        }

        .legal-notice.is-hidden {
            display: none;
        }

        body.notice-hidden {
            padding-bottom: 20px;
        }

        .legal-notice strong {
            color: #e5ebf6;
        }

        .legal-notice-close {
            display: none;
            position: absolute;
            top: 6px;
            right: 6px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            background: rgba(255, 255, 255, 0.06);
            color: #e5ebf6;
            border-radius: 50%;
            width: 22px;
            height: 22px;
            padding: 0;
            font-size: 0.8rem;
            line-height: 1;
            cursor: pointer;
        }

        @media (max-height: 820px) {
            .brand svg {
                width: 64px;
                height: 64px;
            }

            .brand-word {
                font-size: clamp(1.9rem, 4vw, 2.7rem);
            }

            .eyebrow {
                font-size: 0.92rem;
            }

            .title {
                font-size: clamp(1.65rem, 4.4vw, 2.8rem);
            }

            .lead {
                font-size: clamp(0.92rem, 1.6vw, 1.08rem);
                line-height: 1.36;
            }

            .email,
            .cta {
                height: 52px;
            }

            .social-link {
                min-width: 190px;
                padding: 10px 14px;
                font-size: 0.92rem;
            }

            .footer {
                font-size: 0.88rem;
            }

            .legal-notice {
                font-size: 0.66rem;
                line-height: 1.28;
                bottom: 8px;
            }
        }

        @media (max-width: 1024px) {
            body {
                overflow-y: auto;
                overflow-x: hidden;
            }

            .socials {
                margin-bottom: clamp(24px, 5vh, 60px);
            }

            .title {
                font-size: clamp(2.8rem, 9vw, 5rem);
            }

            .lead {
                font-size: clamp(1.1rem, 3.8vw, 1.4rem);
            }

            .eyebrow {
                font-size: 1.1rem;
            }

            .brand-word {
                font-size: clamp(2rem, 7vw, 3rem);
            }

            .email,
            .cta {
                height: 56px;
                font-size: 1.15rem;
            }

            .message {
                font-size: 1rem;
            }

            .footer {
                font-size: 0.95rem;
            }

            .footer-links a {
                font-size: 0.82rem;
            }

            .footer-links {
                flex-direction: column;
                align-items: center;
                justify-content: center;
                gap: 10px;
            }

            .lang-toggle {
                right: 18px;
                top: 18px;
                padding: 7px 12px;
                font-size: 0.82rem;
            }

            .shape {
                width: 90px;
                height: 180px;
            }

            .shape-bottom {
                right: 20px;
                bottom: 20px;
            }

            .social-link {
                min-width: 180px;
            }

            .legal-notice {
                left: 8px;
                right: 8px;
                padding: 7px 32px 7px 10px;
                font-size: 0.62rem;
            }

            .legal-notice-close {
                display: inline-flex;
                align-items: center;
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <div class="shape shape-top" aria-hidden="true"></div>
    <div class="shape shape-bottom" aria-hidden="true"></div>

    <button id="lang-toggle" class="lang-toggle" type="button">EN</button>

    <main class="wrap">
        <section class="hero">
            <div class="brand" aria-label="Bulkio">
                <svg viewBox="0 0 200 200" width="84" height="84" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
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
                <div class="brand-word">Bulkio</div>
            </div>

            <div class="eyebrow" data-i18n="eyebrow">PROXIMAMENTE</div>
            <h1 class="title" data-i18n="title">Tus cartas bulk merecen otra oportunidad</h1>
            <p class="lead" data-i18n="lead">Bulkio crea reglamentos para jugar con las cartas comunes que ibas a desechar. Se el primero en enterarte del lanzamiento.</p>

            <form id="notify-form" class="notify-form" novalidate>
                <input id="email" class="email" type="email" name="email" placeholder="tu@email.com" required>
                <button id="notify-btn" class="cta" type="submit" data-i18n="cta">Notificame</button>
            </form>

            <div id="message" class="message" aria-live="polite"></div>

            <div class="socials" aria-label="Social links">
                <a class="social-link" id="instagram-link" href="https://instagram.com/bulkio_es" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
                    <svg class="social-icon" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.75 2h8.5A5.75 5.75 0 0 1 22 7.75v8.5A5.75 5.75 0 0 1 16.25 22h-8.5A5.75 5.75 0 0 1 2 16.25v-8.5A5.75 5.75 0 0 1 7.75 2Zm0 1.8A3.95 3.95 0 0 0 3.8 7.75v8.5a3.95 3.95 0 0 0 3.95 3.95h8.5a3.95 3.95 0 0 0 3.95-3.95v-8.5a3.95 3.95 0 0 0-3.95-3.95h-8.5Zm9.15 1.35a1.05 1.05 0 1 1 0 2.1 1.05 1.05 0 0 1 0-2.1ZM12 7a5 5 0 1 1 0 10 5 5 0 0 1 0-10Zm0 1.8a3.2 3.2 0 1 0 0 6.4 3.2 3.2 0 0 0 0-6.4Z"/>
                    </svg>
                    <span id="instagram-handle">@bulkio_es</span>
                </a>
                <a class="social-link" id="tiktok-link" href="https://www.tiktok.com/@bulkio_es" target="_blank" rel="noopener noreferrer" aria-label="TikTok">
                    <svg class="social-icon" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14.5 3h2.25a3.75 3.75 0 0 0 3.75 3.75V9a6.02 6.02 0 0 1-3.75-1.3v6.42A6.12 6.12 0 1 1 10.63 8h.37v2.31h-.37a3.81 3.81 0 1 0 3.87 3.81V3Z"/>
                    </svg>
                    <span id="tiktok-handle">@bulkio_es</span>
                </a>
                <a class="social-link" href="#" aria-label="Discord">
                    <svg class="social-icon" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20.32 4.37A18.93 18.93 0 0 0 15.62 3l-.22.45a17.25 17.25 0 0 1 4.06 1.25 13.69 13.69 0 0 0-5.18-1.03c-1.81 0-3.58.37-5.18 1.03A17.2 17.2 0 0 1 13.15 3l-.21-.45c-1.64.21-3.22.67-4.7 1.37C5.73 7.53 5.03 10.94 5.2 14.31c1.49 1.09 2.93 1.75 4.35 2.19l.7-1.15c-.77-.28-1.5-.64-2.18-1.07.18.13.37.25.56.36 2.63 1.49 5.48 1.49 8.12 0 .19-.11.38-.23.56-.36-.68.43-1.41.79-2.18 1.07l.7 1.15c1.42-.44 2.86-1.1 4.35-2.19.2-3.93-.67-7.31-2.88-9.94ZM9.75 12.94c-.84 0-1.53-.79-1.53-1.76 0-.97.68-1.76 1.53-1.76.85 0 1.54.8 1.53 1.76 0 .97-.68 1.76-1.53 1.76Zm4.5 0c-.84 0-1.53-.79-1.53-1.76 0-.97.68-1.76 1.53-1.76.85 0 1.54.8 1.53 1.76 0 .97-.68 1.76-1.53 1.76Z"/>
                    </svg>
                    <span>Discord</span>
                </a>
            </div>

            <div class="footer" data-i18n="footer">© {{ date('Y') }} Bulkio - Nueva vida para tus cartas</div>
            <div class="footer-links" aria-label="Legal links">
                <a id="terms-link" href="{{ route('legal.terms') }}" data-i18n="termsLink">Términos y condiciones</a>
                <a id="privacy-link" href="{{ route('legal.privacy') }}" data-i18n="privacyLink">Privacidad</a>
                <a id="cookies-link" href="{{ route('legal.cookies') }}" data-i18n="cookiesLink">Cookies</a>
            </div>
        </section>
    </main>

    <div class="legal-notice">
        <strong data-i18n="legalNoticeTitle">Aviso Legal:</strong>
        <span data-i18n="legalNoticeBody"> Bulkio es un proyecto comunitario independiente, creado por fans y sin fines de lucro. Este sitio web no está afiliado, respaldado, patrocinado ni asociado de ninguna manera con Bandai Co., Ltd., Shueisha, Bushiroad, The Pokemon Company, Wizards of the Coast, Ravensburger, ni con ninguna otra empresa creadora o distribuidora de los juegos de cartas mencionados en esta plataforma. Todas las marcas registradas, nombres de juegos, personajes e ilustraciones son propiedad exclusiva de sus respectivos dueños. Su uso en este sitio se realiza bajo el amparo de los derechos de critica, analisis, educacion y uso recreativo no comercial (Uso Fan).</span>
        <button id="legal-notice-close" class="legal-notice-close" type="button" aria-label="Close legal notice">x</button>
    </div>

    <script>
        const i18n = {
            es: {
                htmlLang: 'es',
                toggle: 'EN',
                titlePage: 'Bulkio - Proximamente',
                eyebrow: 'PROXIMAMENTE',
                title: 'Tus cartas bulk merecen otra oportunidad',
                lead: 'Bulkio crea reglamentos para jugar con las cartas comunes que ibas a desechar. Se el primero en enterarte del lanzamiento.',
                cta: 'Notificame',
                placeholder: 'tu@email.com',
                footer: '© {{ date('Y') }} Bulkio - Nueva vida para tus cartas',
                termsLink: 'Términos y condiciones',
                privacyLink: 'Privacidad',
                cookiesLink: 'Cookies',
                legalNoticeTitle: 'Aviso Legal:',
                legalNoticeBody: 'Bulkio es un proyecto comunitario independiente, creado por fans y sin fines de lucro. Este sitio web no esta afiliado, respaldado, patrocinado ni asociado de ninguna manera con Bandai Co., Ltd., Shueisha, Bushiroad, The Pokemon Company, Wizards of the Coast, Ravensburger, ni con ninguna otra empresa creadora o distribuidora de los juegos de cartas mencionados en esta plataforma. Todas las marcas registradas, nombres de juegos, personajes e ilustraciones son propiedad exclusiva de sus respectivos dueños. Su uso en este sitio se realiza bajo el amparo de los derechos de critica, analisis, educacion y uso recreativo no comercial (Uso Fan).',
                fallbackError: 'Algo salio mal, intenta de nuevo.',
            },
            en: {
                htmlLang: 'en',
                toggle: 'ES',
                titlePage: 'Bulkio - Coming Soon',
                eyebrow: 'COMING SOON',
                title: 'Your bulk cards deserve another chance',
                lead: 'Bulkio creates rules to play with common cards you were going to discard. Be the first to hear about launch.',
                cta: 'Notify me',
                placeholder: 'you@email.com',
                footer: '© {{ date('Y') }} Bulkio - New life for your cards',
                termsLink: 'Terms and conditions',
                privacyLink: 'Privacy',
                cookiesLink: 'Cookies',
                legalNoticeTitle: 'Legal Notice:',
                legalNoticeBody: 'Bulkio is an independent, fan-created, non-profit community project. This website is not affiliated with, endorsed by, sponsored by, or associated in any way with Bandai Co., Ltd., Shueisha, Bushiroad, The Pokemon Company, Wizards of the Coast, Ravensburger, or any other company that creates or distributes the card games mentioned on this platform. All trademarks, game names, characters, and illustrations are the exclusive property of their respective owners. Their use on this site is protected under rights of criticism, analysis, education, and non-commercial recreational use (Fan Use).',
                fallbackError: 'Something went wrong, please try again.',
            },
        };

        const form = document.getElementById('notify-form');
        const email = document.getElementById('email');
        const message = document.getElementById('message');
        const langToggle = document.getElementById('lang-toggle');
        const i18nElements = document.querySelectorAll('[data-i18n]');
        const instagramLink = document.getElementById('instagram-link');
        const instagramHandle = document.getElementById('instagram-handle');
        const tiktokLink = document.getElementById('tiktok-link');
        const tiktokHandle = document.getElementById('tiktok-handle');
        const termsLink = document.getElementById('terms-link');
        const privacyLink = document.getElementById('privacy-link');
        const cookiesLink = document.getElementById('cookies-link');
        const legalNotice = document.querySelector('.legal-notice');
        const legalNoticeClose = document.getElementById('legal-notice-close');

        const socialByLang = {
            es: {
                instagram: {
                    href: 'https://instagram.com/bulkio_es',
                    label: '@bulkio_es',
                },
                tiktok: {
                    href: 'https://www.tiktok.com/@bulkio_es',
                    label: '@bulkio_es',
                },
            },
            en: {
                instagram: {
                    href: 'https://instagram.com/bulkio_en',
                    label: '@bulkio_en',
                },
                tiktok: {
                    href: 'https://www.tiktok.com/@bulkio_en',
                    label: '@bulkio_en',
                },
            },
        };

        function detectBrowserLang() {
            const browserLang = (navigator.language || navigator.userLanguage || 'es').toLowerCase();

            if (browserLang.startsWith('en')) {
                return 'en';
            }

            return 'es';
        }

        const savedLang = localStorage.getItem('bulkio_lang');
        let currentLang = savedLang === 'es' || savedLang === 'en'
            ? savedLang
            : detectBrowserLang();

        function setMessage(text, type) {
            message.textContent = text;
            message.classList.remove('error', 'success');
            if (type) {
                message.classList.add(type);
            }
        }

        function applyLanguage(lang) {
            currentLang = lang;
            localStorage.setItem('bulkio_lang', lang);

            const copy = i18n[lang];

            document.documentElement.lang = copy.htmlLang;
            document.title = copy.titlePage;
            langToggle.textContent = copy.toggle;
            email.placeholder = copy.placeholder;
            instagramLink.href = socialByLang[lang].instagram.href;
            instagramHandle.textContent = socialByLang[lang].instagram.label;
            tiktokLink.href = socialByLang[lang].tiktok.href;
            tiktokHandle.textContent = socialByLang[lang].tiktok.label;
            termsLink.href = `{{ route('legal.terms') }}?lang=${lang}`;
            privacyLink.href = `{{ route('legal.privacy') }}?lang=${lang}`;
            cookiesLink.href = `{{ route('legal.cookies') }}?lang=${lang}`;

            i18nElements.forEach((element) => {
                const key = element.dataset.i18n;
                if (copy[key]) {
                    element.textContent = copy[key];
                }
            });
        }

        langToggle.addEventListener('click', () => {
            applyLanguage(currentLang === 'es' ? 'en' : 'es');
        });

        legalNoticeClose.addEventListener('click', () => {
            legalNotice.classList.add('is-hidden');
            document.body.classList.add('notice-hidden');
            localStorage.setItem('bulkio_notice_closed', '1');
        });

        form.addEventListener('submit', async (event) => {
            event.preventDefault();
            setMessage('', null);

            try {
                const response = await fetch('{{ route('coming-soon.notify') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    },
                    body: JSON.stringify({
                        email: email.value,
                        lang: currentLang,
                    }),
                });

                const payload = await response.json().catch(() => ({}));

                if (!response.ok) {
                    setMessage(payload?.message || i18n[currentLang].fallbackError, 'error');
                    return;
                }

                form.reset();
                setMessage(payload.message || '', 'success');
            } catch (error) {
                setMessage(i18n[currentLang].fallbackError, 'error');
            }
        });

        if (window.matchMedia('(max-width: 1024px)').matches && localStorage.getItem('bulkio_notice_closed') === '1') {
            legalNotice.classList.add('is-hidden');
            document.body.classList.add('notice-hidden');
        }

        applyLanguage(currentLang);
    </script>
</body>
</html>