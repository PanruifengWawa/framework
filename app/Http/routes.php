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
| Controller Routing Documentation: http://laravel.com/docs/5.0/controllers#restful-resource-controllers
| Routing Documentation: http://laravel.com/docs/5.0/routing
*/



Route::pattern('id', '[0-9]+');



Route::group(['middleware' => ['auth']], function() {
  // User needs to login
  Route::get('/', ['uses' => 'WelcomeController@index']);
  Route::get('questions/my', ['uses' => 'WelcomeController@indexMy']);

  Route::get('/profile', ['uses' => 'ProfileController@basicSetting']);
  Route::post('/profile', ['uses' => 'ProfileController@storeBasicSetting']);
  Route::get('/profile/security', ['uses' => 'ProfileController@securitySetting']);
  Route::post('/profile/security', ['uses' => 'ProfileController@storeSecuritySetting']);

  Route::delete('session', ['uses' => 'SessionController@destroy']);

  Route::resource('questions', 'QuestionController',
                  ['only' => ['store', 'show', 'create']]);
  Route::resource('questions.comments', 'QuestionCommentController',
                  ['only' => ['store','show']]);


  Route::resource('companies', 'CompanyController',
                  ['only' => ['index']]);


  Route::resource('positions', 'PositionController',
                  ['only' => ['index']]);
});



Route::group(['middleware' => ['guest']], function() {
  // User does not need to login
  Route::get('sign-in', [
    'uses' => 'UserController@signIn']);
  Route::get('sign-up', [
    'uses' => 'UserController@signUp']);


    Route::resource('change-password', [
        'uses' => 'UserController@changePassword']);


  Route::resource('users', 'UserController',
                  ['only' => ['store']]);

  Route::resource('session', 'SessionController',
                ['only' => ['store']]);
});

