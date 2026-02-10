<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration | SupplyHub TechCorp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-color: #6366f1;
            --secondary-color: #8b5cf6;
            --dark-color: #1f2937;
            --success-color: #10b981;
            --danger-color: #ef4444;
            --warning-color: #f59e0b;
        }

        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            font-family: 'Inter', sans-serif;
            padding-top: 100px;
            padding-bottom: 50px;
            margin: 0;
        }

        /* NAVBAR ADMIN */
        .admin-navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 75px;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(15px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 40px;
            z-index: 1000;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .logo-admin {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
        }

        .admin-badge {
            background: #fee2e2;
            color: #b91c1c;
            font-size: 0.7rem;
            font-weight: 800;
            text-transform: uppercase;
            padding: 4px 10px;
            border-radius: 20px;
            border: 1px solid #fecaca;
        }

        .btn-logout {
            background: white;
            color: var(--danger-color);
            border: 1px solid #fee2e2;
            padding: 8px 18px;
            border-radius: 10px;
            font-size: 0.85rem;
            font-weight: 700;
            text-decoration: none;
            cursor: pointer;
        }

        /* CONTAINERS */
        .main-container {
            max-width: 1300px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .header-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 24px;
            padding: 2rem;
            margin-bottom: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        /* GRID VIEW */
        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 25px;
            margin-bottom: 3rem;
        }

        .product-card {
            background: white;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-5px);
        }

        /* TABLE VIEW - NOUVEAU */
        .table-container {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 24px;
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .modern-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 12px;
        }

        .modern-table thead th {
            color: var(--text-muted);
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 1px;
            padding: 0 15px;
            border: none;
        }

        .modern-table tbody tr {
            background: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.02);
            transition: all 0.2s ease;
        }

        .modern-table tbody tr:hover {
            background: #fdfdff;
            transform: scale(1.01);
        }

        .modern-table td {
            padding: 15px;
            vertical-align: middle;
            border: none;
        }

        .modern-table td:first-child {
            border-radius: 12px 0 0 12px;
        }

        .modern-table td:last-child {
            border-radius: 0 12px 12px 0;
        }

        .table-img {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 10px;
            margin-right: 15px;
        }

        .status-dot {
            height: 10px;
            width: 10px;
            border-radius: 50%;
            display: inline-block;
            margin-right: 8px;
        }

        .btn-circle {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            margin: 0 2px;
        }
    </style>
</head>

<body>

    <!-- NAVBAR ADMIN -->
    <nav class="admin-navbar">
        <div class="nav-left d-flex align-items-center gap-3">
            <div class="logo-admin"><i class="fas fa-shield-alt"></i></div>
            <div class="d-flex flex-column">
                <span class="fw-bold text-dark">TechCorp SupplyHub</span>
                <div><span class="admin-badge">Panel Administration</span></div>
            </div>
        </div>

        <div class="nav-right">
            <div class="admin-profile d-none d-md-flex align-items-center bg-light p-2 rounded-3 px-3 me-3">
                <i class="fas fa-user-circle me-2 text-primary"></i>
                <span class="small fw-bold">{{ Auth::user()->name }}</span>
            </div>
            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                @csrf
                <button type="submit" class="btn-logout">Quitter</button>
            </form>
        </div>
    </nav>

    <div class="main-container">

        <!-- HEADER ACTION -->
        <div class="header-card">
            <div>
                <h1 class="h3 fw-bold mb-1">Inventaire Général</h1>
                <p class="text-muted small mb-0">Gestion des stocks et des tarifs de la boutique</p>
            </div>
            <a href="{{ route('produits.create') }}" class="btn btn-primary px-4 py-2 rounded-3 shadow-sm">
                <i class="fas fa-plus-circle me-2"></i>Nouveau Produit
            </a>
        </div>

        <!-- SUCCESS ALERT -->
        @if (session('success'))
            <div class="alert bg-white border-0 shadow-sm rounded-4 p-3 d-flex align-items-center mb-4">
                <i class="fas fa-check-circle text-success fs-4 me-3"></i>
                <span class="fw-bold text-dark">{{ session('success') }}</span>
            </div>
        @endif

        <!-- 1. VUE EN GRILLE (CARDS) -->
        <h5 class="text-white mb-4 fw-bold"><i class="fas fa-th-large me-2"></i>Aperçu visuel</h5>
        <div class="products-grid">
            @foreach ($produits as $produit)
                <div class="product-card">
                    <div class="position-relative" style="height: 180px;">
                        <img src="{{ asset('storage/' . $produit->img) }}" class="w-100 h-100"
                            style="object-fit: cover;">
                        <span
                            class="position-absolute top-0 end-0 m-2 badge {{ $produit->status === 'disponible' ? 'bg-success' : 'bg-danger' }}">
                            {{ $produit->status }}
                        </span>
                    </div>
                    <div class="p-3">
                        <h6 class="fw-bold text-truncate">{{ $produit->title }}</h6>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <span class="text-primary fw-bold">{{ $produit->prix }} T</span>
                            <span class="small text-muted">Stock: {{ $produit->quantity }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- 2. VUE EN LISTE (TABLEAU) - NOUVEAU -->
        <h5 class="text-white mb-4 fw-bold"><i class="fas fa-list me-2"></i>Récapitulatif détaillé</h5>
        <div class="table-container">
            <table class="modern-table">
                <thead>
                    <tr>
                        <th>Désignation</th>
                        <th>Référence</th>
                        <th>Stock</th>
                        <th>Prix Unitaire</th>
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
                                    <span class="fw-bold text-dark">{{ $produit->title }}</span>
                                </div>
                            </td>
                            <td><span class="badge bg-light text-dark">#PRD-{{ $produit->id }}</span></td>
                            <td>
                                <span class="fw-bold {{ $produit->quantity < 5 ? 'text-danger' : 'text-dark' }}">
                                    {{ $produit->quantity }} unités
                                </span>
                            </td>
                            <td><span
                                    class="text-primary font-monospace fw-bold">{{ number_format($produit->prix, 0) }}
                                    T</span></td>
                            <td>
                                <span
                                    class="status-dot {{ $produit->status === 'disponible' ? 'bg-success' : 'bg-danger' }}"></span>
                                <small class="fw-bold">{{ ucfirst($produit->status) }}</small>
                            </td>
                            <td class="text-end">
                                <a href="#" class="btn-circle bg-warning shadow-sm" title="Modifier"><i
                                        class="fas fa-edit"></i></a>
                                <a href="#" class="btn-circle bg-danger shadow-sm" title="Supprimer"><i
                                        class="fas fa-trash"></i></a>
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
