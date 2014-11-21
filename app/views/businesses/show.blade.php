@extends('layouts.master')

@section('head')
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDanRnl4TRZyI5BjvLfWNjtBatjrVwd-LM"></script>
<script type="text/javascript">
	function initialize() {
		var businessLocation = new google.maps.LatLng({{{ $business->latitude }}}, {{{ $business->longitude }}});
		var mapOptions = {
			center: businessLocation,
			zoom: 12
		};


		var map = new google.maps.Map(document.getElementById('map'), mapOptions);

		var marker = new google.maps.Marker({
			position: businessLocation,
			title: 'test',
			map: map
		});
	}
	google.maps.event.addDomListener(window, 'load', initialize);
</script>
<script>
	$(document).ready(function() {
		
	});
</script>
@stop

@section('feature')
	<h1>{{{ $business->name }}}</h1>
	<h2>{{{ $business->address }}}</h2>
@stop

@section('content')
	@if($business->owner_id == ((null != Auth::user()) ? Auth::user()->id : -1))
		<h3>{{ link_to_route('businesses.edit', 'Edit Business', $business->slug) }}</h3>
	@endif

	<p>Owned by {{ link_to('/users/' . e($owner), e($owner)) }}

	<div id="map" style="height: 300px;"></div>

	<div class="col-2">
		<h2>Business Description</h2>
		<p>{{{ $business->description }}}</p>
	</div>

	<div class="col-2">
		<h2>Promotion for TradBiz Customers (mention that you found us on TradBiz)</h2>
		<p>{{{ $business->promotion }}}</p>
	</div>

	<h1>Reviews</h1>
	@include('reviews.index')
	{{ link_to_route('reviews.create', 'Add Consumer Review', ['business_id' => $business->id]) }}
@stop
