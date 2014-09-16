<?php

class BusinessController extends \BaseController {

	public function __construct(Business $business) {
		$this->business = $business;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('businesses.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), $this->business->rules);

		if($validator->fails()) {
			return Redirect::back()->withInput()->withErrors($validator);
		}

		$this->business->fill($data);
		$this->business->owner_id = Auth::user()->id;
		$this->business->slug = strtolower(str_replace(' ', '-', $this->business->name));

		$this->business->save();
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$business = Business::where('slug', '=', $id)->first();
		$owner = User::find($business->owner_id)->first()->username;
		return View::make('businesses.show', ['business' => $business, 'owner' => $owner]);
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


}
