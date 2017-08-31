@extends('layouts.main')

@section('title', 'Beranda')

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Katalog Terbaru</h3>
		</div>
		<div class="panel-body">
			<div class="row">
				@foreach($katalog as $row)
				<div class="col-md-4">
					<a href="/katalog/{{$row->id}}">
						<img src="/images/{{$row->gambar}}" alt="{{$row->judul}}">
					</a>
					<h4><a href="katalog/{{$row->id}}">{{$row->judul}}</a></h4>
					<h5>Rp. {{number_format($row->harga)}}</h5>
					<p>{{$row->deskripsi}}</p>
				</div>
				@endforeach
			</div>
		</div>
	</div>
@endsection