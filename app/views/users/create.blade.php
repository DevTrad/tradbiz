@extends('layouts.master')

@section('feature')
	<h1>Register</h1>
@stop

@section('content')
	{{ Form::open(['route' => 'users.store']) }}
		<table>
			<tr>
				<td>{{ Form::label('username', 'Username') }}</td>
				<td>{{ Form::text('username', null, ['placeholder' => 'Name you will log in with']) }}</td>
				<td>{{ $errors->first('username') }}</td>
			</tr>

			<tr>
				<td>{{ Form::label('first_name', 'First Name') }}</td>
				<td>{{ Form::text('first_name') }}</td>
				<td>{{ $errors->first('first_name') }}</td>
			</tr>

			<tr>
				<td>{{ Form::label('last_name', 'Last Name') }}</td>
				<td>{{ Form::text('last_name') }}</td>
				<td>{{ $errors->first('last_name') }}</td>
			</tr>

			<tr>
				<td>{{ Form::label('email', 'Email Address') }}</td>
				<td>{{ Form::email('email') }}</td>
				<td>{{ $errors->first('email') }}</td>
			</tr>

			<tr>
				<td>{{ Form::label('password', 'Password') }}</td>
				<td>{{ Form::password('password') }}</td>
				<td>{{ $errors->first('password') }}</td>
			</tr>

			<tr>
				<td>{{ Form::label('monthly_payment', 'Monthly Payment') }}</td>
				<td>{{ Form::text('monthly_payment', null, ['placeholder' => 'How much do you think we are worth?']) }}</td>
				<td>{{ $errors->first('monthly_payment') }}</td>
			</tr>

			<tr>
				<td>{{ Form::label('church_name', 'Your Church\'s Name') }}</td>
				<td>{{ Form::text('church_name') }}</td>
				<td>{{ $errors->first('church_name') }}</td>
			</tr>

			<tr>
				<td>{{ Form::label('church_location', 'Your Church\'s Location') }}</td>
				<td>{{ Form::text('church_location') }}</td>
				<td>{{ $errors->first('church_location') }}</td>
			</tr>

			<tr>
				<td>{{ Form::label('church_pastor', 'Your Church\'s Pastor') }}</td>
				<td>{{ Form::text('church_pastor') }}</td>
				<td>{{ $errors->first('church_pastor') }}</td>
			</tr>


			<tr>
				<td>{{ Form::submit('Register') }}</td>
			</tr>
		</table>
	{{ Form::close() }}
@stop
