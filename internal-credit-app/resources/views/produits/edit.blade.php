<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le produit | {{ $produit->title }}</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <!-- Font Awesome pour les icônes -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Inter', sans-serif;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        }

        .card-header {
            background-color: #fff;
            border-bottom: 1px solid #f0f0f0;
            padding: 20px;
            border-radius: 15px 15px 0 0 !important;
        }

        .form-label {
            font-weight: 600;
            color: #495057;
        }

        .btn-primary {
            background-color: #4e73df;
            border: none;
            padding: 10px 25px;
            border-radius: 8px;
            transition: all 0.3s;
        }

        .btn-primary:hover {
            background-color: #2e59d9;
            transform: translateY(-1px);
        }

        .current-img-preview {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 8px;
            border: 2px solid #e3e6f0;
        }
    </style>
</head>

<body>


    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <!-- Lien retour -->
                <div class="mb-4">
                    <a href="{{ route('produits.index') }}" class="text-decoration-none text-muted">
                        <i class="fas fa-arrow-left me-2"></i> Retour à la liste
                    </a>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h3 class="mb-0 text-primary"><i class="fas fa-edit me-2"></i>Modifier le produit</h3>
                        <p class="text-muted small mb-0">ID du produit: #{{ $produit->id }}</p>
                    </div>

                    <div class="card-body p-4">
                        <form action="{{ route('produits.update', $produit) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Titre -->
                            <div class="mb-4">
                                <label for="title" class="form-label">Nom du produit</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    value="{{ $produit->title }}" placeholder="Ex: Smartphone Samsung S23" required>
                            </div>

                            <div class="row">
                                <!-- Quantité -->
                                <div class="col-md-6 mb-4">
                                    <label for="quantity" class="form-label">Quantité en stock</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-boxes"></i></span>
                                        <input type="number" class="form-control" id="quantity" name="quantity"
                                            value="{{ $produit->quantity }}" min="0" required>
                                    </div>
                                </div>

                                <!-- Prix -->
                                <div class="col-md-6 mb-4">
                                    <label for="price" class="form-label">Prix unitaire (DH)</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-tag"></i></span>
                                        <input type="number" step="0.01" class="form-control" id="price"
                                            name="prix" value="{{ $produit->prix }}" min="0" required>
                                    </div>
                                </div>
                            </div>

                            <!-- Statut -->
                            <div class="mb-4">
                                <label for="status" class="form-label">Catégorie / Statut</label>
                                <select name="status" id="status" class="form-select">
                                    <option value="normal" {{ $produit->status === 'normal' ? 'selected' : '' }}>
                                        Normal
                                    </option>

                                    <option value="premium" {{ $produit->status === 'premium' ? 'selected' : '' }}>
                                        Premium ⭐
                                    </option>
                                </select>

                            </div>

                            <!-- Image -->
                            <div class="mb-4">
                                <label class="form-label">Image du produit</label>
                                <div class="d-flex align-items-center gap-3 p-3 border rounded">
                                    @if ($produit->img)
                                        <img src="{{ asset('storage/' . $produit->img) }}" alt="Aperçu"
                                            class="current-img-preview">
                                    @else
                                        <div class="bg-light d-flex align-items-center justify-content-center rounded"
                                            style="width:80px; height:80px">
                                            <i class="fas fa-image text-muted"></i>
                                        </div>
                                    @endif
                                    <div class="flex-grow-1">
                                        <input type="file" class="form-control" name="img">
                                        <div class="form-text">Laissez vide pour conserver l'image actuelle.</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Boutons -->
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-5">
                                <button type="reset" class="btn btn-light px-4">Réinitialiser</button>
                                <button type="submit" class="btn btn-primary px-5">
                                    <i class="fas fa-save me-2"></i> Mettre à jour le produit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
