<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Posty</title>

	<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-gray-200">
	<nav class="p-6 bg-white flex justify-between mb-6">
		<ul class="flex items-center">
			<li>
				<a href="{{ route('home') }}" class="p-3">Home</a>
			</li>
			<li>
				<a href="{{ route('DASH') }}" class="p-3">Dashboard</a>
			</li>
			<li>
				<a href="{{ route('HANTAR') }}" class="p-3">Post</a>
			</li>
		</ul>

		<ul class="flex items-center">
			@auth
				<li>
					<a href="" class="p-3">{{ auth()->user()->name }}</a>
				</li>
				<li>
					<form action="{{ route('KELUAR') }}" method="POST" class="p-3 inline">
						@csrf
						<button type="submit">Logout</button>
					</form>
				</li>
			@endauth
			@guest
				<li>
					<a href="{{ route('MASUK') }}" class="p-3">Login</a>
				</li>
				<li>
					<a href="{{ route('REG') }}" class="p-3">Register</a>
				</li>
			@endguest
			
		</ul>
	</nav>

	@yield('content')
</body>
</html>
