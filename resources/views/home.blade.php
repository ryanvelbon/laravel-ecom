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
	<div class="flex-container">
		@foreach($products as $product)
			<div class="card">
				<img class="card-img-top" src="{{ asset('img/product.jpeg') }}" alt="Card image" style="width:100%">
				<div class="card-body">
					<a href="/products/{{$product->slug}}" class="card-link">{{$product->title}}</a>
					<p><small>{{substr($product->description, 0, 60)}}</small></p>
					<strong>€{{$product->price}}</strong>
					<form class="add-to-cart-form" method="POST" action="{{ route('cart.addItem') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="product_id" value="{{ $product->id }}">
						<input type="number" name="quantity" value="1">
						<button type="submit" class="btn btn-primary">Add to Cart</button>
						<input type="hidden" name="token" value="{{ Session::token() }}">
					</form>
				</div>
			</div>
		@endforeach
	</div>
@endsection

@section('js')
	<script type="text/javascript" src="{{ asset('js/cart.js') }}"></script>
@endsection