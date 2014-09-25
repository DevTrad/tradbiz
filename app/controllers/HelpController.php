<?php

class HelpController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('help.index');
	}

	public function customers()
	{
		return View::make('help.customers');
	}

	public function businesses()
	{
		return View::make('help.businesses');
	}

}
