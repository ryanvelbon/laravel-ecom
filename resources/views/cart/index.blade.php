<?php
	$cartIsEmpty = count($cartItems) < 1;
?>

@extends('layouts.master')

@section('css')
	<style type="text/css">
		.update-item-btn {
			visibility: hidden;
		}
	</style>
@endsection

@section('content')
	<h1>Cart</h1>
	@if($cartIsEmpty)
		<div>Your cart is empty!</div>
		<a href="{{ route('home') }}" class="btn btn-primary">See our Products</a>
	@else
		<section id="cartItems">
			<table class="table table-hover">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Item</th>
						<th scope="col">Price</th>
						<th scope="col">Quantity</th>
						<th scope="col">Subtotal</th>
						<th scope="col">Remove</th>
					</tr>
				</thead>
				<tbody>
					@empty($cartItems)
						<h2>Your basket is empty!</h2>
						<p>This is not working! PENDING: BUG</p>
					@endempty
					@foreach($cartItems as $item)
						<?php $product = $item->product ?>
						<tr>
							<th scope="row">1</th>
							<td>{{ $product->title }}</td>
							<td>{{ $product->price }}</td>
							<td>
								<form class="cart-item-data-form" method="POST" action="{{ route('cart.updateItem', ['item' => $item->id]) }}">
									<input type="hidden" name="_method" value="PUT">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<input type="number" name="quantity" min="1" value="{{ $item->quantity }}">
									<button type="submit" class="btn btn-outline-primary update-item-btn">Update</button>
									<input type="hidden" name="token" value="{{ Session::token() }}">
								</form>
							</td>
							<td>{{ $product->price * $item->quantity }}</td>
							<td>
								<form method="POST" action="{{ route('cart.removeItem', ['item' => $item->id]) }}">
									<input type="hidden" name="_method" value="PUT">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<button type="submit" class="btn btn-sm btn-danger">remove</button>
									<input type="hidden" name="token" value="{{ Session::token() }}">
								</form>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</section>
		<section>
			<a href="{{ route('home') }}" class="btn btn-outline-primary">Continue Shopping</a>

			<form>
				<button class="btn btn-outline-primary">Move All to Wishlist</button>
			</form>

			<form method="POST" action="{{ route('cart.removeItemsAll') }}">
				<input type="hidden" name="_method" value="PUT">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<button type="submit" class="btn btn-outline-primary">Clear Shopping Cart</button>
				<input type="hidden" name="token" value="{{ Session::token() }}">
			</form>

			<a href="{{ route('checkout') }}" class="btn btn-primary">Proceed to Checkout</a>
		</section>
	@endif
@endsection


@section('js')
<script type="text/javascript">

	// unhides "Update" button when customer edits quantity
	$('.cart-item-data-form input').on('change', function(e) {
		$(this).siblings('.update-item-btn').css('visibility', 'visible');
	});

</script>
@endsection