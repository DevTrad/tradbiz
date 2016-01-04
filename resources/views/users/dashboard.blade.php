@extends('layouts.master')

@section('title')
Welcome, {{{ Auth::user()->first_name }}} {{{ Auth::user()->last_name }}}
@stop

@section('feature')
	<h1>Welcome, {{{ Auth::user()->first_name }}} {{{ Auth::user()->last_name }}}</h1>
@stop

@section('content')
	<h2>{{ link_to_route('profile', 'View your public profile') }}</h2>
	<h2>{{ link_to_route('businesses.create', 'Advertise your business') }}</h2>

	<h1>Your Businesses</h1>
	@if(count($businesses) == 0)
		<h3>You don't have any businesses.</h3>
	@endif
	@foreach($businesses as $business)
		<h3>{{ link_to_route('businesses.show', $business->name, $business->slug) }}</h3>
	@endforeach
@stop
