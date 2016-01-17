<!DOCTYPE html>
<html>
	<head>
		<title>@yield('title') - TradBiz</title>
		<link href="/assets/css/normalize.css" rel="stylesheet">
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		<link href="http://fonts.googleapis.com/css?family=Raleway:400,700,800" rel="stylesheet">
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
					@elseif(Auth::user()->account_type > 0)
					<li>{{ link_to_route('dashboard', Auth::user()->first_name . ' ' . Auth::user()->last_name) }}</li>
					<li>{{ link_to_route('logout', 'Log Out') }}</li>
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
