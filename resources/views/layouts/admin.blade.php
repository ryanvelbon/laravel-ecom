<!DOCTYPE html>
<html>
<head>
	<title>Laravel eCommerce</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
</body>
</html>