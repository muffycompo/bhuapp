<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Simply tell Laravel the HTTP verbs and URIs it should respond to. It is a
| breeze to setup your application using Laravel's RESTful routing and it
| is perfectly suited for building large applications and simple APIs.
|
| Let's respond to a simple GET request to http://example.com/hello:
|
|		Route::get('hello', function()
|		{
|			return 'Hello World!';
|		});
|
| You can even respond to more than one URI:
|
|		Route::post(array('hello', 'world'), function()
|		{
|			return 'Hello World!';
|		});
|
| It's easy to allow URI wildcards using (:num) or (:any):
|
|		Route::put('hello/(:any)', function($name)
|		{
|			return "Welcome, $name.";
|		});
|
*/

// GET Routes
Route::get('/', array('as'=>'home','uses'=>'home@index'));
Route::get('/users/signup', array('as'=>'signup','uses'=>'users@signup'));
Route::get('/users/password_reset', array('as'=>'recovery','uses'=>'users@password_reset'));
Route::get('/users/password_change', array('as'=>'password_change','uses'=>'users@password_change'));
Route::get('/users/signup_success', array('as'=>'signup_success','uses'=>'users@signup_success'));
Route::get('/users/logout', array('as'=>'logout','uses'=>'users@logout'));
Route::get('/users/dashboard', array('as'=>'dashboard','uses'=>'users@dashboard'));
Route::get('/users/forms', array('as'=>'forms','uses'=>'users@forms'));
Route::get('/users/biodata', array('as'=>'biodata','uses'=>'users@biodata'));
Route::get('/users/education', array('as'=>'education','uses'=>'users@education'));
Route::get('/users/parents', array('as'=>'parents','uses'=>'users@parents'));
Route::get('/users/upload', array('as'=>'upload','uses'=>'users@upload'));
Route::get('/users/uploaded', array('as'=>'uploaded','uses'=>'users@uploaded'));
Route::get('/users/delete_doc/(:any)', array('as'=>'delete_doc','uses'=>'users@delete_doc'));
Route::get('/users/add_institution', array('as'=>'add_institution','uses'=>'users@add_institution'));
Route::get('/users/add_result', array('as'=>'add_result','uses'=>'users@add_result'));
Route::get('/users/edit_institution/(:num)/(:num)', array('as'=>'edit_institution','uses'=>'users@edit_institution'));
Route::get('/users/edit_result/(:num)/(:num)', array('as'=>'edit_result','uses'=>'users@edit_result'));
Route::get('/users/delete_institution/(:num)/(:num)', array('as'=>'delete_institution','uses'=>'users@delete_institution'));
Route::get('/users/delete_result/(:num)/(:num)', array('as'=>'delete_result','uses'=>'users@delete_result'));

// POST Routes
Route::post('/users/login', array('uses'=>'users@login'));
Route::post('/users/signup', array('uses'=>'users@signup'));
Route::post('/users/biodata', array('uses'=>'users@biodata'));
Route::post('/users/education', array('uses'=>'users@education'));
Route::post('/users/add_institution', array('uses'=>'users@add_institution'));
Route::post('/users/add_result', array('uses'=>'users@add_result'));
Route::post('/users/edit_institution', array('uses'=>'users@edit_institution'));
Route::post('/users/edit_result', array('uses'=>'users@edit_result'));
Route::post('/users/parents', array('uses'=>'users@parents'));
Route::post('/users/upload', array('uses'=>'users@upload'));
Route::post('/users/uploaded', array('uses'=>'users@uploaded'));
Route::post('/users/password_change', array('uses'=>'users@password_change'));
Route::post('/users/password_reset', array('uses'=>'users@password_reset'));

/*
|--------------------------------------------------------------------------
| Application 404 & 500 Error Handlers
|--------------------------------------------------------------------------
|
| To centralize and simplify 404 handling, Laravel uses an awesome event
| system to retrieve the response. Feel free to modify this function to
| your tastes and the needs of your application.
|
| Similarly, we use an event to handle the display of 500 level errors
| within the application. These errors are fired when there is an
| uncaught exception thrown in the application.
|
*/

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function()
{
	return Response::error('500');
});

/*
|--------------------------------------------------------------------------
| Route Filters
|--------------------------------------------------------------------------
|
| Filters provide a convenient method for attaching functionality to your
| routes. The built-in before and after filters are called before and
| after every request to your application, and you may even create
| other filters that can be attached to individual routes.
|
| Let's walk through an example...
|
| First, define a filter:
|
|		Route::filter('filter', function()
|		{
|			return 'Filtered!';
|		});
|
| Next, attach the filter to a route:
|
|		Router::register('GET /', array('before' => 'filter', function()
|		{
|			return 'Hello World!';
|		}));
|
*/

Route::filter('before', function()
{
	// Do stuff before every request to your application...
});

Route::filter('after', function($response)
{
	// Do stuff after every request to your application...
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::to('login');
});

Route::filter('mauth', function()
{
	if (Auth::guest()) return Redirect::to_route('home')->with('message',User::message_response('error', 'You need to log in before accessing that area!'));
});
