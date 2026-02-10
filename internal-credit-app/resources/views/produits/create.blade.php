<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un nouveau produit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #6366f1;
            --secondary-color: #8b5cf6;
            --success-color: #10b981;
            --dark-color: #1f2937;
            --light-bg: #f9fafb;
            --border-color: #e5e7eb;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #f3f4f6;
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 2rem 0;
        }

        .form-container {
            max-width: 700px;
            margin: 0 auto;
            padding: 0 1rem;
        }

        .form-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            overflow: hidden;
        }

        .form-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            padding: 2.5rem 2rem;
            text-align: center;
            color: white;
        }

        .form-header i {
            font-size: 3rem;
            margin-bottom: 1rem;
            opacity: 0.9;
        }

        .form-header h1 {
            font-size: 1.8rem;
            font-weight: 700;
            margin: 0;
        }

        .form-header p {
            margin: 0.5rem 0 0 0;
            opacity: 0.9;
            font-size: 0.95rem;
        }

        .form-body {
            padding: 2.5rem 2rem;
        }

        .form-group {
            margin-bottom: 1.8rem;
        }

        .form-label {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 0.6rem;
            font-size: 0.95rem;
        }

        .form-label i {
            color: var(--primary-color);
            font-size: 1rem;
        }

        .form-label .required {
            color: #ef4444;
            margin-left: 0.2rem;
        }

        .form-control, .form-select {
            border: 2px solid var(--border-color);
            border-radius: 12px;
            padding: 0.85rem 1rem;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            background: white;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1);
            outline: none;
        }

        .form-control:hover, .form-select:hover {
            border-color: #cbd5e1;
        }

        .file-input-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
            width: 100%;
        }

        .file-input-label {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.8rem;
            padding: 2rem;
            border: 2px dashed var(--border-color);
            border-radius: 12px;
            background: var(--light-bg);
            cursor: pointer;
            transition: all 0.3s ease;
            text-align: center;
        }

        .file-input-label:hover {
            border-color: var(--primary-color);
            background: rgba(99, 102, 241, 0.05);
        }

        .file-input-label i {
            font-size: 2rem;
            color: var(--primary-color);
        }

        .file-input-text {
            display: flex;
            flex-direction: column;
            gap: 0.3rem;
        }

        .file-input-text strong {
            color: var(--dark-color);
            font-size: 0.95rem;
        }

        .file-input-text small {
            color: #6b7280;
            font-size: 0.85rem;
        }

        .file-input-wrapper input[type="file"] {
            position: absolute;
            left: -9999px;
        }

        .file-preview {
            margin-top: 1rem;
            display: none;
            align-items: center;
            gap: 1rem;
            padding: 1rem;
            background: var(--light-bg);
            border-radius: 12px;
        }

        .file-preview img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 8px;
        }

        .file-preview-info {
            flex: 1;
        }

        .file-preview-name {
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 0.3rem;
        }

        .file-preview-size {
            font-size: 0.85rem;
            color: #6b7280;
        }

        .file-preview-remove {
            background: #ef4444;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            cursor: pointer;
            font-size: 0.85rem;
            transition: all 0.3s ease;
        }

        .file-preview-remove:hover {
            background: #dc2626;
        }

        .input-group-custom {
            position: relative;
        }

        .input-icon {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
            pointer-events: none;
        }

        .form-actions {
            display: flex;
            gap: 1rem;
            margin-top: 2.5rem;
            padding-top: 2rem;
            border-top: 2px solid var(--border-color);
        }

        .btn-submit {
            flex: 1;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border: none;
            padding: 1rem 2rem;
            border-radius: 12px;
            color: white;
            font-weight: 600;
            font-size: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.6rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(99, 102, 241, 0.4);
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(99, 102, 241, 0.6);
        }

        .btn-back {
            background: white;
            border: 2px solid var(--border-color);
            padding: 1rem 2rem;
            border-radius: 12px;
            color: var(--dark-color);
            font-weight: 600;
            font-size: 1rem;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.6rem;
            transition: all 0.3s ease;
        }

        .btn-back:hover {
            border-color: var(--primary-color);
            color: var(--primary-color);
            background: rgba(99, 102, 241, 0.05);
        }

        .input-help {
            font-size: 0.85rem;
            color: #6b7280;
            margin-top: 0.4rem;
            display: flex;
            align-items: center;
            gap: 0.4rem;
        }

        .input-help i {
            font-size: 0.75rem;
        }

        @media (max-width: 576px) {
            .form-header {
                padding: 2rem 1.5rem;
            }

            .form-header h1 {
                font-size: 1.5rem;
            }

            .form-body {
                padding: 2rem 1.5rem;
            }

            .form-actions {
                flex-direction: column-reverse;
            }

            .file-input-label {
                padding: 1.5rem 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <div class="form-card">
            <!-- Header -->
            <div class="form-header">
                <i class="fas fa-box-open"></i>
                <h1>Créer un nouveau produit</h1>
                <p>Remplissez les informations ci-dessous pour ajouter un produit</p>
            </div>

            <!-- Body -->
            <div class="form-body">
                <form action="{{ route('produits.store') }}" method="POST" enctype="multipart/form-data" id="productForm">
                    @csrf
                    
                    <!-- Titre -->
                    <div class="form-group">
                        <label for="title" class="form-label">
                            <i class="fas fa-tag"></i>
                            Titre du produit
                            <span class="required">*</span>
                        </label>
                        <input type="text" 
                               class="form-control" 
                               id="title" 
                               name="title" 
                               placeholder="Ex: iPhone 15 Pro Max"
                               required>
                        <div class="input-help">
                            <i class="fas fa-info-circle"></i>
                            Donnez un nom clair et descriptif à votre produit
                        </div>
                    </div>
                    
                    <!-- Quantité et Statut -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="quantity" class="form-label">
                                    <i class="fas fa-boxes"></i>
                                    Quantité
                                    <span class="required">*</span>
                                </label>
                                <input type="number" 
                                       class="form-control" 
                                       id="quantity" 
                                       name="quantity" 
                                       min="0" 
                                       placeholder="0"
                                       required>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="statuts" class="form-label">
                                    <i class="fas fa-star"></i>
                                    Statut
                                    <span class="required">*</span>
                                </label>
                                <select name="statuts" id="statuts" class="form-select" required>
                                    <option value="">Sélectionner un statut</option>
                                    <option value="premium">⭐ Premium</option>
                                    <option value="normal">📦 Normal</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Prix -->
                    <div class="form-group">
                        <label for="price" class="form-label">
                            <i class="fas fa-euro-sign"></i>
                            Prix
                            <span class="required">*</span>
                        </label>
                        <div class="input-group-custom">
                            <input type="number" 
                                   class="form-control" 
                                   id="price" 
                                   name="prix" 
                                   min="0" 
                                   step="0.01"
                                   placeholder="0.00"
                                   required>
                            <span class="input-icon">€</span>
                        </div>
                        <div class="input-help">
                            <i class="fas fa-info-circle"></i>
                            Prix en euros (décimales acceptées)
                        </div>
                    </div>

                    <!-- Image -->
                    <div class="form-group">
                        <label for="img" class="form-label">
                            <i class="fas fa-image"></i>
                            Image du produit
                            <span class="required">*</span>
                        </label>
                        <div class="file-input-wrapper">
                            <label for="img" class="file-input-label" id="fileLabel">
                                <i class="fas fa-cloud-upload-alt"></i>
                                <div class="file-input-text">
                                    <strong>Cliquez pour télécharger une image</strong>
                                    <small>PNG, JPG, GIF ou SVG (Max. 2MB)</small>
                                </div>
                            </label>
                            <input type="file" 
                                   name="img" 
                                   id="img" 
                                   accept="image/*"
                                   required>
                        </div>
                        <div class="file-preview" id="filePreview">
                            <img src="" alt="Preview" id="previewImage">
                            <div class="file-preview-info">
                                <div class="file-preview-name" id="fileName"></div>
                                <div class="file-preview-size" id="fileSize"></div>
                            </div>
                            <button type="button" class="file-preview-remove" id="removeFile">
                                <i class="fas fa-times"></i> Supprimer
                            </button>
                        </div>
                    </div>
                    
                    <!-- Actions -->
                    <div class="form-actions">
                        <a href="{{ route('produits.index') }}" class="btn-back">
                            <i class="fas fa-arrow-left"></i>
                            Retour
                        </a>
                        <button type="submit" class="btn-submit">
                            <i class="fas fa-check"></i>
                            Créer le produit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>