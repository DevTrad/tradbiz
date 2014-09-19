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
		'name'            => 'required',
		'slug'            => 'required|unique:businesses,slug',
		'address'         => 'required',
		'latitude'        => 'required',
		'longitude'       => 'required',
		'description'     => 'required',
		'promotion'       => 'required',
		'hiring'          => 'required'
	];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'businesses';


}
