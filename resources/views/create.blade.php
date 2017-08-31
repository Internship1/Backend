@extends('layouts.main')

@section('title','Buat Katalog')

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Tambah Katalog</h3>
		</div>
		<div class="panel-body">
			{!! Form::open(['action' => 'KatalogController@store', 'enctype' => 'multipart/form-data']) !!}

			<div class="form-group">
				{!! Form::label('judul', 'Judul/Nama') !!}
				{!! Form::text('judul', $value=null, $attribute = ['class' => 'form-control', 'nama' => 'judul']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('kategori_id', 'Kategori') !!}
				<select name="kategori_id" class="form-control">
					<option value="">- Pilih Salah Satu -</option>
					<option value="1">Smartphone</option>
					<option value="2">Tablet</option>
					<option value="3">Laptop</option>
					<option value="4">PC Desktop</option>
				</select>
			</div>

			<div class="form-group">
				{!! Form::label('deskripsi', 'Deskripsi') !!}
				{!! Form::textarea('deskripsi', $value=null, $attribute = ['class' => 'form-control', 'name' => 'deskripsi', 'style' => 'resize:none']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('harga', 'Harga') !!}
				{!! Form::text('harga', $value=null, $attribute = ['class' => 'form-control', 'name' => 'harga']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('kondisi', 'Kondisi') !!}
				{!! Form::select('kondisi', array(
					'0' => '- Pilih Salah Satu -',
					'Baru' => 'Baru',
					'Bekas' => 'Bekas',
					), '0', $attribute = ['class' => 'form-control', 'name' => 'kondisi']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('gambar', 'Gambar/Foto') !!}
				{!! Form::file('gambar', $value=null, $attribute = ['class' => 'btn btn-default']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('lokasi', 'Lokasi') !!}
				{!! Form::text('lokasi', $value=null, $attribute = ['class' => 'form-control', 'name' => 'lokasi']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('email', 'Email') !!}
				{!! Form::text('email', $value=null, $attribute = ['class' => 'form-control', 'name' => 'email']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('telpon', 'Telpon') !!}
				{!! Form::text('telpon', $value=null, $attribute = ['class' => 'form-control', 'name' => 'telpon']) !!}
			</div>

			{!! Form::submit('simpan', $attribute = ['class' => 'btn btn-primary']) !!}

			{!! Form::close() !!}
			<a href="/" title="Back"><button class="btn btn-danger">Back</button></a>
		</div>
		
	</div>
@endsection