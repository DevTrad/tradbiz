<?php

namespace tradbiz\Http\Controllers;

use tradbiz\Http\Controllers\Controller;

class HelpController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('help.index');
	}

	public function customers()
	{
		return view('help.customers');
	}

	public function businesses()
	{
		return view('help.businesses');
	}

}
