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
		'password_conf',
		'church_name',
		'church_location',
		'church_pastor'
	];

	public $rules = [
		'username'        => 'required|unique:users,username',
		'first_name'      => 'required',
		'last_name'       => 'required',
		'email'           => 'required|email|unique:users,email',
		'password'        => 'required|between:6,18',
		'password_conf'   => 'required|same:password',
		'church_name'     => 'required',
		'church_location' => 'required',
		'church_pastor'   => 'required'
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

	/**
	 * Send user an activation email
	 *
	 *
	 */
	public function sendActivationEmail() {
		Mail::send(
			'emails.auth.activate',
			['id' => User::where('username', '=', $this->username)->first()->id,
			'token' => $this->activation_token],
			function($message) {
				$message->to(
					$this->email,
					$this->first_name . ' ' . $this->last_name
				)->subject('Activate your TradBiz account');
			}
		);
	}

}
