@extends('layouts.master')

@section('content')
	<ul>
		@foreach($users as $user)
			<li>{{ link_to('/users/' . $user->username, $user->username) }}</li>
		@endforeach
	</ul>
@stop
