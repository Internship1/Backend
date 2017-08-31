@extends('layouts.main')

@section('title','Detail Katalog')

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">{{$katalog->judul}}</h3>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-4">
					<img src="/images/{{$katalog->gambar}}" alt="{{$katalog->judul}}">
				</div>
				<div class="col-md-8">
					<h3>Deskripsi</h3>
					<p>{{$katalog->deskripsi}}</p>
					<h3>Detail Katalog</h3>
					<ul class="list-group">
						<li class="list-group-item">Harga: Rp. {{number_format($katalog->harga)}}</li>
						<li class="list-group-item">Kondisi: {{$katalog->kondisi}}</li>
					</ul>
					<h3>Penjual</h3>
					<ul class="list-group">
						<li class="list-group-item">Lokasi: {{$katalog->lokasi}}</li>
						<li class="list-group-item">Email: {{$katalog->email}}</li>
						<li class="list-group-item">Telpon: {{$katalog->telpon}}</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
@endsection