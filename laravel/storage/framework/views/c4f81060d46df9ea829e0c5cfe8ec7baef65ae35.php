
<title>Agregar Categoría</title>
<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Crear Categoría</h1>
    <?php if(session('danger')): ?>
        <div class="alert alert-danger">
            <?php echo e(session('danger')); ?>

        </div>
    <?php endif; ?>
    <form action="<?php echo e(route('categories.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <div class="mb-3">
                <label for="nombre">Nombre de la Categoría:</label>
                <input type="text" name="nombre" class="form-control bg-secondary text-light border-0" value="<?php echo e(old('nombre', $categoria->nombre)); ?>" required>
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción:</label>
                <textarea name="descripcion" class="form-control bg-secondary text-light border-0" required><?php echo e($categoria->descripcion); ?></textarea>
            </div>
        </div>
        <button type="submit" class="btn btn-success">Guardar Categoría</button>
        <a href="<?php echo e(route('gest_admin.manager')); ?>" class="btn btn-danger mx-2">Cancelar</a>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Proyecto_Carta_Restaurante_RonyL\laravel\resources\views/gest_admin/createCategories.blade.php ENDPATH**/ ?>