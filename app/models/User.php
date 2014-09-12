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

	/**
	 * Check if user is activated based on username
	 *
	 * @return 1 if user is active, 0 if user is not active, -1 if user does not exist
	 */
	public function activationStatus() {
		if(null !== $user = self::where('username', '=', $this->username)->first()) {
			return $user->active;
		} else {
			return -1;
		}
	}
}
