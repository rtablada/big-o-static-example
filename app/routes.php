<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('api', function()
{
	$results = Finance::all();

	Clockwork::startEvent('setting_appends', 'Set appends foreach item in results');
	$results->each(function($result) {
		$result->setAppends(['computed_property']);
	});
	Clockwork::endEvent('setting_appends');

	Clockwork::info(memory_get_usage());
	return $results;
});

Route::get('static', function()
{
	$model = new Finance;

	Clockwork::startEvent('setting_appends', 'Set appends foreach item in results');
		$model->andAppends(['computed_property']);
	Clockwork::endEvent('setting_appends');

	$results = $model->all();

	Clockwork::info(memory_get_usage());
	return $results;
});
