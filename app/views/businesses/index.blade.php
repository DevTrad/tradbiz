@extends('layouts.master')

@section('feature')
	<h1>Diplaying search results for: {{{ $query }}}</h1>
@stop

@section('content')
	@foreach($results as $result)
		<h1>{{ link_to_route('businesses.show', $result->name, $result->slug) }}</h1>
		<p>{{{ $result->description }}}</p>
	@endforeach
@stop
