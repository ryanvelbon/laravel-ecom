<!DOCTYPE html>
<html>
<head>
	<title>Laravel eCommerce</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" integrity="undefined" crossorigin="anonymous">
	<!-- <link rel="stylesheet" type="text/css" href="{{ asset('css/admin.css') }}"> -->
	@yield('css')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<header>
		<nav class="navbar navbar-light bg-light justify-content-between">
			<a href="{{ route('admin.dashboard') }}" class="navbar-brand">MyShop | Admin Panel</a>
			@if(Auth::guard('admin')->check())
				<span>Hello, {{ Auth::guard('admin')->user()->name }}</span>
				<a href="{{ route('admin.logout') }}">Logout</a>
			@else
				<a href="{{ route('admin.login') }}">Login</a>
			@endif
		</nav>
		<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
			<ul class="navbar-nav">
				<li class="nav-item active">
					<a class="nav-link" href="{{ route('admin.products.index') }}">Products</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Link</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Link</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Link</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Link</a>
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

	<div id="content" style="padding: 30px;">
		@yield('content')
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>