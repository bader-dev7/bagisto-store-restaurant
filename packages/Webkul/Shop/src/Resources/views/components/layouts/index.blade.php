@props([
    'hasHeader'  => true,
    'hasFooter'  => true,
    'title'      => null,
])

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}"
      dir="{{ core()->getCurrentLocale()->direction }}"
      data-theme="dark"> {{-- سيتم تحديثه بالـ JS --}}
<head>
    <title>{{ $title ?? (core()->getCurrentChannel()->home_seo['meta_title'] ?? 'Restaurant') }}</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @stack('meta')

    <link rel="icon" sizes="16x16"
          href="{{ core()->getCurrentChannel()->favicon_url ?? bagisto_asset('images/favicon.ico') }}" />

    @bagistoVite(['src/Resources/assets/css/app.css', 'src/Resources/assets/js/app.js'])
    @stack('styles')

    <style>
        /* =========================================================
           Theme Tokens
           NOTE:
           - data-theme="dark"  => Light background + BLACK text (as requested)
           - data-theme="light" => Dark background  + WHITE text (as requested)
        ========================================================== */

        :root {
            --radius: 18px;
            --radius2: 14px;
            --max: 1180px;

            --accent: #f59e0b;
            --accent2: #ef4444;

            --transition: .18s ease;
        }

        /* DARK (Requested: black text) => light UI */
        html[data-theme="dark"] {
            --bg: #f7f7f8;
            --text: #0b0f14;
            --muted: rgba(11,15,20,.68);
            --muted2: rgba(11,15,20,.52);

            --surface: rgba(255,255,255,.85);
            --card: rgba(255,255,255,.92);
            --border: rgba(15,23,42,.12);

            --header-bg: rgba(255,255,255,.75);

            --glass-bg1: rgba(255,255,255,.85);
            --glass-bg2: rgba(255,255,255,.65);

            --shadow: 0 16px 45px rgba(2,6,23,.12);

            --grad1: rgba(245,158,11,.18);
            --grad2: rgba(239,68,68,.14);
        }

        /* LIGHT (Requested: white text) => dark UI */
        html[data-theme="light"] {
            --bg: #0b0f14;
            --text: #f8fafc;
            --muted: rgba(248,250,252,.72);
            --muted2: rgba(248,250,252,.55);

            --surface: rgba(255,255,255,.06);
            --card: rgba(255,255,255,.08);
            --border: rgba(255,255,255,.12);

            --header-bg: rgba(11,15,20,.55);

            --glass-bg1: rgba(255,255,255,.08);
            --glass-bg2: rgba(255,255,255,.05);

            --shadow: 0 14px 50px rgba(0,0,0,.35);

            --grad1: rgba(245,158,11,.22);
            --grad2: rgba(239,68,68,.18);
        }

        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, Arial;
            background:
                radial-gradient(1200px 600px at 20% -10%, var(--grad1), transparent 60%),
                radial-gradient(900px 500px at 90% 10%, var(--grad2), transparent 60%),
                var(--bg);
            color: var(--text);
            transition: background var(--transition), color var(--transition);
        }

        a { color: inherit; }
        .container { max-width: var(--max); margin: 0 auto; padding: 18px 16px; }

        /* Glass / Cards */
        .glass {
            background: linear-gradient(180deg, var(--glass-bg1), var(--glass-bg2));
            border: 1px solid var(--border);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            backdrop-filter: blur(10px);
        }
        .card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 18px;
        }

        /* Header */
        .header {
            position: sticky;
            top: 0;
            z-index: 50;
            background: var(--header-bg);
            backdrop-filter: blur(14px);
            border-bottom: 1px solid var(--border);
        }
        .header-inner {
            display:flex; align-items:center; justify-content:space-between;
            gap: 14px;
        }
        .brand {
            display:flex; align-items:center; gap:10px;
            font-weight: 800;
            letter-spacing: .2px;
            white-space: nowrap;
        }
        .logo-dot {
            width: 10px; height: 10px; border-radius: 999px;
            background: linear-gradient(135deg, var(--accent), var(--accent2));
            box-shadow: 0 0 0 6px rgba(245,158,11,.12);
        }

        .nav {
            display:flex; align-items:center; gap: 10px;
            flex-wrap: wrap;
            justify-content: flex-end;
        }
        .nav a {
            text-decoration:none;
            padding: 10px 12px;
            border-radius: 999px;
            color: var(--muted);
            border: 1px solid transparent;
            transition: var(--transition);
            font-size: 14px;
        }
        .nav a:hover {
            color: var(--text);
            background: var(--surface);
            border-color: var(--border);
        }

        .btn {
            display:inline-flex; align-items:center; justify-content:center;
            gap: 8px;
            padding: 10px 14px;
            border-radius: 999px;
            border: 1px solid var(--border);
            background: var(--surface);
            color: var(--text);
            text-decoration:none;
            transition: var(--transition);
            font-size: 14px;
            white-space: nowrap;
        }
        .btn:hover { transform: translateY(-1px); filter: brightness(1.03); }

        .btn.primary {
            border-color: rgba(245,158,11,.35);
            background: linear-gradient(135deg, rgba(245,158,11,.95), rgba(239,68,68,.95));
            color: #0b0f14; /* ثابت لأنه زر ملون */
            font-weight: 800;
        }

        /* Theme toggle button */
        .theme-toggle{
            padding: 9px 12px;
            border-radius: 999px;
            border: 1px solid var(--border);
            background: var(--surface);
            color: var(--text);
            cursor: pointer;
            font-size: 14px;
            transition: var(--transition);
        }
        .theme-toggle:hover{ filter: brightness(1.05); transform: translateY(-1px); }

        /* Hero */
        .hero { padding: 26px 0 16px; }
        .hero-wrap { position: relative; overflow: hidden; }
        .hero-wrap::before{
            content:"";
            position:absolute; inset:-60px;
            background:
                radial-gradient(900px 400px at 15% 25%, rgba(245,158,11,.22), transparent 60%),
                radial-gradient(700px 380px at 85% 30%, rgba(239,68,68,.18), transparent 55%),
                linear-gradient(180deg, rgba(255,255,255,.03), rgba(255,255,255,.00));
            transform: rotate(-2deg);
            opacity: .9;
            pointer-events: none;
        }
        .hero-inner{
            position: relative;
            display:grid;
            grid-template-columns: 1.15fr .85fr;
            gap: 18px;
            padding: 22px;
        }
        .hero-title{
            margin: 0 0 10px;
            font-size: clamp(24px, 3.2vw, 40px);
            line-height: 1.1;
            letter-spacing: -.6px;
        }
        .hero-sub{
            margin: 0 0 16px;
            color: var(--muted);
            font-size: 15px;
            max-width: 56ch;
        }

        .hero-actions{ display:flex; gap: 10px; flex-wrap: wrap; margin-top: 8px; }
        .badges{ display:flex; gap: 10px; flex-wrap: wrap; margin-top: 14px; }
        .badge{
            display:flex; align-items:center; gap: 8px;
            padding: 10px 12px;
            border-radius: 999px;
            background: var(--surface);
            border: 1px solid var(--border);
            color: var(--muted);
            font-size: 13px;
        }
        .badge strong{ color: var(--text); font-weight: 800; }

        /* Promo */
        .promo{
            padding: 16px;
            border-radius: var(--radius2);
            background: var(--surface);
            border: 1px solid var(--border);
        }
        .promo h3{ margin: 0 0 8px; font-size: 16px; }
        .promo p{ margin: 0 0 12px; color: var(--muted); font-size: 13px; }
        .promo .mini{
            display:grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }
        .mini-card{
            padding: 12px;
            border-radius: 14px;
            border: 1px solid var(--border);
            background: rgba(0,0,0,.06);
        }
        html[data-theme="light"] .mini-card{ background: rgba(0,0,0,.18); } /* عند الوضع الداكن الحقيقي */
        .mini-card .k{ color: var(--muted2); font-size: 12px; }
        .mini-card .v{ font-weight: 900; margin-top: 4px; }

        /* Content */
        main { padding: 14px 0 40px; }
        .content-shell{
            padding: 18px;
            border-radius: var(--radius);
            border: 1px solid var(--border);
            background: rgba(255,255,255,.04);
        }
        html[data-theme="dark"] .content-shell{ background: rgba(255,255,255,.70); }

        /* Footer */
        .footer{
            border-top: 1px solid var(--border);
            padding: 22px 0;
            color: var(--muted);
        }
        .footer-grid{
            display:grid;
            grid-template-columns: 1.2fr .8fr;
            gap: 14px;
            align-items:start;
        }
        .footer small{ color: var(--muted2); }

        /* Responsive */
        @media (max-width: 900px){
            .hero-inner{ grid-template-columns: 1fr; }
            .footer-grid{ grid-template-columns: 1fr; }
            .nav{ gap: 6px; }
        }
        @media (max-width: 520px){
            .nav a{ padding: 9px 10px; font-size: 13px; }
            .btn{ width: 100%; justify-content:center; }
            .hero-actions{ width: 100%; }
            .hero-actions .btn{ flex: 1; }
            .promo .mini{ grid-template-columns: 1fr; }
        }
    </style>
