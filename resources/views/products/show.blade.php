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

				<form class="add-to-cart-form" method="POST" action="{{ route('cart.addItem') }}">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="product_id" value="{{ $product->id }}">
					<input type="number" name="quantity" value="1">
					<button type="submit" class="btn btn-primary">Add to Cart</button>
					<input type="hidden" name="token" value="{{ Session::token() }}">
				</form>

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