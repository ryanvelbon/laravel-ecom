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
				@empty($cart_items)
					<h2>Your basket is empty!</h2>
					<p>This is not working! PENDING: BUG</p>
				@endempty
				@foreach($cart_items as $cart_item)
					<?php $product = $cart_item->product ?>
					<tr>
						<th scope="row">1</th>
						<td>{{ $product->title }}</td>
						<td>{{ $product->price }}</td>
						<td>
							<form class="cart-item-data-form" method="POST" action="{{ route('cart.updateItem', ['item' => $cart_item->id]) }}">
								<input type="hidden" name="_method" value="PUT">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<input type="number" name="quantity" min="1" value="{{ $cart_item->quantity }}">
								<button type="submit" class="btn btn-outline-primary update-item-btn">Update</button>
								<input type="hidden" name="token" value="{{ Session::token() }}">
							</form>
						</td>
						<td>{{ $product->price * $cart_item->quantity }}</td>
						<td>
							<form method="POST" action="{{ route('cart.removeItem', ['item' => $cart_item->id]) }}">
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
	</section>
@endsection


@section('js')
<script type="text/javascript">

	// unhides "Update" button when customer edits quantity
	$('.cart-item-data-form input').on('change', function(e) {
		$(this).siblings('.update-item-btn').css('visibility', 'visible');
	});

</script>
@endsection