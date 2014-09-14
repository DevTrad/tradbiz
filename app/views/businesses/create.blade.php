@extends('layouts.master')

@section('head')
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
	<script>
		var geocoder;
		var map;

		function initialize() {
			geocoder = new google.maps.Geocoder();
		}

		function codeAddress() {
			var address = document.getElementById('address').value;
			geocoder.geocode( { 'address': address}, function(results, status) {
				if (status == google.maps.GeocoderStatus.OK) {
					var location = results[0].geometry.location;
					document.getElementById('lat').value = location.lat();
					document.getElementById('lng').value = location.lng();
					document.getElementById('address').value = results[0].formatted_address;
					$('#createBizForm').submit();
				} else {
					alert('Geocode was not successful for the following reason: ' + status);
				}
			});
		}


		google.maps.event.addDomListener(window, 'load', initialize);
	</script>
@stop

@section('content')
	{{ Form::open(['route' => 'businesses.store', 'id' => 'createBizForm']) }}
		<div>
			{{ Form::label('name', 'Business Name') }}
			{{ Form::text('name') }}
			{{ $errors->first('name') }}
		</div>


		<div>
			{{ Form::label('address', 'Address') }}
			{{ Form::text('address', null, ['id' => 'address']) }}
			{{ Form::hidden('latitude', null, ['id' => 'lat']) }}
			{{ Form::hidden('longitude', null, ['id' => 'lng']) }}
		</div>
		
		<div>
			{{ Form::label('description', 'Business Description') }}
			{{ Form::textarea('description') }}
		</div>

		<div>
			{{ Form::label('promotion', 'Promotion for customers who find you on TradBiz') }}
			{{ Form::textarea('promotion') }}
		</div>

		<div>
			{{ Form::hidden('hiring', '0') }}
		</div>

		<div>
			<button type="button" id="addBizSubmitButton" onclick="codeAddress(); return false;">Add business</button>
		</div>
	{{ Form::close() }}
@stop