</head>

<body>
<div id="app">

    @if ($hasHeader)
        <header class="header">
            <div class="container header-inner">
                <div class="brand">
                    <span class="logo-dot"></span>
                    <span>{{ core()->getCurrentChannel()->name ?? 'My Restaurant' }}</span>
                </div>

                <nav class="nav">
                    <button id="themeToggle" class="theme-toggle" type="button" aria-label="Toggle theme">
                        🌙
                    </button>

                    <a href="{{ url('/') }}">الرئيسية</a>
                    <a href="{{ url('/restaurant/menu') }}">قائمة الطعام</a>
                    <a href="{{ url('/restaurant/branches') }}">الفروع</a>
                    <a href="{{ url('/contact') }}">اتصل بنا</a>

                    <a class="btn primary" href="{{ url('/restaurant/menu') }}">
                        اطلب الآن <span aria-hidden="true">→</span>
                    </a>
                </nav>
            </div>
        </header>
    @endif

    <section class="hero">
        <div class="container">
            <div class="hero-wrap glass">
                <div class="hero-inner">
                    <div>
                        <h1 class="hero-title">مرحباً بكم في {{ core()->getCurrentChannel()->name ?? 'مطعمنا' }} 👋</h1>
                        <h3 style="margin:0 0 8px; color: var(--muted);">
                            {{ core()->getCurrentChannel()->description ?? '' }}
                        </h3>

                        <p class="hero-sub">
                            أشهى الأطباق الطازجة يومياً — اطلب الآن أو تصفّح المنيو واستمتع بتجربة مميزة.
                        </p>

                        <div class="hero-actions">
                            <a class="btn primary" href="{{ url('/restaurant/menu') }}">استعرض المنيو</a>
                            <a class="btn" href="{{ url('/restaurant/branches') }}">أقرب فرع</a>
                            <a class="btn" href="{{ url('/contact') }}">حجز / تواصل</a>
                        </div>

                        <div class="badges">
                            <div class="badge">🚚 <strong>توصيل سريع</strong> <span>داخل المدينة</span></div>
                            <div class="badge">⏰ <strong>يوميًا</strong> <span>12:00 - 12:00</span></div>
                            <div class="badge">⭐ <strong>4.8</strong> <span>تقييم العملاء</span></div>
                        </div>
                    </div>

                    <aside class="promo">
                        <h3>عرض اليوم 🔥</h3>
                        <p>خصم على وجبات مختارة — جرّب الأفضل مبيعاً الآن.</p>

                        <div class="mini">
                            <div class="mini-card">
                                <div class="k">الأكثر طلباً</div>
                                <div class="v">برجر سبيشل</div>
                            </div>
                            <div class="mini-card">
                                <div class="k">وقت التحضير</div>
                                <div class="v">15-25 دقيقة</div>
                            </div>
                            <div class="mini-card">
                                <div class="k">توصيل</div>
                                <div class="v">من 10 ر.س</div>
                            </div>
                            <div class="mini-card">
                                <div class="k">الحجز</div>
                                <div class="v">متاح اليوم</div>
                            </div>
                        </div>
                    </aside>

                </div>
            </div>
        </div>
    </section>

    <main>
        <div class="container">
            <div class="content-shell">
                {{ $slot }}
            </div>
        </div>
    </main>

    @if ($hasFooter)
        <footer class="footer">
            <div class="container">
                <div class="footer-grid">
                    <div>
                        <div style="display:flex; align-items:center; gap:10px; font-weight:900;">
                            <span class="logo-dot"></span>
                            <span>{{ core()->getCurrentChannel()->name ?? 'My Restaurant' }}</span>
                        </div>
                        <p style="margin:10px 0 0; max-width:65ch;">
                            <small>طعام طازج، خدمة سريعة، وتجربة تليق بذوقكم. تابعنا واطلب بسهولة في أي وقت.</small>
                        </p>
                        <p style="margin:10px 0 0;">
                            <small>© {{ date('Y') }} جميع الحقوق محفوظة</small>
                        </p>
                    </div>

                    <div>
                        <div class="glass" style="padding:14px; border-radius:16px;">
                            <div style="display:grid; gap:8px; color: var(--muted); font-size: 13px;">
                                <div>📞 <strong style="color:var(--text)">الهاتف:</strong> +0000000</div>
                                <div>📍 <strong style="color:var(--text)">العنوان:</strong> City Center</div>
                                <div>🕒 <strong style="color:var(--text)">العمل:</strong> يومياً 12:00 - 12:00</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </footer>
    @endif

</div>

@stack('scripts')

<script>
    (function () {
        const html = document.documentElement;
        const toggle = document.getElementById('themeToggle');

        // Default: dark (requested: black text on light background)
        const fallback = 'dark';

        function apply(theme) {
            html.setAttribute('data-theme', theme);
            // icon: dark => 🌙 (black text) / light => ☀️ (white text)
            toggle.textContent = theme === 'dark' ? '🌙' : '☀️';
        }

        const saved = localStorage.getItem('theme') || fallback;
        apply(saved);

        toggle.addEventListener('click', () => {
            const current = html.getAttribute('data-theme') || fallback;
            const next = current === 'dark' ? 'light' : 'dark';
            localStorage.setItem('theme', next);
            apply(next);
        });
    })();
</script>

</body>
</html>
