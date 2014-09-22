@extends('layouts.master')

@section('head')
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
	<h2>Business Description</h2>
	<p>{{{ $business->description }}}</p>

	<h2>Promotion for TradBiz Customers (mention that you found us on TradBiz)</h2>
	<p>{{{ $business->promotion }}}</p>

	<h2>Map</h2>
	<div id="map" style="height: 300px;"></div>
@stop
