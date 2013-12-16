<?php


//Route::get('', function()
//{
//	return View::make('base.index');
//});

Route::controller('party', 'PartyController');
Route::controller('me', 'Me');
Route::controller('', 'MainController');


//Route::resource('genders', 'GendersController');