<?php


//Route::get('', function()
//{
//	return View::make('base.index');
//});

Route::controller('party', 'PartyController');
Route::controller('chat', 'ChatController');
Route::controller('reminders', 'RemindersController');
Route::controller('contributions', 'ContributionsController');
Route::controller('me', 'Me');
Route::controller('', 'MainController');


//Route::resource('genders', 'GendersController');