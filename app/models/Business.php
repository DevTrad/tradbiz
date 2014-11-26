<?php

class Business extends Eloquent {
	protected $fillable = [
		'name',
		'address',
		'latitude',
		'longitude',
		'description',
		'promotion',
		'hiring'
	];

	public $rules = [
		'name'            => 'required|max:75',
		'slug'            => 'required|unique:businesses,slug|max:75',
		'address'         => 'required',
		'latitude'        => 'required',
		'longitude'       => 'required',
		'description'     => 'required|max:500',
		'promotion'       => 'required|max:500',
		'hiring'          => 'required'
	];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'businesses';

}
