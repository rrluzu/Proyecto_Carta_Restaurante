<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta la Carta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="icon" href="<?php echo e(asset('favicon.ico')); ?>" type="image/x-icon">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
</head>
<body class="bg-dark text-light container" style="font-family: Nunito">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo e(route('index')); ?>">CARTA DEL RESTAURANTE</a>
            <!-- Barra de Búsqueda -->
            <form action="<?php echo e(route('index')); ?>" method="GET" class="d-flex ms-auto">
                <input type="text" name="buscar" class="form-control" placeholder="Buscar producto..." value="<?php echo e(request('buscar')); ?>">
                <button type="submit" class="btn btn-secondary ms-2">Buscar</button>
            </form>
        </div>
    </nav>
    <section class="mt-4 mb-4">
        <h1 class="text-center text-light">CARTA DEL RESTAURANTE</h1>

        <!-- Anuncios Activos -->
        <?php if($anunciosActivos->isNotEmpty()): ?>
            <div class="alert alert-dark text-dark" role="alert" id="anuncios-activos">
                <h4 class="alert-heading">📢 ANUNCIOS ACTIVOS</h4>
                <hr class="border-light">
                <?php $__currentLoopData = $anunciosActivos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $anuncio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="mb-2">
                        <strong><?php echo e($anuncio->titulo); ?></strong>
                        <p><?php echo e($anuncio->mensaje); ?></p>
                        <small class="text-muted">🗓️ Vigente desde <?php echo e($anuncio->fecha_inicio); ?> hasta <?php echo e($anuncio->fecha_fin); ?></small>
                    </div>
                    <?php if(!$loop->last): ?>
                        <hr class="border-light"> <!-- Separador entre anuncios -->
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <!-- Barra de Progreso -->
                <div class="progress mt-3" style="height: 5px;">
                    <div id="barra-progreso" class="progress-bar bg-danger" role="progressbar"
                        style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <!-- Contenido principal -->
    <div class="row">
        <!-- Menú de Categorías -->
        <div class="col-md-3 mt-3">
            <div id="menuCategorias" class="position-sticky" style="top: 20px; max-height: 80vh; overflow-y: auto;">
                <div class="list-group" id="categories">
                    <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a class="list-group-item list-group-item-dark list-group-item-action" href="#categoria-<?php echo e($categoria->id_categorias); ?>">
                            <?php echo e($categoria->nombre); ?>

                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>

        <!-- Productos con ScrollSpy -->
        <div class="col-md-9" data-bs-spy="scroll" data-bs-target="#categories" data-bs-offset="100" tabindex="0">
            <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div id="categoria-<?php echo e($categoria->id_categorias); ?>" class="my-4">
                    <h3 class="text-light"><?php echo e($categoria->nombre); ?></h3>
                    <div class="row">
                        <?php $__currentLoopData = $categoria->productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-4">
                                <div class="card mb-4 bg-secondary text-light border-0">
                                    <img src="<?php echo e($producto->getFirstMediaUrl('imagenes', 'thumb')); ?>" class="card-img-top" alt="<?php echo e($producto->nombre); ?>">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo e($producto->nombre); ?></h5>
                                        <p class="card-text"><?php echo e($producto->descripcion); ?></p>
                                        <p class="card-text"><strong><?php echo e($producto->precio); ?>€</strong></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

    </section>
    <footer class="bg-dark text-light text-center py-3 fixed-bottom pt-3 pb-0">
        <p>Rony Luzuriaga | 2025</p>
    </footer>
    <!-- Estilos adicionales -->
    <style>
        .card-img-top {
            height: 200px; /* Ajusta la altura de las imágenes */
            object-fit: cover;
        }
    </style>

    <script>
        // Activar ScrollSpy
        document.addEventListener('DOMContentLoaded', function () {
            var scrollSpy = new bootstrap.ScrollSpy(document.querySelector('[data-bs-spy="scroll"]'), {
                target: '#categories',
                offset: 100
            });
        });

        document.addEventListener('DOMContentLoaded', function () {
            const alerta = document.getElementById('anuncios-activos');
            const barraProgreso = document.getElementById('barra-progreso');
            const duracion = 10000; // 10 segundos
            const intervalo = 100;  // Intervalo de actualización en ms
            let tiempoRestante = duracion;

            if (alerta && barraProgreso) {
                const timer = setInterval(() => {
                    tiempoRestante -= intervalo;
                    const porcentaje = (tiempoRestante / duracion) * 100;
                    barraProgreso.style.width = `${porcentaje}%`;

                    if (tiempoRestante <= 0) {
                        clearInterval(timer);
                        alerta.classList.remove('show');
                        alerta.classList.add('fade');

                        setTimeout(() => {
                            alerta.style.display = 'none';
                        }, 500); // Esperar que la animación de fade-out termine
                    }
                }, intervalo);
            }
        });
    </script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\Proyecto_Carta_Restaurante_RonyL\laravel\resources\views/index.blade.php ENDPATH**/ ?>