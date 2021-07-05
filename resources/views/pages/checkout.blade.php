@extends('layouts.master')

@section('css')
<style type="text/css">
	#billingDetails input:not([type=checkbox]),
	#billingDetails textarea {
		width: 100%;
	}
</style>
@endsection

@section('content')
	<div class="container">
		<div class="container">
			<div class="row">
				<h3>Have you shopped with us before?</h3>
				<a href="">Sign in</a>
			</div>
		</div>
		<div class="row">
			<div id="billingDetails" class="col-6-sm">
				<h2>Billing Details</h2>
				<input type="email" name="email" placeholder="Email address" value="guzi@gmail.com" disabled>
				<input type="text" name="firstName" placeholder="First name">
				<input type="text" name="lastName" placeholder="Last name">
				<input type="text" name="phone" placeholder="Phone">
				<input type="text" name="city" placeholder="Town/City">
				<input type="text" name="address1" placeholder="Address line 1">
				<input type="text" name="address2" placeholder="Address line 2">
				<input type="text" name="zip" placeholder="Postcode / ZIP">
				<input type="checkbox" name="createAccount" id="createAccount">
				<label for="createAccount">Create an account?</label>
				<input type="checkbox" name="shipDiffAddress" id="shipDiffAddress">
				<label for="shipDiffAddress">Ship to a different address</label>
				<textarea name="notes" placeholder="Notes about your order."></textarea>
				<input type="checkbox" name="newsletter" id="newsletter" checked>
				<label>Subscribe to our newsletter</label>				
			</div>
			<div class="col-6-sm">
				<h2>Your Order</h2>
				<table>
					<thead>
						<tr>
							<th>Product</th>
							<th>Qty</th>
							<th>Subtotal</th>
						</tr>
					</thead>
					<tbody>
						@foreach($cart_items as $item)
						<tr>
							<td>{{$item->product->title}}</td>
							<td>{{$item->quantity}}</td>
							<td>x</td>
							<!-- Careful! Subtotal should be calculated before? Due to offers such as Buy 3 get 1 free  -->
						</tr>
						@endforeach
					</tbody>
				</table>

				<div id="paymentDetails">
					<input type="text" name="cardNumber" placeholder="1234 1234 1234 1234">
					<input type="text" name="expDate" placeholder="MM/YY">
					<input type="text" name="cvc" placeholder="CVC">
				</div>

				<input type="checkbox" name="terms" id="terms">
				<label for="terms">I have read and agree to the website terms and conditions</label>

				<form class="" method="POST" action="">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					
					<button type="submit" class="btn btn-primary">Place Order</button>
					<input type="hidden" name="token" value="{{ Session::token() }}">
				</form>
			</div>
		</div>
	</div>
@endsection