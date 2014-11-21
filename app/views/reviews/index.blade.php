@foreach($reviews as $review)
	<div class="review">
		<h2>{{{ $review->description }}}</h2>

		<p>{{{ $review->body }}}</p>
		@for($i = 0; $i < $review->rating; $i++)
			<i class="fa fa-star"></i>
		@endfor

		@for($i = 0; $i < (5 - $review->rating); $i++)
			<i class="fa fa-star-o"></i>
		@endfor
		<strong>Posted on {{ $review->created_at }} by {{{ $review->author }}}</strong>
	</div>
@endforeach

@if(count($reviews) == 0)
	<p>No reviews.</p>
@endif
