<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Git & GitHub Desktop — Visual Guide | Execudea</title>
<link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
<link rel="shortcut icon" type="image/png" href="{{ asset('favicon.png') }}">
<link href="https://fonts.googleapis.com/css2?family=Fraunces:wght@400;600;700;900&family=DM+Sans:wght@300;400;500;600&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">
<style>
  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

  :root {
    --cream:    #F7F4EF;
    --white:    #FFFFFF;
    --ink:      #1A1A2E;
    --ink-lt:   #4A4A6A;
    --border:   #E2DDD6;
    --purple:   #4DB8B3;
    --purple-lt:#E3F5F4;
    --green:    #1A9E6A;
    --green-lt: #E6F7F1;
    --orange:   #FC4258;
    --orange-lt:#FEE9EC;
    --blue:     #1A6BE8;
    --blue-lt:  #E8F0FE;
    --gold:     #C8891A;
    --gold-lt:  #FEF5E7;
    --red:      #E83A3A;
    --red-lt:   #FEECEC;
    --shadow-sm: 0 2px 8px rgba(26,26,46,.07);
    --shadow-md: 0 6px 24px rgba(26,26,46,.10);
    --shadow-lg: 0 16px 48px rgba(26,26,46,.13);
    --radius:   16px;
    --radius-sm:10px;
  }

  html { scroll-behavior: smooth; }

  body {
    font-family: 'DM Sans', sans-serif;
    background: var(--cream);
    color: var(--ink);
    line-height: 1.6;
    overflow-x: hidden;
  }

  /* ── NAV ─────────────────────────────────── */
  nav {
    position: fixed; top: 0; left: 0; right: 0; z-index: 100;
    background: rgba(247,244,239,.88);
    backdrop-filter: blur(16px);
    border-bottom: 1px solid var(--border);
    padding: 0 40px;
    display: flex; align-items: center; justify-content: space-between;
    height: 60px;
  }
  .nav-brand {
    display: flex; align-items: center; gap: 10px;
    font-family: 'Fraunces', serif; font-weight: 700; font-size: 16px;
    color: var(--ink); text-decoration: none;
  }
  .nav-brand img { height: 26px; width: auto; }
  .nav-brand .nav-divider { color: var(--border); font-weight: 400; }
  .nav-brand .nav-title { font-size: 14px; }
  .nav-pills {
    display: flex; gap: 6px; list-style: none;
  }
  .nav-pills a {
    display: block; padding: 5px 14px;
    font-size: 12px; font-weight: 500; color: var(--ink-lt);
    text-decoration: none; border-radius: 20px;
    transition: all .2s;
  }
  .nav-pills a:hover, .nav-pills a.active {
    background: var(--purple); color: #fff;
  }
  .nav-progress {
    width: 100%; height: 3px;
    background: var(--border);
    position: fixed; top: 60px; left: 0; z-index: 99;
  }
  .nav-progress-bar {
    height: 100%; background: var(--purple);
    width: 0%; transition: width .3s;
  }

  /* ── SECTIONS ────────────────────────────── */
  section {
    min-height: 100vh;
    display: flex; flex-direction: column; justify-content: center;
    padding: 100px 60px 80px;
    position: relative;
    opacity: 0; transform: translateY(30px);
    transition: opacity .7s ease, transform .7s ease;
  }
  section.visible { opacity: 1; transform: translateY(0); }

  .section-inner {
    max-width: 1100px; margin: 0 auto; width: 100%;
  }

  /* ── HERO ────────────────────────────────── */
  #hero {
    background: var(--white);
    text-align: center;
    padding-top: 120px;
    overflow: hidden;
  }
  #hero::before {
    content: '';
    position: absolute; inset: 0;
    background:
      radial-gradient(ellipse 60% 50% at 50% 0%, rgba(77,184,179,.10) 0%, transparent 70%),
      radial-gradient(ellipse 40% 30% at 80% 80%, rgba(252,66,88,.06) 0%, transparent 60%);
    pointer-events: none;
  }
  .hero-badge {
    display: inline-flex; align-items: center; gap: 6px;
    padding: 6px 16px; border-radius: 20px;
    background: var(--purple-lt); color: var(--purple);
    font-size: 13px; font-weight: 500; margin-bottom: 28px;
    border: 1px solid rgba(77,184,179,.25);
    animation: fadeDown .6s ease both;
  }
  .hero-badge .dot {
    width: 7px; height: 7px; border-radius: 50%;
    background: var(--purple); animation: pulse 2s infinite;
  }
  @keyframes pulse { 0%,100%{opacity:1;transform:scale(1)} 50%{opacity:.5;transform:scale(.8)} }

  h1.hero-title {
    font-family: 'Fraunces', serif;
    font-size: clamp(44px,6vw,80px);
    font-weight: 900; line-height: 1.05;
    letter-spacing: -2px; color: var(--ink);
    margin-bottom: 20px;
    animation: fadeDown .6s .1s ease both;
  }
  h1.hero-title span { color: var(--purple); }

  .hero-sub {
    font-size: 18px; color: var(--ink-lt); font-weight: 300;
    max-width: 540px; margin: 0 auto 44px;
    animation: fadeDown .6s .2s ease both;
  }

  .hero-pills {
    display: flex; flex-wrap: wrap; gap: 10px;
    justify-content: center; margin-bottom: 56px;
    animation: fadeDown .6s .3s ease both;
  }
  .hero-pill {
    display: flex; align-items: center; gap: 8px;
    padding: 10px 20px; border-radius: 40px;
    border: 1.5px solid var(--border);
    background: var(--white); color: var(--ink);
    font-size: 14px; font-weight: 500;
    box-shadow: var(--shadow-sm);
    cursor: pointer; transition: all .2s;
    text-decoration: none;
  }
  .hero-pill:hover {
    border-color: var(--purple); color: var(--purple);
    transform: translateY(-2px); box-shadow: var(--shadow-md);
  }
  .hero-pill .pill-icon { font-size: 16px; }

  .hero-graphic {
    width: 84px; height: 84px; border-radius: 20px;
    background: var(--white); border: 1px solid var(--border);
    display: inline-flex;
    align-items: center; justify-content: center;
    margin-bottom: 32px; box-shadow: var(--shadow-lg);
    animation: fadeDown .6s .05s ease both;
  }
  .hero-graphic img { width: 56px; height: auto; }

  @keyframes fadeDown { from{opacity:0;transform:translateY(-16px)} to{opacity:1;transform:translateY(0)} }

  /* ── SECTION HEADERS ─────────────────────── */
  .section-tag {
    display: inline-flex; align-items: center; gap: 6px;
    padding: 4px 14px; border-radius: 20px;
    font-size: 12px; font-weight: 600; letter-spacing: .08em;
    text-transform: uppercase; margin-bottom: 16px;
  }
  h2.sec-title {
    font-family: 'Fraunces', serif;
    font-size: clamp(30px,4vw,52px);
    font-weight: 700; line-height: 1.1;
    letter-spacing: -1px; margin-bottom: 12px;
  }
  .sec-sub {
    font-size: 16px; color: var(--ink-lt); font-weight: 300;
    max-width: 600px; margin-bottom: 48px;
  }

  /* ── CARDS ───────────────────────────────── */
  .card {
    background: var(--white); border: 1px solid var(--border);
    border-radius: var(--radius); padding: 28px;
    box-shadow: var(--shadow-sm);
    transition: transform .25s, box-shadow .25s;
  }
  .card:hover { transform: translateY(-4px); box-shadow: var(--shadow-md); }

  .grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
  .grid-3 { display: grid; grid-template-columns: repeat(3,1fr); gap: 20px; }
  .grid-4 { display: grid; grid-template-columns: repeat(4,1fr); gap: 16px; }
  .grid-auto { display: grid; grid-template-columns: repeat(auto-fit,minmax(220px,1fr)); gap: 20px; }

  /* ── CONCEPT CARDS (slide 2) ─────────────── */
  #what-is-git { background: var(--cream); }
  .concept-card { position: relative; overflow: hidden; }
  .concept-card::before {
    content: ''; position: absolute; top: 0; left: 0; right: 0; height: 4px;
  }
  .concept-card.purple::before { background: var(--purple); }
  .concept-card.green::before  { background: var(--green); }
  .concept-card.blue::before   { background: var(--blue); }
  .concept-card.gold::before   { background: var(--gold); }

  .concept-emoji { font-size: 36px; margin-bottom: 14px; display: block; }
  .concept-title {
    font-family: 'Fraunces', serif; font-size: 20px; font-weight: 700;
    margin-bottom: 8px; color: var(--ink);
  }
  .concept-desc { font-size: 14px; color: var(--ink-lt); line-height: 1.65; }

  /* ── TERMS (slide 3) ─────────────────────── */
  #terms { background: var(--white); }
  .term-card {
    display: flex; gap: 16px; align-items: flex-start;
    padding: 20px 24px;
  }
  .term-badge {
    min-width: 44px; height: 44px; border-radius: 12px;
    display: flex; align-items: center; justify-content: center;
    font-size: 20px; flex-shrink: 0;
  }
  .term-word {
    font-family: 'DM Mono', monospace; font-size: 15px; font-weight: 500;
    color: var(--ink); margin-bottom: 4px;
  }
  .term-meaning { font-size: 13px; color: var(--ink-lt); line-height: 1.5; }

  /* ── LOCAL/REMOTE (slide 4) ──────────────── */
  #local-remote { background: var(--cream); }
  .lr-diagram {
    display: grid; grid-template-columns: 1fr auto 1fr; gap: 24px;
    align-items: center;
  }
  .lr-box {
    background: var(--white); border: 2px solid var(--border);
    border-radius: var(--radius); padding: 32px 28px;
    text-align: center; box-shadow: var(--shadow-md);
  }
  .lr-box.local  { border-color: var(--blue); }
  .lr-box.remote { border-color: var(--purple); }
  .lr-icon { font-size: 48px; margin-bottom: 12px; display: block; }
  .lr-label {
    font-family: 'Fraunces', serif; font-size: 22px; font-weight: 700;
    margin-bottom: 4px;
  }
  .lr-sublabel { font-size: 13px; color: var(--ink-lt); margin-bottom: 20px; }
  .lr-items { display: flex; flex-direction: column; gap: 8px; }
  .lr-item {
    background: var(--cream); border-radius: 8px;
    padding: 8px 14px; font-size: 13px; color: var(--ink); text-align: left;
    display: flex; align-items: center; gap: 8px;
  }
  .lr-arrows {
    display: flex; flex-direction: column; align-items: center; gap: 20px;
  }
  .lr-arrow-btn {
    display: flex; flex-direction: column; align-items: center; gap: 4px;
  }
  .arrow-circle {
    width: 52px; height: 52px; border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-size: 22px; box-shadow: var(--shadow-sm);
  }
  .arrow-push { background: var(--orange-lt); color: var(--orange); }
  .arrow-pull { background: var(--green-lt);  color: var(--green); }
  .arrow-clone { background: var(--blue-lt); color: var(--blue); }
  .arrow-label { font-size: 11px; font-weight: 600; color: var(--ink-lt); text-transform: uppercase; letter-spacing: .06em; }

  /* ── OPERATIONS ──────────────────────────── */
  .op-section { background: var(--white); }
  .op-section:nth-of-type(even) { background: var(--cream); }

  .step-list { display: flex; flex-direction: column; gap: 12px; }
  .step-row {
    display: flex; gap: 16px; align-items: flex-start;
    background: var(--white); border: 1px solid var(--border);
    border-radius: var(--radius-sm); padding: 18px 22px;
    box-shadow: var(--shadow-sm);
    transition: transform .2s, box-shadow .2s;
  }
  .step-row:hover { transform: translateX(4px); box-shadow: var(--shadow-md); }
  .step-num {
    width: 34px; height: 34px; border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-size: 14px; font-weight: 700; flex-shrink: 0;
    color: var(--white);
  }
  .step-body { flex: 1; }
  .step-title {
    font-size: 15px; font-weight: 600; color: var(--ink);
    margin-bottom: 3px;
  }
  .step-detail { font-size: 13px; color: var(--ink-lt); line-height: 1.5; }
  .step-emoji { font-size: 18px; flex-shrink: 0; margin-top: 6px; }

  /* App mockup */
  .app-mockup {
    background: #F0F8F7;
    border: 1px solid var(--border);
    border-radius: var(--radius);
    overflow: hidden;
    box-shadow: var(--shadow-lg);
  }
  .app-titlebar {
    background: #2D2A3E; padding: 10px 16px;
    display: flex; align-items: center; gap: 12px;
  }
  .traffic-lights { display: flex; gap: 6px; }
  .tl { width: 12px; height: 12px; border-radius: 50%; }
  .tl.red { background: #FF5F57; }
  .tl.yellow { background: #FEBC2E; }
  .tl.green { background: #28C840; }
  .app-titlebar-text {
    flex: 1; text-align: center; font-family: 'DM Mono', monospace;
    font-size: 12px; color: rgba(255,255,255,.5);
  }
  .app-toolbar {
    background: #FAFAFA; border-bottom: 1px solid var(--border);
    padding: 8px 16px; display: flex; align-items: center; gap: 10px;
  }
  .toolbar-btn {
    border: 1px solid var(--border); border-radius: 8px;
    padding: 6px 14px; font-size: 12px; font-weight: 500;
    color: var(--ink-lt); background: var(--white);
    display: flex; flex-direction: column; gap: 1px; min-width: 120px;
  }
  .toolbar-btn-label { font-size: 9px; color: var(--ink-lt); }
  .toolbar-btn-value { font-size: 12px; font-weight: 600; color: var(--ink); }
  .toolbar-push {
    margin-left: auto; background: var(--purple); color: var(--white);
    border-color: var(--purple); padding: 8px 20px;
    border-radius: 8px; font-size: 13px; font-weight: 600; min-width: unset;
    flex-direction: row; align-items: center; gap: 6px;
  }
  .app-body { display: flex; }
  .app-sidebar {
    width: 220px; flex-shrink: 0;
    border-right: 1px solid var(--border);
    background: var(--white);
  }
  .sidebar-header {
    padding: 12px 16px; font-size: 12px; font-weight: 600;
    color: var(--ink-lt); border-bottom: 1px solid var(--border);
  }
  .file-row {
    display: flex; align-items: center; gap: 10px;
    padding: 10px 16px; border-bottom: 1px solid var(--border);
    transition: background .15s;
  }
  .file-row:hover { background: var(--cream); }
  .file-row.active { background: #F0F8F7; }
  .file-dot { width: 10px; height: 10px; border-radius: 50%; flex-shrink: 0; }
  .file-name { font-family: 'DM Mono', monospace; font-size: 12px; flex: 1; color: var(--ink); }
  .file-badge { font-size: 10px; font-weight: 600; padding: 2px 7px; border-radius: 10px; }
  .commit-panel {
    padding: 12px 16px; border-top: 1px solid var(--border);
    background: var(--cream);
  }
  .commit-label { font-size: 11px; color: var(--ink-lt); margin-bottom: 6px; font-weight: 500; }
  .commit-input {
    width: 100%; border: 1px solid var(--border); border-radius: 8px;
    padding: 8px 10px; font-size: 12px; color: var(--ink);
    background: var(--white); margin-bottom: 8px; font-family: 'DM Sans', sans-serif;
  }
  .commit-btn {
    width: 100%; background: var(--green); color: var(--white);
    border: none; border-radius: 8px; padding: 9px;
    font-size: 13px; font-weight: 600; cursor: pointer;
  }
  .app-diff {
    flex: 1; background: var(--white); font-family: 'DM Mono', monospace;
    font-size: 12px; overflow: hidden;
  }
  .diff-filename {
    padding: 10px 16px; border-bottom: 1px solid var(--border);
    font-weight: 500; color: var(--blue); font-size: 12px;
  }
  .diff-line {
    display: flex; padding: 3px 16px;
    line-height: 1.7;
  }
  .diff-line.added { background: #E6F7F1; color: var(--green); }
  .diff-line.removed { background: var(--red-lt); color: var(--red); }
  .diff-line.context { color: var(--ink-lt); }
  .diff-gutter { width: 22px; user-select: none; flex-shrink: 0; opacity: .6; }

  /* Clone options */
  .clone-options { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
  .clone-card {
    background: var(--white); border: 1.5px solid var(--border);
    border-radius: var(--radius); padding: 28px;
    box-shadow: var(--shadow-sm);
  }
  .clone-card-header {
    display: flex; align-items: center; gap: 12px; margin-bottom: 20px;
  }
  .clone-icon {
    width: 42px; height: 42px; border-radius: 12px;
    display: flex; align-items: center; justify-content: center; font-size: 20px;
  }
  .clone-card-title { font-size: 16px; font-weight: 700; color: var(--ink); }
  .clone-step {
    display: flex; gap: 10px; padding: 10px 0;
    border-bottom: 1px dashed var(--border); align-items: flex-start;
  }
  .clone-step:last-child { border: none; }
  .clone-step-num {
    font-family: 'DM Mono', monospace; font-size: 11px; font-weight: 500;
    color: var(--ink-lt); min-width: 22px; padding-top: 2px;
  }
  .clone-step-text { font-size: 13px; color: var(--ink); line-height: 1.5; }
  .clone-step-text code {
    font-family: 'DM Mono', monospace; font-size: 12px;
    background: var(--cream); padding: 2px 7px; border-radius: 5px;
    color: var(--purple);
  }

  /* Golden rule */
  #golden-rule { background: var(--ink); color: var(--white); }
  #golden-rule .sec-title { color: var(--white); }
  #golden-rule .sec-sub { color: rgba(255,255,255,.6); }
  .golden-card {
    background: rgba(255,255,255,.06);
    border: 2px solid rgba(255,255,255,.15);
    border-radius: var(--radius); padding: 40px;
    text-align: center; margin-bottom: 40px;
    position: relative; overflow: hidden;
  }
  .golden-card::before {
    content: '';
    position: absolute; inset: 0;
    background: radial-gradient(ellipse 70% 60% at 50% -10%, rgba(77,184,179,.30) 0%, transparent 70%);
  }
  .golden-rule-text {
    font-family: 'Fraunces', serif;
    font-size: clamp(28px,4vw,52px);
    font-weight: 900; color: var(--white); letter-spacing: -1px;
    margin-bottom: 12px; position: relative;
  }
  .golden-rule-text .highlight { color: #FFCB5B; }
  .golden-sub {
    font-size: 16px; color: rgba(255,255,255,.6); position: relative;
  }
  .workflow-flow {
    display: flex; gap: 0; align-items: stretch;
  }
  .flow-step {
    flex: 1; background: rgba(255,255,255,.05);
    border: 1px solid rgba(255,255,255,.1);
    border-radius: 0; padding: 24px 20px; text-align: center;
    transition: background .2s;
    position: relative;
  }
  .flow-step:first-child { border-radius: var(--radius) 0 0 var(--radius); }
  .flow-step:last-child  { border-radius: 0 var(--radius) var(--radius) 0; }
  .flow-step:not(:last-child)::after {
    content: '→'; position: absolute; right: -10px; top: 50%;
    transform: translateY(-50%); z-index: 1;
    color: rgba(255,255,255,.3); font-size: 18px;
  }
  .flow-step:hover { background: rgba(255,255,255,.1); }
  .flow-emoji { font-size: 28px; margin-bottom: 10px; display: block; }
  .flow-action { font-weight: 700; font-size: 15px; color: var(--white); margin-bottom: 4px; }
  .flow-when { font-size: 11px; color: rgba(255,255,255,.45); margin-bottom: 8px; }
  .flow-desc { font-size: 12px; color: rgba(255,255,255,.55); line-height: 1.4; }

  /* closing */
  #closing { background: var(--white); text-align: center; }
  .closing-grid {
    display: flex; flex-wrap: wrap; gap: 16px;
    justify-content: center; margin: 40px 0;
  }
  .closing-card {
    background: var(--cream); border: 1px solid var(--border);
    border-radius: var(--radius); padding: 28px 24px;
    min-width: 180px; flex: 1;
    transition: transform .2s, box-shadow .2s;
  }
  .closing-card:hover { transform: translateY(-4px); box-shadow: var(--shadow-md); }
  .closing-emoji { font-size: 32px; margin-bottom: 12px; display: block; }
  .closing-label { font-family: 'Fraunces', serif; font-size: 18px; font-weight: 700; margin-bottom: 6px; }
  .closing-desc { font-size: 13px; color: var(--ink-lt); }
  .cta-box {
    background: linear-gradient(135deg, var(--purple-lt) 0%, var(--blue-lt) 100%);
    border: 1px solid rgba(77,184,179,.25);
    border-radius: var(--radius); padding: 32px;
    max-width: 600px; margin: 0 auto;
  }
  .cta-title { font-family: 'Fraunces', serif; font-size: 22px; font-weight: 700; margin-bottom: 8px; color: var(--ink); }
  .cta-desc { font-size: 14px; color: var(--ink-lt); margin-bottom: 20px; }
  .cta-links { display: flex; gap: 10px; justify-content: center; flex-wrap: wrap; }
  .cta-link {
    display: inline-flex; align-items: center; gap: 6px;
    padding: 10px 22px; border-radius: 40px;
    font-size: 14px; font-weight: 600; text-decoration: none;
    transition: all .2s;
  }
  .cta-link.primary { background: var(--purple); color: var(--white); }
  .cta-link.primary:hover { background: #3FA29D; transform: translateY(-2px); }
  .cta-link.secondary { background: var(--white); color: var(--ink); border: 1.5px solid var(--border); }
  .cta-link.secondary:hover { border-color: var(--purple); color: var(--purple); }

  .closing-footer {
    margin-top: 48px; display: flex; align-items: center; justify-content: center;
    gap: 8px; font-size: 12px; color: var(--ink-lt);
  }
  .closing-footer img { height: 18px; width: auto; opacity: .85; }

  /* ── DIALOG MOCKUP ───────────────────────── */
  .dialog-wrap {
    background: #F5F4F8;
    border: 1px solid var(--border);
    border-radius: var(--radius);
    overflow: hidden;
    box-shadow: var(--shadow-lg);
    max-width: 480px;
  }
  .dialog-tb {
    background: #2D2A3E; padding: 10px 16px;
    display: flex; align-items: center; gap: 10px;
  }
  .dialog-tb-title {
    flex: 1; text-align: center;
    font-size: 12px; color: rgba(255,255,255,.5); font-family: 'DM Mono', monospace;
  }
  .dialog-body { padding: 28px; }
  .dialog-field { margin-bottom: 18px; }
  .dialog-label { font-size: 12px; font-weight: 600; color: var(--ink); margin-bottom: 6px; }
  .dialog-input {
    width: 100%; border: 1.5px solid var(--border); border-radius: 8px;
    padding: 10px 14px; font-size: 13px; font-family: 'DM Mono', monospace;
    color: var(--blue); background: var(--white);
  }
  .dialog-row { display: flex; gap: 10px; }
  .dialog-choose {
    border: 1.5px solid var(--purple); border-radius: 8px;
    padding: 10px 16px; font-size: 13px; font-weight: 600;
    color: var(--purple); background: var(--purple-lt);
    cursor: pointer; white-space: nowrap;
  }
  .dialog-notice {
    background: var(--gold-lt); border: 1px solid rgba(200,137,26,.25);
    border-radius: 8px; padding: 12px 14px;
    font-size: 13px; color: var(--gold); margin-bottom: 18px;
  }
  .dialog-actions { display: flex; gap: 10px; justify-content: flex-end; }
  .dialog-cancel {
    border: 1.5px solid var(--border); border-radius: 8px;
    padding: 10px 18px; font-size: 13px; color: var(--ink-lt); background: var(--white);
  }
  .dialog-create {
    background: var(--purple); color: var(--white); border: none;
    border-radius: 8px; padding: 10px 22px; font-size: 13px; font-weight: 600;
    cursor: pointer;
  }

  /* ── UTILITY ─────────────────────────────── */
  .text-purple { color: var(--purple); }
  .text-green  { color: var(--green); }
  .text-orange { color: var(--orange); }
  .text-blue   { color: var(--blue); }
  .text-gold   { color: var(--gold); }

  .bg-purple-lt { background: var(--purple-lt); }
  .bg-green-lt  { background: var(--green-lt); }
  .bg-orange-lt { background: var(--orange-lt); }
  .bg-blue-lt   { background: var(--blue-lt); }
  .bg-gold-lt   { background: var(--gold-lt); }
  .bg-red-lt    { background: var(--red-lt); }

  .num-purple { background: var(--purple); }
  .num-green  { background: var(--green); }
  .num-orange { background: var(--orange); }
  .num-blue   { background: var(--blue); }

  .mt-8  { margin-top: 8px; }
  .mb-32 { margin-bottom: 32px; }

  .split { display: grid; grid-template-columns: 1fr 1fr; gap: 48px; align-items: start; }
  .split.flip { }

  /* after-strip */
  .after-strip {
    background: var(--cream); border: 1px solid var(--border);
    border-radius: var(--radius-sm); padding: 16px 22px;
    display: flex; gap: 24px; flex-wrap: wrap; margin-top: 24px;
  }
  .after-item { display: flex; align-items: center; gap: 8px; font-size: 13px; }
  .after-check { color: var(--green); font-size: 15px; }

  /* ── RESPONSIVE ──────────────────────────── */
  @media (max-width: 860px) {
    section { padding: 90px 24px 60px; }
    .grid-2, .grid-3, .grid-4, .split, .clone-options, .lr-diagram { grid-template-columns: 1fr; }
    .workflow-flow { flex-direction: column; }
    .flow-step:not(:last-child)::after { display: none; }
    .flow-step:first-child, .flow-step:last-child { border-radius: var(--radius-sm); }
    nav { padding: 0 20px; }
    .nav-pills { display: none; }
    .app-body { flex-direction: column; }
    .app-sidebar { width: 100%; border-right: none; border-bottom: 1px solid var(--border); }
    .lr-arrows { flex-direction: row; }
  }
</style>
</head>
<body>

<!-- NAV -->
<nav>
  <a class="nav-brand" href="#hero">
    <img src="{{ asset('img/execudea.png') }}" alt="Execudea">
    <span class="nav-divider">|</span>
    <span class="nav-title">Git &amp; GitHub Desktop</span>
  </a>
  <ul class="nav-pills">
    <li><a href="#what-is-git">What is Git</a></li>
    <li><a href="#terms">Terms</a></li>
    <li><a href="#local-remote">Local vs Remote</a></li>
    <li><a href="#create-repo">Create Repo</a></li>
    <li><a href="#clone">Clone</a></li>
    <li><a href="#push">Push</a></li>
    <li><a href="#pull">Pull</a></li>
  </ul>
</nav>
<div class="nav-progress"><div class="nav-progress-bar" id="progressBar"></div></div>

<!-- ── SLIDE 1: HERO ──────────────────────────── -->
<section id="hero">
  <div class="section-inner" style="text-align:center">
    <div class="hero-graphic">
      <img src="{{ asset('img/execudea.png') }}" alt="Execudea logo">
    </div>
    <div class="hero-badge"><span class="dot"></span> Execudea Team Training Guide</div>
    <h1 class="hero-title">Git & <span>GitHub Desktop</span></h1>
    <p class="hero-sub">From zero to your first push — no command line needed. Learn by doing.</p>
    <div class="hero-pills">
      <a href="#what-is-git" class="hero-pill"><span class="pill-icon">🌱</span> What is Git?</a>
      <a href="#terms"       class="hero-pill"><span class="pill-icon">📖</span> Key Terms</a>
      <a href="#local-remote"class="hero-pill"><span class="pill-icon">🔁</span> Local vs Remote</a>
      <a href="#create-repo" class="hero-pill"><span class="pill-icon">📦</span> Create Repo</a>
      <a href="#clone"       class="hero-pill"><span class="pill-icon">📋</span> Clone</a>
      <a href="#push"        class="hero-pill"><span class="pill-icon">⬆️</span> Push Changes</a>
      <a href="#pull"        class="hero-pill"><span class="pill-icon">⬇️</span> Pull Changes</a>
    </div>
  </div>
</section>

<!-- ── SLIDE 2: WHAT IS GIT ───────────────────── -->
<section id="what-is-git">
  <div class="section-inner">
    <div class="section-tag bg-green-lt text-green">🌱 Introduction</div>
    <h2 class="sec-title">What is Git?</h2>
    <p class="sec-sub">Git tracks every change you make to your files — like an infinite save history that never forgets anything.</p>
    <div class="grid-2">
      <div class="card concept-card purple">
        <span class="concept-emoji">📸</span>
        <div class="concept-title">Snapshots, not backups</div>
        <div class="concept-desc">Every time you commit, Git takes a complete snapshot of your project. You can jump back to any snapshot instantly — no file mess, no "project_v2_FINAL_REAL.zip".</div>
      </div>
      <div class="card concept-card green">
        <span class="concept-emoji">🌿</span>
        <div class="concept-title">Branches — safe experiments</div>
        <div class="concept-desc">Work on a new idea in an isolated copy of your project. Your original stays untouched until you decide to merge the branch in.</div>
      </div>
      <div class="card concept-card blue">
        <span class="concept-emoji">👥</span>
        <div class="concept-title">Built for teams</div>
        <div class="concept-desc">Multiple people can work on the same project simultaneously. Git intelligently merges everyone's changes and highlights conflicts when they happen.</div>
      </div>
      <div class="card concept-card gold">
        <span class="concept-emoji">☁️</span>
        <div class="concept-title">GitHub = Git in the cloud</div>
        <div class="concept-desc">GitHub stores your Git repository online so it's backed up and shareable. <strong>GitHub Desktop</strong> is the visual app that connects your computer to GitHub — no typing commands.</div>
      </div>
    </div>
  </div>
</section>

<!-- ── SLIDE 3: KEY TERMS ─────────────────────── -->
<section id="terms">
  <div class="section-inner">
    <div class="section-tag bg-purple-lt text-purple">📖 Glossary</div>
    <h2 class="sec-title">Words You'll See Today</h2>
    <p class="sec-sub">Six terms, plain English. Refer back anytime during the session.</p>
    <div class="grid-2">
      <div class="card term-card">
        <div class="term-badge bg-purple-lt">📦</div>
        <div>
          <div class="term-word">Repository (Repo)</div>
          <div class="term-meaning">Your project folder, tracked by Git. It holds all your files, their full history, and all branches. Lives on your PC and on GitHub.</div>
        </div>
      </div>
      <div class="card term-card">
        <div class="term-badge bg-green-lt">💾</div>
        <div>
          <div class="term-word">Commit</div>
          <div class="term-meaning">A saved snapshot of your changes, with a message describing what you did. Like Ctrl+S but permanent, labeled, and reversible.</div>
        </div>
      </div>
      <div class="card term-card">
        <div class="term-badge bg-blue-lt">🌿</div>
        <div>
          <div class="term-word">Branch</div>
          <div class="term-meaning">A parallel copy of your repo. Work in a branch to experiment — your main project stays safe until you merge the branch back.</div>
        </div>
      </div>
      <div class="card term-card">
        <div class="term-badge bg-orange-lt">📋</div>
        <div>
          <div class="term-word">Clone</div>
          <div class="term-meaning">Download a complete copy of a GitHub repository to your computer, including all files, branches, and the full history.</div>
        </div>
      </div>
      <div class="card term-card">
        <div class="term-badge bg-orange-lt">⬆️</div>
        <div>
          <div class="term-word">Push</div>
          <div class="term-meaning">Upload your local commits to GitHub so your team (or future you, on another machine) can see and access them.</div>
        </div>
      </div>
      <div class="card term-card">
        <div class="term-badge bg-green-lt">⬇️</div>
        <div>
          <div class="term-word">Pull</div>
          <div class="term-meaning">Download the latest commits from GitHub into your local copy. Always pull before you start working to stay in sync with your team.</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ── SLIDE 4: LOCAL vs REMOTE ──────────────── -->
<section id="local-remote">
  <div class="section-inner">
    <div class="section-tag bg-blue-lt text-blue">🔁 Big Picture</div>
    <h2 class="sec-title">Local &amp; Remote</h2>
    <p class="sec-sub">Everything you do in Git lives in two places — your computer and GitHub. Push and Pull keep them in sync.</p>
    <div class="lr-diagram">
      <div class="lr-box local">
        <span class="lr-icon">💻</span>
        <div class="lr-label text-blue">Your Computer</div>
        <div class="lr-sublabel">Local Repository</div>
        <div class="lr-items">
          <div class="lr-item">📁 Project files</div>
          <div class="lr-item">🌿 Your branches</div>
          <div class="lr-item">💾 Commit history</div>
        </div>
      </div>
      <div class="lr-arrows">
        <div class="lr-arrow-btn">
          <div class="arrow-circle arrow-push">⬆️</div>
          <div class="arrow-label">Push</div>
        </div>
        <div class="lr-arrow-btn">
          <div class="arrow-circle arrow-clone">📋</div>
          <div class="arrow-label">Clone</div>
        </div>
        <div class="lr-arrow-btn">
          <div class="arrow-circle arrow-pull">⬇️</div>
          <div class="arrow-label">Pull</div>
        </div>
      </div>
      <div class="lr-box remote">
        <span class="lr-icon">☁️</span>
        <div class="lr-label text-purple">GitHub.com</div>
        <div class="lr-sublabel">Remote Repository</div>
        <div class="lr-items">
          <div class="lr-item">📦 Cloud backup of repo</div>
          <div class="lr-item">👥 Team's commits</div>
          <div class="lr-item">🌐 Always online</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ── SLIDE 5: CREATE REPO FROM LOCAL ───────── -->
<section id="create-repo" class="op-section">
  <div class="section-inner">
    <div class="section-tag bg-purple-lt text-purple">📦 Operation 1</div>
    <h2 class="sec-title">Create a Repo from Your Local Folder</h2>
    <p class="sec-sub">You already have a project folder on your PC. Turn it into a Git repository and publish it to GitHub in minutes.</p>
    <div class="split">
      <div class="step-list">
        <div class="step-row">
          <div class="step-num num-purple">1</div>
          <div class="step-emoji">🖥️</div>
          <div class="step-body">
            <div class="step-title">Open GitHub Desktop → File → "Add Local Repository"</div>
            <div class="step-detail">Or use the shortcut Ctrl+O (Mac: ⌘+O). This opens the add dialog.</div>
          </div>
        </div>
        <div class="step-row">
          <div class="step-num num-purple">2</div>
          <div class="step-emoji">📂</div>
          <div class="step-body">
            <div class="step-title">Click "Choose..." and select your project folder</div>
            <div class="step-detail">Pick the folder that already has your files inside — your existing project.</div>
          </div>
        </div>
        <div class="step-row">
          <div class="step-num num-purple">3</div>
          <div class="step-emoji">⚠️</div>
          <div class="step-body">
            <div class="step-title">GitHub Desktop detects it's not a Git repo → Click "Create Repository"</div>
            <div class="step-detail">It will show a warning. Give it a name and description, then click Create.</div>
          </div>
        </div>
        <div class="step-row">
          <div class="step-num num-purple">4</div>
          <div class="step-emoji">💾</div>
          <div class="step-body">
            <div class="step-title">Your first commit is made automatically</div>
            <div class="step-detail">All existing files are snapshotted as the starting point of your history.</div>
          </div>
        </div>
        <div class="step-row">
          <div class="step-num num-purple">5</div>
          <div class="step-emoji">☁️</div>
          <div class="step-body">
            <div class="step-title">Click "Publish Repository" to upload it to GitHub</div>
            <div class="step-detail">Choose Public or Private → click Publish Repository. Done!</div>
          </div>
        </div>
      </div>
      <div class="dialog-wrap">
        <div class="dialog-tb">
          <div class="traffic-lights"><div class="tl red"></div><div class="tl yellow"></div><div class="tl green"></div></div>
          <div class="dialog-tb-title">Add Local Repository</div>
        </div>
        <div class="dialog-body">
          <div class="dialog-field">
            <div class="dialog-label">Local Path</div>
            <div class="dialog-row">
              <input class="dialog-input" value="C:\Users\Sajid\my-project" readonly style="flex:1">
              <button class="dialog-choose">Choose…</button>
            </div>
          </div>
          <div class="dialog-notice">⚠️ This folder is not a Git repository. Would you like to create one here?</div>
          <div class="dialog-field">
            <div class="dialog-label">Name</div>
            <input class="dialog-input" value="my-project" readonly style="width:100%">
          </div>
          <div class="dialog-field">
            <div class="dialog-label">Description (optional)</div>
            <input class="dialog-input" value="My first GitHub project" readonly style="width:100%">
          </div>
          <div class="dialog-actions">
            <button class="dialog-cancel">Cancel</button>
            <button class="dialog-create">Create Repository</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ── SLIDE 6: CLONE ─────────────────────────── -->
<section id="clone">
  <div class="section-inner">
    <div class="section-tag bg-blue-lt text-blue">📋 Operation 2</div>
    <h2 class="sec-title">Clone an Existing Repo</h2>
    <p class="sec-sub">Someone shared a GitHub repo with you, or you want your own online repo on a new machine. Cloning downloads everything.</p>
    <div class="clone-options">
      <div class="clone-card">
        <div class="clone-card-header">
          <div class="clone-icon bg-blue-lt">🌐</div>
          <div>
            <div class="clone-card-title">Option A — From GitHub.com</div>
          </div>
        </div>
        <div class="clone-step"><div class="clone-step-num">01</div><div class="clone-step-text">Open the repo page on <code>github.com</code></div></div>
        <div class="clone-step"><div class="clone-step-num">02</div><div class="clone-step-text">Click the green <code>Code</code> button</div></div>
        <div class="clone-step"><div class="clone-step-num">03</div><div class="clone-step-text">Choose <code>Open with GitHub Desktop</code></div></div>
        <div class="clone-step"><div class="clone-step-num">04</div><div class="clone-step-text">Pick a local folder → click <code>Clone</code></div></div>
      </div>
      <div class="clone-card">
        <div class="clone-card-header">
          <div class="clone-icon bg-purple-lt">🖥️</div>
          <div>
            <div class="clone-card-title">Option B — Inside GitHub Desktop</div>
          </div>
        </div>
        <div class="clone-step"><div class="clone-step-num">01</div><div class="clone-step-text">File → <code>Clone Repository</code>  (Ctrl+Shift+O)</div></div>
        <div class="clone-step"><div class="clone-step-num">02</div><div class="clone-step-text">Your repos appear in the list automatically — or paste a URL</div></div>
        <div class="clone-step"><div class="clone-step-num">03</div><div class="clone-step-text">Choose where to save it on your PC</div></div>
        <div class="clone-step"><div class="clone-step-num">04</div><div class="clone-step-text">Click <code>Clone</code> — done in seconds</div></div>
      </div>
    </div>
    <div class="after-strip">
      <div class="after-item"><span class="after-check">✅</span> Real folder on your PC with all files</div>
      <div class="after-item"><span class="after-check">✅</span> Full commit history included</div>
      <div class="after-item"><span class="after-check">✅</span> GitHub Desktop tracks it automatically</div>
      <div class="after-item"><span class="after-check">✅</span> Ready to edit and push right away</div>
    </div>
  </div>
</section>

<!-- ── SLIDE 7: PUSH ──────────────────────────── -->
<section id="push" class="op-section">
  <div class="section-inner">
    <div class="section-tag bg-orange-lt text-orange">⬆️ Operation 3</div>
    <h2 class="sec-title">Push Changes to GitHub</h2>
    <p class="sec-sub">You edited files. Now save a commit and upload it so your team — or future you — can access it.</p>
    <div class="split">
      <div class="step-list">
        <div class="step-row">
          <div class="step-num num-orange">1</div>
          <div class="step-emoji">✏️</div>
          <div class="step-body">
            <div class="step-title">Edit your file in any editor</div>
            <div class="step-detail">Open the file in VS Code, Notepad++, anything. Save it normally with Ctrl+S.</div>
          </div>
        </div>
        <div class="step-row">
          <div class="step-num num-orange">2</div>
          <div class="step-emoji">☑️</div>
          <div class="step-body">
            <div class="step-title">Switch to GitHub Desktop — changes appear automatically</div>
            <div class="step-detail">Tick the checkbox next to each changed file to stage it for the commit.</div>
          </div>
        </div>
        <div class="step-row">
          <div class="step-num num-orange">3</div>
          <div class="step-emoji">💬</div>
          <div class="step-body">
            <div class="step-title">Write a clear commit message</div>
            <div class="step-detail">Describe what changed. E.g. "Fix header logo size on mobile". Be specific!</div>
          </div>
        </div>
        <div class="step-row">
          <div class="step-num num-orange">4</div>
          <div class="step-emoji">💾</div>
          <div class="step-body">
            <div class="step-title">Click "Commit to main"</div>
            <div class="step-detail">This saves the snapshot locally. Your changes are now in your local Git history.</div>
          </div>
        </div>
        <div class="step-row">
          <div class="step-num num-orange">5</div>
          <div class="step-emoji">⬆️</div>
          <div class="step-body">
            <div class="step-title">Click "Push origin" in the top toolbar</div>
            <div class="step-detail">Your commit is now on GitHub! Your team can see it immediately.</div>
          </div>
        </div>
      </div>
      <div class="app-mockup">
        <div class="app-titlebar">
          <div class="traffic-lights"><div class="tl red"></div><div class="tl yellow"></div><div class="tl green"></div></div>
          <div class="app-titlebar-text">GitHub Desktop — my-project</div>
        </div>
        <div class="app-toolbar">
          <div class="toolbar-btn"><div class="toolbar-btn-label">Current Repository</div><div class="toolbar-btn-value">my-project</div></div>
          <div class="toolbar-btn"><div class="toolbar-btn-label">Current Branch</div><div class="toolbar-btn-value">main</div></div>
          <div class="toolbar-btn toolbar-push">⬆ Push origin</div>
        </div>
        <div class="app-body" style="height:280px">
          <div class="app-sidebar" style="display:flex;flex-direction:column">
            <div class="sidebar-header">Changes (2)</div>
            <div class="file-row active">
              <div class="file-dot" style="background:var(--orange)"></div>
              <div class="file-name">index.html</div>
              <div class="file-badge" style="background:var(--orange-lt);color:var(--orange)">M</div>
            </div>
            <div class="file-row">
              <div class="file-dot" style="background:var(--green)"></div>
              <div class="file-name">style.css</div>
              <div class="file-badge" style="background:var(--green-lt);color:var(--green)">A</div>
            </div>
            <div style="flex:1"></div>
            <div class="commit-panel">
              <div class="commit-label">Summary (required)</div>
              <input class="commit-input" value="Fix header logo size" readonly>
              <button class="commit-btn">Commit to main</button>
            </div>
          </div>
          <div class="app-diff">
            <div class="diff-filename">index.html</div>
            <div class="diff-line context"><span class="diff-gutter"></span>&lt;header class="site-header"&gt;</div>
            <div class="diff-line removed"><span class="diff-gutter">−</span>&nbsp;&nbsp;&lt;img src="logo-old.png"&gt;</div>
            <div class="diff-line added"><span class="diff-gutter">+</span>&nbsp;&nbsp;&lt;img src="logo.png" width="120"&gt;</div>
            <div class="diff-line context"><span class="diff-gutter"></span>&lt;/header&gt;</div>
            <div style="padding:10px 16px;font-size:11px;color:var(--ink-lt);margin-top:8px">
              🟢 Green = added &nbsp;|&nbsp; 🔴 Red = removed &nbsp;|&nbsp; Grey = unchanged
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ── SLIDE 8: PULL ──────────────────────────── -->
<section id="pull">
  <div class="section-inner">
    <div class="section-tag bg-green-lt text-green">⬇️ Operation 4</div>
    <h2 class="sec-title">Pull Changes from GitHub</h2>
    <p class="sec-sub">Your teammate pushed something new. Pull their changes into your local copy to stay in sync.</p>

    <div class="card mb-32" style="background:var(--gold-lt);border-color:rgba(200,137,26,.25);padding:20px 28px">
      <div style="font-size:13px;font-weight:600;color:var(--gold);margin-bottom:4px">📌 Scenario</div>
      <div style="font-size:14px;color:var(--ink)">Teammate Sara pushed 3 new commits while you were working. Your local copy is behind. GitHub Desktop shows <strong>"Pull 3 commits from origin"</strong> in the top toolbar — that's your cue.</div>
    </div>

    <div class="step-list">
      <div class="step-row">
        <div class="step-num num-green">1</div>
        <div class="step-emoji">🔍</div>
        <div class="step-body">
          <div class="step-title">Click "Fetch origin" to check for new commits</div>
          <div class="step-detail">GitHub Desktop contacts GitHub and checks if anyone pushed new commits since your last fetch.</div>
        </div>
      </div>
      <div class="step-row">
        <div class="step-num num-green">2</div>
        <div class="step-emoji">⬇️</div>
        <div class="step-body">
          <div class="step-title">If updates found → the button changes to "Pull origin" — click it</div>
          <div class="step-detail">It will show "Pull 3" (or however many commits). Click to download all of them.</div>
        </div>
      </div>
      <div class="step-row">
        <div class="step-num num-green">3</div>
        <div class="step-emoji">📁</div>
        <div class="step-body">
          <div class="step-title">Your files update automatically</div>
          <div class="step-detail">GitHub Desktop merges the new changes. Your local folder now matches the latest version on GitHub.</div>
        </div>
      </div>
      <div class="step-row">
        <div class="step-num num-green">4</div>
        <div class="step-emoji">▶️</div>
        <div class="step-body">
          <div class="step-title">Continue your work from here</div>
          <div class="step-detail">All changes are in your local folder. Edit, commit, and push as normal.</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ── SLIDE 9: GOLDEN RULE ───────────────────── -->
<section id="golden-rule">
  <div class="section-inner">
    <div class="section-tag" style="background:rgba(255,255,255,.1);color:rgba(255,255,255,.7)">⚡ Golden Rule</div>
    <h2 class="sec-title">The One Rule You Must Remember</h2>
    <p class="sec-sub">Follow this and you'll avoid 90% of Git headaches.</p>

    <div class="golden-card">
      <div class="golden-rule-text">Always <span class="highlight">PULL</span> before you <span class="highlight">PUSH</span></div>
      <div class="golden-sub">Fetch the latest from GitHub every time you sit down to work. This keeps you in sync and prevents conflicts.</div>
    </div>

    <div style="color:rgba(255,255,255,.7);font-size:15px;font-weight:600;margin-bottom:16px">Your daily workflow</div>
    <div class="workflow-flow">
      <div class="flow-step">
        <span class="flow-emoji">🌅</span>
        <div class="flow-action">Pull</div>
        <div class="flow-when">Start of day</div>
        <div class="flow-desc">Fetch + Pull to get the latest from GitHub</div>
      </div>
      <div class="flow-step">
        <span class="flow-emoji">✏️</span>
        <div class="flow-action">Edit</div>
        <div class="flow-when">Work time</div>
        <div class="flow-desc">Change files in your favourite editor</div>
      </div>
      <div class="flow-step">
        <span class="flow-emoji">💾</span>
        <div class="flow-action">Commit</div>
        <div class="flow-when">Save progress</div>
        <div class="flow-desc">Stage files + write a clear message</div>
      </div>
      <div class="flow-step">
        <span class="flow-emoji">⬆️</span>
        <div class="flow-action">Push</div>
        <div class="flow-when">Share work</div>
        <div class="flow-desc">Upload commits to GitHub for your team</div>
      </div>
      <div class="flow-step">
        <span class="flow-emoji">🔁</span>
        <div class="flow-action">Repeat</div>
        <div class="flow-when">Next session</div>
        <div class="flow-desc">Go back to step 1 whenever you start again</div>
      </div>
    </div>
  </div>
</section>

<!-- ── SLIDE 10: CLOSING ──────────────────────── -->
<section id="closing">
  <div class="section-inner" style="text-align:center">
    <div class="section-tag bg-purple-lt text-purple" style="margin:0 auto 16px">🚀 You're Ready</div>
    <h2 class="sec-title">You Know Git. Now Use It.</h2>
    <p class="sec-sub" style="margin:0 auto 0">Four operations. That's 90% of what you'll ever need.</p>
    <div class="closing-grid">
      <div class="closing-card">
        <span class="closing-emoji">📦</span>
        <div class="closing-label">Create Repo</div>
        <div class="closing-desc">Turn any folder into a Git project and publish it to GitHub</div>
      </div>
      <div class="closing-card">
        <span class="closing-emoji">📋</span>
        <div class="closing-label">Clone</div>
        <div class="closing-desc">Download any GitHub repo to your computer in two clicks</div>
      </div>
      <div class="closing-card">
        <span class="closing-emoji">⬆️</span>
        <div class="closing-label">Push</div>
        <div class="closing-desc">Edit → Commit → Push to share your work with the team</div>
      </div>
      <div class="closing-card">
        <span class="closing-emoji">⬇️</span>
        <div class="closing-label">Pull</div>
        <div class="closing-desc">Fetch + Pull every morning to stay in sync</div>
      </div>
    </div>
    <div class="cta-box">
      <div class="cta-title">🎯 Homework</div>
      <div class="cta-desc">Create a repo from a folder on your PC and push it to GitHub tonight. Takes 5 minutes.</div>
      <div class="cta-links">
        <a href="https://desktop.github.com" target="_blank" class="cta-link primary">Download GitHub Desktop</a>
        <a href="https://docs.github.com/desktop" target="_blank" class="cta-link secondary">Official Docs</a>
      </div>
    </div>
    <div class="closing-footer">
      <img src="{{ asset('img/execudea.png') }}" alt="Execudea">
      <span>Internal Training Guide</span>
    </div>
  </div>
</section>

<script>
  // Scroll progress bar
  const bar = document.getElementById('progressBar');
  window.addEventListener('scroll', () => {
    const pct = (window.scrollY / (document.body.scrollHeight - window.innerHeight)) * 100;
    bar.style.width = pct + '%';
  });

  // Intersection observer for section animations
  const sections = document.querySelectorAll('section');
  const obs = new IntersectionObserver((entries) => {
    entries.forEach(e => {
      if (e.isIntersecting) e.target.classList.add('visible');
    });
  }, { threshold: 0.1 });
  sections.forEach(s => obs.observe(s));

  // Active nav link
  const navLinks = document.querySelectorAll('.nav-pills a');
  const sectionObserver = new IntersectionObserver((entries) => {
    entries.forEach(e => {
      if (e.isIntersecting) {
        navLinks.forEach(a => a.classList.remove('active'));
        const link = document.querySelector(`.nav-pills a[href="#${e.target.id}"]`);
        if (link) link.classList.add('active');
      }
    });
  }, { threshold: 0.4 });
  sections.forEach(s => sectionObserver.observe(s));
</script>
</body>
</html>
