<!DOCTYPE html>
<html>
<head>
    <title>Editar Libro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h3>Editar Libro</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="<?= RUTA_APP ?>/libros/modificar/<?= $data['id'] ?? '' ?>">
                <input type="hidden" name="id" value="<?= $data['id'] ?? '' ?>">
                
                <div class="mb-3">
                    <label class="form-label">Título</label>
                    <input type="text" name="titulo" 
                           value="<?= htmlspecialchars($data['titulo'] ?? '') ?>" 
                           class="form-control" required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Autor</label>
                    <input type="text" name="autor" 
                           value="<?= htmlspecialchars($data['autor'] ?? '') ?>" 
                           class="form-control" required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Editorial</label>
                    <input type="text" name="editorial" 
                           value="<?= htmlspecialchars($data['editorial'] ?? '') ?>" 
                           class="form-control" required>
                </div>
                
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                <a href="<?= RUTA_APP ?>/libros" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</body>
</html>