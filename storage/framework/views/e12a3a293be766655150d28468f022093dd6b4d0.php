<?php $__env->startSection('title','Detail Katalog'); ?>

<?php $__env->startSection('content'); ?>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><?php echo e($katalog->judul); ?></h3>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-4">
					<img src="/images/<?php echo e($katalog->gambar); ?>" alt="<?php echo e($katalog->judul); ?>">
				</div>
				<div class="col-md-8">
					<h3>Deskripsi</h3>
					<p><?php echo e($katalog->deskripsi); ?></p>
					<h3>Detail Katalog</h3>
					<ul class="list-group">
						<li class="list-group-item">Harga: Rp. <?php echo e(number_format($katalog->harga)); ?></li>
						<li class="list-group-item">Kondisi: <?php echo e($katalog->kondisi); ?></li>
					</ul>
					<h3>Penjual</h3>
					<ul class="list-group">
						<li class="list-group-item">Lokasi: <?php echo e($katalog->lokasi); ?></li>
						<li class="list-group-item">Email: <?php echo e($katalog->email); ?></li>
						<li class="list-group-item">Telpon: <?php echo e($katalog->telpon); ?></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>