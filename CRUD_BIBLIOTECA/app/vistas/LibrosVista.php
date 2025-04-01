<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca Digital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #3498db;
            --secondary-color: #2c3e50;
            --accent-color: #e74c3c;
            --light-bg: #f8f9fa;
        }
        
        body {
            background-color: #f5f7fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .header {
            background: linear-gradient(135deg, var(--secondary-color), var(--primary-color));
            color: white;
            padding: 2rem 0;
            margin-bottom: 2rem;
            border-radius: 0 0 10px 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease;
        }
        
        .card:hover {
            transform: translateY(-5px);
        }
        
        .table-container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            overflow: hidden;
        }
        
        .table thead {
            background-color: var(--secondary-color);
            color: white;
        }
        
        .table th {
            padding: 1rem;
            font-weight: 500;
        }
        
        .table td {
            vertical-align: middle;
            padding: 1rem;
        }
        
        .action-buttons .btn {
            width: 36px;
            height: 36px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            margin: 0 3px;
            transition: all 0.2s;
        }
        
        .action-buttons .btn:hover {
            transform: scale(1.1);
        }
        
        .btn-add {
            background-color: var(--primary-color);
            border: none;
            padding: 0.5rem 1.5rem;
            border-radius: 30px;
            font-weight: 500;
            transition: all 0.3s;
        }
        
        .btn-add:hover {
            background-color: #2980b9;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        
        .empty-state {
            text-align: center;
            padding: 3rem;
            color: #6c757d;
        }
        
        .empty-state i {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: #dee2e6;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1><i class="fas fa-book-open me-2"></i> Biblioteca Digital</h1>
                    <p class="mb-0">Gestión completa de tu catálogo de libros</p>
                </div>
                <div class="col-md-4 text-end">
                    <a href="<?= RUTA_APP ?>/libros/alta" class="btn btn-light btn-add">
                        <i class="fas fa-plus-circle me-2"></i>Nuevo Libro
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="table-container">
            <?php if (!empty($data)): ?>
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Título</th>
                            <th>Autor</th>
                            <th>Editorial</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $libro): ?>
                        <tr>
                            <td><?= htmlspecialchars($libro['id']) ?></td>
                            <td>
                                <strong><?= htmlspecialchars($libro['titulo']) ?></strong>
                            </td>
                            <td><?= htmlspecialchars($libro['autor']) ?></td>
                            <td><?= htmlspecialchars($libro['editorial']) ?></td>
                            <td class="text-center action-buttons">
                                <a href="<?= RUTA_APP ?>/libros/modificar/<?= $libro['id'] ?>" 
                                   class="btn btn-outline-primary btn-sm"
                                   title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="<?= RUTA_APP ?>/libros/borrar/<?= $libro['id'] ?>" 
                                   class="btn btn-outline-danger btn-sm"
                                   title="Eliminar"
                                   onclick="return confirm('¿Estás seguro de eliminar este libro?')">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                                <a href="<?= RUTA_APP ?>/libros/detalle/<?= $libro['id'] ?>" 
                                   class="btn btn-outline-info btn-sm"
                                   title="Ver detalles">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <div class="empty-state">
                    <i class="fas fa-book"></i>
                    <h3>No hay libros registrados</h3>
                    <p>Comienza agregando nuevos libros a tu biblioteca</p>
                    <a href="<?= RUTA_APP ?>/libros/alta" class="btn btn-primary mt-2">
                        <i class="fas fa-plus-circle me-2"></i>Agregar Primer Libro
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Efecto hover mejorado para filas
        document.querySelectorAll('.table tbody tr').forEach(row => {
            row.addEventListener('mouseenter', () => {
                row.style.transform = 'scale(1.01)';
                row.style.boxShadow = '0 2px 8px rgba(0,0,0,0.1)';
            });
            row.addEventListener('mouseleave', () => {
                row.style.transform = '';
                row.style.boxShadow = '';
            });
        });
    </script>
</body>
</html>