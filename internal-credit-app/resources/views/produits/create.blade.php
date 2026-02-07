<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un nouveau produit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1>Créer un nouveau produit</h1>
        
        <form action="{{ route('produits.store') }}" method="POST">
            @csrf
            
            <div class="mb-3">
                <label for="title" class="form-label">Titre</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            
            <div class="mb-3">
                <label for="quantity" class="form-label">Quantité</label>
                <input type="number" class="form-control" id="quantity" name="quantity" min="0" required>
            </div>
            
            <div class="mb-3">
                <label for="status" class="form-label">Statut</label>
                <input type="text" class="form-control" id="status" name="status" required>
            </div>
            
            <div class="mb-3">
                <label for="price" class="form-label">Prix</label>
                <input type="number" class="form-control" id="price" name="price" min="0" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Créer le produit</button>
            <a href="{{ route('produits.index') }}" class="btn btn-secondary">Retour à la liste</a>
        </form>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>