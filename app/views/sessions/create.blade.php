@extends('layouts.master')

@section('feature')
	<h1>Log In</h1>
@stop

@section('content')
	

	{{ Form::open(['route' => 'sessions.store']) }}
		<table>
			@if(null != Session::get('error'))
				<tr class="error">
					<td>{{ Session::get('error') }}</td>
				</tr>
			@endif

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
	{{ Form::close() }}
@stop
