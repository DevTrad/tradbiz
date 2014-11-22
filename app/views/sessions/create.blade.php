@extends('layouts.master')

@section('feature')
	<h1>Log In</h1>
@stop

@section('content')
	@if(null != Session::get('error'))
		<p><strong>{{ Session::get('error') }}</strong></p>
		@if(Session::get('error') == 'Your account is not activated yet.')
			{{ link_to('/resend', 'Need us to send you another activation email?') }}
		@endif
	@endif
	{{ Form::open(['route' => 'sessions.store']) }}
		<table>

			<tr>
				<td>{{ Form::label('username', 'Username') }}</td>
				<td>{{ Form::text('username') }}</td>
			</tr>

			<tr>
				<td>{{ Form::label('password', 'Password') }}</td>
				<td>{{ Form::password('password') }}</td>
			</tr>

			<tr>
				<td>{{ Form::submit('Login') }}</td>
			</tr>
		</table>
		{{ link_to('/password/remind', 'Forgot your password?') }}<br>
		{{ link_to('/register', 'Don\'t have an account yet?') }}<br>
	{{ Form::close() }}
@stop
