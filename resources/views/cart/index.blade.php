@extends('layouts.master')

@section('content')
	<h1>Cart</h1>
	<section id="cartItems">
		<table class="table table-hover">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Product</th>
					<th scope="col">Price per Unit</th>
					<th scope="col">Quantity</th>
					<th scope="col">Price</th>
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
						<td>{{ $cart_item->quantity }}</td>
						<td>{{ $product->price * $cart_item->quantity }}</td>
						<td>
							<form method="POST" action="{{ route('cart.removeItem', ['item' => $cart_item->id]) }}">
								<input type="hidden" name="_method" value="PUT">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<button class="btn btn-sm btn-danger" type="submit">remove</button>
								<input type="hidden" name="token" value="{{ Session::token() }}">
							</form>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</section>
@endsection