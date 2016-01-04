<?php

namespace tradbiz\Models;

use Illuminate\Database\Eloquent\Model;

class Business extends Model {
	protected $fillable = [
		'name',
		'address',
		'latitude',
		'longitude',
		'url',
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
		'url'             => 'active_url',
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

	public function correctUrl() {
		if((count($this->url) > 1) && (substr($this->url, 0, 7) != 'http://')) {
			$this->url = 'http://' . $this->url;
		}
	}

}
