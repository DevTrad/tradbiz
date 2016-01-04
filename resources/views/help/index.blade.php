@extends('layouts.master')

@section('feature')
	<h1>Help</h1>
@stop

@section('content')
	<h1>{{ link_to('/help/customers', 'Customers') }}</h1>
	<h1>{{ link_to('/help/businesses', 'Business owners') }}</h1>
@stop
