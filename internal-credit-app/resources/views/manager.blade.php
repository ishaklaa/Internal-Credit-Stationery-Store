<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portail Manager | TechCorp</title>
    <!-- Google Fonts: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #4f46e5;
            --primary-hover: #4338ca;
            --success: #10b981;
            --danger: #ef4444;
            --bg-body: #f1f5f9;
            --text-main: #0f172a;
            --text-muted: #64748b;
            --card-bg: #ffffff;
            --border: #e2e8f0;
            --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1);
            --nav-height: 70px;
        }

        body {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            background-color: var(--bg-body);
            color: var(--text-main);
            line-height: 1.6;
            margin: 0;
            padding: 0;
            -webkit-font-smoothing: antialiased;
        }

        /* --- NAVBAR STYLES --- */
        .navbar {
            height: var(--nav-height);
            background: #ffffff;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 40px;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .nav-logo {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            color: var(--text-main);
            font-weight: 700;
            font-size: 1.1rem;
        }

        .logo-box {
            background: var(--primary);
            color: white;
            padding: 8px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .logout-btn {
            background: transparent;
            border: 1px solid #fee2e2;
            color: var(--danger);
            padding: 8px 16px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.85rem;
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            transition: all 0.2s;
        }

        .logout-btn:hover {
            background: #fef2f2;
            border-color: #fecaca;
        }

        /* --- CONTENT LAYOUT --- */
        .container {
            max-width: 700px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .header {
            margin-bottom: 32px;
            text-align: left;
            border-left: 4px solid var(--primary);
            padding-left: 20px;
        }

        .header h1 {
            font-size: 1.75rem;
            font-weight: 800;
            letter-spacing: -0.025em;
            margin: 0;
            color: #1e293b;
        }

        .header p {
            color: var(--text-muted);
            margin: 4px 0 0 0;
            font-size: 0.95rem;
        }

        /* Flash Messages */
        .flash {
            background: #ecfdf5;
            color: #065f46;
            padding: 14px 20px;
            border-radius: 10px;
            border: 1px solid #a7f3d0;
            margin-bottom: 24px;
            font-size: 0.9rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* Order Card */
        .commande-card {
            background: var(--card-bg);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 24px;
            margin-bottom: 20px;
            box-shadow: var(--shadow-sm);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .commande-card:hover {
            box-shadow: var(--shadow-md);
            border-color: #cbd5e1;
        }

        .commande-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 20px;
        }

        .badge {
            background: #f8fafc;
            color: var(--text-muted);
            padding: 4px 12px;
            border-radius: 99px;
            font-size: 0.75rem;
            font-weight: 600;
            border: 1px solid var(--border);
            text-transform: uppercase;
        }

        .info-group {
            display: grid;
            grid-template-columns: 1fr 1.5fr;
            gap: 12px;
            margin-bottom: 24px;
        }

        .label {
            font-size: 0.75rem;
            font-weight: 700;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 4px;
            display: block;
        }

        .value {
            font-size: 1rem;
            font-weight: 600;
            color: #334155;
        }

        /* Buttons & Actions */
        .actions {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
            padding-top: 20px;
            border-top: 1px solid #f1f5f9;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 12px 20px;
            font-size: 0.9rem;
            font-weight: 600;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.2s;
            border: 1px solid transparent;
            width: 100%;
        }

        .btn-accept {
            background-color: var(--primary);
            color: white;
        }

        .btn-accept:hover {
            background-color: var(--primary-hover);
        }

        .btn-reject {
            background-color: #fff;
            color: #64748b;
            border-color: var(--border);
        }

        .btn-reject:hover {
            background-color: #fef2f2;
            color: var(--danger);
            border-color: #fecaca;
        }

        .icon {
            width: 18px;
            height: 18px;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 60px 40px;
            background: #fff;
            border-radius: 16px;
            border: 2px dashed #cbd5e1;
        }

        @media (max-width: 600px) {
            .navbar {
                padding: 0 20px;
            }

            .info-group,
            .actions {
                grid-template-columns: 1fr;
            }

            .nav-logo span {
                display: none;
            }

            /* Hide text on very small screens */
        }
    </style>
</head>

<body>

    <nav class="navbar">
        <a href="/" class="nav-logo">
            <div class="logo-box">
                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                </svg>
            </div>
            <span>TechCorp <span style="color:var(--primary)">SupplyHub</span></span>
        </a>

        <div class="nav-right">
            <!-- Token bar removed as requested for Manager -->

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

    <div class="container">
        <header class="header">
            <h1>Approbation des Commandes</h1>
            <p>Espace de validation pour les responsables de département</p>
        </header>

        @if (session('success'))
            <div class="flash">
                <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="C5 13l4 4L19 7"></path>
                </svg>
                {{ session('success') }}
            </div>
        @endif

        @forelse($items as $item)
            <div class="commande-card">
                <div class="commande-header">
                    <span class="badge">Commande #{{ $item['cmd']->id }}</span>
                    <span style="font-size: 0.8rem; color: var(--text-muted);">En attente</span>
                </div>

                <div class="info-group">
                    <div>
                        <span class="label">Collaborateur</span>
                        <span class="value">{{ $item['employeName'] }}</span>
                    </div>
                    <div>
                        <span class="label">Article demandé</span>
                        <span class="value">{{ $item['produitTitle'] }}</span>
                    </div>
                </div>

                <div class="actions">
                    <form action="{{ route('commandes.reject', $item['cmd']->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-reject">
                            <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            Refuser
                        </button>
                    </form>

                    <form action="{{ route('commandes.accept', $item['cmd']->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-accept">
                            <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>
                            Approuver
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <div class="empty-state">
                <svg style="width: 48px; height: 48px; color: #cbd5e1; margin-bottom: 16px;" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <p style="color: var(--text-muted); font-weight: 500;">Aucune commande en attente de validation.</p>
            </div>
        @endforelse
    </div>

</body>

</html>
