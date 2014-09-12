<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	protected $fillable = [
		'username',
		'first_name',
		'last_name',
		'email',
		'password',
		'monthly_payment',
		'church'
	];

	public $rules = [
		'username'        => 'required|unique:users,username',
		'first_name'      => 'required',
		'last_name'       => 'required',
		'email'           => 'required|email',
		'password'        => 'required|between:6,18',
		'monthly_payment' => 'required|numeric',
		'church'          => 'required'
	];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

}
