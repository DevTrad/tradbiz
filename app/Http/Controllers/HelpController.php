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
		return view('help.index', ['title' => 'Help']);
	}

	public function customers()
	{
		return view('help.customers', ['title' => 'Help for Customers']);
	}

	public function businesses()
	{
		return view('help.businesses', ['title' => 'Help for Businesses']);
	}

}
