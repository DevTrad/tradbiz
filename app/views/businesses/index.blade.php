@extends('layouts.master')

@section('feature')
	<h1>Diplaying search results for: {{{ $query }}}</h1>
@stop

@section('content')
	@if(count($results) > 0)
		@foreach($results as $result)
			<h1>{{ link_to_route('businesses.show', $result->name, $result->slug) }}</h1>
			<p>{{{ $result->description }}}</p>
		@endforeach
	@else
		<h1>No results</h1>
	@endif
@stop
