@extends('layouts.master')

@section('content')
	<p><strong>{{ session('error') }}</strong></p>
	{{ Form::open(['action' => 'RemindersController@postReset']) }}
	<table>
		<tr>
			<td>{{ Form::label('email') }}</td>
			<td>{{ Form::email('email') }}</td>
		</tr>

		<tr>
			<td>{{ Form::label('password') }}</td>
			<td>{{ Form::password('password') }}</td>
		</tr>

		<tr>
			<td>{{ Form::label('password_confirmation') }}</td>
			<td>{{ Form::password('password_confirmation') }}</td>
		</tr>

		<tr>
			<td>{{ Form::submit('Reset Password') }}</td>
		</tr>
	</table>
@stop
