<?php $__env->startSection('title', 'Beranda'); ?>

<?php $__env->startSection('content'); ?>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Katalog Terbaru</h3>
		</div>
		<div class="panel-body">
			<div class="row">
				<?php $__currentLoopData = $katalog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="col-md-4">
					<a href="/katalog/<?php echo e($row->id); ?>">
						<img src="/images/<?php echo e($row->gambar); ?>" alt="<?php echo e($row->judul); ?>">
					</a>
					<h4><a href="katalog/<?php echo e($row->id); ?>"><?php echo e($row->judul); ?></a></h4>
					<h5>Rp. <?php echo e(number_format($row->harga)); ?></h5>
					<p><?php echo e($row->deskripsi); ?></p>
				</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>