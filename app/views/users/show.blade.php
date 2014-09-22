@extends('layouts.master')

@section('feature')
	<h1>{{{ $user->first_name }}} {{{ $user->last_name }}}'s Profile</h1>
@stop

@section('content')
	<p>{{{ $user->first_name }}} {{{ $user->last_name }}} attends church at {{{ $user->church_name }}} in {{{ $user->church_location }}}. His pastor is {{{ $user->church_pastor }}}.</p>

	@if(count($businesses) > 0)
		<h1>Businesses</h1>
		@foreach($businesses as $business)
			<h2>{{ link_to_route('businesses.show', $business->name, $business->slug) }}</h2>
		@endforeach
	@endif
@stop
