<?php

Route::get('/', ['as' => 'admin.dashboard', 'uses'=>'\App\Http\Controllers\DashboardController@index']);

Route::get('information', ['as' => 'admin.information', function () {
	$content = 'Define your information here.';
	return AdminSection::view($content, 'Information');
}]);