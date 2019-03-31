<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FooController extends Controller
{
	public function foo4() {
		return view('application.test', [
			'title' => 'Foo4',
			'body' => 'Hello World!'
		]);
	}
}
