<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approbation des Commandes</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #2563eb;
            --success: #10b981;
            --danger: #ef4444;
            --bg-body: #f8fafc;
            --text-main: #1e293b;
            --text-muted: #64748b;
            --card-bg: #ffffff;
            --border: #e2e8f0;
        }

        body {
            font-family: 'Inter', -apple-system, sans-serif;
            background-color: var(--bg-body);
            color: var(--text-main);
            line-height: 1.5;
            margin: 0;
            padding: 40px 20px;
        }

        .container {
            max-width: 650px;
            margin: 0 auto;
        }

        h2 {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 24px;
            color: #0f172a;
            text-align: center;
        }

        /* Notifications */
        .flash {
            background: #dcfce7;
            color: #166534;
            padding: 12px 16px;
            border-radius: 8px;
            border: 1px solid #bbf7d0;
            margin-bottom: 20px;
            font-size: 0.95rem;
            text-align: center;
        }

        /* Order Card */
        .commande-card {
            background: var(--card-bg);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 16px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -2px rgba(0, 0, 0, 0.05);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .commande-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        .commande-info {
            margin-bottom: 20px;
        }

        .info-row {
            display: flex;
            margin-bottom: 8px;
            align-items: center;
        }

        .label {
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.025em;
            width: 100px;
        }

        .value {
            font-size: 1rem;
            font-weight: 500;
            color: var(--text-main);
        }

        /* Buttons */
        .actions {
            display: flex;
            gap: 12px;
            border-top: 1px solid var(--border);
            padding-top: 16px;
        }

        .btn {
            flex: 1;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 10px 16px;
            font-size: 0.9rem;
            font-weight: 600;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.2s;
            border: none;
            text-decoration: none;
        }

        .btn-accept {
            background-color: var(--success);
            color: white;
        }

        .btn-accept:hover {
            background-color: #059669;
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.2);
        }

        .btn-reject {
            background-color: #fff;
            color: var(--danger);
            border: 1px solid var(--danger);
        }

        .btn-reject:hover {
            background-color: #fef2f2;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 40px;
            background: #fff;
            border-radius: 12px;
            border: 2px dashed var(--border);
            color: var(--text-muted);
        }

        /* Mobile responsiveness */
        @media (max-width: 480px) {
            .actions {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Commandes à approuver</h2>

        @if (session('success'))
            <div class="flash">
                {{ session('success') }}
            </div>
        @endif

        @forelse($items as $item)
            <div class="commande-card">
                <div class="commande-info">
                    <div class="info-row">
                        <span class="label">Employé</span>
                        <span class="value">{{ $item['employeName'] }}</span>
                    </div>
                    <div class="info-row">
                        <span class="label">Produit</span>
                        <span class="value">{{ $item['produitTitle'] }}</span>
                    </div>
                </div>

                <div class="actions">
                    <form action="{{ route('commandes.accept', $item['cmd']->id) }}" method="POST" style="flex:1;">
                        @csrf
                        <button type="submit" class="btn btn-accept">
                            Accepter
                        </button>
                    </form>

                    <form action="{{ route('commandes.reject', $item['cmd']->id) }}" method="POST" style="flex:1;">
                        @csrf
                        <button type="submit" class="btn btn-reject">
                            Refuser
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <div class="empty-state">
                <p>Aucune commande en attente pour votre département.</p>
            </div>
        @endforelse
    </div>

</body>

</html>
