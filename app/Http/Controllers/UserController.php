<?php

namespace tradbiz\Http\Controllers;

use tradbiz\Http\Controllers\Controller;
use tradbiz\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use Hash;
use Mail;
use Redirect;

class UserController extends BaseController {
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
		return view('users.index')->with(['users' => $users]);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('users.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		// validate the inputs
		$validator = Validator::make($data = $request->all(), $this->user->rules);

		if($validator->fails()) {
			return Redirect::back()->withInput()->withErrors($validator);
		}

		// fill the user with the inputs and save to DB
		unset($data['password_conf']);
		$this->user->fill($data);
		$this->user->password = Hash::make($this->user->password);

		$maxid = User::all()->max('id');
		if($maxid == 0) {
			$this->user->account_type = 99;
		} else {
			$this->user->account_type = 1;
		}

		$this->user->active = 0;
		$this->user->activation_token = uniqid();
		$this->user->save();

		// send activation email
		$this->user->sendActivationEmail();

		Auth::logout();
		return view('notifications.accountsuccess');
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
		$businesses = Business::where('owner_id', '=', $user->id)->get();

		return view('users.show', ['user' => $user, 'businesses' => $businesses]);
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
		if(Auth::user()->account_type == 99) {
			$user = User::find($id);
			$user->delete();
		}

		return Redirect::route('users.index');
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
		$user = User::find($id);

		if($user->activation_token == $token) {
			$user->active = true;
			$user->save();

			return view('users.activate', ['success' => true]);
		} else {
			return view('users.activate', ['success' => false, 'id' => $id]);
		}
	}

	/**
	 * Show user's dashboard
	 *
	 * @return Response
	 */
	public function dashboard()
	{
		$businesses = Business::where('owner_id', '=', Auth::user()->id)->get();

		return view('users.dashboard', ['businesses' => $businesses]);
	}

	public function resendActivationEmail($id)
	{
		$user = User::find($id);
		$this->user->fill($user->toArray());
		$this->user->activation_token = $user->activation_token;
		$this->user->sendActivationEmail();

		return Redirect::to('/');
	}

	public function resendActivationEmailForm()
	{
		return view('activation.resendemail');
	}

	public function activationLookupEmail(Request $request)
	{
		$email = $request->input('email');
		$id = User::where('email', '=', $email)->first()->id;

		return Redirect::to('resend/' . $id);
	}
}
