@extends('layouts.master')

@section('feature')
	<h1>Send password reminder</h1>
@stop

@section('content')
	<p><strong>{{ session('error') }}</strong></p>
	
	{{ Form::open(['action' => 'RemindersController@postRemind']) }}
	<table>
		<tr>
			<td>{{ Form::label('email', 'Email') }}</td>
			<td>{{ Form::email('email') }}</td>
		</tr>
		<tr><td>{{ Form::submit('Send password reminder') }}</td></tr>
	</table>
	{{ Form::close() }}
@stop
