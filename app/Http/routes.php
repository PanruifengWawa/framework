<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

$routing = [
	'/' => 'WelcomeController',
	'/user/{param}' => 'UserController',
    '/question/{param}' => 'QuestionDetailsController',

    '/question/{param}' => 'SubQuestionController',
];

foreach ($routing as $url => $function) {
	Route::any($url, $function . '@selectAction');
}
