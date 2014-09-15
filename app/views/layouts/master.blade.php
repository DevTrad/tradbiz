<!DOCTYPE html>
<html>
	<head>
		<title>{{ $title }}</title>
		<link href="/assets/css/normalize.css" rel="stylesheet">
		<link href="/assets/css/main.css" rel="stylesheet">
		<script type="text/javascript" src="/assets/js/jquery-2.1.0.min.js" charset="utf-8"></script>
		@yield('head')
	</head>
	<body>
		<header class="main">
			<nav class="main">
				<h1>TradBiz</h1>
				@include('layouts.include.nav')
				<ul class="right">
					@if(Auth::guest())
					<li>Business owners, {{ link_to_route('login', 'Log In') }} or {{ link_to_route('register', 'Register') }}</li>
					@elseif(Auth::user()->account_type == 'normal')
					<li>{{ link_to_route('profile', Auth::user()->first_name . ' ' . Auth::user()->last_name) }}</li>
					@endif
				</ul>
			</nav>
		</header>

		<header class="feature">
			@yield('feature')
		</header>

		<div id="content">
			@yield('content')
		</div>
		
		<footer class="main">
			<nav class="footer">
				<h2>TradBiz</h2>
				@include('layouts.include.nav')
			</nav>

			<footer class="copyright">
				Website created by Top Page Design | &copy; TradBiz &mdash; 2014 | Proudly hosted on Openshift
			</footer>
		</footer>
	</body>
</html>
