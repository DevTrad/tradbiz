<?php

class PageController extends \BaseController {
	public function index() {
		return View::make('pages.home');
	}

	public function proof() {
		return View::make('pages.proof');
	}
}
