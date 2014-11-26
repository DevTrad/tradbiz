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
		'rating'      => 'required|integer|between:1,5',
		'business_id' => 'required|integer|min:0',
		'description' => 'required|max:75',
		'author'      => 'required|max:30',
		'body'        => 'required|max:500'
	];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'reviews';
}
