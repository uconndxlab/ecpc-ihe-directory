<?php

use Illuminate\Support\Facades\Route;
use App\Models\Institute;

Route::resource('institutes', 'App\Http\Controllers\InstituteController');

Route::get('/', function () {
    // Institute/InstituteController@index

    $institutes = Institute::all();
    return view('institutes.index', compact('institutes'));
});