<?php

namespace tradbiz\Http\Controllers;

use tradbiz\Http\Controllers\Controller;

class PageController extends BaseController {
	public function index() {
		return view('pages.home');
	}

	public function about() {
		return view('pages.about');
	}

	public function proof() {
		return view('pages.proof');
	}
}
