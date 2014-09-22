<?php

class PageController extends \BaseController {
	public function index() {
		return View::make('pages.home');
	}

	public function about() {
		return View::make('pages.about');
	}

	public function proof() {
		return View::make('pages.proof');
	}
}
