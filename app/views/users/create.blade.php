@extends('layouts.master')

@section('content')
	{{ Form::open(['route' => 'users.store']) }}

		<div>
			{{ Form::label('username', 'Username') }}
			{{ Form::text('username', null, ['placeholder' => 'Name you will log in with']) }}
			{{ $errors->first('username') }}
		</div>

		<div>
			{{ Form::label('first_name', 'First Name') }}
			{{ Form::text('first_name') }}
			{{ $errors->first('first_name') }}
		</div>

		<div>
			{{ Form::label('last_name', 'Last Name') }}
			{{ Form::text('last_name') }}
			{{ $errors->first('last_name') }}
		</div>

		<div>
			{{ Form::label('email', 'Email Address') }}
			{{ Form::email('email') }}
			{{ $errors->first('email') }}
		</div>

		<div>
			{{ Form::label('password', 'Password') }}
			{{ Form::password('password') }}
			{{ $errors->first('password') }}
		</div>

		<div>
			{{ Form::label('monthly_payment', 'Monthly Payment') }}
			{{ Form::text('monthly_payment', null, ['placeholder' => 'How much do you think we are worth?']) }}
			{{ $errors->first('monthly_payment') }}
		</div>

		<div>
			{{ Form::label('church_name', 'Your Church\'s Name') }}
			{{ Form::text('church_name') }}
			{{ $errors->first('church_name') }}
		</div>

		<div>
			{{ Form::label('church_location', 'Your Church\'s Location') }}
			{{ Form::text('church_location') }}
			{{ $errors->first('church_location') }}
		</div>

		<div>
			{{ Form::label('church_pastor', 'Your Church\'s Pastor') }}
			{{ Form::text('church_pastor') }}
			{{ $errors->first('church_pastor') }}
		</div>


		<div>
			{{ Form::submit('Register') }}
		</div>
	{{ Form::close() }}
@stop
