<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Fourniture | TechCorp Admin</title>

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
            --border: #e2e8f0;
        }

        body {
            background-color: var(--bg-body);
            font-family: 'Inter', sans-serif;
            padding-top: 100px;
            padding-bottom: 60px;
            color: var(--dark);
        }

        /* NAVBAR ADMIN (Cohérence avec la liste) */
        .admin-navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 75px;
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--border);
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

        /* FORM CARD */
        .form-card {
            background: white;
            border-radius: 30px;
            border: 1px solid var(--border);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            max-width: 800px;
            margin: 0 auto;
        }

        .form-header {
            background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
            padding: 40px;
            text-align: center;
            color: white;
        }

        .form-body {
            padding: 40px;
        }

        .form-label {
            font-weight: 700;
            font-size: 0.9rem;
            color: var(--dark);
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .form-label i {
            color: var(--primary);
            width: 20px;
        }

        .form-control,
        .form-select {
            border: 1.5px solid var(--border);
            border-radius: 14px;
            padding: 12px 18px;
            font-size: 0.95rem;
            transition: all 0.2s;
            background-color: #fcfcfd;
        }

        .form-control:focus {
            border-color: var(--primary);
            background-color: white;
            box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.1);
        }

        /* FILE UPLOAD CUSTOM */
        .file-upload-wrapper {
            border: 2px dashed var(--border);
            border-radius: 20px;
            padding: 30px;
            text-align: center;
            background: #f8fafc;
            cursor: pointer;
            transition: all 0.2s;
        }

        .file-upload-wrapper:hover {
            border-color: var(--primary);
            background: #f5f3ff;
        }

        /* PREVIEW IMAGE */
        #filePreview {
            display: none;
            margin-top: 20px;
            padding: 15px;
            background: white;
            border-radius: 15px;
            border: 1px solid var(--border);
            align-items: center;
            gap: 15px;
        }

        #filePreview img {
            width: 70px;
            height: 70px;
            border-radius: 10px;
            object-fit: cover;
        }

        /* BUTTONS */
        .btn-submit {
            background: var(--primary);
            color: white;
            border: none;
            padding: 14px 30px;
            border-radius: 14px;
            font-weight: 800;
            width: 100%;
            box-shadow: 0 10px 15px -3px rgba(79, 70, 229, 0.3);
            transition: all 0.2s;
        }

        .btn-submit:hover {
            background: var(--primary-hover);
            transform: translateY(-2px);
        }

        .btn-back {
            color: var(--slate-500);
            text-decoration: none;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-top: 20px;
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
                <span style="font-size:0.65rem; font-weight:800; color:#be123c; text-transform:uppercase;">Admin
                    Panel</span>
            </div>
        </div>
        <div class="nav-right">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    style="background:none; border:none; font-weight:700; color:var(--slate-500);">Quitter</button>
            </form>
        </div>
    </nav>

    <div class="container">
        <div class="form-card">
            <!-- Header du Formulaire -->
            <div class="form-header">
                <div class="mb-3">
                    <i class="fas fa-plus-circle fa-3x"></i>
                </div>
                <h1>Ajouter une Fourniture</h1>
                <p class="mb-0">Remplissez les détails pour mettre à jour la boutique interne</p>
            </div>

            <!-- Corps du Formulaire -->
            <div class="form-body">
                <form action="{{ route('produits.store') }}" method="POST" enctype="multipart/form-data"
                    id="productForm">
                    @csrf

                    <!-- Titre -->
                    <div class="mb-4">
                        <label for="title" class="form-label">
                            <i class="fas fa-pen-nib"></i> Nom du produit
                        </label>
                        <input type="text" class="form-control" id="title" name="title"
                            placeholder="Ex: Ramette de papier A4 80g" required>
                    </div>

                    <div class="row">
                        <!-- Quantité -->
                        <div class="col-md-6 mb-4">
                            <label for="quantity" class="form-label">
                                <i class="fas fa-cubes"></i> Quantité en stock
                            </label>
                            <input type="number" class="form-control" id="quantity" name="quantity" min="0"
                                placeholder="0" required>
                        </div>

                        <!-- Statut -->
                        <div class="col-md-6 mb-4">
                            <label for="status" class="form-label">
                                <i class="fas fa-tag"></i> Catégorie
                            </label>
                            <select name="status" id="status" class="form-select" required>
                                <option value="normal" selected>📦 Standard</option>
                                <option value="premium">⭐ Premium</option>
                            </select>
                        </div>
                    </div>

                    <!-- Prix (Tokens) -->
                    <div class="mb-4">
                        <label for="price" class="form-label">
                            <i class="fas fa-coins"></i> Coût en Tokens
                        </label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="price" name="prix" min="0"
                                placeholder="0" required>
                            <span class="input-group-text bg-light fw-bold text-primary">T</span>
                        </div>
                    </div>

                    <!-- Image Upload -->
                    <div class="mb-5">
                        <label class="form-label">
                            <i class="fas fa-image"></i> Photographie du produit
                        </label>
                        <div class="file-upload-wrapper" onclick="document.getElementById('img').click()">
                            <i class="fas fa-cloud-upload-alt fa-2x text-primary mb-2"></i>
                            <p class="mb-1 fw-bold">Cliquez pour séléctionner une image</p>
                            <p class="small text-muted mb-0">Format recommandé : JPG ou PNG (Max 2Mo)</p>
                            <input type="file" name="img" id="img" accept="image/*" class="d-none" required
                                onchange="previewFile()">
                        </div>

                        <!-- Preview Area -->
                        <div id="filePreview">
                            <img src="" id="imgPreviewSrc">
                            <div class="flex-grow-1">
                                <p id="fileNameDisplay" class="mb-0 fw-bold small text-dark"></p>
                                <p class="mb-0 small text-muted">Prêt à être téléchargé</p>
                            </div>
                            <button type="button" class="btn btn-sm btn-outline-danger"
                                onclick="resetFile()">✕</button>
                        </div>
                    </div>

                    <!-- Actions -->
                    <button type="submit" class="btn-submit">
                        <i class="fas fa-check-circle me-2"></i> Enregistrer le produit
                    </button>

                    <div class="text-center">
                        <a href="{{ route('produits.index') }}" class="btn-back">
                            <i class="fas fa-arrow-left"></i> Retour à l'inventaire
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Script pour la preview d'image -->
    <script>
        function previewFile() {
            const preview = document.getElementById('imgPreviewSrc');
            const file = document.getElementById('img').files[0];
            const reader = new FileReader();
            const previewContainer = document.getElementById('filePreview');
            const fileNameDisplay = document.getElementById('fileNameDisplay');

            reader.onloadend = function() {
                preview.src = reader.result;
                previewContainer.style.display = 'flex';
                fileNameDisplay.textContent = file.name;
            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = "";
            }
        }

        function resetFile() {
            document.getElementById('img').value = "";
            document.getElementById('filePreview').style.display = 'none';
        }
    </script>
</body>

</html>
