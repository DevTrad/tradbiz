<?php

class SessionController extends \BaseController {

	public function __construct(User $user) {
		$this->user = $user;
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	//public function index()
	//{
		
	//}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if(Auth::guest()) {
			return View::make('sessions.create');
		} else {
			return 'You are already logged in.';
		}
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$activationStatus = $this->user->fill($input)->activationStatus();

		if($activationStatus == 0) {
			$error = 'Your account is not activated yet.';
		} elseif($activationStatus == -1) {
			$error = 'Wrong username or password';
		} elseif(Auth::attempt([
			'username' => $input['username'],
			'password' => $input['password'],
		])) {
			return Redirect::route('users.show', [Auth::user()->username]);
		}

		return Redirect::back()->withInput()->with('error', $error);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	//public function show($id)
	//{

	//}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	//public function edit($id)
	//{

	//}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	//public function update($id)
	//{

	//}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
		Auth::logout();

		return Redirect::route('home');
	}


}