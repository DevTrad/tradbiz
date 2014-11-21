<?php

class Review extends \Eloquent {
	protected $fillable = [
		'rating',
		'description',
		'business_id',
		'author',
		'body'
	];

	public $rules = [
		'rating'      => 'required',
		'business_id' => 'required',
		'description' => 'required',
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
