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
		@yield('content')
	</body>
</html>
