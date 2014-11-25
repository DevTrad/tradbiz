@extends('layouts.master')

@section('title')
{{ $business->name }}
@stop

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
@stop

@section('feature')
	<h1>{{{ $business->name }}}</h1>
	<h2>{{{ $business->address }}}</h2>
@stop

@section('content')
	@if(Auth::guest() == null)
		@if($business->owner_id == Auth::user()->id || Auth::user()->account_type == 99)
			<p>{{ link_to_route('businesses.edit', 'Edit Business', $business->slug, ['class' => 'button']) }}</p>

			{{ Form::open(['route' => ['businesses.destroy', $business->id], 'method' => 'delete', 'id' => 'delete']) }}
				<p>{{ Form::submit('Delete Business') }}</p>
			{{ Form::close() }}
		@endif
	@endif

	<p style="text-align: right"><a href={{ '"/businesses/' . $business->id . '/flag"' }}><i class="fa fa-flag"></i> Flag as inappropriate</a></p>
	<p>Owned by {{ link_to('/users/' . e($owner->username), e($owner->first_name . ' ' . $owner->last_name)) }}

	<div id="map" style="height: 300px;"></div>

	<div class="col-2 padded">
		<h2>Business Description</h2>
		<p>{{{ $business->description }}}</p>
	</div>

	<div class="col-2 padded">
		<h2>Promotion for TradBiz Customers</h2>
		<h3>(mention that you found us on TradBiz)</h3>
		<p>{{{ $business->promotion }}}</p>
	</div>

	<div class="reviews padded">
		<h1>Reviews</h1>
		@if($business->average_rating > 0)
			<p>Average rating: {{ $business->average_rating }}/5 stars</p>
		@endif
		@include('reviews.index')
		<p>{{ link_to_route('reviews.create', 'Add Consumer Review', ['business_id' => $business->id], ['class' => 'button']) }}</p>
	</div>
@stop
