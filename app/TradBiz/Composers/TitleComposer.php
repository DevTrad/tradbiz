<?php namespace TradBiz\Composers;

use Route;

class TitleComposer {
	public function compose($view) {
		$titles = [
			'/' => 'Home',
			'users.index' => 'User List',
		];

		$route = Route::current()->getName();

		// set a default value for the title if none is set.
		if(isset($titles[$route])) {
			$title = $titles[$route];
		} else {
			$title = $route;
		}

		$view->with('title', $title);
	}
}
