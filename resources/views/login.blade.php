@extends('layouts.master')

@section('content')
	@if($errors->any())
		<div>
			<ul>
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
	<form method="POST" action="{{ route('postLogin') }}">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="email" name="email" id="email" placeholder="Email Address">
		<input type="password" name="password" id="password" placeholder="Password">
		<button type="submit">Submit</button>
		<input type="hidden" name="token" value="{{ Session::token() }}">
	</form>
	<p>Not a member yet? <a href="{{ route('signup') }}">Sign up</a></p>
@endsection