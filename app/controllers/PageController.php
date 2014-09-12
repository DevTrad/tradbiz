<?php

class PageController extends \BaseController {
	public function index() {
		return View::make('home');
	}
}
