<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Connexion | TechCorp SupplyHub</title>

    <!-- Police Inter pour un look Corporate -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Chargement de Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="antialiased bg-[#f8fafc] text-slate-900 flex items-center justify-center min-h-screen p-4">

    <!-- Conteneur principal (La carte blanche) -->
    <div class="w-full max-w-md bg-white rounded-3xl shadow-xl shadow-slate-200/50 border border-slate-100 p-8 sm:p-10">

        <!-- En-tête de la carte (Logo et Titre) -->
        <div class="text-center mb-8">
            <a href="/"
                class="inline-flex items-center justify-center w-14 h-14 bg-indigo-600 rounded-2xl shadow-lg shadow-indigo-200 mb-4 hover:-translate-y-1 transition-transform">
                <!-- Icône représentant les fournitures/stocks -->
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                </svg>
            </a>
            <h2 class="text-2xl font-extrabold text-slate-900 tracking-tight">Bienvenue sur SupplyHub</h2>
            <p class="text-sm text-slate-500 mt-2">Connectez-vous pour gérer vos Tokens et fournitures.</p>
        </div>

        <!-- Affichage des erreurs globales (Statut de session) -->
        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600 bg-green-50 p-3 rounded-lg">
                {{ session('status') }}
            </div>
        @endif

        <!-- Le Formulaire -->
        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

            <!-- Champ Email -->
            <div>
                <label for="email" class="block text-sm font-semibold text-slate-700 mb-1">Email
                    Professionnel</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                    class="block w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50 focus:bg-white focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all duration-200 outline-none"
                    placeholder="prenom.nom@techcorp.com">
                @if ($errors->get('email'))
                    <p class="mt-2 text-sm font-medium text-red-500">{{ $errors->first('email') }}</p>
                @endif
            </div>

            <!-- Champ Mot de passe -->
            <div>
                <div class="flex items-center justify-between mb-1">
                    <label for="password" class="block text-sm font-semibold text-slate-700">Mot de passe</label>
                    @if (Route::has('password.request'))
                        <a class="text-xs font-bold text-indigo-600 hover:text-indigo-500 transition-colors"
                            href="{{ route('password.request') }}">
                            Oublié ?
                        </a>
                    @endif
                </div>
                <input id="password" type="password" name="password" required
                    class="block w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50 focus:bg-white focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all duration-200 outline-none"
                    placeholder="••••••••">
                @if ($errors->get('password'))
                    <p class="mt-2 text-sm font-medium text-red-500">{{ $errors->first('password') }}</p>
                @endif
            </div>

            <!-- Se souvenir de moi -->
            <div class="flex items-center">
                <input id="remember_me" type="checkbox" name="remember"
                    class="w-4 h-4 rounded border-slate-300 text-indigo-600 focus:ring-indigo-500 cursor-pointer">
                <label for="remember_me" class="ms-2 text-sm font-medium text-slate-600 cursor-pointer">Rester
                    connecté</label>
            </div>

            <!-- Bouton de soumission -->
            <button type="submit"
                class="w-full bg-indigo-600 text-white font-bold py-3.5 px-4 rounded-xl shadow-lg shadow-indigo-200 hover:bg-indigo-700 hover:-translate-y-0.5 transition-all duration-200">
                Se connecter au SupplyHub
            </button>
        </form>

        <!-- Footer de la carte -->
        <div class="mt-8 pt-6 border-t border-slate-100 text-center">
            <p class="text-xs text-slate-400">
                Outil strictement réservé au personnel de TechCorp.<br>
                <a href="/" class="text-indigo-600 hover:underline mt-1 inline-block">Retour à l'accueil</a>
            </p>
        </div>

    </div>

</body>

</html>
