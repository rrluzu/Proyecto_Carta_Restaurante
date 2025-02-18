
<title>Editar Anuncio</title>
<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Editar Anuncio</h1>
    <?php if(session('danger')): ?>
        <div class="alert alert-danger">
            <?php echo e(session('danger')); ?>

        </div>
    <?php endif; ?>
    <!-- Mostrar errores de validación -->
    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <!-- Formulario para editar el anuncio -->
    <form action="<?php echo e(route('anuncios.actualizar', $anuncio->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="mb-3">
            <label for="titulo" class="form-label">Título:</label>
            <input type="text" name="titulo" class="form-control bg-secondary text-light border-0" value="<?php echo e(old('titulo', $anuncio->titulo)); ?>" required maxlength="150">
        </div>

        <div class="mb-3">
            <label for="mensaje" class="form-label">Mensaje:</label>
            <textarea name="mensaje" class="form-control bg-secondary text-light border-0" rows="4" required maxlength="500"><?php echo e(old('mensaje', $anuncio->mensaje)); ?></textarea>
        </div>

        <div class="mb-3">
            <label for="fecha_inicio" class="form-label">Fecha de Inicio:</label>
            <input type="date" name="fecha_inicio" class="form-control bg-secondary text-light border-0" value="<?php echo e(old('fecha_inicio', $anuncio->fecha_inicio)); ?>" required min="<?php echo e(old('fecha_inicio', $anuncio->fecha_inicio)); ?>">
        </div>

        <div class="mb-3">
            <label for="fecha_fin" class="form-label">Fecha de Fin:</label>
            <input type="date" name="fecha_fin" class="form-control bg-secondary text-light border-0" value="<?php echo e(old('fecha_fin', $anuncio->fecha_fin)); ?>" required min="<?php echo e(\Carbon\Carbon::now()->format('Y-m-d')); ?>">
        </div>

        <button type="submit" class="btn btn-success">Guardar Cambios</button>
        <a href="<?php echo e(route('gest_admin.manager')); ?>" class="btn btn-danger mx-2">Cancelar</a>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Proyecto_Carta_Restaurante_RonyL\laravel\resources\views/gest_admin/modifyAnnouncements.blade.php ENDPATH**/ ?>