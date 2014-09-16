@extends('layouts.master')

@section('head')
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDanRnl4TRZyI5BjvLfWNjtBatjrVwd-LM"></script>
<script type="text/javascript">
	function initialize() {
		var mapOptions = {
			center: {lat: {{{ $business->latitude }}}, lng: {{{ $business->longitude }}}  },
			zoom: 8
		};

		var map = new google.maps.Map(document.getElementById('map'), mapOptions);
	}
	google.maps.event.addDomListener(window, 'load', initialize);
</script>
@stop

@section('feature')
<h1>{{{ $business->name }}}</h1>
<h2>{{{ $business->address }}}</h2>
@stop

@section('content')
<p>Owned by {{ link_to('/users/' . e($owner), e($owner)) }}
<h2>Business Description</h2>
<p>{{{ $business->description }}}</p>

<h2>Promotion for TradBiz Customers (mention that you found us on TradBiz)</h2>
<p>{{{ $business->promotion }}}</p>

<h2>Map</h2>
<div id="map" style="height: 300px;"></div>
@stop
