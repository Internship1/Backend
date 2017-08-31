<?php $__env->startSection('title','Buat Katalog'); ?>

<?php $__env->startSection('content'); ?>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Tambah Katalog</h3>
		</div>
		<div class="panel-body">
			<?php echo Form::open(['action' => 'KatalogController@store', 'enctype' => 'multipart/form-data']); ?>


			<div class="form-group">
				<?php echo Form::label('judul', 'Judul/Nama'); ?>

				<?php echo Form::text('judul', $value=null, $attribute = ['class' => 'form-control', 'nama' => 'judul']); ?>

			</div>

			<div class="form-group">
				<?php echo Form::label('kategori_id', 'Kategori'); ?>

				<select name="kategori_id" class="form-control">
					<option value="">- Pilih Salah Satu -</option>
					<option value="1">Smartphone</option>
					<option value="2">Tablet</option>
					<option value="3">Laptop</option>
					<option value="4">PC Desktop</option>
				</select>
			</div>

			<div class="form-group">
				<?php echo Form::label('deskripsi', 'Deskripsi'); ?>

				<?php echo Form::textarea('deskripsi', $value=null, $attribute = ['class' => 'form-control', 'name' => 'deskripsi', 'style' => 'resize:none']); ?>

			</div>

			<div class="form-group">
				<?php echo Form::label('harga', 'Harga'); ?>

				<?php echo Form::text('harga', $value=null, $attribute = ['class' => 'form-control', 'name' => 'harga']); ?>

			</div>

			<div class="form-group">
				<?php echo Form::label('kondisi', 'Kondisi'); ?>

				<?php echo Form::select('kondisi', array(
					'0' => '- Pilih Salah Satu -',
					'Baru' => 'Baru',
					'Bekas' => 'Bekas',
					), '0', $attribute = ['class' => 'form-control', 'name' => 'kondisi']); ?>

			</div>

			<div class="form-group">
				<?php echo Form::label('gambar', 'Gambar/Foto'); ?>

				<?php echo Form::file('gambar', $value=null, $attribute = ['class' => 'btn btn-default']); ?>

			</div>

			<div class="form-group">
				<?php echo Form::label('lokasi', 'Lokasi'); ?>

				<?php echo Form::text('lokasi', $value=null, $attribute = ['class' => 'form-control', 'name' => 'lokasi']); ?>

			</div>

			<div class="form-group">
				<?php echo Form::label('email', 'Email'); ?>

				<?php echo Form::text('email', $value=null, $attribute = ['class' => 'form-control', 'name' => 'email']); ?>

			</div>

			<div class="form-group">
				<?php echo Form::label('telpon', 'Telpon'); ?>

				<?php echo Form::text('telpon', $value=null, $attribute = ['class' => 'form-control', 'name' => 'telpon']); ?>

			</div>

			<?php echo Form::submit('simpan', $attribute = ['class' => 'btn btn-primary']); ?>


			<?php echo Form::close(); ?>

			<a href="/" title="Back"><button class="btn btn-danger">Back</button></a>
		</div>
		
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>