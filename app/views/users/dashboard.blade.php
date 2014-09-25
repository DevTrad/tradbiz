@extends('layouts.master')

@section('feature')
	<h1>Welcome, {{{ Auth::user()->first_name }}} {{{ Auth::user()->last_name }}}</h1>
@stop

@section('content')
	<h1>Your Dashboard</h1>

	<h2>{{ link_to_route('businesses.create', 'Advertise your business') }}</h2>
@stop
