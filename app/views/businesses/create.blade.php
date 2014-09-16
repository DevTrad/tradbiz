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

@section('feature')
	<h1>Add Business</h1>
@stop

@section('content')
	{{ Form::open(['route' => 'businesses.store', 'id' => 'createBizForm']) }}
		<table>
			<tr>
				<td>{{ Form::label('name', 'Business Name') }}</td>
				<td>{{ Form::text('name') }}</td>
				<td>{{ $errors->first('name') }}</td>
			</tr>


			<tr>
				<td>{{ Form::label('address', 'Address') }}</td>
				<td>{{ Form::text('address', null, ['id' => 'address']) }}</td>
				<td>{{ Form::hidden('latitude', null, ['id' => 'lat']) }}</td>
				<td>{{ Form::hidden('longitude', null, ['id' => 'lng']) }}</td>
				<td>{{ $errors->first('address') }}</td>
			</tr>
			
			<tr>
				<td>{{ Form::label('description', 'Business Description') }}</td>
				<td>{{ Form::textarea('description') }}</td>
				<td>{{ $errors->first('description') }}</td>
			</tr>

			<tr>
				<td>{{ Form::label('promotion', 'Promotion for customers who find you on TradBiz') }}</td>
				<td>{{ Form::textarea('promotion') }}</td>
				<td>{{ $errors->first('promotion') }}</td>
			</tr>

			<tr>
				<td>{{ Form::hidden('hiring', '0') }}</td>
			</tr>

			<tr>
				<td><button type="button" id="addBizSubmitButton" onclick="codeAddress(); return false;">Add business</button></td>
			</tr>
		</table>
	{{ Form::close() }}
@stop
