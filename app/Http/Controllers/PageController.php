<?php

namespace tradbiz\Http\Controllers;

use tradbiz\Http\Controllers\Controller;

class PageController extends BaseController {
	public function index() {
		return view('pages.home', ['title' => 'Traditional Catholic Business Finder']);
	}

	public function about() {
		return view('pages.about', ['title' => 'About']);
	}

	public function proof() {
		return view('pages.proof', ['title' => 'Proof']);
	}
}
