@foreach($reviews as $review)
	<h2>{{{ $review->description }}}</h2>

	@for($i = 0; $i < $review->rating; $i++)
		<i class="fa fa-star"></i>
	@endfor

	@for($i = 0; $i < (5 - $review->rating); $i++)
		<i class="fa fa-star-o"></i>
	@endfor

	<p>{{{ $review->body }}}</p>
	<h3>Posted on {{ $review->created_at }} by {{{ $review->author }}}</h3>
@endforeach
