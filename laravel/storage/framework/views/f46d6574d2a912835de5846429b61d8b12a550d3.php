
<title>Panel de Administrador</title>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php if(session('success')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>
            <?php if(session('danger')): ?>
                <div class="alert alert-danger">
                    <?php echo e(session('danger')); ?>

                </div>
            <?php endif; ?>
            <div class="card text-white bg-dark">
                <div class="card-header">
                    <span class="h2">Listado de Productos</span>
                    <a href="<?php echo e(route('products.create')); ?>" class="btn btn-success float-end">Agregar Producto</a>
                </div>
                <div class="card-body">
                <?php if($productos->isEmpty()): ?>
                    <p>No hay productos registrados.</p>
                <?php else: ?>
                    <table class="table table-dark table-striped">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Precio</th>
                                <th>Categoría</th>
                                <th>Imagen</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="<?php echo e($index >= 4 ? 'd-none extra-producto' : ''); ?>">
                                    <td><?php echo e($producto->nombre); ?></td>
                                    <td><?php echo e($producto->descripcion); ?></td>
                                    <td><?php echo e($producto->precio); ?>€</td>
                                    <td><?php echo e($producto->categoria->nombre ?? 'Sin categoría'); ?></td>
                                    <td>
                                        <img src="<?php echo e($producto->getFirstMediaUrl('imagenes', 'thumb')); ?>" alt="<?php echo e($producto->nombre); ?>" width="100">
                                    </td>
                                    <td>
                                        <a href="<?php echo e(route('productos.editar', $producto->id)); ?>" class="btn btn-warning">Editar</a>
                                        <form action="<?php echo e(route('productos.eliminar', $producto->id)); ?>" method="POST" style="display:inline;">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este producto?')">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>

                    <!-- Botón para mostrar más/menos -->
                    <?php if($productos->count() > 4): ?>
                        <div class="text-center mt-3">
                            <button id="toggleProductos" class="btn btn-dark">Mostrar más</button>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="col-md-12 mt-3">
            <div class="card text-white bg-dark">
                <div class="card-header">
                    <span class="h2">Listado de Categorías</span>
                    <a href="<?php echo e(route('categories.create')); ?>" class="btn btn-success float-end">Agregar Categoría</a>
                </div>
                <div class="card-body">
                <?php if($categorias->isEmpty()): ?>
                    <p>No hay categorías registradas.</p>
                <?php else: ?>
                <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="<?php echo e($index >= 4 ? 'd-none extra-categoria' : ''); ?>">
                                <td><?php echo e($categoria->nombre); ?></td>
                                <td><?php echo e($categoria->descripcion); ?></td>
                                <td>
                                    <!-- Enlace a la vista de edición de cada categoría -->
                                    <a href="<?php echo e(route('categorias.editar', $categoria->id_categorias)); ?>" class="btn btn-warning">Editar</a>
                                    <!-- Formulario para Eliminar Categoría -->
                                    <form action="<?php echo e(route('categorias.eliminar', $categoria->id_categorias)); ?>" method="POST" style="display:inline;">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>

                                        <!-- Botón con confirmación antes de eliminar -->
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta categoría?')">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                    <!-- Botón para mostrar más/menos -->
                    <?php if($categorias->count() > 4): ?>
                        <div class="text-center mt-3">
                            <button id="toggleCategorias" class="btn btn-dark">Mostrar más</button>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="col-md-12 mt-3 mb-5">
            <div class="card text-white bg-dark">
                <div class="card-header">
                    <span class="h2">Listado de Anuncios</span>
                    <a href="<?php echo e(route('anuncios.create')); ?>" class="btn btn-success float-end">Agregar Anuncio</a>
                </div>
                <div class="card-body">
                <?php if($anuncios->isEmpty()): ?>
                    <p>No hay anuncios registrados.</p>
                <?php else: ?>
                    <table class="table table-dark table-striped">
                        <thead>
                            <tr>
                                <th>Título</th>
                                <th>Mensaje</th>
                                <th>Fecha de Inicio</th>
                                <th>Fecha de Fin</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $anuncios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $anuncio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="<?php echo e($index >= 4 ? 'd-none extra-anuncio' : ''); ?>">
                                <td><?php echo e($anuncio->titulo); ?></td>
                                <td><?php echo e($anuncio->mensaje); ?></td>
                                <td><?php echo e($anuncio->fecha_inicio); ?></td>
                                <td><?php echo e($anuncio->fecha_fin); ?></td>
                                <td>
                                    <!-- Enlace para Modificar -->
                                    <a href="<?php echo e(route('anuncios.editar', $anuncio->id)); ?>" class="btn btn-warning mb-2">Editar</a>

                                    <!-- Formulario para Eliminar -->
                                    <form action="<?php echo e(route('anuncios.eliminar', $anuncio->id)); ?>" method="POST" style="display:inline;">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>

                                        <button type="submit" class="btn btn-danger mb-2" onclick="return confirm('¿Estás seguro de que deseas eliminar este anuncio?')">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <!-- Botón para mostrar más/menos -->
                    <?php if($anuncios->count() > 4): ?>
                        <div class="text-center mt-3">
                            <button id="toggleAnuncios" class="btn btn-dark">Mostrar más</button>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        function toggleItems(idBoton, clase) {
            const btnToggle = document.getElementById(idBoton);
            const extraItems = document.querySelectorAll(`.${clase}`);

            if (btnToggle && extraItems.length > 0) {
                btnToggle.addEventListener('click', function () {
                    const isHidden = extraItems[0].classList.contains('d-none');
                    extraItems.forEach(el => el.classList.toggle('d-none', !isHidden));
                    btnToggle.textContent = isHidden ? 'Mostrar menos' : 'Mostrar más';
                });
            }
        }

        toggleItems('toggleProductos', 'extra-producto');
        toggleItems('toggleCategorias', 'extra-categoria');
        toggleItems('toggleAnuncios', 'extra-anuncio');
    });
</script>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Proyecto_Carta_Restaurante_RonyL\laravel\resources\views/gest_admin/manager.blade.php ENDPATH**/ ?>