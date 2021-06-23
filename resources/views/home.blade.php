@extends('layouts.master')

@section('css')
<style type="text/css">
	.flex-container {
		display: flex;
		flex-wrap: wrap;
	}
	.card {
		width: 200px;
		margin: 10px;
	}
</style>
@endsection

@section('content')
	<h1>This is the Home Page</h1>
	<div class="flex-container">
		@foreach($products as $product)
			<div class="card">
				<img class="card-img-top" src="{{ asset('img/product.jpeg') }}" alt="Card image" style="width:100%">
				<div class="card-body">
					<a href="#" class="card-link">{{$product->title}}</a>
					<p><small>{{substr($product->description, 0, 60)}}</small></p>
					<strong>€{{$product->price}}</strong>
					<a href="#" class="btn btn-primary stretched-link">Add to Cart</a>
				</div>
			</div>
		@endforeach
	</div>
@endsection