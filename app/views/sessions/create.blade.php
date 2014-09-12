@extends('layouts.master')

@section('content')
	{{ Form::open(['route' => 'sessions.store']) }}
		@if(null != Session::get('error'))
		<div class="error">
			{{ Session::get('error') }}
		</div>
		@endif

		<div>
			{{ Form::label('username', 'Username') }}
			{{ Form::text('username') }}
		</div>

		<div>
			{{ Form::label('password', 'Password') }}
			{{ Form::password('password') }}
		</div>

		<div>
			{{ Form::submit('Login') }}
		</div>
	{{ Form::close() }}
@stop
