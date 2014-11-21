@extends('layouts.master')

@section('feature')
	<h1>Add Review for {{{ $business->name }}}</h1>
@stop

@section('content')
	{{ Form::open(['route' => 'reviews.store']) }}
	{{ Form::hidden('business_id', $business->id) }}
	<table>
		<tr>
			<td>{{ Form::label('author', 'Your Name') }}</td>
			<td>{{ Form::text('author') }}</td>
			<td>{{ $errors->first('author') }}</td>
		</tr>

		<tr>
			<td>{{ Form::label('description', 'A Brief Description') }}</td>
			<td>{{ Form::text('description') }}</td>
			<td>{{ $errors->first('description') }}</td>
		</tr>

		<tr>
			<td>{{ Form::label('rating', 'Rating') }}</td>
			<td>{{ Form::select('rating', ['1' => 1, '2' => 2, '3' => 3, '4' => 4, '5' => 5]) }}</td>
			<td>{{ $errors->first('rating') }}</td>
		</tr>

		<tr>
			<td>{{ Form::label('body', 'Comment') }}</td>
			<td>{{ Form::textarea('body') }}</td>
			<td>{{ $errors->first('body') }}</td>
		</tr>

		<tr>
			<td>{{ Form::submit('Add review') }}</td>
		</tr>
	</table>
	{{ Form::close() }}
@stop
