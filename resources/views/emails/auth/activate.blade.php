<!DOCTYPE html>
<html>
	<head>
		<meta charset=utf-8">
	</head>
	<body>
		<h2>Activate your account</h2>

		<div>
			Thanks for signing up on TradBiz! Please click the link below to activate your account.<br>

			<h3>{{ link_to('/activate/' . $id . '/' . $token, 'Verify Your Account') }}</h3>
		</div>
	</body>
</html>
