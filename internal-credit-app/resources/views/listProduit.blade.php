<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boutique | TechCorp SupplyHub</title>
    <!-- Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #4f46e5;
            /* Indigo 600 */
            --primary-hover: #4338ca;
            --bg-body: #f8fafc;
            --bg-card: #ffffff;
            --text-main: #1e293b;
            --text-muted: #64748b;
            --danger: #ef4444;
            --success: #10b981;
            --shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -4px rgba(0, 0, 0, 0.1);
        }

        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-body);
            color: var(--text-main);
            padding-top: 80px;
            /* Espace pour la navbar fixe */
        }

        /* NAVBAR PROFESSIONNELLE */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 70px;
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 40px;
            z-index: 1000;
        }

        .nav-logo {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            color: var(--text-main);
            font-weight: 800;
            font-size: 1.2rem;
        }

        .logo-box {
            width: 35px;
            height: 35px;
            background: var(--primary);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            box-shadow: 0 4px 6px rgba(79, 70, 229, 0.3);
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        /* TOKEN BAR */
        .token-badge {
            background: #eef2ff;
            border: 1px solid #e0e7ff;
            padding: 8px 16px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 700;
            color: var(--primary);
        }

        .token-icon {
            color: #fbbf24;
            /* Gold color for token icon */
        }

        /* LOGOUT BUTTON */
        .logout-btn {
            background: transparent;
            color: var(--text-muted);
            border: 1px solid #e2e8f0;
            padding: 8px 16px;
            border-radius: 10px;
            font-size: 0.85rem;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.2s;
        }

        .logout-btn:hover {
            background: #fff1f2;
            color: var(--danger);
            border-color: #fecaca;
        }

        /* LAYOUT */
        .app-container {
            display: grid;
            grid-template-columns: 1fr 380px;
            max-width: 1400px;
            margin: 0 auto;
            gap: 20px;
        }

        /* PRODUCTS */
        .products-section {
            padding: 40px;
        }

        .header h1 {
            font-size: 1.8rem;
            font-weight: 800;
            margin-bottom: 30px;
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: 24px;
        }

        .product-card {
            background: var(--bg-card);
            border-radius: 20px;
            padding: 20px;
            border: 1px solid #f1f5f9;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow);
        }

        .product-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 14px;
            background-color: #f8fafc;
            margin-bottom: 15px;
        }

        .product-card h3 {
            font-size: 1rem;
            font-weight: 700;
            margin: 10px 0;
            color: #334155;
        }

        .price-tag {
            font-size: 1.2rem;
            font-weight: 800;
            color: var(--primary);
            margin-bottom: 20px;
            display: block;
        }

        .add-btn {
            width: 100%;
            background: var(--primary);
            color: white;
            border: none;
            padding: 12px;
            border-radius: 12px;
            font-weight: 700;
            cursor: pointer;
            transition: background 0.2s;
        }

        .add-btn:hover {
            background: var(--primary-hover);
        }

        /* CART SIDEBAR */
        .cart-sidebar {
            background: #ffffff;
            border-left: 1px solid #e2e8f0;
            padding: 30px;
            height: calc(100vh - 70px);
            position: sticky;
            top: 70px;
            display: flex;
            flex-direction: column;
        }

        .cart-sidebar h2 {
            font-size: 1.3rem;
            font-weight: 800;
            margin-bottom: 25px;
            border-bottom: 2px solid #f8fafc;
            padding-bottom: 15px;
        }

        .cart-item {
            display: flex;
            justify-content: space-between;
            padding: 15px 0;
            border-bottom: 1px solid #f1f5f9;
        }

        .item-info b {
            font-size: 0.9rem;
            color: #1e293b;
        }

        .item-info span {
            font-size: 0.8rem;
            color: var(--text-muted);
            font-weight: 600;
        }

        .remove-btn {
            color: var(--danger);
            background: #fff1f2;
            border-radius: 8px;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            font-weight: bold;
        }

        .checkout-btn {
            width: 100%;
            background: var(--success);
            color: white;
            border: none;
            padding: 18px;
            border-radius: 14px;
            font-weight: 700;
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.2);
            margin-top: 20px;
        }

        .badge-glass {
            padding: 6px 14px;
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            color: #fff;
            background: rgba(0, 0, 0, 0.4);
            /* Transparent black */
            backdrop-filter: blur(10px);
            /* The blur effect */
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 50px;
            letter-spacing: 0.5px;
            z-index: 10;
        }
    </style>
