@extends('layouts.master')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-6-sm">
				<img src="{{ asset('img/product.jpeg') }}" alt="Product image">
			</div>
			<div class="col-6-sm">
				<h1>{{$product->title}}</h1>
				<small>{{$product->sku}}</small>
				<h2>{{$product->price}}</h2>
				<a href="#" class="btn btn-primary">Add to Cart</a>
				<br>
				<p>{{$product->description}}</p>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<h3>Related Products</h3>
		</div>
	</div>
@endsection