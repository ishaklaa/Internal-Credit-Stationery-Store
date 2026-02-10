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
        <h1>Mettre a jour un nouveau produit</h1>
        
        <form action="{{ route('produits.update' , $produit->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="title" class="form-label">Titre</label>
                <input type="text" class="form-control" value="{{$produit->title}}" id="title" name="title" required>
            </div>
            
            <div class="mb-3">
                <label for="quantity" class="form-label">Quantité</label>
                <input type="number" class="form-control" value="{{$produit->quantity}}" id="quantity" name="quantity" min="0" required>
            </div>
            
            <div class="mb-3">
                <select name="statuts" >
                        <option value="premium">Premium</option>
                        <option value="normal">Normal</option>
                </select>

            </div>
            
            <div class="mb-3">
                <label for="price" class="form-label">Prix</label>
                <input type="number" class="form-control" value="{{$produit->prix}}" id="price" name="prix" min="0" required>
            </div>

            <div class="mb-3">
                <input type="file" name="img" >
            </div>
            
            <button type="submit" class="btn btn-primary">mettre a jour le produit</button>
            <a href="{{ route('produits.index') }}" class="btn btn-secondary">Retour à la liste</a>
        </form>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>