@extends('layouts.master')

@section('feature')
	<h1>Resend Activation Email</h1>
@stop

@section('content')
	{{ Form::open(['action' => 'UserController@activationLookupEmail']) }}
	<table>
		<tr>
			<td>{{ Form::label('email', 'Email') }}</td>
			<td>{{ Form::email('email') }}</td>
		</tr>
		<tr><td>{{ Form::submit('Send activation email') }}</td></tr>
	</table>
	{{ Form::close() }}
@stop
