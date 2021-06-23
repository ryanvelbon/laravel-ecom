@extends('layouts.master')

@section('content')
<form method="POST" action="{{ route('postSignup') }}">
	@if($errors->any())
		<div>
			<ul>
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input type="text" name="firstName" id="firstName" placeholder="First Name" value="{{ old('firstName') }}" autocomplete="off" required>
	<input type="text" name="lastName" id="lastName" placeholder="Last Name" value="{{ old('lastName') }}" autocomplete="off" required>
	<input type="email" name="email" id="email" placeholder="Email Address" value="{{ old('email') }}" autocomplete="off" required>
	<input type="text" name="phone" id="phone" placeholder="Phone Number (+356)" value="{{ old('phone') }}" autocomplete="off" required>
	<input type="password" name="password" id="password" placeholder="Password" autocomplete="off" required>
	<input type="password" name="password_confirmation" id="passwordConfirm" placeholder="Password Again" autocomplete="off" required>
	<button type="submit">Submit</button>
	<input type="hidden" name="token" value="{{ Session::token() }}">
</form>
<p>Already a member? <a href="{{ route('login') }}">Log in</a></p>
@endsection