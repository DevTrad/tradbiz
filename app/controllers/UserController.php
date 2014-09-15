<?php

class UserController extends \BaseController {
	protected $user;

	public function __construct(User $user) {
		$this->user = $user;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::all();
		return View::make('users.index')->with(['users' => $users]);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('users.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// validate the inputs
		$validator = Validator::make($data = Input::all(), $this->user->rules);

		if($validator->fails()) {
			return Redirect::back()->withInput()->withErrors($validator);
		}

		// fill the user with the inputs and save to DB
		$this->user->fill($data);
		$this->user->password = Hash::make($this->user->password);
		$this->user->account_type = 'normal';
		$this->user->active = 0;
		$this->user->activation_token = uniqid();
		$this->user->save();

		// send activation email
		Mail::send(
			'emails.auth.activate',
			['id' => User::where('username', '=', $this->user->username)->first()->id,
			'token' => $this->user->activation_token],
			function($message) {
				
				$message->to(
					$this->user->email,
					$this->user->first_name . ' ' . $this->user->last_name
				)->subject('Activate your TradBiz account');
			}
		);


		return Redirect::route('home');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::where('username', '=', $id)->first();
		return View::make('users.show', ['user' => $user]);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	/**
	 * Show current user's profile.
	 *
	 * @return Response
	 */
	public function profile()
	{
		return Redirect::route('users.show', ['username' => Auth::user()->username]);
	}

	/**
	 * Activate user based on id and token
	 *
	 * @param  int  $id, string  $token
	 * @return Response
	 */
	public function activate($id, $token)
	{
		$user = User::find($id)->first();
		if($user->activation_token == $token) {
			$user->active = true;
			$user->save();

			return View::make('users.activate', ['success' => true]);
		} else {
			return View::make('users.activate', ['success' => false]);
		}
	}
}
