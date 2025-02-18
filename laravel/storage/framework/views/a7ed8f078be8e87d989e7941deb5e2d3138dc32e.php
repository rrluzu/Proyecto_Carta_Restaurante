
<title>Agregar Producto</title>
<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Agregar Producto</h1>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('products.store')); ?>" method="POST" enctype="multipart/form-data" class="bg-dark text-light">
        <?php echo csrf_field(); ?>

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre:</label> 
            <input type="text" name="nombre" class="form-control bg-secondary text-light border-0" required>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción:</label>
            <textarea name="descripcion" class="form-control bg-secondary text-light border-0" required></textarea>
        </div>

        <div class="mb-3">
            <label for="precio" class="form-label">Precio (€):</label>
            <input type="number" name="precio" step="0.01" class="form-control bg-secondary text-light border-0" required>
        </div>

        <div class="mb-3">
            <label for="imagen" class="form-label">Imagen:</label>
            <input type="file" name="imagen" class="form-control bg-secondary text-light border-0" accept="image/*" required>
        </div>

        <div class="mb-3">
            <label for="categoria_id" class="form-label">Categoría:</label>
            <select name="categoria_id" class="form-control bg-secondary text-light border-0" required>
                <option value="">Seleccione una categoría</option>
                <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($categoria->id_categorias); ?>"><?php echo e($categoria->nombre); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Guardar Producto</button>
        <a href="<?php echo e(route('gest_admin.manager')); ?>" class="btn btn-danger mx-2">Cancelar</a>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Proyecto_Carta_Restaurante_RonyL\laravel\resources\views/gest_admin/createProducts.blade.php ENDPATH**/ ?>