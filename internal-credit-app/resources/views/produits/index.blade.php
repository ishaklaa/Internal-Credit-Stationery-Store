<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Produits</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #6366f1;
            --secondary-color: #8b5cf6;
            --success-color: #10b981;
            --warning-color: #f59e0b;
            --danger-color: #ef4444;
            --dark-color: #1f2937;
            --light-bg: #f9fafb;
            --card-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --card-shadow-hover: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 2rem 0;
        }

        .main-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 1rem;
        }

        .header-card {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: var(--card-shadow);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .header-title {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .header-title i {
            font-size: 2.5rem;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .header-title h1 {
            font-size: 2rem;
            font-weight: 700;
            color: var(--dark-color);
            margin: 0;
        }

        .btn-add {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border: none;
            padding: 0.8rem 2rem;
            border-radius: 12px;
            color: white;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(99, 102, 241, 0.4);
        }

        .btn-add:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(99, 102, 241, 0.6);
            color: white;
        }

        .alert-custom {
            background: white;
            border-radius: 15px;
            padding: 1.2rem 1.5rem;
            margin-bottom: 2rem;
            border-left: 4px solid var(--success-color);
            box-shadow: var(--card-shadow);
            display: flex;
            align-items: center;
            gap: 1rem;
            animation: slideIn 0.5s ease;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .alert-custom i {
            color: var(--success-color);
            font-size: 1.5rem;
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .product-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: var(--card-shadow);
            transition: all 0.3s ease;
            position: relative;
        }

        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--card-shadow-hover);
        }

        .product-image-container {
            position: relative;
            width: 100%;
            height: 250px;
            overflow: hidden;
            background: var(--light-bg);
        }

        .product-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .product-card:hover .product-image {
            transform: scale(1.1);
        }

        .product-id-badge {
            position: absolute;
            top: 1rem;
            left: 1rem;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 0.3rem 0.8rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .product-status-badge {
            position: absolute;
            top: 1rem;
            right: 1rem;
            padding: 0.4rem 1rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            backdrop-filter: blur(10px);
        }

        .status-disponible {
            background: rgba(16, 185, 129, 0.9);
            color: white;
        }

        .status-rupture {
            background: rgba(239, 68, 68, 0.9);
            color: white;
        }

        .product-content {
            padding: 1.5rem;
        }

        .product-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--dark-color);
            margin-bottom: 1rem;
            line-height: 1.4;
        }

        .product-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            padding: 1rem;
            background: var(--light-bg);
            border-radius: 12px;
        }

        .info-item {
            text-align: center;
        }

        .info-label {
            font-size: 0.75rem;
            color: #6b7280;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 0.3rem;
        }

        .info-value {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--dark-color);
        }

        .price-tag {
            color: var(--primary-color);
            font-size: 1.5rem;
        }

        .product-actions {
            display: flex;
            gap: 0.8rem;
        }

        .btn-action {
            flex: 1;
            padding: 0.7rem;
            border-radius: 10px;
            border: none;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
            font-size: 0.9rem;
        }

        .btn-edit {
            background: linear-gradient(135deg, #f59e0b, #f97316);
            color: white;
        }

        .btn-edit:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(245, 158, 11, 0.4);
            color: white;
        }

        .btn-delete {
            background: linear-gradient(135deg, #ef4444, #dc2626);
            color: white;
        }

        .btn-delete:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.4);
            color: white;
        }

        .empty-state {
            background: white;
            border-radius: 20px;
            padding: 4rem 2rem;
            text-align: center;
            box-shadow: var(--card-shadow);
        }

        .empty-state i {
            font-size: 5rem;
            color: #d1d5db;
            margin-bottom: 1rem;
        }

        .empty-state h3 {
            color: var(--dark-color);
            margin-bottom: 0.5rem;
        }

        .empty-state p {
            color: #6b7280;
        }

        @media (max-width: 768px) {
            .products-grid {
                grid-template-columns: 1fr;
            }

            .header-card {
                text-align: center;
                justify-content: center;
            }

            .header-title {
                flex-direction: column;
            }
        }

        /* Table View Alternative */
        .table-container {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            box-shadow: var(--card-shadow);
            overflow-x: auto;
        }

        .modern-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 0.5rem;
        }

        .modern-table thead th {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 1rem;
            text-align: left;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
        }

        .modern-table thead th:first-child {
            border-radius: 10px 0 0 10px;
        }

        .modern-table thead th:last-child {
            border-radius: 0 10px 10px 0;
        }

        .modern-table tbody tr {
            background: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .modern-table tbody tr:hover {
            transform: scale(1.02);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .modern-table tbody td {
            padding: 1rem;
            vertical-align: middle;
        }

        .modern-table tbody td:first-child {
            border-radius: 10px 0 0 10px;
        }

        .modern-table tbody td:last-child {
            border-radius: 0 10px 10px 0;
        }

        .table-img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="main-container">
        <!-- Header -->
        <div class="header-card">
            <div class="header-title">
                <i class="fas fa-box-open"></i>
                <h1>Gestion des Produits</h1>
            </div>
            <a href="{{ route('produits.create') }}" class="btn-add">
                <i class="fas fa-plus"></i>
                Ajouter un produit
            </a>
        </div>

        <!-- Success Alert -->
        @if(session('success'))
            <div class="alert-custom">
                <i class="fas fa-check-circle"></i>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        <!-- Products Grid -->
        @if(count($produits) > 0)
            <div class="products-grid">
                @foreach($produits as $produit)
                <div class="product-card">
                    <div class="product-image-container">
                        <img src="{{ asset('storage/' . $produit->img) }}" alt="{{ $produit->title }}" class="product-image">
                        <div class="product-id-badge">#{{ $produit->id }}</div>
                        <div class="product-status-badge {{ $produit->status === 'disponible' ? 'status-disponible' : 'status-rupture' }}">
                            <i class="fas {{ $produit->status === 'disponible' ? 'fa-check' : 'fa-times' }}"></i>
                            {{ ucfirst($produit->status) }}
                        </div>
                    </div>
                    <div class="product-content">
                        <h3 class="product-title">{{ $produit->title }}</h3>
                        <div class="product-info">
                            <div class="info-item">
                                <div class="info-label">Quantité</div>
                                <div class="info-value">
                                    <i class="fas fa-box"></i> {{ $produit->quantity }}
                                </div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Prix</div>
                                <div class="info-value price-tag">
                                    {{ number_format($produit->price, 2, ',', ' ') }} €
                                </div>
                            </div>
                        </div>
                        <div class="product-actions">
                            <a href="#" class="btn-action btn-edit">
                                <i class="fas fa-edit"></i>
                                Modifier
                            </a>
                            <a href="#" class="btn-action btn-delete">
                                <i class="fas fa-trash"></i>
                                Supprimer
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="empty-state">
                <i class="fas fa-inbox"></i>
                <h3>Aucun produit disponible</h3>
                <p>Commencez par ajouter votre premier produit</p>
            </div>
        @endif
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>