<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SupplyHub | TechCorp Internal Boutique</title>

    <!-- Fonts: Inter est idéal pour le milieu corporate -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Styles & Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .glass-nav {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(226, 232, 240, 1);
        }
    </style>
</head>

<body class="antialiased bg-[#f8fafc] text-slate-900">

    <!-- Navigation -->
    <nav class="glass-nav sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center gap-2">
                    <div
                        class="w-10 h-10 bg-indigo-600 rounded-xl flex items-center justify-center shadow-lg shadow-indigo-200">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                    </div>
                    <span class="text-xl font-bold tracking-tight text-slate-800">TechCorp <span
                            class="text-indigo-600">SupplyHub</span></span>
                </div>

                <div class="flex items-center gap-4">
                    @auth
                        @php
                            $monEspaceRoute = match (auth()->user()->role_id) {
                                3 => 'list.produits',
                                2 => 'manager.commandes.index',
                                1 => 'produits.index',
                                default => 'home',
                            };
                        @endphp

                        <a href="{{ route($monEspaceRoute) }}"
                            class="text-sm font-semibold text-slate-600 hover:text-indigo-600 transition">
                            Mon Espace
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                            class="text-sm font-semibold text-slate-600 hover:text-indigo-600 transition">
                            Connexion
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="bg-slate-900 text-white px-5 py-2.5 rounded-lg text-sm font-bold hover:bg-slate-800 transition shadow-md">
                                Rejoindre la boutique
                            </a>
                        @endif
                    @endauth
                </div>

            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="relative pt-16 pb-24 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="lg:grid lg:grid-cols-2 lg:gap-12 items-center">
                <div>
                    <div
                        class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-indigo-50 text-indigo-700 text-xs font-bold uppercase tracking-wider mb-6">
                        <span class="relative flex h-2 w-2">
                            <span
                                class="animate-ping absolute inline-flex h-full w-full rounded-full bg-indigo-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-indigo-500"></span>
                        </span>
                        Nouveau système de Tokens
                    </div>
                    <h1 class="text-5xl lg:text-6xl font-extrabold text-slate-900 tracking-tight mb-6 leading-tight">
                        Gérez vos fournitures de manière <span class="text-indigo-600">responsable.</span>
                    </h1>
                    <p class="text-lg text-slate-600 mb-10 leading-relaxed">
                        TechCorp SupplyHub transforme la gestion des stocks. Utilisez vos crédits mensuels pour
                        commander ce dont vous avez réellement besoin et participez à l'effort collectif de réduction du
                        gaspillage.
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <a href="{{ route('register') }}"
                            class="px-8 py-4 bg-indigo-600 text-white font-bold rounded-xl shadow-xl shadow-indigo-200 hover:bg-indigo-700 hover:-translate-y-1 transition-all duration-200">
                            Accéder à la boutique
                        </a>
                        <div class="flex items-center gap-3 px-6 py-4 bg-white border border-slate-200 rounded-xl">
                            <span class="text-sm font-medium text-slate-500">Allocation mensuelle :</span>
                            <span class="text-indigo-600 font-bold">500 Tokens</span>
                        </div>
                    </div>
                </div>

                <!-- Preview Card illustrative -->
                <div class="hidden lg:block relative">
                    <div
                        class="absolute -inset-4 bg-gradient-to-tr from-indigo-500 to-purple-500 rounded-3xl opacity-10 blur-2xl">
                    </div>
                    <div class="relative bg-white border border-slate-200 rounded-2xl shadow-2xl p-6">
                        <div class="flex justify-between items-center mb-8">
                            <h3 class="font-bold text-slate-800">Fournitures Populaires</h3>
                            <span class="text-xs text-slate-400">En stock</span>
                        </div>
                        <div class="space-y-4">
                            @foreach ([['Cahier A4', 15], ['Souris Sans Fil', 120], ['Stylos (pack 10)', 25]] as $item)
                                <div class="flex items-center justify-between p-4 bg-slate-50 rounded-xl">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-10 h-10 bg-white rounded-lg border border-slate-200 flex items-center justify-center">
                                            <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                            </svg>
                                        </div>
                                        <span class="font-medium text-slate-700">{{ $item[0] }}</span>
                                    </div>
                                    <span class="text-indigo-600 font-bold">{{ $item[1] }} T</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- How it works -->
    <section class="py-24 bg-white border-y border-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl font-bold text-slate-900 mb-4">Un cycle de consommation vertueux</h2>
                <p class="text-slate-500">Chaque collaborateur devient acteur de la performance de l'entreprise.</p>
            </div>

            <div class="grid md:grid-cols-3 gap-12">
                <div class="text-center">
                    <div
                        class="w-16 h-16 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-slate-800">1. Allocation</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Recevez automatiquement vos Tokens le 1er de
                        chaque mois. Gérez votre budget comme bon vous semble.</p>
                </div>
                <div class="text-center">
                    <div
                        class="w-16 h-16 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-slate-800">2. Commande</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Naviguez dans le catalogue en temps réel.
                        Commandez vos fournitures en quelques clics.</p>
                </div>
                <div class="text-center">
                    <div
                        class="w-16 h-16 bg-emerald-50 text-emerald-600 rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-slate-800">3. Transparence</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Suivez l'impact de votre département sur la
                        consommation globale et aidez à optimiser les stocks.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-12 bg-slate-50 border-t border-slate-200">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p class="text-slate-400 text-sm font-medium">
                © {{ date('Y') }} TechCorp SupplyHub — Système de gestion interne.
            </p>
        </div>
    </footer>

</body>

</html>
