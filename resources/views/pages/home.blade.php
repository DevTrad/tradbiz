@extends('layouts.master')

@section('head')
	<script>
		function initialize() {
			var loc = {};
			var geocoder = new google.maps.Geocoder();

			if(google.loader.ClientLocation) {
				loc.lat = google.loader.ClientLocation.latitude;
				loc.lng = google.loader.ClientLocation.longitude;

				var LatLng = new google.maps.LatLng(loc.lat, loc.lng);
				geocoder.geocode({'latLng': LatLng}, function(results, status) {
					if(status == google.maps.GeocoderStatus.OK) {
						$('#loc').html(results[0]['formatted_address']);
					}
				});
			}
		}
	</script>
@stop

@section('feature')
	{{ Form::open(['route' => 'businesses.index', 'method' => 'get']) }}
	<h1>Search for businesses:</h1>
	<div class="main-search">
		{{ Form::text('search', null, ['placeholder' => 'Search for businesses']) }}
		{{ Form::submit('&#61442;', ['style' => '']) }}
		<div id="loc"></div>
	</div>
	{{ Form::close() }}
@stop

@section('content')
	<h1>{{ link_to_route('businesses.create', 'Advertise your business on TradBiz') }}</h1>
@stop
