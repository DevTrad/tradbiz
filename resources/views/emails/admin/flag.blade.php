<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>A business has been flagged.</h2>

		<div>
			<p>{{ $flagger }} flagged {{ link_to_route('businesses.show', $business->name, $business->slug) }} as inappropriate.</p>
			<h3>Extra comments</h3>
			<p>{{ $extra_comments }}</p>
		</div>
	</body>
</html>