</head>

<body>

    <!-- BARRE DE NAVIGATION -->
    <nav class="navbar">
        <a href="/" class="nav-logo">
            <div class="logo-box">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" width="20">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                </svg>
            </div>
            <span>TechCorp <span style="color:var(--primary)">SupplyHub</span></span>
        </a>

        <div class="nav-right">
            <!-- TOKEN BAR -->
            <div class="token-badge" title="Votre solde actuel">
                <svg class="token-icon" width="20" height="20" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.736 6.979C9.208 6.193 9.696 6 10 6c.304 0 .792.193 1.264.979a1 1 0 001.715-1.029C12.279 4.784 11.232 4 10 4s-2.279.784-2.979 1.95a1 1 0 001.715 1.029zM11.264 13.021C10.792 13.807 10.304 14 10 14c-.304 0-.792-.193-1.264-.979a1 1 0 10-1.715 1.029C7.721 15.216 8.768 16 10 16s2.279-.784 2.979-1.95a1 1 0 10-1.715-1.029zM8 10a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z"
                        clip-rule="evenodd" />
                </svg>
                <!-- Remplacez 500 par { -->
                <span>{{ Auth::user()->employe->token ?? 0 }}</span>
            </div>

            <!-- LOGOUT BUTTON -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="logout-btn">
                    <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    Déconnexion
                </button>
            </form>
        </div>
    </nav>

    <div class="app-container">

        <!-- SECTION PRODUITS -->
        <main class="products-section">
            <header class="header">
                <h1>Catalogue des fournitures</h1>
                @if ($errors->any())
                    <div
                        style="padding:15px; background:#fee2e2; border-radius:12px; border-left:4px solid var(--danger); color:var(--danger); margin-bottom:20px;">
                        @foreach ($errors->all() as $error)
                            <p style="margin:0; font-size:0.9rem; font-weight:600;">{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
            </header>

            <div class="products-grid">
                @foreach ($products as $product)
                    <article class="product-card">
                        <!-- Image générique propre -->
                        <img src="https://images.unsplash.com/photo-1583485088034-697b5bc54ccd?q=80&w=400&auto=format&fit=crop"
                            alt="Produit" class="product-image">
                        <span class="position-absolute top-0 end-0 m-3 badge-glass">
                            {{ $product->status }}
                        </span>
                        <h3>{{ $product->title }}</h3>
                        <span class="price-tag">{{ number_format($product->prix, 0) }} Tokens</span>

                        <form action="{{ route('add.cart', $product) }}" method="post">
                            @csrf
                            <input type="hidden" name="quantity" value="1">
                            <button class="add-btn" type="submit">Ajouter au panier</button>
                        </form>
                    </article>
                @endforeach
            </div>
        </main>

        <!-- PANIER SIDEBAR -->
        <aside class="cart-sidebar">
            <h2>📦 Votre Panier</h2>

            <div style="flex-grow: 1; overflow-y: auto;">
                @if (session()->has('basket') && count(session('basket')) > 0)
                    @php $total = 0 @endphp
                    @foreach (session('basket') as $key => $item)
                        @php $total += $item['quantity'] * $item['prix'] @endphp
                        <div class="cart-item">
                            <div class="item-info">
                                <b>{{ $item['title'] }}</b><br>
                                <span>{{ $item['quantity'] }} x {{ $item['prix'] }} T</span>
                            </div>
                            <a href="{{ route('cart.remove', $key) }}" class="remove-btn">✕</a>
                        </div>
                    @endforeach
                @else
                    <div style="text-align:center; margin-top:50px; color:var(--text-muted)">
                        <p style="font-size:3rem;">🛒</p>
                        <p>Votre panier est vide</p>
                    </div>
                @endif
            </div>

            @if (session()->has('basket') && count(session('basket')) > 0)
                <div style="margin-top:20px; border-top:2px solid #f1f5f9; padding-top:20px;">
                    <div
                        style="display:flex; justify-content:between; font-size:1.3rem; font-weight:800; margin-bottom:20px;">
                        <span style="flex-grow:1 text-slate-500">Total</span>
                        <span style="color:var(--primary)">{{ number_format($total, 0) }} T</span>
                    </div>
                    <form action="{{ route('add.Command') }}" method="post">
                        @csrf
                        <button class="checkout-btn" type="submit">Confirmer la commande</button>
                    </form>
                </div>
            @endif
        </aside>

    </div>

</body>

</html>
