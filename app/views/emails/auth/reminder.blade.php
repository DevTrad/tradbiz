<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Password Reset</h2>

		<div>
			<h2>{{ link_to('password/reset/' . $token, 'Reset Your Password') }}</h2>
			This link will expire in {{ Config::get('auth.reminder.expire', 60) }} minutes.
		</div>
		<div>
			NOTE: If you did not attempt to reset your password, simply ignore this email.
		</div>
	</body>
</html>
