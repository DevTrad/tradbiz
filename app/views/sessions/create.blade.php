@extends('layouts.master')

@section('feature')
	<h1>Log In</h1>
@stop

@section('content')
	@if(null != Session::get('error'))
		<div class="error">
			{{ Session::get('error') }}
		</tr>
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
	{{ Form::close() }}
@stop
