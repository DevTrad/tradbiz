<?php

class BusinessController extends \BaseController {

	public function __construct(Business $business, User $user) {
		$this->business = $business;
		$this->user = $user;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$query = Input::get('search');
		$sqlsearch = '%' . $query . '%';
		$results = DB::table('businesses')->where('name', 'LIKE', $sqlsearch);
		$results = DB::table('businesses')->where('description', 'LIKE', $sqlsearch)->union($results)->get();

		return View::make('businesses.index', ['results' => $results, 'query' => $query]);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('businesses.create', ['edit' => false]);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = Input::all();
		$data['slug'] = strtolower(str_replace(' ', '-', $data['name']));
		$validator = Validator::make($data, $this->business->rules);

		if($validator->fails()) {
			return Redirect::back()->withInput()->withErrors($validator);
		}

		$this->business->fill($data);
		$this->business->slug = $data['slug'];
		$this->business->owner_id = Auth::user()->id;

		$this->business->save();

		return Redirect::route('businesses.show', $data['slug']);
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
		$owner = User::find($business->owner_id);
		$reviews = Review::where('business_id', '=', $business->id)->get();
		return View::make('businesses.show', ['business' => $business, 'owner' => $owner, 'reviews' => $reviews]);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$business = Business::where('slug', '=', $id)->first();

		if($this->user->authedToModifyBusiness(Auth::user(), $business)) {
			return View::make('businesses.create', ['business' => $business, 'edit' => true]);
		}

		return Redirect::route('businesses.show', $business->slug);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$business = Business::where('slug', '=', $id)->first();

		if($this->user->authedToModifyBusiness(Auth::user(), $business)) {
			$data = Input::all();
			$data['slug'] = strtolower(str_replace(' ', '-', $data['name']));

			$editrules = $this->business->rules;
			$editrules['slug'] = 'required';

			$validator = Validator::make($data, $editrules);

			if($validator->fails()) {
				return Redirect::back()->withInput()->withErrors($validator);
			}

			$business = Business::where('slug', '=', $data['slug'])->first();
			$business->fill($data);
			$business->slug = $data['slug'];

			$business->save();
		}

		return Redirect::route('businesses.show', $business->slug);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$business = Business::where('slug', '=', $id)->first();
		if($this->user->authedToModifyBusiness(Auth::user(), $business)) {
			$business->delete();
		}
		return Redirect::route('home');
	}


}
