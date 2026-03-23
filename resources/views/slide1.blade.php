<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gabriel Diniz — 01</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;700;800&family=JetBrains+Mono:ital,wght@0,400;0,500;1,400&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css'])

    <style>
        :root {
            --bg:      #07070b;
            --surface: #0e0e18;
            --text:    #f0ece4;
            --muted:   #44445a;
            --accent:  #ff4500;
            --border:  #181826;
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body, body * {
            font-family: 'JetBrains Mono', monospace !important;
        }

        body {
            background: var(--bg);
            color: var(--text);
            height: 100dvh;
            width: 100dvw;
            overflow: hidden;
        }

        /* Dot-grid atmosphere */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image: radial-gradient(circle, var(--border) 1.2px, transparent 1.2px);
            background-size: 26px 26px;
            pointer-events: none;
            z-index: 0;
        }

        /* Vignette */
        body::after {
            content: '';
            position: fixed;
            inset: 0;
            background: radial-gradient(ellipse 80% 80% at 50% 50%, transparent 40%, #07070b 100%);
            pointer-events: none;
            z-index: 0;
        }

        /* ── LAYOUT ── */
        .slide {
            position: relative;
            z-index: 1;
            height: 100dvh;
            width: 100dvw;
            display: grid;
            grid-template-columns: 5fr 6fr 4fr;
            padding: 3rem;
            gap: 2rem;
        }

        /* ══════════ LEFT ══════════ */
        .col-left {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .slide-tag {
            font-size: 0.6rem;
            letter-spacing: 0.18em;
            color: var(--muted);
            animation: reveal 0.6s ease forwards;
            animation-delay: 0.1s;
            opacity: 0;
        }

        .slide-tag b {
            color: var(--accent);
            font-weight: 400;
        }

        .name-block {
            display: flex;
            flex-direction: column;
            gap: 0;
            line-height: 0.85;
        }

        .name-first,
        .name-last {
            font-family: 'Syne', sans-serif !important;
            font-weight: 800;
            font-size: clamp(3.2rem, 6.5vw, 5.8rem);
            letter-spacing: -0.04em;
            display: block;
        }

        .name-first {
            color: var(--text);
            opacity: 0;
            animation: slide-up 0.7s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            animation-delay: 0.35s;
        }

        .name-last {
            color: var(--accent);
            opacity: 0;
            animation: slide-up 0.7s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            animation-delay: 0.5s;
        }

        .role-line {
            margin-top: 1.1rem;
            font-size: 0.65rem;
            color: var(--muted);
            letter-spacing: 0.08em;
            opacity: 0;
            animation: reveal 0.5s ease forwards;
            animation-delay: 0.75s;
        }

        .role-line em {
            color: var(--text);
            font-style: normal;
        }

        /* ══════════ CENTER ══════════ */
        .col-center {
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .target {
            position: relative;
            width: min(60%, 32vh);
            aspect-ratio: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            animation: reveal 1s ease forwards;
            animation-delay: 0.6s;
        }

        /* Rings */
        .target-ring {
            position: absolute;
            border-radius: 50%;
            border: 1px solid var(--muted);
            opacity: 0.2;
        }

        .target-ring--outer {
            inset: 0;
            animation: spin 90s linear infinite;
        }

        .target-ring--mid {
            inset: 18%;
            opacity: 0.15;
            animation: spin 60s linear infinite reverse;
        }

        .target-ring--inner {
            inset: 36%;
            opacity: 0.25;
        }

        /* Tick marks on outer ring */
        .target-ring--outer::before,
        .target-ring--outer::after {
            content: '';
            position: absolute;
            background: var(--muted);
            opacity: 0.5;
        }

        /* Crosshair */
        .crosshair-h,
        .crosshair-v {
            position: absolute;
            background: var(--muted);
            opacity: 0.12;
        }

        .crosshair-h {
            width: 100%;
            height: 1px;
            top: 50%;
            left: 0;
            transform: translateY(-50%);
        }

        .crosshair-v {
            height: 100%;
            width: 1px;
            left: 50%;
            top: 0;
            transform: translateX(-50%);
        }

        /* Corner ticks */
        .target-ticks {
            position: absolute;
            inset: 0;
            border-radius: 50%;
            border: 1px solid transparent;
        }

        /* Initials */
        .target-label {
            font-family: 'Syne', sans-serif !important;
            font-weight: 800;
            font-size: clamp(1.4rem, 3vw, 2.2rem);
            letter-spacing: -0.03em;
            color: var(--accent);
            opacity: 0.7;
            position: relative;
            z-index: 1;
        }

        /* Orbiting dot */
        .target-orbit {
            position: absolute;
            inset: -4%;
            border-radius: 50%;
            animation: spin 12s linear infinite;
        }

        .target-orbit::before {
            content: '';
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 4px;
            height: 4px;
            border-radius: 50%;
            background: var(--accent);
            opacity: 0.6;
        }

        @keyframes spin {
            from { transform: rotate(0deg); }
            to   { transform: rotate(360deg); }
        }

        /* ══════════ RIGHT ══════════ */
        .col-right {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding-top: 0.1rem;
        }

        .stack-header {
            font-size: 0.6rem;
            letter-spacing: 0.18em;
            color: var(--accent);
            text-transform: uppercase;
            opacity: 0;
            animation: reveal 0.5s ease forwards;
            animation-delay: 0.4s;
        }

        .stack-list {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 1.4rem;
            flex: 1;
            justify-content: center;
        }

        .stack-item {
            display: flex;
            align-items: baseline;
            gap: 0.6rem;
            font-size: 0.72rem;
            color: var(--muted);
            letter-spacing: 0.06em;
            opacity: 0;
            animation: slide-left 0.5s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            cursor: default;
            transition: color 0.25s;
        }

        .stack-item:hover { color: var(--text); }
        .stack-item:hover .arrow { color: var(--accent); }

        .stack-item:nth-child(1) { animation-delay: 0.55s; }
        .stack-item:nth-child(2) { animation-delay: 0.65s; }
        .stack-item:nth-child(3) { animation-delay: 0.75s; }
        .stack-item:nth-child(4) { animation-delay: 0.85s; }
        .stack-item:nth-child(5) { animation-delay: 0.95s; }

        .arrow {
            color: var(--muted);
            font-size: 0.6rem;
            flex-shrink: 0;
            transition: color 0.25s;
        }

        .stack-separator {
            width: 1.5rem;
            height: 1px;
            background: var(--border);
            margin: 0.25rem 0;
            opacity: 0;
            animation: reveal 0.5s ease forwards;
            animation-delay: 1s;
        }

        .status-block {
            opacity: 0;
            animation: reveal 0.5s ease forwards;
            animation-delay: 1.1s;
        }

        .status-label {
            font-size: 0.52rem;
            color: var(--muted);
            letter-spacing: 0.18em;
            text-transform: uppercase;
            margin-bottom: 0.4rem;
        }

        .status-value {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.65rem;
            color: #4ade80;
        }

        .status-dot {
            width: 5px;
            height: 5px;
            border-radius: 50%;
            background: #4ade80;
            animation: blink 2.2s ease-in-out infinite;
            flex-shrink: 0;
        }

        /* ── CORNER MARKS ── */
        .corner {
            position: fixed;
            z-index: 2;
        }

        .corner--tl {
            top: 3rem; left: 3rem;
            width: 1.4rem; height: 1.4rem;
            border-top: 1px solid var(--muted);
            border-left: 1px solid var(--muted);
            opacity: 0.25;
        }

        .corner--tr {
            top: 3rem; right: 3rem;
            width: 1.4rem; height: 1.4rem;
            border-top: 1px solid var(--muted);
            border-right: 1px solid var(--muted);
            opacity: 0.25;
        }

        .corner--bl {
            bottom: 3rem; left: 3rem;
            width: 1.4rem; height: 1.4rem;
            border-bottom: 1px solid var(--muted);
            border-left: 1px solid var(--muted);
            opacity: 0.25;
        }

        .corner--br {
            bottom: 3rem; right: 3rem;
            width: 1.4rem; height: 1.4rem;
            border-bottom: 1px solid var(--muted);
            border-right: 1px solid var(--muted);
            opacity: 0.25;
        }

        .slide-counter {
            position: fixed;
            bottom: 3.15rem;
            left: 50%;
            transform: translateX(-50%);
            font-size: 0.55rem;
            color: var(--muted);
            letter-spacing: 0.2em;
            opacity: 0;
            animation: reveal 0.5s ease forwards;
            animation-delay: 1.2s;
        }

        .slide-counter strong {
            color: var(--text);
            font-weight: 400;
        }

        /* ── KEYFRAMES ── */
        @keyframes reveal {
            from { opacity: 0; }
            to   { opacity: 1; }
        }

        @keyframes slide-up {
            from { opacity: 0; transform: translateY(1.5rem); }
            to   { opacity: 1; transform: translateY(0); }
        }

        @keyframes slide-left {
            from { opacity: 0; transform: translateX(0.8rem); }
            to   { opacity: 1; transform: translateX(0); }
        }

        @keyframes blink {
            0%, 100% { opacity: 1; }
            50%       { opacity: 0.25; }
        }
    </style>
</head>
<body>

<div class="slide">

    {{-- LEFT: Identificação --}}
    <div class="col-left">
        <p class="slide-tag">[ <b>01</b> / 04 — APRESENTAÇÃO ]</p>

        <div>
            <div class="name-block">
                <span class="name-first">GABRIEL</span>
                <span class="name-last">DINIZ</span>
            </div>
            <p class="role-line">// Desenvolvedor <em>Full-Stack</em></p>
        </div>
    </div>

    {{-- CENTER: Target / Identidade --}}
    <div class=""></div>
    {{-- <div class="col-center">
        <div class="target">
            <div class="target-ring target-ring--outer"></div>
            <div class="target-ring target-ring--mid"></div>
            <div class="target-ring target-ring--inner"></div>
            <div class="crosshair-h"></div>
            <div class="crosshair-v"></div>
            <div class="target-orbit"></div>
            <span class="target-label">GD</span>
        </div>
    </div> --}}

    {{-- RIGHT: Stack --}}
    <div class="col-right">
        <p class="stack-header">// Stack</p>

        <ul class="stack-list">
            <li class="stack-item"><span class="arrow">→</span> Laravel</li>
            <li class="stack-item"><span class="arrow">→</span> PHP</li>
            <li class="stack-item"><span class="arrow">→</span> MySQL</li>
            <li class="stack-item"><span class="arrow">→</span> Tailwind CSS</li>
            <li class="stack-item"><span class="arrow">→</span> JavaScript</li>
        </ul>

        <div>
            <div class="stack-separator"></div>
            <div class="status-block">
                <p class="status-label">Status</p>
                <p class="status-value">
                    <span class="status-dot"></span>
                    Disponível
                </p>
            </div>
        </div>
    </div>

</div>

{{-- Corner marks --}}
<div class="corner corner--tl"></div>
<div class="corner corner--tr"></div>
<div class="corner corner--bl"></div>
<div class="corner corner--br"></div>

<p class="slide-counter"><strong>01</strong> — 04</p>

</body>
</html>
