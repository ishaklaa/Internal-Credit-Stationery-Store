<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration | SupplyHub TechCorp</title>

    <!-- Fonts & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <style>
        :root {
            --primary: #4f46e5;
            --primary-hover: #4338ca;
            --dark: #1e293b;
            --slate-500: #64748b;
            --bg-body: #f8fafc;
            --success: #10b981;
            --danger: #ef4444;
            --warning: #f59e0b;
        }

        body {
            background-color: var(--bg-body);
            min-height: 100vh;
            font-family: 'Inter', sans-serif;
            padding-top: 100px;
            padding-bottom: 50px;
            margin: 0;
            color: var(--dark);
        }

        /* NAVBAR ADMIN */
        .admin-navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 75px;
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 40px;
            z-index: 1000;
        }

        .logo-admin {
            width: 40px;
            height: 40px;
            background: var(--primary);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            box-shadow: 0 4px 10px rgba(79, 70, 229, 0.2);
        }

        .admin-badge {
            background: #fff1f2;
            color: #be123c;
            font-size: 0.65rem;
            font-weight: 800;
            text-transform: uppercase;
            padding: 3px 10px;
            border-radius: 20px;
            border: 1px solid #fecaca;
            letter-spacing: 0.5px;
        }

        .btn-logout {
            background: white;
            color: var(--danger);
            border: 1px solid #fee2e2;
            padding: 8px 18px;
            border-radius: 10px;
            font-size: 0.85rem;
            font-weight: 700;
            transition: all 0.2s;
            text-decoration: none;
        }

        .btn-logout:hover {
            background: var(--danger);
            color: white;
        }

        /* CONTAINERS */
        .main-container {
            max-width: 1300px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .header-card {
            background: white;
            border-radius: 24px;
            padding: 1.5rem 2rem;
            margin-bottom: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        }

        /* GRID VIEW */
        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 1.5rem;
            margin-bottom: 3rem;
        }

        .product-card {
            background: white;
            border-radius: 24px;
            overflow: hidden;
            border: 1px solid #e2e8f0;
            transition: all 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }

        /* TABLE VIEW */
        .table-container {
            background: white;
            border-radius: 24px;
            padding: 2rem;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        }

        .modern-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 12px;
        }

        .modern-table thead th {
            color: var(--slate-500);
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.7rem;
            letter-spacing: 1px;
            padding: 0 15px;
            border: none;
        }

        .modern-table tbody tr {
            background: white;
            transition: all 0.2s ease;
        }

        .modern-table td {
            padding: 15px;
            vertical-align: middle;
            border-top: 1px solid #f1f5f9;
            border-bottom: 1px solid #f1f5f9;
        }

        .modern-table td:first-child {
            border-left: 1px solid #f1f5f9;
            border-radius: 12px 0 0 12px;
        }

        .modern-table td:last-child {
            border-right: 1px solid #f1f5f9;
            border-radius: 0 12px 12px 0;
        }

        .table-img {
            width: 45px;
            height: 45px;
            object-fit: cover;
            border-radius: 8px;
            margin-right: 12px;
        }

        .status-dot {
            height: 8px;
            width: 8px;
            border-radius: 50%;
            display: inline-block;
            margin-right: 6px;
        }

        .btn-circle {
            width: 32px;
            height: 32px;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            margin: 0 2px;
            font-size: 0.8rem;
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

    <!-- NAVBAR ADMIN -->
    <nav class="admin-navbar">
        <div class="nav-left d-flex align-items-center gap-3">
            <div class="logo-admin"><i class="fas fa-shield-alt"></i></div>
            <div class="d-flex flex-column">
                <span class="fw-bold">TechCorp SupplyHub</span>
                <div><span class="admin-badge">Admin Panel</span></div>
            </div>
        </div>

        <div class="nav-right">
            <div class="admin-profile d-none d-md-flex align-items-center bg-slate-100 p-2 rounded-3 px-3 me-3">
                <span class="small fw-bold text-slate-600">{{ Auth::user()->name }}</span>
            </div>
            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                @csrf
                <button type="submit" class="btn-logout">Quitter</button>
            </form>
        </div>
    </nav>

    <div class="main-container">

        <!-- HEADER -->
        <div class="header-card">
            <div>
                <h1 class="h4 fw-bold mb-0">Inventaire Global</h1>
                <p class="text-muted small mb-0">Gestion des stocks et des ressources</p>
            </div>
            <a href="{{ route('produits.create') }}" class="btn btn-primary px-4 py-2 rounded-3 fw-bold shadow-sm">
                <i class="fas fa-plus-circle me-2"></i>Nouveau Produit
            </a>
        </div>

        <!-- SUCCESS ALERT -->
        @if (session('success'))
            <div
                class="alert bg-emerald-50 border border-emerald-100 text-emerald-700 rounded-4 p-3 d-flex align-items-center mb-4">
                <i class="fas fa-check-circle me-3"></i>
                <span class="fw-bold">{{ session('success') }}</span>
            </div>
        @endif

        <!-- 1. VUE EN GRILLE -->
        <div class="d-flex align-items-center mb-4">
            <h5 class="fw-bold mb-0">Aperçu Visuel</h5>
            <span class="ms-3 badge bg-slate-200 text-slate-700 rounded-pill">{{ count($produits) }} articles</span>
        </div>

        <div class="products-grid">
            @foreach ($produits as $produit)
                <div class="product-card shadow-sm">
                    <div class="position-relative" style="height: 180px;">
                        <img src="{{ asset('storage/' . $produit->img) }}" class="w-100 h-100"
                            style="object-fit: cover;">
                        <span class="position-absolute top-0 end-0 m-3 badge-glass">
                            {{ $produit->status }}
                        </span>
                    </div>
                    <div class="p-3">
                        <h6 class="fw-bold mb-1">{{ $produit->title }}</h6>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <span class="text-indigo-600 fw-extrabold">{{ number_format($produit->prix, 0) }}
                                T</span>
                            <span class="small text-muted fw-medium">Stock: {{ $produit->quantity }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- 2. VUE EN LISTE -->
        <h5 class="fw-bold mb-4 mt-5">Récapitulatif Détaillé</h5>
        <div class="table-container">
            <table class="modern-table">
                <thead>
                    <tr>
                        <th>Produit</th>
                        <th>Référence</th>
                        <th>Stock</th>
                        <th>Prix</th>
                        <th>État</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produits as $produit)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('storage/' . $produit->img) }}" class="table-img">
                                    <span class="fw-bold">{{ $produit->title }}</span>
                                </div>
                            </td>
                            <td><code class="small text-indigo-600">#PRD-{{ $produit->id }}</code></td>
                            <td>
                                <span class="fw-bold {{ $produit->quantity < 5 ? 'text-danger' : '' }}">
                                    {{ $produit->quantity }} unités
                                </span>
                            </td>
                            <td class="fw-bold text-indigo-600">{{ number_format($produit->prix, 0) }} T</td>
                            <td>
                                <span
                                    class="status-dot {{ $produit->status === 'disponible' ? 'bg-success' : 'bg-danger' }}"></span>
                                <small class="fw-bold text-uppercase"
                                    style="font-size: 0.7rem;">{{ $produit->status }}</small>
                            </td>
                            <td class="text-end">
                                <a href="{{ route('produits.edit', $produit) }}"
                                    class="btn-circle bg-warning shadow-sm" title="Modifier"><i
                                        class="fas fa-edit"></i></a>
                                <form action="{{ route('produits.destroy', $produit) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn-circle bg-danger shadow-sm" title="Supprimer"
                                        onclick="return confirm('Are you sure ?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
