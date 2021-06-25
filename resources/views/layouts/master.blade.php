<!DOCTYPE html>
<html>
<head>
	<title>Laravel eCommerce</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

	<meta name="_token" content="{{ csrf_token() }}">

	@yield('css')
</head>
<body>
	<header>
		<nav class="navbar navbar-light bg-light justify-content-between">
			<a href="{{ route('home') }}" class="navbar-brand">MyShop</a>
			<form class="form-inline">
				<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
				<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
			</form>
			@if(Auth::check())
				<span>Hello, {{ Auth::user()->first_name }}</span>
				<a href="{{ route('logout') }}">Logout</a>
			@else
				<a href="{{ route('login') }}">Login</a>
				<a href="{{ route('signup') }}">Register</a>
			@endif
			<a href="{{ route('cart.index') }}" class="btn btn-info">
				Cart
				<span class="badge badge-light" id="nCartItems">
					@if(Auth::check())
						{{ count(Auth::user()->cart) }}
					@else
						{{ App\Models\CartItem::where('session_token', Session::token())->where('active', 1)->count(); }}
					@endif
				</span>
			</a>
		</nav>
		<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="#">Link 1</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Link 2</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Link 3</a>
				</li>
			</ul>
		</nav>
	</header>
	@if(session('success'))
		<div class="alert alert-success">
			<strong>Success!</strong> {{session('success')}}
		</div>
	@endif

	@if(session('error'))
		<div class="alert alert-danger">
			<strong>Warning!</strong> {{session('error')}}
		</div>
	@endif

	<section id="content">
		@yield('content')
	</section>

	<section id="customJS">
		<script type="text/javascript" src="{{ asset('js/app.js')}}"></script>
		@yield('js')
	</section>
</body>
</html>