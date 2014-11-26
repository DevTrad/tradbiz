@extends('layouts.master')

@section('title')
Add Business
@stop

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
					$('#createBizForm').submit();
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
	@if($edit)
		{{ Form::open(['route' => ['businesses.update', $business->slug], 'method' => 'put', 'id' => 'createBizForm']) }}
	@else
		{{ Form::open(['route' => 'businesses.store', 'id' => 'createBizForm']) }}
	@endif
		<table>
			<tr>
				<td>{{ Form::label('name', 'Business Name') }}</td>
				<td>{{ Form::text('name', isset($business->name) ? $business->name : '') }}</td>
				<td>
					@if(null != $errors->first('name'))
					{{ $errors->first('name') }}
					@elseif(null != $errors->first('slug'))
					The name is already taken.
					@endif
				</td>
			</tr>


			<tr>
				<td>{{ Form::label('address', 'Address') }}</td>
				<td>
					{{ Form::text('address', isset($business->address) ? $business->address : '', ['id' => 'address']) }}
					{{ Form::hidden('latitude', null, ['id' => 'lat']) }}
					{{ Form::hidden('longitude', null, ['id' => 'lng']) }}
				</td>
				<td>
					@if(null != $errors->first('address'))
					{{ $errors->first('address') }}
					@elseif(null != $errors->first('longitude') || null != $errors->first('latitude'))
					We couldn't find that address. Try being more specific.
					@endif
				</td>
			</tr>

			<tr>
				<td>{{ Form::label('url', 'Website (optional)') }}</td>
				<td>
					{{ Form::text('url', isset($business->url) ? $business->url : '') }}
				</td>
				<td>
					{{ $errors->first('url') }}
				</td>
			</tr>

			<tr>
				<td>{{ Form::label('description', 'Business Description') }}</td>
				<td>{{ Form::textarea('description', isset($business->description) ? $business->description : '') }}</td>
				<td>{{ $errors->first('description') }}</td>
			</tr>

			<tr>
				<td>{{ Form::label('promotion', 'Promotion for customers who find you on TradBiz') }}</td>
				<td>{{ Form::textarea('promotion', isset($business->promotion) ? $business->promotion : '') }}</td>
				<td>{{ $errors->first('promotion') }}</td>
			</tr>

			<tr>
				<td>{{ Form::hidden('hiring', '0') }}</td>
			</tr>

			<tr>
				<td>
					@if($edit)
					<button type="button" id="addBizSubmitButton" onclick="codeAddress(); return false;">Edit business</button>
					@else
					<button type="button" id="addBizSubmitButton" onclick="codeAddress(); return false;">Add business</button>
					@endif
				</td>
			</tr>
		</table>
	{{ Form::close() }}
@stop
