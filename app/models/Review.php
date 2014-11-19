<?php

class Review extends \Eloquent {
	protected $fillable = [
		'rating',
		'business_id',
		'author',
		'body'
	];

	public $rules = [
		'rating'      => 'required',
		'business_id' => 'required',
		'author'      => 'required',
		'body'        => 'required'
	];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'reviews';
}
