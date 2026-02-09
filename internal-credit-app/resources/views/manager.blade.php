<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Commandes à approuver</title>
    <style>
        .commande-box {
            border: 1px solid #ccc;
            padding: 12px;
            margin: 10px auto;
            max-width: 500px;
            border-radius: 6px;
            font-family: Arial, sans-serif;
        }
        .btn {
            padding: 6px 12px;
            border-radius: 4px;
            border: none;
            cursor: pointer;
            margin-right: 8px;
        }
        .btn-accept { background: #16a34a; color: #fff; }
        .btn-reject { background: #dc2626; color: #fff; }
        .flash {
            max-width: 500px;
            margin: 10px auto;
            padding: 8px 12px;
            background: #e0f2fe;
            border-radius: 4px;
        }
    </style>
</head>
<body>

    @if(session('success'))
        <div class="flash">
            {{ session('success') }}
        </div>
    @endif

    <h2>Commandes en attente de votre département</h2>
    

    @forelse($items as $item)
        <div class="commande-box">
            <p><strong>Employé :</strong> {{ $item['employeName'] }}</p>
            <p><strong>Produit :</strong> {{ $item['produitTitle'] }}</p>

            <form action="{{ route('commandes.accept', $item['cmd']->id) }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="btn btn-accept">Accepter</button>
            </form>

            <form action="{{ route('commandes.reject', $item['cmd']->id) }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="btn btn-reject">Refuser</button>
            </form>
        </div>
    @empty
        <p>Aucune commande en attente pour votre département.</p>
    @endforelse

</body>
</html>
