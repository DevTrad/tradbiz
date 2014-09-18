@extends('layouts.master')

@section('feature')
	{{ Form::open(['route' => 'businesses.index', 'method' => 'get']) }}
	<h1>Search for businesses:</h1>
	<div id="main-search">
		{{ Form::text('search', null, ['style' => '']) }}
		{{ Form::submit('Search!', ['style' => '']) }}
	</div>
	{{ Form::close() }}
@stop

@section('content')
@stop
