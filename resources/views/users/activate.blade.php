@extends('layouts.master')

@section('feature')
	@if($success)
		<h1>Account Successfully Activated</h1>
	@else
		<h1>Bad Activation Token</h1>
	@endif
@stop

@section('content')
	@if($success)
		<h1>You can now {{ link_to_route('login', 'log in') }}</h1>
	@else
		<h1>{{ link_to('/resend/' . $id, 'Try sending another activation email.') }}</h1>
	@endif
@stop
