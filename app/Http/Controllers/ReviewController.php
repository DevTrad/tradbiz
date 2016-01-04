<?php

namespace tradbiz\Http\Controllers;

use tradbiz\Http\Controllers\Controller;

class ReviewController extends BaseController {

	public function __construct(Review $review) {
		$this->review = $review;
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
		$business_id = Input::get('business_id');
		$business = Business::where('id', '=', $business_id)->first();
		return View::make('reviews.create', ['business' => $business]);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = Input::all();
		$business = Business::where('id', '=', $data['business_id'])->first();

		$validator = Validator::make($data, $this->review->rules);

		if($validator->fails()) {
			return Redirect::back()->withInput()->withErrors($validator);
		}

		$this->review->fill($data);
		$this->review->save();

		$average_rating = Review::where('business_id', '=', $business->id)->avg('rating');

		$business->average_rating = round($average_rating, 1);
		$business->save();


		return Redirect::route('businesses.show', $business->slug);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
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
		$review = Review::find($id);
		$business = Business::where('id', '=', $review->business_id)->first();

		$average_rating = Review::where('business_id', '=', $business->id)->avg('rating');
		$business->average_rating = round($average_rating, 1);
		$business->save();

		$review->delete();

		return Redirect::route('businesses.show', $business->slug);
	}


}
