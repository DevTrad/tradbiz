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
			<h1>TradBiz</h1>
			<nav class="main">
				@include('layouts.include.nav')
			</nav>
		</header>

		<header class="feature">
			@yield('feature')
		</header>

		@yield('content')

		<nav class="footer">
			<h2>TradBiz</h2>
			@include('layouts.include.nav')
		</nav>

		<footer class="main">
			Website created by Top Page Design | &copy; TradBiz &mdash; 2014 | Proudly hosted on Openshift
		</footer>

	</body>
</html>
