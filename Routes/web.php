<?php

use Illuminate\Support\Facades\Route;

Route::get('settings/flush', 'SettingsController@flush')->name('settings.flush');
Route::resource('settings', 'SettingsController');

