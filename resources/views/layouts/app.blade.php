<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Best Website Development Company In Pakistan')</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('favicon.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Custom Fonts and Colors -->
    <style>
        @font-face {
            font-family: 'FuturaBT-BoldCondensed';
            src: url('{{ asset('fonts/FuturaBT-BoldCondensed.woff2') }}') format('woff2'),
                 url('{{ asset('fonts/FuturaBT-BoldCondensed.woff') }}') format('woff');
            font-weight: bold;
            font-display: swap;
        }

        @font-face {
            font-family: 'FuturaBT-LightCondensed';
            src: url('{{ asset('fonts/FuturaBT-LightCondensed.woff2') }}') format('woff2'),
                 url('{{ asset('fonts/FuturaBT-LightCondensed.woff') }}') format('woff');
            font-weight: 300;
            font-display: swap;
        }

        .font-futura-bold {
            font-family: 'FuturaBT-BoldCondensed', sans-serif;
        }

        .font-futura-light {
            font-family: 'FuturaBT-LightCondensed', sans-serif;
        }
        
        :root {
            --primary: #4db8b3;
            --secondary: #fc4258;
            --secondary-400: #feb2b4;
        }
        
        .bg-primary {
            background-color: var(--primary) !important;
        }
        
        .text-primary {
            color: var(--primary) !important;
        }
        
        .border-primary {
            border-color: var(--primary) !important;
        }
        
        .bg-secondary-400 {
            background-color: var(--secondary-400) !important;
        }
        
        .hover\:bg-secondary-400:hover {
            background-color: var(--secondary-400) !important;
        }
        
        .hover\:text-primary:hover {
            color: var(--primary) !important;
        }
        
        .hover\:border-primary:hover {
            border-color: var(--primary) !important;
        }
        
        /* Enhanced Design Styles */
        .btn-gradient {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            transition: all 0.3s ease;
        }
        
        .btn-gradient:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(77, 184, 179, 0.3);
        }
        
        .card-hover {
            transition: all 0.3s ease;
        }
        
        .card-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }
        
        .text-gradient {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .section-divider {
            position: relative;
        }
        
        .section-divider::before {
            content: '';
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 4px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            border-radius: 2px;
        }
        
        .floating-animation {
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        
        .pulse-animation {
            animation: pulse 2s ease-in-out infinite;
        }
        
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
        }
        
        /* Smooth transitions for all elements */
        * {
            transition: color 0.3s ease, background-color 0.3s ease, border-color 0.3s ease, transform 0.3s ease;
        }
        
        /* Enhanced buttons */
        .btn-primary {
            background: var(--primary);
            color: white;
            padding: 12px 24px;
            border-radius: 8px;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            font-weight: 500;
        }
        
        .btn-primary:hover {
            background: var(--secondary);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(77, 184, 179, 0.3);
        }
        
        .btn-secondary {
            background: transparent;
            color: var(--primary);
            padding: 12px 24px;
            border: 2px solid var(--primary);
            border-radius: 8px;
            transition: all 0.3s ease;
            cursor: pointer;
            font-weight: 500;
        }
        
        .btn-secondary:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(77, 184, 179, 0.3);
        }
        
        /* Enhanced form inputs */
        .form-input {
            transition: all 0.3s ease;
            border: 2px solid #e5e7eb;
        }
        
        .form-input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(77, 184, 179, 0.1);
            transform: translateY(-1px);
        }
        
        /* Section backgrounds with subtle patterns */
        .pattern-dots {
            background-image: radial-gradient(circle, rgba(77, 184, 179, 0.1) 1px, transparent 1px);
            background-size: 20px 20px;
        }
        
        .pattern-grid {
            background-image: linear-gradient(rgba(77, 184, 179, 0.1) 1px, transparent 1px),
                              linear-gradient(90deg, rgba(77, 184, 179, 0.1) 1px, transparent 1px);
            background-size: 20px 20px;
        }
        
        /* Logo enhancement with smooth scaling */
        img {
            transition: transform 0.3s ease;
        }
        
        /* Enhanced navbar styling */
        #navbar.nav-sticky {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.95);
        }
        
        /* Service cards enhancement */
        .service-card {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.9), rgba(77, 184, 179, 0.05));
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .service-card:hover {
            background: linear-gradient(135deg, rgba(255, 255, 255, 1), rgba(77, 184, 179, 0.1));
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    
    @stack('styles')
</head>
<body class="font-sans antialiased">
    @include('partials.navbar')
    
    <main>
        @yield('content')
    </main>
    
    @include('partials.footer')

    <!-- AOS Animation Library -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    
    @stack('scripts')
</body>
</html>